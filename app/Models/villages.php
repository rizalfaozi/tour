<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class villages
 * @package App\Models
 * @version April 7, 2019, 5:28 am UTC
 *
 * @property integer subdistrict_id
 * @property string name
 */
class villages extends Model
{
    use SoftDeletes;

    public $table = 'villages';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'subdistrict_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'subdistrict_id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'subdistrict_id' => 'required',
        'name' => 'required'
    ];

    
}
