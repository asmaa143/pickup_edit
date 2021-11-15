<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class ExpenseTypes extends Model 
{

    use Translatable;
    protected $table = 'expenses_types';
    public $timestamps = true;
    public $translatedAttributes = ['title'];
    protected $translationForeignKey = 'expensetype_id';
    protected $guarded = []; 
    
}