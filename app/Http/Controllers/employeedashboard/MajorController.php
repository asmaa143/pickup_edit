<?php

namespace App\Http\Controllers\employeedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Major;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\DataTables\MajorDataTable;
class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MajorDataTable $dataTable)
    {
     return $dataTable->render("admindashboard.majors.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admindashboard.majors.create");
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
         Major::create($data);
     return redirect()->route("majors.index");
    
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
        $major = Major::where('id',$id)->first();
        return view("admindashboard.majors.edit",compact('major'));
    }

   
    public function update(Request $request, $id)
    {
        $major = Major::where('id',$id)->first();
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
         $major->update($data);
     return redirect()->route("majors.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $major = Major::where('id',$id)->first();
        $major->delete();
        return response()->json(['status' => true]);
    }
}
