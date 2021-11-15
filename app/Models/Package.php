<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model 
{

    protected $table = 'packages';
    public $timestamps = true;
    protected $fillable = array('monthprice', '3monthprice', '6monthprice', 'yearprice');
    protected $visible = array('monthprice', '3monthprice', '6monthprice', 'yearprice');

}