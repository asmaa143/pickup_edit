<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'customers';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'password', 'device_token', 'device_id','image','store_id');
    protected $visible = array('id','name', 'phone', 'password', 'device_token', 'device_id','image','store_id');


     public function customerLikesProducts()
    {
        return $this->hasMany('App\Models\FavoriteProduct');
    }

}