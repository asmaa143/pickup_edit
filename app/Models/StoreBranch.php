<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\State;
use App\Models\City;
use App\Models\Zone;
class StoreBranch extends Model 
{

    protected $table = 'store_branches';
    public $timestamps = true;
    protected $fillable = array('id','name', 'store_id', 'lat', 'lon', 'state_id', 'city_id', 'zone_id', 'address','whats_up','phone');
    protected $visible = array('id','name', 'store_id', 'lat', 'lon', 'state_id', 'city_id', 'zone_id', 'address','whats_up','phone');

    public function store()
    {
        return $this->belongsTo('App\Models\Store', 'store_id');
    }public function state(){
        return $this->belongsTo(State::class,"state_id");
    }public function city(){
        return $this->belongsTo(City::class,"city_id");
    }public function zone(){
        return $this->belongsTo(Zone::class,"zone_id");
    }


}