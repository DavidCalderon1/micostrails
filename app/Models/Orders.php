<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Orders
 * @package App\Models
 * @version April 7, 2019, 1:14 am UTC
 *
 * @property \App\Models\Status status
 * @property \App\Models\User creator
 * @property \App\Models\User client
 * @property \App\Models\User transporter
 * @property \App\Models\UsersAddress usersAddresses
 * @property \Illuminate\Database\Eloquent\Collection sales
 * @property integer creator_id
 * @property integer client_id
 * @property integer transporter_id
 * @property integer users_addresses_id
 * @property string|\Carbon\Carbon delivery_date
 * @property integer priority
 * @property integer status_id
 */
class Orders extends Model
{

    public $table = 'orders';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'creator_id',
        'client_id',
        'transporter_id',
        'users_addresses_id',
        'delivery_date',
        'priority',
        'status_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'creator_id' => 'integer',
        'client_id' => 'integer',
        'transporter_id' => 'integer',
        'users_addresses_id' => 'integer',
        'priority' => 'integer',
        'status_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
        'creator_id' => 'required',
        'client_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function status()
    {
        return $this->belongsTo(\App\Models\Status::class, 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function creator()
    {
        return $this->belongsTo(\App\Models\User::class, 'creator_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function client()
    {
        return $this->belongsTo(\App\Models\User::class, 'client_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function transporter()
    {
        return $this->belongsTo(\App\Models\User::class, 'transporter_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function usersAddresses()
    {
        return $this->belongsTo(\App\Models\UsersAddress::class, 'users_addresses_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function sales()
    {
        return $this->hasMany(\App\Models\Sale::class);
    }
}
