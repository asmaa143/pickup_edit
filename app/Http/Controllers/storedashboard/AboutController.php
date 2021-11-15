<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\About;
class AboutController extends Controller
{
    public function about(){
       $store = Store::where("id",auth()->user()->store_id)->first();
   $text = About::whereStoreId(auth()->user()->store_id)->firstOrNew();
        return view("storedashboard.pages.about",compact("text","store"));
    }  public function editabout(Request $request)
    {
        $store = Store::where("id",auth()->user()->store_id)->first();
        $about = About::whereStoreId(auth()->user()->store_id)->firstOrNew();
        $validators =[];
         foreach($store->languages as $lang){
             $validators['text-' . $lang->lang] = ['required',
             ];
         }   
         $request->validate($validators);
         foreach($store->languages as $lang){
             $data[$lang->lang] = ['text' => $request['text-' . $lang->lang],
           ];
         }
         $data["store_id"] = $store->id;
         $text = About::whereStoreId(auth()->user()->store_id)->first();
         if ($text) {
            $text->update($data);
        } else {
          About::create($data);
        }
     return redirect()->back();
    
    }
}
