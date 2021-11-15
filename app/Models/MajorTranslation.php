<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MajorTranslation extends Model 
{

    protected $table = 'major_translations';
    public $timestamps = true;
    protected $fillable = array('title', 'locale', 'major_id');
    protected $visible = array('title', 'locale', 'major_id');

}