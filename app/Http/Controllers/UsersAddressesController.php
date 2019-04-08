<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersAddressesRequest;
use App\Http\Requests\UpdateUsersAddressesRequest;
use App\Repositories\UsersAddressesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UsersAddressesController extends AppBaseController
{
    /** @var  UsersAddressesRepository */
    private $usersAddressesRepository;

    public function __construct(UsersAddressesRepository $usersAddressesRepo)
    {
        $this->usersAddressesRepository = $usersAddressesRepo;
    }

    /**
     * Display a listing of the UsersAddresses.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->usersAddressesRepository->pushCriteria(new RequestCriteria($request));
        $this->usersAddressesRepository->orderBy('user_id','asc');
        $usersAddresses = $this->usersAddressesRepository->all();

        $usersAddresses = $usersAddresses->toArray();

        $users_id = array_column($usersAddresses, 'user_id');
        $cities_id = array_column($usersAddresses, 'city_id');

        $users =  \App\Models\User::whereIn('id',$users_id)
            ->pluck('name','id');

        $cities =  \App\Models\Cities::whereIn('id',$cities_id)
            ->pluck('name','id');


        return view('users_addresses.index')
            ->with(['usersAddresses' => $usersAddresses, 'users' => $users, 'cities' => $cities]);
    }

    /**
     * Display a listing of the Department.
     *
     * @param Request $request
     * @return Response
     */
    public function getUsersAddresses(Request $request)
    {   
        // si es una peticion de tipo ajax
        if ($request->ajax()) {
            if ( isset($request['id']) ) {
                $usersAddresses = \App\Models\UsersAddresses::where('user_id',$request['id'])->orderBy('address','asc')->pluck('address','id');
                return response()->json($usersAddresses);
            }
        }
    }

    /**
     * Show the form for creating a new UsersAddresses.
     *
     * @return Response
     */
    public function create()
    {
        $users =  \App\Models\User::pluck('name','id');
        $cities =  \App\Models\Cities::pluck('name','id');

        return view('users_addresses.create')->with(['users' => $users, 'cities' => $cities]);
    }

    /**
     * Store a newly created UsersAddresses in storage.
     *
     * @param CreateUsersAddressesRequest $request
     *
     * @return Response
     */
    public function store(CreateUsersAddressesRequest $request)
    {
        $input = $request->all();

        $usersAddresses = $this->usersAddressesRepository->create($input);

        Flash::success('Users Addresses saved successfully.');

        return redirect(route('usersAddresses.index'));
    }

    /**
     * Display the specified UsersAddresses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $usersAddresses = $this->usersAddressesRepository->findWithoutFail($id);

        if (empty($usersAddresses)) {
            Flash::error('Users Addresses not found');

            return redirect(route('usersAddresses.index'));
        }

        $usersAddresses->user_name = $usersAddresses->user()->first()->name ?? '';

        $usersAddresses->city_name = $usersAddresses->city()->first()->name ?? '';

        return view('users_addresses.show')->with('usersAddresses', $usersAddresses);
    }

    /**
     * Show the form for editing the specified UsersAddresses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $usersAddresses = $this->usersAddressesRepository->findWithoutFail($id);

        if (empty($usersAddresses)) {
            Flash::error('Users Addresses not found');

            return redirect(route('usersAddresses.index'));
        }

        $users =  \App\Models\User::pluck('name','id');
        $cities =  \App\Models\Cities::pluck('name','id');

        return view('users_addresses.edit')->with(['usersAddresses' => $usersAddresses, 'users' => $users, 'cities' => $cities]);
    }

    /**
     * Update the specified UsersAddresses in storage.
     *
     * @param  int              $id
     * @param UpdateUsersAddressesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsersAddressesRequest $request)
    {
        $usersAddresses = $this->usersAddressesRepository->findWithoutFail($id);

        if (empty($usersAddresses)) {
            Flash::error('Users Addresses not found');

            return redirect(route('usersAddresses.index'));
        }

        $usersAddresses = $this->usersAddressesRepository->update($request->all(), $id);

        Flash::success('Users Addresses updated successfully.');

        return redirect(route('usersAddresses.index'));
    }

    /**
     * Remove the specified UsersAddresses from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $usersAddresses = $this->usersAddressesRepository->findWithoutFail($id);

        if (empty($usersAddresses)) {
            Flash::error('Users Addresses not found');

            return redirect(route('usersAddresses.index'));
        }

        $this->usersAddressesRepository->delete($id);

        Flash::success('Users Addresses deleted successfully.');

        return redirect(route('usersAddresses.index'));
    }
}
