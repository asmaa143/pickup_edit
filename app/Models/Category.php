<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\Product;
class Category extends Model 
{
    use Translatable;
    protected $table = 'categories';
    public $timestamps = true;
    public $translatedAttributes = ['title'];
    protected $translationForeignKey = 'category_id';
    protected $guarded = []; 
    public function products(){
        return $this->hasMany(Product::class,"category_id");
    }

}