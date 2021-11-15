<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderCar extends Model 
{

    protected $table = 'order_cars';
    public $timestamps = true;
    protected $fillable = array('car_type', 'car_color', 'car_number','store_id','order_id');
    protected $visible = array('id','car_type', 'car_color', 'car_number','store_id','order_id');

}