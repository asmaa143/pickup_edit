<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Term;
class TermController extends Controller
{
    public function terms(){
       $store = Store::where("id",auth()->user()->store_id)->first();
   $text = Term::whereStoreId(auth()->user()->store_id)->firstOrNew();
        return view("storedashboard.pages.terms",compact("text","store"));
    }  public function editterm(Request $request)
    {
        $store = Store::where("id",auth()->user()->store_id)->first();
        $text = Term::whereStoreId(auth()->user()->store_id)->firstOrNew();
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
         $text = Term::whereStoreId(auth()->user()->store_id)->first();
         if ($text) {
            $text->update($data);
        } else {
          Term::create($data);
        }
     return redirect()->back();
    
    }
}
