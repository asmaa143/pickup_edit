<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StoreBranch;
class StoreTable extends Model
{
    use HasFactory;
    protected $table = 'storetables';
    public $timestamps = true;
    protected $guarded = [];
    public function branch(){
         return $this->belongsTo(StoreBranch::class,"branch_id");
    }
}
