<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Question extends Model
{
    use Translatable;
    protected $table = 'questions';
    public $timestamps = true;
    public $translatedAttributes = ['title','text'];
    protected $translationForeignKey = 'question_id';
    protected $guarded = []; 
}
