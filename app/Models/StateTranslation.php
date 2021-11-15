<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StateTranslation extends Model 
{

    protected $table = 'state_translations';
    public $timestamps = true;
    protected $fillable = array('state_id', 'locale', 'title');
    protected $visible = array('state_id', 'locale', 'title');

}