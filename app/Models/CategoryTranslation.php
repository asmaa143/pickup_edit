<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model 
{

    protected $table = 'category_translations';
    public $timestamps = true;
    protected $fillable = array('title', 'locale', 'category_id');
    protected $visible = array('title', 'locale', 'category_id');

}