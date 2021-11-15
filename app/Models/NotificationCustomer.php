<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationCustomer extends Model
{
    use HasFactory;
    protected $table = 'notifications_customers';
    public $timestamps = true;
    protected $guarded = [];
}
