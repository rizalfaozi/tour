<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class subdistricts
 * @package App\Models
 * @version April 7, 2019, 8:36 am UTC
 *
 * @property integer district_id
 * @property string name
 */
class subdistricts extends Model
{
    use SoftDeletes;

    public $table = 'subdistricts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'district_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'district_id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'district_id' => 'required',
        'name' => 'required'
    ];
 
       public function district()
    {
        return $this->belongsTo('App\Models\districts');
    }
}
