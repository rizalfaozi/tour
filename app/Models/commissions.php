<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class commissions
 * @package App\Models
 * @version April 7, 2019, 6:30 am UTC
 *
 * @property integer user_id
 * @property string price
 * @property integer status
 */
class commissions extends Model
{
    use SoftDeletes;

    public $table = 'commissions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'price',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'price' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'price' => 'required',
        'status' => 'required'
    ];

    
}
