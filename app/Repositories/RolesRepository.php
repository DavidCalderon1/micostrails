<?php

namespace App\Repositories;

use App\Models\Roles;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RolesRepository
 * @package App\Repositories
 * @version April 7, 2019, 1:09 am UTC
 *
 * @method Roles findWithoutFail($id, $columns = ['*'])
 * @method Roles find($id, $columns = ['*'])
 * @method Roles first($columns = ['*'])
*/
class RolesRepository extends BaseRepository
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
        return Roles::class;
    }
}
