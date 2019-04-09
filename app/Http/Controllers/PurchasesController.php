<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePurchasesRequest;
use App\Http\Requests\UpdatePurchasesRequest;
use App\Repositories\PurchasesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PurchasesController extends AppBaseController
{
    /** @var  PurchasesRepository */
    private $purchasesRepository;

    public function __construct(PurchasesRepository $purchasesRepo)
    {
        $this->purchasesRepository = $purchasesRepo;
    }

    /**
     * Display a listing of the Purchases.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->purchasesRepository->pushCriteria(new RequestCriteria($request));
        $purchases = $this->purchasesRepository->all();

        $purchases = $purchases->toArray();

        $providers_id = array_column($purchases, 'providers_id');
        $storages_id = array_column($purchases, 'storage_id');

        $providers =  \App\Models\Providers::whereIn('id',$providers_id)
            ->pluck('name','id');

        $storages =  \App\Models\Storages::whereIn('id',$storages_id)
            ->pluck('name','id');

        return view('purchases.index')
            ->with(['purchases' => $purchases, 'providers' => $providers, 'storages' => $storages]);
    }

    /**
     * Show the form for creating a new Purchases.
     *
     * @return Response
     */
    public function create()
    {
        $providers =  \App\Models\Providers::pluck('name','id');

        $storages =  \App\Models\Storages::pluck('name','id');

        $products =  \App\Models\Products::pluck('name','id');

        $purchase_products =  [];

        return view('purchases.create', compact('providers','storages','products','purchase_products'));
    }

    /**
     * Store a newly created Purchases in storage.
     *
     * @param CreatePurchasesRequest $request
     *
     * @return Response
     */
    public function store(CreatePurchasesRequest $request)
    {
        $input = $request->all();


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

        $purchases = $this->purchasesRepository->create($input);

        // guardar el recurso de purchases_detail 
        $purchases_detail = [];
        foreach ($request['products'] as $key => $product) {
            $purchases_detail[] = new \App\Models\PurchasesDetail(['purchases_id' => $purchases->id, 'product_id' => $product, 'quantity' => $request['quantities'][$key]]);
        }
        $purchases->purchasesDetails()->saveMany($purchases_detail);

        // finaliza la transaccion
        \DB::commit();

        Flash::success('Purchases saved successfully.');

        return redirect(route('purchases.index'));
    }

    /**
     * Display the specified Purchases.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $purchases = $this->purchasesRepository->findWithoutFail($id);

        if (empty($purchases)) {
            Flash::error('Purchases not found');

            return redirect(route('purchases.index'));
        }

        $purchases->providers_name = $purchases->providers()->first()->name ?? '';
        $purchases->storage_name = $purchases->storage()->first()->name ?? '';

        $purchase_products = \App\Models\PurchasesDetail::join('products','purchases_detail.product_id','products.id')
            ->where('purchases_detail.purchases_id',$purchases->id)
            ->select('products.name','quantity')
            ->get();

        return view('purchases.show')->with(['purchases' => $purchases, 'purchase_products' => $purchase_products]);
    }

    /**
     * Show the form for editing the specified Purchases.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $purchases = $this->purchasesRepository->findWithoutFail($id);

        if (empty($purchases)) {
            Flash::error('Purchases not found');

            return redirect(route('purchases.index'));
        }

        $providers =  \App\Models\Providers::pluck('name','id');

        $storages =  \App\Models\Storages::pluck('name','id');

        $products =  \App\Models\Products::pluck('name','id');

        $purchase_products = $purchases->purchasesDetails()->select('purchases_detail.id','product_id','quantity')->get();

        return view('purchases.edit', compact('purchases','providers','storages','products','purchase_products'));
    }

    /**
     * Update the specified Purchases in storage.
     *
     * @param  int              $id
     * @param UpdatePurchasesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePurchasesRequest $request)
    {
        $purchases = $this->purchasesRepository->findWithoutFail($id);

        if (empty($purchases)) {
            Flash::error('Purchases not found');

            return redirect(route('purchases.index'));
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

        $purchases_detail_id_old = $purchases->purchasesDetails()->pluck('purchases_detail.id')->toArray();
        // guardar el recurso purchases_detail
        $purchases_detail_create = [];
        $purchases_detail_update = [];
        $purchases_detail_delete = [];
        
        // eliminar los registros de purchases_detail que no llegaron
        if (isset($request['purchases_detail_id'])) {
            $purchases_detail_delete = array_diff($purchases_detail_id_old, $request['purchases_detail_id']);
        }
        if(count($purchases_detail_delete)){
            $sale = \App\Models\PurchasesDetail::whereIn('id',$purchases_detail_delete)->delete();
        }

        foreach ($request['products'] as $key => $product) {

            $sale = \App\Models\PurchasesDetail::updateOrCreate(
                ['id' => ($request['purchases_detail_id'][$key] ?? 0)],
                ['purchases_id' => $purchases->id, 'product_id' => $product, 'quantity' => $request['quantities'][$key]]
            );

        }

        $purchases = $this->purchasesRepository->update($request->all(), $id);

        // finaliza la transaccion
        \DB::commit();

        Flash::success('Purchases updated successfully.');

        return redirect(route('purchases.index'));
    }

    /**
     * Remove the specified Purchases from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $purchases = $this->purchasesRepository->findWithoutFail($id);

        if (empty($purchases)) {
            Flash::error('Purchases not found');

            return redirect(route('purchases.index'));
        }

        $this->purchasesRepository->delete($id);

        Flash::success('Purchases deleted successfully.');

        return redirect(route('purchases.index'));
    }
}
