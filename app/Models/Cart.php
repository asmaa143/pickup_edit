<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model 
{

    protected $table = 'cart';
    public $timestamps = true;
    protected $fillable = array('product_id', 'quantity', 'customer_id','store_id','notes','callcenter_id');
    protected $visible = array('id','product_id', 'quantity', 'customer_id','store_id','notes','callcenter_id');

}