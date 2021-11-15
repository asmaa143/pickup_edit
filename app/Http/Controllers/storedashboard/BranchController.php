<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StoreBranch;
use App\Models\Store;
use App\Models\State;
use App\traits\generaltrait;
use App\DataTables\StoreBranchDataTable;
class BranchController extends Controller
{
    use generaltrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StoreBranchDataTable $dataTable)
    {
     return $dataTable->render("storedashboard.branches.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $store = Store::whereId(auth()->user()->store_id)->first();
       $states = State::all();
        return view("storedashboard.branches.create",compact("states"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $store = Store::whereId(auth()->user()->store_id)->first();
     $data['store_id'] = $store->id;
     $data['state_id'] = $request->state_id;
     $data['city_id'] = $request->city_id;
     $data['zone_id'] = $request->zone_id;
     $data['address'] = $request->address;
     $data['lat'] = $request->lat;
     $data['name'] = $request->name;
     $data['lon'] = $request->lon;
     $data['whats_up'] = $request->whats_up;
     $data['phone'] = $request->phone;
     $branch = StoreBranch::create($data);
     if($request->hasFile("image")){
        $branch->image = $this->uploadimage($request->image,"branches"); 
    $branch->save();
     }
      return redirect()->route("branches.index");
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
        $store = Store::whereId(auth()->user()->store_id)->first();
       $states = State::all();
       $branch = StoreBranch::whereId($id)->first();
        return view("storedashboard.branches.edit",compact("states","branch"));
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
        $store = Store::whereId(auth()->user()->store_id)->first();
        $branch = StoreBranch::whereId($id)->first();

        $data['store_id'] = $store->id;
        $data['state_id'] = $request->state_id;
        $data['city_id'] = $request->city_id;
        $data['zone_id'] = $request->zone_id;
        $data['address'] = $request->address;
        $data['lat'] = $request->lat;
        $data['lon'] = $request->lon;
        $data['name'] = $request->name;
        $data['whats_up'] = $request->whats_up;
        $data['phone'] = $request->phone;
        $branch->update($data);
        if($request->hasFile("image")){
            $this->deleteimage($branch->image);

           $branch->image = $this->uploadimage($request->image,"branches"); 
       $branch->save();
        }
         return redirect()->route("branches.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = StoreBranch::where("id",$id)->first();
      $this->deleteimage($branch->image);
        $branch->delete();
        return response()->json(['status' => true]);
    }
}
