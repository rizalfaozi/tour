<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class categories
 * @package App\Models
 * @version April 7, 2019, 8:41 am UTC
 *
 * @property string name
 * @property string price
 */
class categories extends Model
{
    use SoftDeletes;

    public $table = 'categories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'type',
        'price',
        'departure_date',
        'flight',
        'hotel',
        'description',
        'quota',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'type' => 'string',
        'price' => 'string',
        'departure_date'=> 'date',
        'flight'=> 'string',
        'hotel'=> 'string',
        'description'=>'text',
        'quota'=>'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'type'=>'required',
        'price' => 'required',
        'departure_date'=> 'required',
        'flight'=> 'required',
        'hotel'=> 'required',
        'description'=>'required',
        'quota'=>'required',
        'status' => 'required'
    ];


   



    
}
