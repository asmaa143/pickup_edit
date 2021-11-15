<?php

namespace App\Http\Controllers\employeedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\traits\generaltrait;
class LanguageController extends Controller
{
    use generaltrait;
    public function index(){
        return view("admindashboard.languages.index");
    }public function edit($locale){
        $language = Language::where("shortcut",$locale)->first();
        return view("admindashboard.languages.edit",compact("language","locale"));
    } public function update(Request $request,$locale){
        $language = Language::where("shortcut",$locale)->first();
        if($language){
           //$language = new Language;
           $language->shortcut = $locale;
           if($request->image){
            $language->image = $this->uploadimage($request->image,"languages");
            $language->save();
            }
            $language->save();
        }else{
            $language = new Language;
            $language->shortcut = $locale;
            if($request->image){
             $language->image = $this->uploadimage($request->image,"languages");
             $language->save();
             }
        }
        return redirect()->route("langauges");

    }
}
