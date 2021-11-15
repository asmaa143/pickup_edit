<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ExtraDetail;
class OrderProductHasExtradetails extends Model 
{

    
    protected $table = 'order_products_has_extra_details';
    public $timestamps = true;
    protected $fillable = array('OrderProductHasExtra_id','extradetail_id');
    protected $visible = array('id','OrderProductHasExtra_id','extradetail_id');
    public function extradetail(){
        return $this->belongsTo(ExtraDetail::class,"extradetail_id");
      }
}