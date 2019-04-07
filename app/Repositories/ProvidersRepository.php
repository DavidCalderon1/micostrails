<?php

namespace App\Repositories;

use App\Models\Providers;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProvidersRepository
 * @package App\Repositories
 * @version April 7, 2019, 12:55 am UTC
 *
 * @method Providers findWithoutFail($id, $columns = ['*'])
 * @method Providers find($id, $columns = ['*'])
 * @method Providers first($columns = ['*'])
*/
class ProvidersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'phone'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Providers::class;
    }
}
