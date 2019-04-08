<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProductsAPIRequest;
use App\Http\Requests\API\UpdateProductsAPIRequest;
use App\Models\Products;
use App\Repositories\ProductsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProductsController
 * @package App\Http\Controllers\API
 */

class ProductsAPIController extends AppBaseController
{
    /** @var  ProductsRepository */
    private $productsRepository;

    public function __construct(ProductsRepository $productsRepo)
    {
        $this->productsRepository = $productsRepo;
    }

    /**
     * Display a listing of the Products.
     * GET|HEAD /products
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // limitar la cantidad de registros es necesario
        $request['limit'] = $request['limit'] ?? '1000000';

        $this->productsRepository->pushCriteria(new RequestCriteria($request));
        $this->productsRepository->pushCriteria(new LimitOffsetCriteria($request));

        $filters = ['select' => ['products.*'],'join' => [],'whereRaw' => [],'where' => [],'group_by' => [],'order_by' => []];

        // id del producto
        if (isset($request['id']) && $request['id'] != '' ) {
            $filters['where'][] = ['products.id',addslashes($request['id'])];
        }
        // nombre del producto
        if (isset($request['name']) && $request['name'] != '' ) {
            $filters['where'][] = ['products.name','like','%'.addslashes($request['name']).'%'];
        }
        // fecha de envio
        if (isset($request['delivery_date']) && $request['delivery_date'] != '') {
            $filters['select'][] = 'orders.delivery_date';
            $filters['whereRaw']['delivery_date'] = 'orders.delivery_date like \'%'.addslashes($request['delivery_date']).'%\'';
            $filters['join'][] = ['left',['sales','products.id','=','sales.product_id']];
            $filters['join'][] = ['left',['orders','sales.orders_id','=','orders.id']];
        }

        // condiciones
        if (isset($request['cond']) && $request['cond'] != '') {
            $orderConds = [];
            switch ($request['cond']) {
                // menos vendidos
                case 'least-sold':
                    $orderConds = array_merge($orderConds,['quantities_sold','asc']);
                    break;
                // mas vendidos
                case 'most-sold':
                    $orderConds = array_merge($orderConds,['quantities_sold','desc']);
                    break;
            }

            if (count($orderConds)) {
                $filters['order_by'][] = array_merge($filters['order_by'],$orderConds);

                // parametros en el query
                // el valor de quantities_sold mostrara la cantidad de unidades vendidas
                $filters['select'][] = \DB::raw('SUM(sales.quantity) as quantities_sold');
                // si la orden no esta pagada no cuenta como vendido
                $filters['whereRaw'][] = '(orders.paid = 1 OR orders.paid IS NULL)';
                $filters['group_by'][] = ['products.id'];
                $filters['order_by'][] = ['orders.delivery_date','asc'];

                // en el caso de que no reciba el parametro de delivery_date agrega las condiciones necesarias
                if (!isset($request['delivery_date']) && count($filters['join']) == 0) {
                    $filters['select'][] = 'orders.delivery_date';

                    $filters['join'][] = ['left',['sales','products.id','=','sales.product_id']];
                    $filters['join'][] = ['left',['orders','sales.orders_id','=','orders.id']];
                    // agrupara las ventas por fecha
                    // $filters['group_by'][] = ['orders.delivery_date'];   
                }
                
                // si se filtra por delivery_date se puede agregar la condicion para que devuelva tambien los que no se han vendido
                // if(isset($filters['whereRaw']['delivery_date'])){
                //     $filters['whereRaw']['delivery_date'] = '('.$filters['whereRaw']['delivery_date'].' OR delivery_date IS NULL )';
                // }
                
                
            }
        }


        // agrega los filtros y condiciones al query principal
        $this->productsRepository = $this->productsRepository->scopeQuery(function($query) use ($filters) {

            $query->select($filters['select']);

            if (count($filters['join'])) {
                foreach ($filters['join'] as $value) {
                    switch ($value[0]) {
                        case 'inner':
                            $query->join($value[1][0],$value[1][1],$value[1][2],$value[1][3]);
                            break;
                        case 'left':
                            $query->leftJoin($value[1][0],$value[1][1],$value[1][2],$value[1][3]);
                            break;
                        case 'right':
                            $query->rightJoin($value[1][0],$value[1][1],$value[1][2],$value[1][3]);
                            break;
                    }
                }
            }

            if (count($filters['whereRaw'])) {
                foreach ($filters['whereRaw'] as $key => $value) {
                    $query->whereRaw($value);
                }
            }

            if (count($filters['where'])) {
                $query->where($filters['where']);
            }

            if (count($filters['group_by'])) {
                foreach ($filters['group_by'] as $key => $value) {
                    $query->groupBy($value);
                }
            }

            if (count($filters['order_by'])) {
                foreach ($filters['order_by'] as $key => $value) {
                    $query->orderBy($value[0],$value[1]);
                }
            }

            return $query;

        });
        
        // \DB::enableQueryLog();

        $products = $this->productsRepository->get();
        
        // print_r(\DB::getQueryLog());

        return $this->sendResponse($products->toArray(), 'Products retrieved successfully');
    }

    /**
     * Store a newly created Products in storage.
     * POST /products
     *
     * @param CreateProductsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductsAPIRequest $request)
    {
        $input = $request->all();

        $products = $this->productsRepository->create($input);

        return $this->sendResponse($products->toArray(), 'Products saved successfully');
    }

    /**
     * Display the specified Products.
     * GET|HEAD /products/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Products $products */
        $products = $this->productsRepository->findWithoutFail($id);

        if (empty($products)) {
            return $this->sendError('Products not found');
        }

        return $this->sendResponse($products->toArray(), 'Products retrieved successfully');
    }

    /**
     * Update the specified Products in storage.
     * PUT/PATCH /products/{id}
     *
     * @param  int $id
     * @param UpdateProductsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Products $products */
        $products = $this->productsRepository->findWithoutFail($id);

        if (empty($products)) {
            return $this->sendError('Products not found');
        }

        $products = $this->productsRepository->update($input, $id);

        return $this->sendResponse($products->toArray(), 'Products updated successfully');
    }

    /**
     * Remove the specified Products from storage.
     * DELETE /products/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Products $products */
        $products = $this->productsRepository->findWithoutFail($id);

        if (empty($products)) {
            return $this->sendError('Products not found');
        }

        $products->delete();

        return $this->sendResponse($id, 'Products deleted successfully');
    }
}
