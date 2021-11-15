<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Zone;
class ZonePrice extends Model
{
    use HasFactory;
    protected $table = 'zones_prices';
    public $timestamps = true;
    protected $guarded = []; 
    public function zone(){
        return $this->belongsTo(Zone::class,"zone_id");
    }
}
