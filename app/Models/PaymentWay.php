<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class PaymentWay extends Model 
{
    use Translatable;
    protected $table = 'paymentways';
    public $timestamps = true;
    public $translatedAttributes = ['title'];
    protected $translationForeignKey = 'paymentway_id';
    protected $guarded = []; 
}