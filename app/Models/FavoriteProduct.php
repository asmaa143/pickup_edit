<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavoriteProduct extends Model 
{

    protected $table = 'favorite_products';
    public $timestamps = true;
    protected $fillable = array('product_id', 'customer_id','store_id');
    protected $visible = array('product_id', 'customer_id','store_id');

}