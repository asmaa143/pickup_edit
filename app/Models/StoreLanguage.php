<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreLanguage extends Model 
{

    protected $table = 'stores_languages';
    public $timestamps = true;
    protected $fillable = array('id','store_id', 'lang');
    protected $visible = array('id','store_id', 'lang');

}