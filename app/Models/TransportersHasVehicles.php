<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class TransportersHasVehicles
 * @package App\Models
 * @version April 7, 2019, 2:38 am UTC
 *
 * @property \App\Models\User users
 * @property \App\Models\Vehicle vehicles
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property integer vehicles_id
 */
class TransportersHasVehicles extends Model
{

    public $table = 'transporters_has_vehicles';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'vehicles_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'users_id' => 'integer',
        'vehicles_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'users_id' => 'required',
        'vehicles_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function users()
    {
        return $this->belongsTo(\App\Models\User::class, 'users_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function vehicles()
    {
        return $this->belongsTo(\App\Models\Vehicle::class, 'vehicles_id');
    }
}
