<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model 
{

    protected $table = 'customer_addresses';
   
    public $timestamps = true;
    protected $fillable = array('lat', 'lng', 'address','active','customer_id','phone','building_name','type','flat_number','floor_number','details');
    protected $visible = array('id','lat', 'lng', 'address','active','customer_id','phone','building_name','type','flat_number','floor_number','details');

}