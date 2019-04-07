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
        $usersAddresses = $this->usersAddressesRepository->all();

        return view('users_addresses.index')
            ->with('usersAddresses', $usersAddresses);
    }

    /**
     * Show the form for creating a new UsersAddresses.
     *
     * @return Response
     */
    public function create()
    {
        return view('users_addresses.create');
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

        return view('users_addresses.edit')->with('usersAddresses', $usersAddresses);
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
