<?php

namespace App\Http\Controllers\employeedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function employeelogin(){
        return view("admindashboard.login.login");
    }public function employeesignin(Request $request){
        $request->validate([
      'phone' => 'required',
      'password' => 'required'
        ]);
      
        if (auth()->guard('employee')->attempt(['phone' => $request->phone, 
        'password' => $request->password]
        ,$request->remember)) {
            return redirect()->route('employees.index');
        }
        return redirect()->back();
    }public function employeelogout(){
        auth()->guard('employee')->logout();
        return redirect()->route('employeelogin');
    }
}
