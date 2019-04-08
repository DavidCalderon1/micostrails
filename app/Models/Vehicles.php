<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Vehicles
 * @package App\Models
 * @version April 7, 2019, 1:11 am UTC
 *
 * @property \App\Models\TypeVehicle typeVehicle
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property integer type_vehicle_id
 * @property string brand
 * @property string model
 * @property string license_plate
 */
class Vehicles extends Model
{

    public $table = 'vehicles';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'type_vehicle_id',
        'brand',
        'model',
        'license_plate'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type_vehicle_id' => 'integer',
        'brand' => 'string',
        'model' => 'string',
        'license_plate' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
        'type_vehicle_id' => 'required',
        'brand' => 'required',
        'model' => 'required',
        'license_plate' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function typeVehicle()
    {
        return $this->belongsTo(\App\Models\TypeVehicle::class, 'type_vehicle_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function users()
    {
        return $this->belongsToMany(\App\Models\Users::class, 'transporters_has_vehicles');
    }
}
