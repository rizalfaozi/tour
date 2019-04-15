<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class roleusers
 * @package App\Models
 * @version April 12, 2019, 4:59 am UTC
 *
 * @property integer role_id
 * @property integer user_id
 */
class roleusers extends Model
{
    use SoftDeletes;

    public $table = 'roleusers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'role_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'role_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'role_id' => 'required',
        'user_id' => 'required'
    ];

    
}
