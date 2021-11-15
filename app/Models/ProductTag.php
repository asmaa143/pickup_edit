<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model 
{

    protected $table = 'products_tags';
    public $timestamps = true;
    protected $fillable = array('product_id', 'tag_id');
    protected $visible = array('product_id', 'tag_id');

}