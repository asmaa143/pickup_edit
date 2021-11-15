<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract; 
use Astrotomic\Translatable\Translatable;
class Adds extends Model 
{

    use Translatable;
    protected $table = 'adds';
    public $translatedAttributes=['title'];
    protected $translationForeignKey='adds_id';
    public $timestamps = true;
    protected $fillable = array('id','image', 'link', 'product_id','store_id','category_id','default_price');
    protected $visible = array('id','id','image', 'link', 'product_id','store_id','category_id','default_price');

}