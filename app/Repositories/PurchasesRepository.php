<?php

namespace App\Repositories;

use App\Models\Purchases;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PurchasesRepository
 * @package App\Repositories
 * @version April 7, 2019, 1:14 am UTC
 *
 * @method Purchases findWithoutFail($id, $columns = ['*'])
 * @method Purchases find($id, $columns = ['*'])
 * @method Purchases first($columns = ['*'])
*/
class PurchasesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'providers_id',
        'storage_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Purchases::class;
    }
}
