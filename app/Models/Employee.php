<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable 
{

    protected $table = 'employees';
    public $timestamps = true;
    protected $fillable = array('id','name', 'phone','email', 'password', 'image');
    protected $visible = array('id','name', 'phone', 'email','password', 'image');

}