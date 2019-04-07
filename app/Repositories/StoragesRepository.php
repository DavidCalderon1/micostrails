<?php

namespace App\Repositories;

use App\Models\Storages;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StoragesRepository
 * @package App\Repositories
 * @version April 7, 2019, 1:10 am UTC
 *
 * @method Storages findWithoutFail($id, $columns = ['*'])
 * @method Storages find($id, $columns = ['*'])
 * @method Storages first($columns = ['*'])
*/
class StoragesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'city_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Storages::class;
    }
}
