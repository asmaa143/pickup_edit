<?php

namespace App\Http\Controllers\employeedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\DataTables\StateDataTable;
class StateController extends Controller
{
    public function index(StateDataTable $dataTable)
    {
     return $dataTable->render("admindashboard.states.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admindashboard.states.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validators =[];
        foreach (LaravelLocalization::getSupportedLocales() as 
        $localeCode => $properties) {
             $validators['title-' . $localeCode] = ['required',
             ];
         }   
         $request->validate($validators);
         foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
             $data[$localeCode] = ['title' => $request['title-' . $localeCode],
           ];
         }
         $state = State::create($data);
     return redirect()->route("states.index");
    
    }

   
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
        $state = State::where('id',$id)->first();
        return view("admindashboard.states.edit",compact('state'));
    }

   
    public function update(Request $request, $id)
    {
        $state = State::where('id',$id)->first();
        $validators =[];
        foreach (LaravelLocalization::getSupportedLocales() as 
        $localeCode => $properties) {
             $validators['title-' . $localeCode] = ['required',
             ];
         }   
         $request->validate($validators);
         foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
             $data[$localeCode] = ['title' => $request['title-' . $localeCode],
           ];
         }
         $state->update($data);
     return redirect()->route("states.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = State::where('id',$id)->first();
        $state->delete();
        return response()->json(['status' => true]);
    }
}
