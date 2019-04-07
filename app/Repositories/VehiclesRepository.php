<?php

namespace App\Repositories;

use App\Models\Vehicles;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VehiclesRepository
 * @package App\Repositories
 * @version April 7, 2019, 1:11 am UTC
 *
 * @method Vehicles findWithoutFail($id, $columns = ['*'])
 * @method Vehicles find($id, $columns = ['*'])
 * @method Vehicles first($columns = ['*'])
*/
class VehiclesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type_vehicle_id',
        'brand',
        'model',
        'license_plate'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Vehicles::class;
    }
}
