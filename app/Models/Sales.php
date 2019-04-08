<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Sales
 * @package App\Models
 * @version April 7, 2019, 1:18 am UTC
 *
 * @property \App\Models\Order orders
 * @property \App\Models\Product product
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property integer orders_id
 * @property integer product_id
 * @property integer quantity
 */
class Sales extends Model
{

    public $table = 'sales';
    
    public $timestamps = false;


    public $fillable = [
        'orders_id',
        'product_id',
        'quantity'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'orders_id' => 'integer',
        'product_id' => 'integer',
        'quantity' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
        'orders_id' => 'required',
        'product_id' => 'required',
        'quantity' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function orders()
    {
        return $this->belongsTo(\App\Models\Order::class, 'orders_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id');
    }
}
