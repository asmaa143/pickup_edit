<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CallCenter extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'call_centers';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'password', 'device_token', 'device_id','image');
    protected $visible = array('id','name', 'phone', 'password', 'device_token', 'device_id','image');


    

}