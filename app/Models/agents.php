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
        'office_name',
        'role_id',
        'password',
        'email',
        'phone',
        'photo',
        'address',
        'bank',
        'account_number',
        'account_name',
        'province_id',
        'district_id',
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
        'office_name'=>'string',
        'role_id' => 'integer',
        'password' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'photo' => 'string',
        'address' => 'string',
        'bank' => 'string',
        'account_number' => 'string',
        'account_name' => 'string',
        'province_id'=> 'integer',
        'district_id' => 'integer',
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
        
    ];

    
}
