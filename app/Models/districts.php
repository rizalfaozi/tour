<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class districts
 * @package App\Models
 * @version April 7, 2019, 8:08 am UTC
 *
 * @property integer province_id
 * @property string name
 */
class districts extends Model
{
    use SoftDeletes;

    public $table = 'districts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'province_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'province_id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'province_id' => 'required',
        'name' => 'required'
    ];

     public function province()
    {
        return $this->belongsTo('App\Models\provinces');
    }
}
