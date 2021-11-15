<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartProductExtradetails extends Model 
{

    protected $table = 'cart_product_extradetails';
    public $timestamps = true;
    protected $fillable = array('cartproductextra_id','extra_id', 'cart_id', 'extradetail_id');
    protected $visible = array('id','cartproductextra_id','extra_id', 'cart_id', 'extradetail_id');

}