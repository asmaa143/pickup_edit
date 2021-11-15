<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\State;
use App\Models\City;
use App\Models\Area;
class Zone extends Model 
{
    use Translatable;
    protected $table = 'zones';
    public $timestamps = true;
    public $translatedAttributes = ['title'];
    protected $translationForeignKey = 'zone_id';
    protected $guarded = []; 
    public function state()
    {
       return $this->belongsTo(State::class, 'state_id');
    }public function city()
    {
       return $this->belongsTo(City::class, 'city_id');
    }public function areas(){
       return $this->hasMany(Area::class,'zone_id')->select("lat","lon");
    } 
}