<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;
use App\DataTables\DriverDataTable;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\WorkShift;
use App\Models\StoreBranch;
class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DriverDataTable $dataTable)
    {
     return $dataTable->render("storedashboard.drivers.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workshifts = WorkShift::whereStoreId(auth()->user()->store_id)->get();
        $branches = StoreBranch::whereStoreId(auth()->user()->store_id)->get();
        return view("storedashboard.drivers.create",compact("workshifts","branches"));
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
            'phone' => Rule::unique('drivers')->where(function ($query) use ($store_id) {
                return $query->where('store_id', $store_id);
            }),//"required|unique:drivers",//phone,$store_id,store_id",
            'email' => Rule::unique('drivers')->where(function ($query) use ($store_id) {
                return $query->where('store_id', $store_id);
            }),
        ]);
        $driver = new Driver;
        $driver->name = $request->name;
        $driver->workshift_id = $request->workshift_id;
        $driver->branch_id = $request->branch_id;
        $driver->phone = $request->phone;
        $driver->email = $request->email;
        $driver->store_id = $store_id;
        $driver->password= Hash::make($request->password);
        $driver->save();
       return redirect()->route("drivers.index");
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
        $driver = Driver::where("id",$id)->first();
        $workshifts = WorkShift::whereStoreId(auth()->user()->store_id)->get();
        $branches = StoreBranch::whereStoreId(auth()->user()->store_id)->get();
        return view("storedashboard.drivers.edit",compact("driver","workshifts","branches"));
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
            'phone' => Rule::unique('drivers')->ignore($store_id, 'store_id')->where(function ($query) use ($store_id) {
                return $query->where('store_id', $store_id);
            }),//"required|unique:drivers",//phone,$store_id,store_id",
            'email' => Rule::unique('drivers')->ignore($store_id, 'store_id')->where(function ($query) use ($store_id) {
                return $query->where('store_id', $store_id);
            }),
        ]);
        $driver = Driver::where("id",$id)->first();
        $driver->name = $request->name;
        $driver->workshift_id = $request->workshift_id;
        $driver->branch_id = $request->branch_id;
        $driver->phone = $request->phone;
        $driver->email = $request->email;
        $driver->store_id = $store_id;
        if($request->password){
        $driver->password= Hash::make($request->password);
        }
        $driver->save();
       return redirect()->route("drivers.index");
    }

   
    public function destroy($id)
    {
        $driver = Driver::where("id",$id)->first();
        $driver->delete();
        return response()->json(['status' => true]);
    }
}
