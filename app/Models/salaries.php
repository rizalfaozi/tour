<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class salaries
 * @package App\Models
 * @version April 8, 2019, 2:51 pm UTC
 *
 * @property integer user_id
 * @property string total
 * @property string type
 * @property integer status
 */
class salaries extends Model
{
    use SoftDeletes;

    public $table = 'salaries';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'total',
        'type',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'total' => 'string',
        'type' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'total' => 'required',
        'type' => 'required',
        'status' => 'required'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
    
}


