<?php

namespace App\Repositories;

use App\Models\TypeVehicle;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TypeVehicleRepository
 * @package App\Repositories
 * @version April 7, 2019, 1:08 am UTC
 *
 * @method TypeVehicle findWithoutFail($id, $columns = ['*'])
 * @method TypeVehicle find($id, $columns = ['*'])
 * @method TypeVehicle first($columns = ['*'])
*/
class TypeVehicleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TypeVehicle::class;
    }
}
