<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StoreEmployee;
use App\Models\Customer;
class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    public $timestamps = true;
    protected $guarded = [];
    public function employee(){
        return $this->belongsTo(StoreEmployee::class,'employee_id');
    }public function customers(){
        return $this->belongsToMany(Customer::class,'notifications_customers','notification_id','customer_id');
    }
}
