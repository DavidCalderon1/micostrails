<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTypeVehicleRequest;
use App\Http\Requests\UpdateTypeVehicleRequest;
use App\Repositories\TypeVehicleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TypeVehicleController extends AppBaseController
{
    /** @var  TypeVehicleRepository */
    private $typeVehicleRepository;

    public function __construct(TypeVehicleRepository $typeVehicleRepo)
    {
        $this->typeVehicleRepository = $typeVehicleRepo;
    }

    /**
     * Display a listing of the TypeVehicle.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->typeVehicleRepository->pushCriteria(new RequestCriteria($request));
        $typeVehicles = $this->typeVehicleRepository->all();

        return view('type_vehicles.index')
            ->with('typeVehicles', $typeVehicles);
    }

    /**
     * Show the form for creating a new TypeVehicle.
     *
     * @return Response
     */
    public function create()
    {
        return view('type_vehicles.create');
    }

    /**
     * Store a newly created TypeVehicle in storage.
     *
     * @param CreateTypeVehicleRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeVehicleRequest $request)
    {
        $input = $request->all();

        $typeVehicle = $this->typeVehicleRepository->create($input);

        Flash::success('Type Vehicle saved successfully.');

        return redirect(route('typeVehicles.index'));
    }

    /**
     * Display the specified TypeVehicle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $typeVehicle = $this->typeVehicleRepository->findWithoutFail($id);

        if (empty($typeVehicle)) {
            Flash::error('Type Vehicle not found');

            return redirect(route('typeVehicles.index'));
        }

        return view('type_vehicles.show')->with('typeVehicle', $typeVehicle);
    }

    /**
     * Show the form for editing the specified TypeVehicle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $typeVehicle = $this->typeVehicleRepository->findWithoutFail($id);

        if (empty($typeVehicle)) {
            Flash::error('Type Vehicle not found');

            return redirect(route('typeVehicles.index'));
        }

        return view('type_vehicles.edit')->with('typeVehicle', $typeVehicle);
    }

    /**
     * Update the specified TypeVehicle in storage.
     *
     * @param  int              $id
     * @param UpdateTypeVehicleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypeVehicleRequest $request)
    {
        $typeVehicle = $this->typeVehicleRepository->findWithoutFail($id);

        if (empty($typeVehicle)) {
            Flash::error('Type Vehicle not found');

            return redirect(route('typeVehicles.index'));
        }

        $typeVehicle = $this->typeVehicleRepository->update($request->all(), $id);

        Flash::success('Type Vehicle updated successfully.');

        return redirect(route('typeVehicles.index'));
    }

    /**
     * Remove the specified TypeVehicle from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $typeVehicle = $this->typeVehicleRepository->findWithoutFail($id);

        if (empty($typeVehicle)) {
            Flash::error('Type Vehicle not found');

            return redirect(route('typeVehicles.index'));
        }

        $this->typeVehicleRepository->delete($id);

        Flash::success('Type Vehicle deleted successfully.');

        return redirect(route('typeVehicles.index'));
    }
}
