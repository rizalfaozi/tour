<?php

namespace App\Models;



use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class invoices
 * @package App\Models
 * @version April 8, 2019, 3:17 pm UTC
 *
 * @property integer category_id
 * @property integer member_id
 * @property string price
 * @property string type
 * @property integer status
 */
class invoices extends Model
{
    use SoftDeletes;

    public $table = 'invoices';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'category_id',
        'member_id',
        'user_id',
        'price',
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
        'category_id' => 'integer',
        'member_id' => 'integer',
         'user_id' => 'integer',
        'price' => 'string',
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
        'category_id' => 'required',
        'member_id' => 'required',
        'user_id' => 'required',
        'price' => 'required',
        'total' => 'required',
        'type' => 'required',
        'status' => 'required'
    ];


     public function category()
    {
        return $this->belongsTo('App\Models\categories');
    }


    

     public function member()
    {
        return $this->belongsTo('App\Models\members');
    }

     public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
}
