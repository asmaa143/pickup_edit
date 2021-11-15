<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class About extends Model
{ 
    use Translatable;
    protected $table = 'about';
    public $timestamps = true;
    public $translatedAttributes = ['text'];
    protected $translationForeignKey = 'about_id';
    protected $guarded = []; 
}
