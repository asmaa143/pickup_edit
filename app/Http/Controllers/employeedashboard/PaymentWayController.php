<?php

namespace App\Http\Controllers\employeedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentWay;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\DataTables\PaymentWayDataTable;
class PaymentWayController extends Controller
{
    public function index(PaymentWayDataTable $dataTable)
    {
     return $dataTable->render("admindashboard.paymentways.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admindashboard.paymentways.create");
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
         PaymentWay::create($data);
     return redirect()->route("paymentways.index");
    
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
        $type = PaymentWay::where('id',$id)->first();
        return view("admindashboard.paymentways.edit",compact('type'));
    }

   
    public function update(Request $request, $id)
    {
        $type = PaymentWay::where('id',$id)->first();
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
     return redirect()->route("paymentways.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = PaymentWay::where('id',$id)->first();
        $type->delete();
        return response()->json(['status' => true]);
    }
}
