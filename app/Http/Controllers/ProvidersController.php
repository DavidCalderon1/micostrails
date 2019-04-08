<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProvidersRequest;
use App\Http\Requests\UpdateProvidersRequest;
use App\Repositories\ProvidersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProvidersController extends AppBaseController
{
    /** @var  ProvidersRepository */
    private $providersRepository;

    public function __construct(ProvidersRepository $providersRepo)
    {
        $this->providersRepository = $providersRepo;
    }

    /**
     * Display a listing of the Providers.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->providersRepository->pushCriteria(new RequestCriteria($request));
        $providers = $this->providersRepository->all();

        return view('providers.index')
            ->with('providers', $providers);
    }

    /**
     * Show the form for creating a new Providers.
     *
     * @return Response
     */
    public function create()
    {
        $products =  \App\Models\Products::pluck('name','id');

        return view('providers.create')->with('products', $products);
    }

    /**
     * Store a newly created Providers in storage.
     *
     * @param CreateProvidersRequest $request
     *
     * @return Response
     */
    public function store(CreateProvidersRequest $request)
    {
        $input = $request->all();

        $providers = $this->providersRepository->create($input);

        $providers->products()->sync($input['products']);

        Flash::success('Providers saved successfully.');

        return redirect(route('providers.index'));
    }

    /**
     * Display the specified Providers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $providers = $this->providersRepository->findWithoutFail($id);

        if (empty($providers)) {
            Flash::error('Providers not found');

            return redirect(route('providers.index'));
        }

        return view('providers.show')->with('providers', $providers);
    }

    /**
     * Show the form for editing the specified Providers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $providers = $this->providersRepository->findWithoutFail($id);

        if (empty($providers)) {
            Flash::error('Providers not found');

            return redirect(route('providers.index'));
        }

        $providers->products = $providers->products()->pluck('id');

        $products =  \App\Models\Products::pluck('name','id');

        return view('providers.edit')->with(['providers' => $providers, 'products' => $products]);
    }

    /**
     * Update the specified Providers in storage.
     *
     * @param  int              $id
     * @param UpdateProvidersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProvidersRequest $request)
    {
        $providers = $this->providersRepository->findWithoutFail($id);

        if (empty($providers)) {
            Flash::error('Providers not found');

            return redirect(route('providers.index'));
        }

        $providers = $this->providersRepository->update($request->all(), $id);

        $providers->products()->sync($request['products']);

        Flash::success('Providers updated successfully.');

        return redirect(route('providers.index'));
    }

    /**
     * Remove the specified Providers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $providers = $this->providersRepository->findWithoutFail($id);

        if (empty($providers)) {
            Flash::error('Providers not found');

            return redirect(route('providers.index'));
        }

        $this->providersRepository->delete($id);

        Flash::success('Providers deleted successfully.');

        return redirect(route('providers.index'));
    }
}
