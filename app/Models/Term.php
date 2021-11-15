<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Term extends Model
{
    use Translatable;
    protected $table = 'terms';
    public $timestamps = true;
    public $translatedAttributes = ['text'];
    protected $translationForeignKey = 'term_id';
    protected $guarded = []; 
}