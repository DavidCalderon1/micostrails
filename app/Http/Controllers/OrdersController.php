<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrdersRequest;
use App\Http\Requests\UpdateOrdersRequest;
use App\Repositories\OrdersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class OrdersController extends AppBaseController
{
    /** @var  OrdersRepository */
    private $ordersRepository;

    public function __construct(OrdersRepository $ordersRepo)
    {
        $this->ordersRepository = $ordersRepo;
    }

    /**
     * Display a listing of the Orders.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ordersRepository->pushCriteria(new RequestCriteria($request));
        $this->ordersRepository->orderBy('delivery_date','asc');
        $orders = $this->ordersRepository->all();

        $orders = $orders->toArray();

        $users_id = [];
        $storages_id = [];
        $usersAddresses_id = [];
        $status_id = [];
        foreach ($orders as $key => $order) {
            $users_id[] = $order['creator_id'];
            $users_id[] = $order['client_id'];
            $users_id[] = $order['transporter_id'];
            $storages_id[] = $order['storage_id'];
            $usersAddresses_id[] = $order['users_addresses_id'];
            $status_id[] = $order['status_id'];
        }

        $users =  \App\Models\User::whereIn('id',$users_id)
            ->pluck('name','id');

        $storages =  \App\Models\Storages::whereIn('id',$storages_id)
            ->pluck('name','id');

        $usersAddresses =  \App\Models\UsersAddresses::whereIn('id',$usersAddresses_id)
            ->pluck('address','id');

        $status =  \App\Models\Status::whereIn('id',$status_id)
            ->pluck('name','id');

        return view('orders.index', compact('orders','users','storages','usersAddresses','status'));
    }

    /**
     * Show the form for creating a new Orders.
     *
     * @return Response
     */
    public function create()
    {
        // consulta los usuarios con roles de transportador y cliente
        $users =  \App\Models\User::join('users_has_roles','users.id','users_has_roles.users_id')
            ->whereIn('roles_id',[2,3])
            ->select('users.id','users.name','roles_id')
            ->get();

        $clients = [];
        $transporters = [];

        foreach ($users as $key => $user) {
            if ($user->roles_id == 2) {
                $transporters[$user->id] = $user->name;
            }
            if ($user->roles_id == 3) {
                $clients[$user->id] = $user->name;
            }
        }

        $storages =  \App\Models\Storages::pluck('name','id');

        $users_addresses =  [];

        $status =  \App\Models\Status::pluck('name','id');

        $products =  \App\Models\Products::pluck('name','id');

        $order_products =  [];

        return view('orders.create',compact('clients','transporters','storages','users_addresses','status','products','order_products'));
    }

    /**
     * Store a newly created Orders in storage.
     *
     * @param CreateOrdersRequest $request
     *
     * @return Response
     */
    public function store(CreateOrdersRequest $request)
    {
        $input = $request->all();

        $input['creator_id'] = \Auth::id();

        $validateFields = [];
        $count_products = count($request['products']);
        if ($count_products != count($request['quantities'])) {
            $validateFields['quantities'] = 'required';
        }

        if (count($validateFields)) {
            $this->validate($request, $validateFields);
        }

        // inicia la transaccion
        \DB::beginTransaction();

        $orders = $this->ordersRepository->create($input);

        // guardar el recurso de sales 
        $sales = [];
        foreach ($request['products'] as $key => $product) {
            $sales[] = new \App\Models\Sales(['orders_id' => $orders->id, 'product_id' => $product, 'quantity' => $request['quantities'][$key]]);
        }
        $orders->sales()->saveMany($sales);

        // finaliza la transaccion
        \DB::commit();

        Flash::success('Orders saved successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * Display the specified Orders.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $orders = $this->ordersRepository->findWithoutFail($id);

        if (empty($orders)) {
            Flash::error('Orders not found');

            return redirect(route('orders.index'));
        }

        $users_id = [$orders->creator_id, $orders->client_id, $orders->transporter_id];

        $users =  \App\Models\User::whereIn('id',$users_id)
            ->pluck('name','id');

        $orders->storage_name = $orders->storage()->first()->name ?? '';
        $orders->users_addresses_name = $orders->usersAddresses()->first()->address ?? '';
        $orders->status_name = $orders->status()->first()->name ?? '';

        $order_products = \App\Models\Sales::join('products','sales.product_id','products.id')
            ->where('sales.orders_id',$orders->id)
            ->select('products.name','quantity')
            ->get();

        return view('orders.show')->with(['orders' => $orders, 'users' => $users, 'order_products' => $order_products]);
    }

    /**
     * Show the form for editing the specified Orders.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $orders = $this->ordersRepository->findWithoutFail($id);

        if (empty($orders)) {
            Flash::error('Orders not found');

            return redirect(route('orders.index'));
        }

        // consulta los usuarios con roles de transportador y cliente
        $users =  \App\Models\User::join('users_has_roles','users.id','users_has_roles.users_id')
            ->whereIn('roles_id',[2,3])
            ->select('users.id','users.name','roles_id')
            ->get();

        $clients = [];
        $transporters = [];

        foreach ($users as $key => $user) {
            if ($user->roles_id == 2) {
                $transporters[$user->id] = $user->name;
            }
            if ($user->roles_id == 3) {
                $clients[$user->id] = $user->name;
            }
        }

        $storages =  \App\Models\Storages::pluck('name','id');

        $users_addresses = \App\Models\UsersAddresses::where('user_id',$orders->client_id)
            ->pluck('address','id');

        $date = new \DateTime($orders->delivery_date);
        $orders->delivery_date = $date->format('Y-m-d');

        $status =  \App\Models\Status::pluck('name','id');

        $products =  \App\Models\Products::pluck('name','id');

        $order_products = $orders->sales()->select('sales.id','product_id','quantity')->get();

        return view('orders.edit',compact('orders','clients','transporters','storages','users_addresses','status','products','order_products'));
    }

    /**
     * Update the specified Orders in storage.
     *
     * @param  int              $id
     * @param UpdateOrdersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrdersRequest $request)
    {
        $orders = $this->ordersRepository->findWithoutFail($id);

        if (empty($orders)) {
            Flash::error('Orders not found');

            return redirect(route('orders.index'));
        }

        $validateFields = [];
        $count_products = count($request['products']);
        if ($count_products != count($request['quantities'])) {
            $validateFields['quantities'] = 'required';
        }

        if (count($validateFields)) {
            $this->validate($request, $validateFields);
        }
    
        // inicia la transaccion
        \DB::beginTransaction();

        $sales_id_old = $orders->sales()->pluck('sales.id')->toArray();
        // guardar el recurso sales
        $sales_create = [];
        $sales_update = [];
        $sales_delete = [];
        
        // eliminar los registros de Sales que no llegaron
        if (isset($request['sale_id'])) {
            $sales_delete = array_diff($sales_id_old, $request['sale_id']);
        }
        if(count($sales_delete)){
            $sale = \App\Models\Sales::whereIn('id',$sales_delete)->delete();
        }

        foreach ($request['products'] as $key => $product) {

            $sale = \App\Models\Sales::updateOrCreate(
                ['id' => ($request['sale_id'][$key] ?? 0)],
                ['orders_id' => $orders->id, 'product_id' => $product, 'quantity' => $request['quantities'][$key]]
            );

        }


        $orders = $this->ordersRepository->update($request->all(), $id);

        // finaliza la transaccion
        \DB::commit();

        Flash::success('Orders updated successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified Orders from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $orders = $this->ordersRepository->findWithoutFail($id);

        if (empty($orders)) {
            Flash::error('Orders not found');

            return redirect(route('orders.index'));
        }

        $this->ordersRepository->delete($id);

        Flash::success('Orders deleted successfully.');

        return redirect(route('orders.index'));
    }
}
