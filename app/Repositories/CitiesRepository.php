<?php

namespace App\Repositories;

use App\Models\Cities;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CitiesRepository
 * @package App\Repositories
 * @version April 7, 2019, 1:07 am UTC
 *
 * @method Cities findWithoutFail($id, $columns = ['*'])
 * @method Cities find($id, $columns = ['*'])
 * @method Cities first($columns = ['*'])
*/
class CitiesRepository extends BaseRepository
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
        return Cities::class;
    }
}
