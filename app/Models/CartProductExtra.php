<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartProductExtra extends Model 
{

    protected $table = 'cart_product_extra';
    public $timestamps = true;
    protected $fillable = array('extra_id', 'cart_id', 'type');
    protected $visible = array('id','extra_id', 'cart_id', 'type');

}