<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStoragesAPIRequest;
use App\Http\Requests\API\UpdateStoragesAPIRequest;
use App\Models\Storages;
use App\Repositories\StoragesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class StoragesController
 * @package App\Http\Controllers\API
 */

class StoragesAPIController extends AppBaseController
{
    /** @var  StoragesRepository */
    private $storagesRepository;

    public function __construct(StoragesRepository $storagesRepo)
    {
        $this->storagesRepository = $storagesRepo;
    }

    /**
     * Display a listing of the Storages.
     * GET|HEAD /storages
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->storagesRepository->pushCriteria(new RequestCriteria($request));
        $this->storagesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $storages = $this->storagesRepository->all();

        return $this->sendResponse($storages->toArray(), 'Storages retrieved successfully');
    }


    /**
     * Display a listing of the Storages inventory.
     * GET|HEAD /storages/inventory
     *
     * @param Request $request
     * @return Response
     */
    public function inventory(Request $request)
    {
        // limitar la cantidad de registros es necesario
        $request['limit'] = $request['limit'] ?? '1000000';

        $this->storagesRepository->pushCriteria(new RequestCriteria($request));
        $this->storagesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $filters = [];
        $filtersIn = [];

        // id de la bodega
        if (isset($request['id']) && !empty($request['id'])) {
            if (gettype($request['id']) != 'array') {
                $filters[] = ['storages.id',addslashes($request['id'])];
            }else{
                $filtersIn[] = ['storages.id',$request['id']];
            }
        }
        // nombre de la bodega
        if (isset($request['name']) && $request['name'] != '') {
            $filters[] = ['storages.name','like','%'.addslashes($request['name']).'%'];
        }
        // city_id de la bodega
        if (isset($request['city_id']) && $request['city_id'] != '') {
            $filters[] = ['storages.city_id',addslashes($request['city_id'])];
        }

        // agrega los filtros y condiciones al query principal
        $this->storagesRepository = $this->storagesRepository->scopeQuery(function($query) use ($filters,$filtersIn) {

            if (count($filtersIn)) {
                foreach ($filtersIn as $key => $filter) {
                    $query->whereIn($filter[0],$filter[1]);
                }
            }
            if (count($filters)) {
                $query->where($filters);
            }

            return $query;

        });

        // \DB::enableQueryLog();

        $storages_obj = $this->storagesRepository->all();
        $storages_array = $storages_obj->toArray();

        // print_r(\DB::getQueryLog());
        
        // asigna cada bodega al indice del array a partir del id
        // esto sera util al momento de recorrer el inventory desde otros controladores
        $storages_arr = [];
        foreach ($storages_array as $key => $strg_arr) {
            $storages_arr[$strg_arr['id']] = $strg_arr;
        }

        $storages_ids = array_column($storages_arr, 'id');

        // lista de productos por bodegas
        $storages_has_products = \App\Models\Products::join('storages_has_products','products.id','storages_has_products.products_id')
            ->select('storages_id','products_id','products.name','products.description')
            ->whereIn('storages_id',$storages_ids);

        // products_ids de la bodega
        if (isset($request['products_ids']) && count($request['products_ids']) ) {
            $storages_has_products = $storages_has_products->whereIn('products_id',$request['products_ids']);
        }

        $storages_has_products = $storages_has_products->orderBy('storages_id','asc')
            ->orderBy('products_id','asc')
            ->get()->toArray();

        $products_ids = array_column($storages_has_products, 'products_id');

        // cantidades vendidas por producto
        $sales = \App\Models\Orders::join('sales','orders.id','sales.orders_id')
            ->select('sales.quantity','product_id','storage_id')
            ->whereIn('product_id',$products_ids)
            ->where('orders.paid',1)
            ->orderBy('storage_id','asc')
            ->orderBy('product_id','asc')
            ->get()->toArray();
        
        // cantidades compradas por producto
        $purchases = \App\Models\Purchases::join('purchases_detail','purchases.id','purchases_detail.purchases_id')
            ->select('purchases_detail.quantity','product_id','storage_id')
            ->whereIn('product_id',$products_ids)
            ->orderBy('storage_id','asc')
            ->orderBy('product_id','asc')
            ->get()->toArray();

        // calcular diferencia 
        foreach ($storages_has_products as $key => $storages) {
            // si no existen los parametros de ventas y compras los crea e inicia en 0
            if (!isset($storages_has_products[$key]['sales'])) {
                $storages_has_products[$key]['sales'] = 0;
            }
            if (!isset($storages_has_products[$key]['purchases'])) {
                $storages_has_products[$key]['purchases'] = 0;
            }

            // va sumando las cantidades vendidas de cada producto
            foreach ($sales as $key2 => $sale) {
                if ($storages['storages_id'] == $sale['storage_id'] && $storages['products_id'] == $sale['product_id']) {
                    $storages_has_products[$key]['sales'] += $sale['quantity'];
                }
            }

            // va sumando las cantidades compradas de cada producto
            foreach ($purchases as $key3 => $purchase) {
                if ($storages['storages_id'] == $purchase['storage_id'] && $storages['products_id'] == $purchase['product_id']) {
                    $storages_has_products[$key]['purchases'] += $purchase['quantity'];
                }
            }
        }

        // al arreglo que tiene los datos de cada bodega se le agrega el inventario
        foreach ($storages_arr as $key => $storage) {
            $storages_arr[$key]['inventory'] = [];
            foreach ($storages_has_products as $key2 => $shp) {
                if ($storage['id'] == $shp['storages_id']) {
                    $storages_arr[$key]['inventory'][] = $shp;
                }
            }
        }

        // si es una peticion interna devuelve el array
        if (isset($request['origin']) && $request['origin'] == 'internal') {
            return $storages_arr;
        }

        return $this->sendResponse($storages_arr, 'Storages\'s inventory retrieved successfully');
    }

    /**
     * Store a newly created Storages in storage.
     * POST /storages
     *
     * @param CreateStoragesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStoragesAPIRequest $request)
    {
        $input = $request->all();

        $storages = $this->storagesRepository->create($input);

        return $this->sendResponse($storages->toArray(), 'Storages saved successfully');
    }

    /**
     * Display the specified Storages.
     * GET|HEAD /storages/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Storages $storages */
        $storages = $this->storagesRepository->findWithoutFail($id);

        if (empty($storages)) {
            return $this->sendError('Storages not found');
        }

        return $this->sendResponse($storages->toArray(), 'Storages retrieved successfully');
    }

    /**
     * Update the specified Storages in storage.
     * PUT/PATCH /storages/{id}
     *
     * @param  int $id
     * @param UpdateStoragesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStoragesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Storages $storages */
        $storages = $this->storagesRepository->findWithoutFail($id);

        if (empty($storages)) {
            return $this->sendError('Storages not found');
        }

        $storages = $this->storagesRepository->update($input, $id);

        return $this->sendResponse($storages->toArray(), 'Storages updated successfully');
    }

    /**
     * Remove the specified Storages from storage.
     * DELETE /storages/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Storages $storages */
        $storages = $this->storagesRepository->findWithoutFail($id);

        if (empty($storages)) {
            return $this->sendError('Storages not found');
        }

        $storages->delete();

        return $this->sendResponse($id, 'Storages deleted successfully');
    }
}
