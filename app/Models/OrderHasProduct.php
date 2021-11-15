<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\OrderProductHasExtra;
class OrderHasProduct extends Model 
{

    protected $table = 'order_has_products';
    public $timestamps = true;
    protected $fillable = array('id','order_id','product_id','quantity','price');
    protected $visible = array('id','order_id','product_id','quantity','price');
 public function product(){
     return $this->belongsTo(Product::class,"product_id");
 }public function extras(){
     return $this->hasMany(OrderProductHasExtra::class,"OrderHasProduct_id");
 }
}