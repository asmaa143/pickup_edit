<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\Extra;
class ExtraDetail extends Model 
{
    use Translatable;
    protected $table = 'extra_details';
    public $timestamps = true;
    public $translatedAttributes = ['title'];
    protected $translationForeignKey = 'extradetail_id';
    protected $guarded = []; 
   
}