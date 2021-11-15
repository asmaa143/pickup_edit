<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutTranslation extends Model
{
    protected $table = 'about_translations';
    public $timestamps = true;
    protected $fillable = array('about_id', 'locale', 'text');
    protected $visible = array('about_id', 'locale', 'text');
}
