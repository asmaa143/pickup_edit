<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseTranslation extends Model 
{

    protected $table = 'expense_translations';
    public $timestamps = true;
    protected $fillable = array('title', 'description');
    protected $visible = array('title', 'description');

}