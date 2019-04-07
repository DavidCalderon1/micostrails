<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class PurchasesDetail
 * @package App\Models
 * @version April 7, 2019, 1:15 am UTC
 *
 * @property \App\Models\Product product
 * @property \App\Models\Purchase purchases
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property integer purchases_id
 * @property integer product_id
 * @property integer quantity
 */
class PurchasesDetail extends Model
{

    public $table = 'purchases_detail';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'purchases_id',
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
        'purchases_id' => 'integer',
        'product_id' => 'integer',
        'quantity' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
        'purchases_id' => 'required',
        'product_id' => 'required',
        'quantity' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function purchases()
    {
        return $this->belongsTo(\App\Models\Purchase::class, 'purchases_id');
    }
}
