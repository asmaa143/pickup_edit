<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\State;
class City extends Model 
{ 
  use Translatable;
    protected $table = 'cities';
    public $timestamps = true;
    public $translatedAttributes = ['title'];
    protected $translationForeignKey = 'city_id';
    protected $guarded = []; 
    public function state()
    {
       return $this->belongsTo(State::class, 'state_id');
    }

}