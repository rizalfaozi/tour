<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class agents
 * @package App\Models
 * @version April 7, 2019, 10:01 am UTC
 *
 * @property string name
 * @property integer role_id
 * @property string password
 * @property string email
 * @property string phone
 * @property string address
 * @property string gender
 * @property string type
 * @property integer status
 */
class agents extends Model
{
    //use SoftDeletes;

    public $table = 'users';
    

    //protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'role_id',
        'password',
        'email',
        'phone',
        'photo',
        'address',
        'gender',
        'type',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'role_id' => 'integer',
        'password' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'photo' => 'string',
        'address' => 'string',
        'gender' => 'string',
        'type' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'role_id' => 'required',
        'password' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'gender' => 'required',
        'type' => 'required',
        'status' => 'required'
    ];

    
}
