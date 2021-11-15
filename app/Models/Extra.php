<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\ExtraDetail;
class Extra extends Model 
{
    use Translatable;
    protected $table = 'extras';
    public $timestamps = true;
    public $translatedAttributes = ['title'];
    protected $translationForeignKey = 'exra_id';
    protected $guarded = []; 
    public function extrasdetails(){
        return $this->hasMany(ExtraDetail::class,"extra_id");
    }
}