<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallCenterOrderAdress extends Model 
{

    protected $table = 'callcenter_order_address';
    public $timestamps = true;
    protected $fillable = array('store_id','callcenter_id','name', 'address', 'address_type', 'phone', 'alternate_phone','city','state','area');
    protected $visible = array('id','name', 'address', 'address_type', 'phone', 'alternate_phone','city','state','area');
}