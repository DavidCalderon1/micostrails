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

        return view('purchases.index')
            ->with('purchases', $purchases);
    }

    /**
     * Show the form for creating a new Purchases.
     *
     * @return Response
     */
    public function create()
    {
        return view('purchases.create');
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

        $purchases = $this->purchasesRepository->create($input);

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

        return view('purchases.show')->with('purchases', $purchases);
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

        return view('purchases.edit')->with('purchases', $purchases);
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

        $purchases = $this->purchasesRepository->update($request->all(), $id);

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
