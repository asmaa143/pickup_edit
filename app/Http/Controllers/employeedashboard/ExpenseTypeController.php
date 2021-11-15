<?php

namespace App\Http\Controllers\employeedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExpenseTypes;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\DataTables\ExpenseTypesDataTable;
class ExpenseTypeController extends Controller
{
    public function index(ExpenseTypesDataTable $dataTable)
    {
     return $dataTable->render("admindashboard.expensetypes.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admindashboard.expensetypes.create");
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
         ExpenseTypes::create($data);
     return redirect()->route("expensetypes.index");
    
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
        $type = ExpenseTypes::where('id',$id)->first();
        return view("admindashboard.expensetypes.edit",compact('type'));
    }

   
    public function update(Request $request, $id)
    {
        $type = ExpenseTypes::where('id',$id)->first();
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
         $type->update($data);
     return redirect()->route("expensetypes.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = ExpenseTypes::where('id',$id)->first();
        $type->delete();
        return response()->json(['status' => true]);
    }
    
}
