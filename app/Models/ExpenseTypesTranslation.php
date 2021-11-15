<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseTypesTranslation extends Model 
{

    protected $table = 'expensetype_translations';
    public $timestamps = true;
    protected $fillable = array('locale', 'title', 'expensetype_id');
    protected $visible = array('locale', 'title', 'expensetype_id');

}