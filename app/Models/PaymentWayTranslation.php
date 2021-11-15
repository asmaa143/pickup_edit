<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentWayTranslation extends Model 
{

    protected $table = 'paymentway_translations';
    public $timestamps = true;
    protected $fillable = array('title', 'locale', 'paymentway_id');
    protected $visible = array('title', 'locale', 'paymentway_id');

}