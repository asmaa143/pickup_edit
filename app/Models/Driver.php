<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $fillable = array('id','name', 'phone','email', 'password','store_id');
    protected $visible = array('id','name', 'phone', 'email','password','store_id');
}
