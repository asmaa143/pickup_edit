<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionTranslation extends Model
{
    protected $table = 'question_translations';
    public $timestamps = true;
    protected $fillable = array('question_id', 'locale', 'text','title');
    protected $visible = array('question_id', 'locale', 'text','title'); 
}
