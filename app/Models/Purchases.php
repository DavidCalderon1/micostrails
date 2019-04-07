<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Purchases
 * @package App\Models
 * @version April 7, 2019, 1:14 am UTC
 *
 * @property \App\Models\Provider providers
 * @property \App\Models\Storage storage
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection purchasesDetails
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property integer providers_id
 * @property integer storage_id
 */
class Purchases extends Model
{

    public $table = 'purchases';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'providers_id',
        'storage_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'providers_id' => 'integer',
        'storage_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'providers_id' => 'required',
        'storage_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function providers()
    {
        return $this->belongsTo(\App\Models\Provider::class, 'providers_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function storage()
    {
        return $this->belongsTo(\App\Models\Storage::class, 'storage_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function purchasesDetails()
    {
        return $this->hasMany(\App\Models\PurchasesDetail::class);
    }
}
