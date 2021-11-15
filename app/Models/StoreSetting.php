<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreSetting extends Model
{
    use HasFactory;
    protected $table = 'store_settings';
    public $timestamps = true;
    protected $fillable = array('id','store_id', 'taxes','least_price');
}
