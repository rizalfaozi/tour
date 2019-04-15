<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class advertisements
 * @package App\Models
 * @version April 15, 2019, 12:00 pm WIB
 *
 * @property string title
 * @property date start_date
 * @property date finish_date
 * @property string photo
 * @property integer status
 */
class advertisements extends Model
{
    use SoftDeletes;

    public $table = 'advertisements';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'start_date',
        'finish_date',
        'photo',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'start_date' => 'date',
        'finish_date' => 'date',
        'photo' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'start_date' => 'required',
        'finish_date' => 'required',
        'status' => 'required'
    ];

    
}
