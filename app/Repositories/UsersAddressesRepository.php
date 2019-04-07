<?php

namespace App\Repositories;

use App\Models\UsersAddresses;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UsersAddressesRepository
 * @package App\Repositories
 * @version April 7, 2019, 1:13 am UTC
 *
 * @method UsersAddresses findWithoutFail($id, $columns = ['*'])
 * @method UsersAddresses find($id, $columns = ['*'])
 * @method UsersAddresses first($columns = ['*'])
*/
class UsersAddressesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'address',
        'latitude',
        'longitude',
        'city_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UsersAddresses::class;
    }
}
