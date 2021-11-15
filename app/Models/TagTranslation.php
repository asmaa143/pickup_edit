<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagTranslation extends Model 
{

    protected $table = 'tag_translations';
    public $timestamps = true;
    protected $fillable = array('title', 'locale', 'tag_id');
    protected $visible = array('title', 'locale', 'tag_id');

}