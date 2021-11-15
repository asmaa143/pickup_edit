<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Major extends Model 
{
    use Translatable;
    protected $table = 'majors';
    public $timestamps = true;
    public $translatedAttributes = ['title'];
    protected $translationForeignKey = 'major_id';
    protected $guarded = []; 

}