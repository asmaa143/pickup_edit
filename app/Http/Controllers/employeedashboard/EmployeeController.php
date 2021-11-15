<?php

namespace App\Http\Controllers\employeedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use App\DataTables\EmployeeDataTable;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmployeeDataTable $dataTable)
    {
     return $dataTable->render("admindashboard.employees.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admindashboard.employees.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:employees,name',
            'phone' => 'required|unique:employees,phone'
        ]);
        $employee = new Employee;
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->password = Hash::make($request->password);
        $employee->save();
        return redirect()->route("employees.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee =  Employee::where('id',$id)->first();

        return view("admindashboard.employees.edit",compact("employee"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:employees,name,'.$id,
            'phone' => 'required|unique:employees,phone,'.$id,
        ]);
        $employee =  Employee::where('id',$id)->first();
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        if($request->password){
        $employee->password = Hash::make($request->password);
        }
        $employee->save();
        return redirect()->route("employees.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee =  Employee::where('id',$id)->first();
        $employee->delete();
        return response()->json(['status' => true]);
    }
}
