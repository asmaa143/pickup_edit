<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model 
{

    protected $table = 'coupons';
    public $timestamps = true;
    protected $fillable = array('id','store_id', 'code', 'start_date', 'end_date', 'value', 'percentage','minimum','maximum');
    protected $visible = array('id','store_id', 'code', 'start_date', 'end_date', 'value', 'percentage','minimum','maximum');

}