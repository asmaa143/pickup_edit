<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Privacy extends Model
{
    use Translatable;
    protected $table = 'privacy';
    public $timestamps = true;
    public $translatedAttributes = ['text'];
    protected $translationForeignKey = 'privacy_id';
    protected $guarded = []; 
}
