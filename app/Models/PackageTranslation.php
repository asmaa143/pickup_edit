<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageTranslation extends Model 
{

    protected $table = 'package_translations';
    public $timestamps = true;
    protected $fillable = array('title', 'locale', 'description', 'package_id');
    protected $visible = array('title', 'locale', 'description', 'package_id');

}