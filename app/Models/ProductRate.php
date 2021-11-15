<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Product;
class ProductRate extends Model 
{

    protected $table = 'product_rates';
    public $timestamps = true;
    protected $fillable = array('rate', 'review', 'customer_id','store_id','product_id','store_id');
    protected $visible = array('id','rate', 'review', 'customer_id','store_id','product_id','store_id');
    public function product(){
        return $this->belongsTo(Product::class,'product_id');

    }public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
        
    }
}