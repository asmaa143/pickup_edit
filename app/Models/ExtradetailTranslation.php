<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtraDetailTranslation extends Model 
{

    protected $table = 'extradetail_translations';
    public $timestamps = true;
    protected $fillable = array('title', 'extradetail_id', 'locale');
    protected $visible = array('title', 'locale');

}