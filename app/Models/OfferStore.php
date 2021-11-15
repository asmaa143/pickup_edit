<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferStore extends Model 
{

    protected $table = 'offers_stores';
    public $timestamps = true;
    protected $fillable = array('offer_id', 'store_id');
    protected $visible = array('offer_id', 'store_id');

}