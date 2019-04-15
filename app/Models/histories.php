<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class histories
 * @package App\Models
 * @version April 12, 2019, 8:55 am UTC
 *
 * @property integer user_id
 * @property string message
 */
class histories extends Model
{
    use SoftDeletes;

    public $table = 'histories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'message'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'message' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required'
    ];

    
}
