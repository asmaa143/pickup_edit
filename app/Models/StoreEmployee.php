<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\StoreBranch;
class StoreEmployee extends Authenticatable 
{ 

    protected $table = 'store_employees';
    public $timestamps = true;
    protected $fillable = array('id','name', 'email', 'phone', 'store_id', 'password', 'image');
    protected $visible = array('id','name', 'email', 'phone', 'store_id', 'password', 'image');
    public function branch(){
        return $this->belongsTo(StoreBranch::class,"branch_id");
    }
}