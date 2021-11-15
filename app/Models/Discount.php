<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model 
{

    protected $table = 'discounts';
    public $timestamps = true;
    protected $fillable = array('product_id', 'value', 'percentage', 'start_date', 'epired_date');
    protected $visible = array('product_id', 'value', 'percentage', 'start_date', 'epired_date');

}