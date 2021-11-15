<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderRate extends Model 
{

    
    protected $table = 'order_rates';
    
    public $timestamps = true;
    protected $fillable = array('rate', 'comment', 'created_at','updated_at','store_id','customer_id');
    protected $visible = array('id','rate', 'comment', 'created_at','updated_at','store_id','customer_id');

}