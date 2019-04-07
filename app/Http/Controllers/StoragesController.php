<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStoragesRequest;
use App\Http\Requests\UpdateStoragesRequest;
use App\Repositories\StoragesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class StoragesController extends AppBaseController
{
    /** @var  StoragesRepository */
    private $storagesRepository;

    public function __construct(StoragesRepository $storagesRepo)
    {
        $this->storagesRepository = $storagesRepo;
    }

    /**
     * Display a listing of the Storages.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->storagesRepository->pushCriteria(new RequestCriteria($request));
        $storages = $this->storagesRepository->all();

        return view('storages.index')
            ->with('storages', $storages);
    }

    /**
     * Show the form for creating a new Storages.
     *
     * @return Response
     */
    public function create()
    {
        return view('storages.create');
    }

    /**
     * Store a newly created Storages in storage.
     *
     * @param CreateStoragesRequest $request
     *
     * @return Response
     */
    public function store(CreateStoragesRequest $request)
    {
        $input = $request->all();

        $storages = $this->storagesRepository->create($input);

        Flash::success('Storages saved successfully.');

        return redirect(route('storages.index'));
    }

    /**
     * Display the specified Storages.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $storages = $this->storagesRepository->findWithoutFail($id);

        if (empty($storages)) {
            Flash::error('Storages not found');

            return redirect(route('storages.index'));
        }

        return view('storages.show')->with('storages', $storages);
    }

    /**
     * Show the form for editing the specified Storages.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $storages = $this->storagesRepository->findWithoutFail($id);

        if (empty($storages)) {
            Flash::error('Storages not found');

            return redirect(route('storages.index'));
        }

        return view('storages.edit')->with('storages', $storages);
    }

    /**
     * Update the specified Storages in storage.
     *
     * @param  int              $id
     * @param UpdateStoragesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStoragesRequest $request)
    {
        $storages = $this->storagesRepository->findWithoutFail($id);

        if (empty($storages)) {
            Flash::error('Storages not found');

            return redirect(route('storages.index'));
        }

        $storages = $this->storagesRepository->update($request->all(), $id);

        Flash::success('Storages updated successfully.');

        return redirect(route('storages.index'));
    }

    /**
     * Remove the specified Storages from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $storages = $this->storagesRepository->findWithoutFail($id);

        if (empty($storages)) {
            Flash::error('Storages not found');

            return redirect(route('storages.index'));
        }

        $this->storagesRepository->delete($id);

        Flash::success('Storages deleted successfully.');

        return redirect(route('storages.index'));
    }
}
