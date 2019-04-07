<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class ProductsHasProviders
 * @package App\Models
 * @version April 7, 2019, 2:35 am UTC
 *
 * @property \App\Models\Product products
 * @property \App\Models\Provider providers
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property integer providers_id
 * @property float cost
 */
class ProductsHasProviders extends Model
{

    public $table = 'products_has_providers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'providers_id',
        'cost'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'products_id' => 'integer',
        'providers_id' => 'integer',
        'cost' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'products_id' => 'required',
        'providers_id' => 'required',
        'cost' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function products()
    {
        return $this->belongsTo(\App\Models\Product::class, 'products_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function providers()
    {
        return $this->belongsTo(\App\Models\Provider::class, 'providers_id');
    }
}
