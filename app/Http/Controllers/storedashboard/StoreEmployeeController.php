<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StoreEmployee;
use App\Models\StoreBranch;
use App\Models\Store;
use App\traits\generaltrait;
use App\DataTables\StoreEmployeeDataTable;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
class StoreEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StoreEmployeeDataTable $dataTable)
    {
     return $dataTable->render("storedashboard.employees.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = StoreBranch::whereStoreId(auth()->user()->store_id)->get();
        return view("storedashboard.employees.create",compact("branches"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store_id = auth()->user()->store_id;
        $request->validate([
            'phone' => Rule::unique('store_employees')->where(function ($query) use ($store_id) {
                return $query->where('store_id', $store_id);
            }),//"required|unique:drivers",//phone,$store_id,store_id",
            'email' => Rule::unique('store_employees')->where(function ($query) use ($store_id) {
                return $query->where('store_id', $store_id);
            }),
        ]);
        $employee = new StoreEmployee;
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->store_id = $store_id;
        $employee->branch_id = $request->branch_id;
        $employee->password = Hash::make($request->password);
        $employee->save();
        return redirect()->route("storeemployees.index");
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
        $branches = StoreBranch::whereStoreId(auth()->user()->store_id)->get();
        $employee = StoreEmployee::whereId($id)->first();
        return view("storedashboard.employees.edit",compact("branches","employee"));
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
        $store_id = auth()->user()->store_id;
        $request->validate([
            'phone' => Rule::unique('store_employees')->ignore($store_id, 'store_id')->where(function ($query) use ($store_id) {
                return $query->where('store_id', $store_id);
            }),//"required|unique:drivers",//phone,$store_id,store_id",
            'email' => Rule::unique('store_employees')->ignore($store_id, 'store_id')->where(function ($query) use ($store_id) {
                return $query->where('store_id', $store_id);
            }),
        ]);
        $employee =  StoreEmployee::whereId($id)->first();
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->store_id = $store_id;
        $employee->branch_id = $request->branch_id;
        if($request->password){
        $employee->password = Hash::make($request->password);
        }
        $employee->save();
        return redirect()->route("storeemployees.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = StoreEmployee::whereId($id)->first();
        $employee->delete();
        return response()->json(['status' => true]);
    }
}
