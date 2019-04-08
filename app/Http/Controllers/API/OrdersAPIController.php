<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOrdersAPIRequest;
use App\Http\Requests\API\UpdateOrdersAPIRequest;
use App\Models\Orders;
use App\Repositories\OrdersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class OrdersController
 * @package App\Http\Controllers\API
 */

class OrdersAPIController extends AppBaseController
{
    /** @var  OrdersRepository */
    private $ordersRepository;

    public function __construct(OrdersRepository $ordersRepo)
    {
        $this->ordersRepository = $ordersRepo;
    }

    /**
     * Display a listing of the Orders.
     * GET|HEAD /orders
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // limitar la cantidad de registros es necesario
        $request['limit'] = $request['limit'] ?? '1000000';

        $this->ordersRepository->pushCriteria(new RequestCriteria($request));
        $this->ordersRepository->pushCriteria(new LimitOffsetCriteria($request));

        $filters = [];

        // id de la orden
        if (isset($request['id']) && $request['id'] != '') {
            $filters[] = ['orders.id',addslashes($request['id'])];
        }
        // creator_id de la orden
        if (isset($request['creator_id']) && $request['creator_id'] != '') {
            $filters[] = ['orders.creator_id',addslashes($request['creator_id'])];
        }
        // client_id de la orden
        if (isset($request['client_id']) && $request['client_id'] != '') {
            $filters[] = ['orders.client_id',addslashes($request['client_id'])];
        }
        // transporter_id de la orden
        if (isset($request['transporter_id']) && $request['transporter_id'] != '') {
            $filters[] = ['orders.transporter_id',addslashes($request['transporter_id'])];
        }
        // storage_id de la orden
        if (isset($request['storage_id']) && $request['storage_id'] != '') {
            $filters[] = ['orders.storage_id',addslashes($request['storage_id'])];
        }
        // users_addresses_id de la orden
        if (isset($request['users_addresses_id']) && $request['users_addresses_id'] != '') {
            $filters[] = ['orders.users_addresses_id',addslashes($request['users_addresses_id'])];
        }
        // delivery_date de la orden
        if (isset($request['delivery_date']) && $request['delivery_date'] != '') {
            $filters[] = ['orders.delivery_date','like','%'.addslashes($request['delivery_date']).'%'];
        }
        // priority de la orden
        if (isset($request['priority']) && $request['priority'] != '') {
            $filters[] = ['orders.priority',addslashes($request['priority'])];
        }
        // status_id de la orden
        if (isset($request['status_id']) && $request['status_id'] != '') {
            $filters[] = ['orders.status_id',addslashes($request['status_id'])];
        }
        // paid de la orden
        if (isset($request['paid']) && $request['paid'] != '') {
            $filters[] = ['orders.paid',addslashes($request['paid'])];
        }

        // agrega los filtros y condiciones al query principal
        $this->ordersRepository = $this->ordersRepository->scopeQuery(function($query) use ($filters) {

            //obtener los datos de los transportadores
            $query->join('users','orders.transporter_id','users.id');
            $query->select('orders.*','users.name as transporter_name');

            if (count($filters)) {
                $query->where($filters);
            }

            return $query;

        });

        // ordena los pedidos a partir de la prioridad
        $this->ordersRepository->orderBy('priority','asc');
        // ordena los pedidos a partir de la fecha de entrega
        $this->ordersRepository->orderBy('delivery_date','asc');

        $orders_obj = $this->ordersRepository->all();
        $orders_arr = $orders_obj->toArray();

        // obtener los ids
        $orders_ids = array_column($orders_arr, 'id');


        // obtener los productos 
        $sales = \App\Models\Sales::select('orders_id','product_id','quantity')
            ->whereIn('orders_id',$orders_ids)
            ->get()->toArray();
        $products_ids = array_column($sales, 'product_id');

        $storages_ids = [];
        foreach ($orders_arr as $key => $order) {
            // obtener las bodegas
            $storages_ids[] = $order['storage_id'];

            // se agrega el storage_id a cada elemento de sales para poder compararlo al momento de calcular la disponibilidad
            foreach ($sales as $key2 => $sale) {
                if ($order['id'] == $sale['orders_id']) {
                    $sales[$key2]['storage_id'] = $order['storage_id'];
                }
            }
        }

        $reqGetInventory = $request;
        // elimina todos los parametros para que no interfiera con el resultado del metodo inventory()
        foreach ($reqGetInventory->all() as $key => $req) {
            $reqGetInventory->request->remove($key);
        }

        // se agregan los parametros para obtener solo los datos necesarios
        $reqGetInventory->request->add(['id' => $storages_ids]);
        $reqGetInventory->request->add(['products_ids' => $products_ids]);
        $reqGetInventory->request->add(['origin' => 'internal']);

        // obtener la disponibilidad de los productos
        $inventory = app('App\Http\Controllers\API\StoragesAPIController')->inventory($reqGetInventory);

        
        // calcular la disponibilidad y determinar si es necesario solicitar productos a los proveedores
        foreach ($sales as $key => $sale) {
            foreach ($inventory[$sale['storage_id']]['inventory'] as $key2 => $inv) {
                if ($sale['product_id'] == $inv['products_id']) {
                    // agrega algunos datos del producto
                    $sales[$key]['name'] = $inv['name'];
                    $sales[$key]['description'] = $inv['description'];
                    // inicia las variables que determinan si se obtienen los productos del inventario o se solicitan a los proveedores
                    $sales[$key]['from_providers'] = 0;
                    $sales[$key]['from_inventory'] = $sale['quantity'];

                    // la disponibilidad se obtiene restando a las compras la cantidad del producto
                    $availability = ($inv['purchases'] - $sale['quantity']);

                    // si la disponibilidad es negativa se debe calcular la cantidad de unidades que estan en el inventario y las que se deben solicitar a los proveedores
                    if ($availability < 0) {
                        $sales[$key]['from_providers'] = abs($availability);
                        $sales[$key]['from_inventory'] = ($sale['quantity'] - abs($availability));
                    }
                }
            }
        }

        // unir la informacion de los productos con las ordenes
        foreach ($orders_arr as $key => $order) {
            $orders_arr[$key]['products'] = [];
            foreach ($sales as $key2 => $sale) {
                if ($order['id'] == $sale['orders_id']) {
                    unset($sale['orders_id'],$sale['storage_id']);
                    $orders_arr[$key]['products'][] = $sale;
                }
            }
        }

        return $this->sendResponse($orders_arr, 'Orders retrieved successfully');
    }

    /**
     * Store a newly created Orders in storage.
     * POST /orders
     *
     * @param CreateOrdersAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOrdersAPIRequest $request)
    {
        $input = $request->all();

        $orders = $this->ordersRepository->create($input);

        return $this->sendResponse($orders->toArray(), 'Orders saved successfully');
    }

    /**
     * Display the specified Orders.
     * GET|HEAD /orders/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Orders $orders */
        $orders = $this->ordersRepository->findWithoutFail($id);

        if (empty($orders)) {
            return $this->sendError('Orders not found');
        }

        return $this->sendResponse($orders->toArray(), 'Orders retrieved successfully');
    }

    /**
     * Update the specified Orders in storage.
     * PUT/PATCH /orders/{id}
     *
     * @param  int $id
     * @param UpdateOrdersAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrdersAPIRequest $request)
    {
        $input = $request->all();

        /** @var Orders $orders */
        $orders = $this->ordersRepository->findWithoutFail($id);

        if (empty($orders)) {
            return $this->sendError('Orders not found');
        }

        $orders = $this->ordersRepository->update($input, $id);

        return $this->sendResponse($orders->toArray(), 'Orders updated successfully');
    }

    /**
     * Remove the specified Orders from storage.
     * DELETE /orders/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Orders $orders */
        $orders = $this->ordersRepository->findWithoutFail($id);

        if (empty($orders)) {
            return $this->sendError('Orders not found');
        }

        $orders->delete();

        return $this->sendResponse($id, 'Orders deleted successfully');
    }
}
