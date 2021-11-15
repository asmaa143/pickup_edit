<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function storelogin(){
        return view("storedashboard.login.login");
    }public function storesignin(Request $request){
        $request->validate([
      'phone' => 'required',
      'password' => 'required'
        ]);
     // dd($request->all());
        if (auth()->guard('storeemployee')->attempt(['phone' => $request->phone, 
        'password' => $request->password]
        ,$request->remember)) {
         
        return redirect()->route('categories.create');
        }else{
        return redirect()->back();
        }
    }public function storelogout(){
        auth()->guard('storeemployee')->logout();
        return redirect()->route('storelogin');
    }
}
