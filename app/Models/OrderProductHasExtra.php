<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Extra;
use App\Models\OrderProductHasExtradetails;
class OrderProductHasExtra extends Model 
{

    protected $table = 'order_product_has_extra';
    public $timestamps = true;
    protected $fillable = array('OrderHasProduct_id','extra_id');
    protected $visible = array('id','OrderHasProduct_id','extra_id');
  public function extra(){
    return $this->belongsTo(Extra::class,"extra_id");
  }public function extradetails(){
    return $this->hasMany(OrderProductHasExtradetails::class,"OrderProductHasExtra_id");
}
}