<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerCoupon extends Model 
{

    use Translatable;
    protected $table = 'customer_coupons';
   
    public $timestamps = true;
    protected $fillable = array('store_id', 'customer_id', 'customer_phone','coupon_id');
    protected $visible = array('id','store_id', 'customer_id', 'customer_phone','coupon_id');

}