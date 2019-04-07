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
        $this->ordersRepository->pushCriteria(new RequestCriteria($request));
        $this->ordersRepository->pushCriteria(new LimitOffsetCriteria($request));
        $orders = $this->ordersRepository->all();

        return $this->sendResponse($orders->toArray(), 'Orders retrieved successfully');
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
