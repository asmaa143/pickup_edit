<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivacyTranslation extends Model
{
   
    protected $table = 'privacy_translations';
    public $timestamps = true;
    protected $fillable = array('privacy_id', 'locale', 'text');
    protected $visible = array('privacy_id', 'locale', 'text');
}
