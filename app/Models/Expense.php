<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model 
{

    protected $table = 'expenses';
    public $timestamps = true;
    protected $fillable = array('expensetype_id');
    protected $visible = array('expensetype_id');

}