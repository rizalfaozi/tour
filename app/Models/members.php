<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class member
 * @package App\Models
 * @version April 7, 2019, 4:36 am UTC
 *
 * @property integer user_id
 * @property string first_name
 * @property string last_name
 * @property integer age
 * @property string phone
 * @property string alternative_phone
 * @property string address
 * @property string email
 * @property string id_card
 * @property string passport_number
 * @property string bank_account_number
 * @property date departure_date
 * @property string photo
 * @property string visa_number
 * @property string type
 * @property integer status
 * @property integer province_id
 * @property integer subdistrict_id
 * @property integer village_id
 */
class members extends Model
{
    use SoftDeletes;

    public $table = 'members';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'age',
        'phone',
        'alternative_phone',
        'address',
        'email',
        'gender',
        'id_card',
        'passport_number',
        'photo',
        'visa_number',
        'type',
        'status',
        'province_id',
        'district_id',
        'subdistrict_id',
        'village_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'age' => 'integer',
        'phone' => 'string',
        'alternative_phone' => 'string',
        'address' => 'string',
        'email' => 'string',
        'gender' => 'string',
        'id_card' => 'string',
        'passport_number' => 'string',
        'bank_account_number' => 'string',
        'photo' => 'string',
        'visa_number' => 'string',
        'type' => 'string',
        'status' => 'integer',
        'province_id' => 'integer',
        'district_id' => 'integer',
        'subdistrict_id' => 'integer',
        'village_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'age' => 'required',
        'gender' => 'required',
        'phone' => 'required',
        'id_card' => 'required',
        'status' => 'required'
    ];

     public function user()
    {
        return $this->belongsTo('App\user');
    }
}
