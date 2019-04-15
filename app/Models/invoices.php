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
        'invoice_number',
        'category_id',
        'member_id',
        'user_id',
        'price',
        'bank',
        'account_number',
        'account_name',
        'payment',
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
        'invoice_number'=>'string',
        'category_id' => 'integer',
        'member_id' => 'integer',
        'user_id' => 'integer',
        'price' => 'string',
        'bank'=> 'string',
        'account_number'=> 'string',
        'account_name'=> 'string',
        'payment'=> 'string',
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
        'invoice_number'=>'required',
        'category_id' => 'required',
        'member_id' => 'required',
        'user_id' => 'required',
        'price' => 'required',
        
       
        'payment'=> 'required',
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
