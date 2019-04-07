<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class StoragesHasProducts
 * @package App\Models
 * @version April 7, 2019, 2:36 am UTC
 *
 * @property \App\Models\Product products
 * @property \App\Models\Storage storages
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property integer products_id
 * @property float price
 */
class StoragesHasProducts extends Model
{

    public $table = 'storages_has_products';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'products_id',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'storages_id' => 'integer',
        'products_id' => 'integer',
        'price' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'storages_id' => 'required',
        'products_id' => 'required'
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
    public function storages()
    {
        return $this->belongsTo(\App\Models\Storage::class, 'storages_id');
    }
}
