<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class WorkShift extends Model
{
    use Translatable;
    protected $table = 'workshifts';
    public $timestamps = true;
    public $translatedAttributes = ['title'];
    protected $translationForeignKey = 'workshift_id';
    protected $guarded = []; 
}
