<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreCallus extends Model
{
    use HasFactory;
    protected $table = 'store_callus';
    public $timestamps = true;
    public $guarded = [];
}
