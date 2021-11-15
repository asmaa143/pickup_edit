<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Major;
use App\Models\State;
use App\Models\City;
use App\Models\Zone;
class Store extends Model 
{

    protected $table = 'stores';
    public $timestamps = true;
    protected $fillable = array('id','name', 'responsible_name','responsible_phone', 'major_id', 'cr_no', 'tax_number', 'phone',
     'email', 'state_id', 'city_id', 'zone_id', 'address', 'password', 'contract_image', 'sales_officer',
      'lat', 'lon', 'logo', 'comment');
    protected $visible = array('id','name', 'responsible_name', 'major_id','responsible_phone', 
    'cr_no', 'tax_number', 'phone', 'email', 'state_id', 'city_id', 'zone_id', 'address',
     'contract_image', 'sales_officer', 'lat', 'lon', 'logo', 'comment');
    protected $hidden = array('password');
    public function major(){
      return $this->belongsTo(Major::class,'major_id');
    } public function state(){
        return $this->belongsTo(State::class,'state_id');
      }public function city(){
        return $this->belongsTo(City::class,'city_id');
      }public function zone(){
        return $this->belongsTo(Zone::class,'zone_id');
      }
    public function languages()
    {
        return $this->hasMany('App\Models\StoreLanguage', 'store_id');
    }
    public function branches()
    {
        return $this->hasMany('App\Models\StoreBranch', 'store_id');
    }

}