<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermTranslation extends Model
{
    protected $table = 'term_translations';
    public $timestamps = true;
    protected $fillable = array('term_id', 'locale', 'text');
    protected $visible = array('term_id', 'locale', 'text');
}
