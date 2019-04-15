<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class schedules
 * @package App\Models
 * @version April 14, 2019, 7:17 am WIB
 *
 * @property integer user_id
 * @property integer invoice_id
 * @property integer category_id
 * @property date departure_date
 * @property string flight
 * @property string hotel
 * @property integer status
 */
class schedules extends Model
{
    use SoftDeletes;

    public $table = 'schedules';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'member_id',
        'invoice_id',
        'category_id',
        'departure_date',
        'flight',
        'airport',
        'hotel',
        'type',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'member_id' => 'integer',
        'invoice_id' => 'string',
        'category_id' => 'integer',
        'departure_date' => 'date',
        'flight' => 'string',
        'airport' => 'string',
        'hotel' => 'string',
        'type' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'member_id' => 'required',
        'invoice_id' => 'required',
        'category_id' => 'required',
        'departure_date' => 'required',
        'flight' => 'required',
        'airport' => 'required',
        'hotel' => 'required',
        'status' => 'required'
    ];

     public function member()
    {
        return $this->belongsTo('App\Models\members');
    }

      public function category()
    {
        return $this->belongsTo('App\Models\categories');
    }

    
}
