<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class State extends Model 
{
    use Translatable;
    protected $table = 'states';
    public $timestamps = true;
    public $translatedAttributes = ['title'];
    protected $translationForeignKey = 'state_id';
    protected $guarded = []; 

}