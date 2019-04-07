<?php

namespace App\Repositories;

use App\Models\Orders;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrdersRepository
 * @package App\Repositories
 * @version April 7, 2019, 1:14 am UTC
 *
 * @method Orders findWithoutFail($id, $columns = ['*'])
 * @method Orders find($id, $columns = ['*'])
 * @method Orders first($columns = ['*'])
*/
class OrdersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'creator_id',
        'client_id',
        'transporter_id',
        'users_addresses_id',
        'delivery_date',
        'priority',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Orders::class;
    }
}
