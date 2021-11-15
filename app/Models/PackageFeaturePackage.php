<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageFeaturePackage extends Model 
{

    protected $table = 'packages_featurepackage';
    public $timestamps = true;
    protected $fillable = array('package_id', 'featurepackage_id');
    protected $visible = array('package_id', 'featurepackage_id');

}