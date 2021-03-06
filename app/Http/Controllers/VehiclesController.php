<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVehiclesRequest;
use App\Http\Requests\UpdateVehiclesRequest;
use App\Repositories\VehiclesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class VehiclesController extends AppBaseController
{
    /** @var  VehiclesRepository */
    private $vehiclesRepository;

    public function __construct(VehiclesRepository $vehiclesRepo)
    {
        $this->vehiclesRepository = $vehiclesRepo;
    }

    /**
     * Display a listing of the Vehicles.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->vehiclesRepository->pushCriteria(new RequestCriteria($request));
        $vehicles = $this->vehiclesRepository->all();

        $vehicles = $vehicles->toArray();

        $type_vehicles_id = array_column($vehicles, 'type_vehicle_id');

        $type_vehicles =  \App\Models\TypeVehicle::whereIn('id',$type_vehicles_id)
            ->pluck('name','id');

        return view('vehicles.index')
            ->with(['vehicles' => $vehicles, 'type_vehicles' => $type_vehicles]);
    }

    /**
     * Show the form for creating a new Vehicles.
     *
     * @return Response
     */
    public function create()
    {
        $type_vehicles =  \App\Models\TypeVehicle::pluck('name','id');

        return view('vehicles.create')->with(['type_vehicles' => $type_vehicles]);
    }

    /**
     * Store a newly created Vehicles in storage.
     *
     * @param CreateVehiclesRequest $request
     *
     * @return Response
     */
    public function store(CreateVehiclesRequest $request)
    {
        $input = $request->all();

        $vehicles = $this->vehiclesRepository->create($input);

        Flash::success('Vehicles saved successfully.');

        return redirect(route('vehicles.index'));
    }

    /**
     * Display the specified Vehicles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vehicles = $this->vehiclesRepository->findWithoutFail($id);

        if (empty($vehicles)) {
            Flash::error('Vehicles not found');

            return redirect(route('vehicles.index'));
        }

        $vehicles->type_vehicle_name = $vehicles->typeVehicle()->first()->name ?? '';

        return view('vehicles.show')->with('vehicles', $vehicles);
    }

    /**
     * Show the form for editing the specified Vehicles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vehicles = $this->vehiclesRepository->findWithoutFail($id);

        if (empty($vehicles)) {
            Flash::error('Vehicles not found');

            return redirect(route('vehicles.index'));
        }

        $type_vehicles =  \App\Models\TypeVehicle::pluck('name','id');

        return view('vehicles.edit')->with(['vehicles' => $vehicles, 'type_vehicles' => $type_vehicles]);
    }

    /**
     * Update the specified Vehicles in storage.
     *
     * @param  int              $id
     * @param UpdateVehiclesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVehiclesRequest $request)
    {
        $vehicles = $this->vehiclesRepository->findWithoutFail($id);

        if (empty($vehicles)) {
            Flash::error('Vehicles not found');

            return redirect(route('vehicles.index'));
        }

        $vehicles = $this->vehiclesRepository->update($request->all(), $id);

        Flash::success('Vehicles updated successfully.');

        return redirect(route('vehicles.index'));
    }

    /**
     * Remove the specified Vehicles from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vehicles = $this->vehiclesRepository->findWithoutFail($id);

        if (empty($vehicles)) {
            Flash::error('Vehicles not found');

            return redirect(route('vehicles.index'));
        }

        $this->vehiclesRepository->delete($id);

        Flash::success('Vehicles deleted successfully.');

        return redirect(route('vehicles.index'));
    }
}
