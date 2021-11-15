<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Extra;
class Product extends Model 
{ 
    use Translatable;
    protected $table = 'products';
    public $timestamps = true;
    public $translatedAttributes = ['title'];
    protected $translationForeignKey = 'product_id';
    protected $guarded = []; 
 public function tags(){
     return $this->belongsToMany(Tag::class,"products_tags","product_id","tag_id");
 }public function category(){
     return $this->belongsTo(Category::class,"category_id");
 }public function extras(){
    return $this->hasMany(Extra::class,"product_id");
}
}