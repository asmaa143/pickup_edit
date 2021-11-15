<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Privacy;
class PrivacyController extends Controller
{
    public function privacy(){
       $store = Store::where("id",auth()->user()->store_id)->first();
   $text = Privacy::whereStoreId(auth()->user()->store_id)->firstOrNew();
        return view("storedashboard.pages.privacy",compact("text","store"));
    }  public function editprivacy(Request $request)
    {
        $store = Store::where("id",auth()->user()->store_id)->first();
        $text = Privacy::whereStoreId(auth()->user()->store_id)->firstOrNew();
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
         $text = Privacy::whereStoreId(auth()->user()->store_id)->first();
         if ($text) {
            $text->update($data);
        } else {
            Privacy::create($data);
        }
     return redirect()->back();
    
    }
}
