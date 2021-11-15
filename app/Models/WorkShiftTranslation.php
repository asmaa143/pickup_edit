<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkShiftTranslation extends Model
{
    protected $table = 'workshift_translations';
    public $timestamps = true;
    protected $fillable = array('title', 'locale', 'workshift_id ');
    protected $visible = array('title', 'locale', 'workshift_id ');
}
