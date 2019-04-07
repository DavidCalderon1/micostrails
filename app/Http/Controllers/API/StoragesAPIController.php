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
