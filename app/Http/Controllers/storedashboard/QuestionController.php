<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\DataTables\QuestionDataTable;
use App\Models\Store;
use App\traits\generaltrait;

class QuestionController extends Controller
{
    use generaltrait;
    public function index(QuestionDataTable $dataTable)
    {
     return $dataTable->render("storedashboard.questions.index");
    }


    public function create()
    {
        $store = Store::where("id",auth()->user()->store_id)->first();
        return view("storedashboard.questions.create",compact("store"));
    }


    public function store(Request $request)
    {
        $store = Store::where("id",auth()->user()->store_id)->first();
        $validators =[];
         foreach($store->languages as $lang){
             $validators['title-' . $lang->lang] = ['required',
             ];
         }   
         $request->validate($validators);
         foreach($store->languages as $lang){
             $data[$lang->lang] = ['title' => $request['title-' . $lang->lang],
             'text' => $request['text-' . $lang->lang],
           ];
         }
         $data["store_id"] = $store->id;
         $question = Question::create($data);
     return redirect()->route("questions.index");
    
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $store = Store::where("id",auth()->user()->store_id)->first();
        $question = Question::where("id",$id)->first();
        return view("storedashboard.questions.edit",compact("store","question"));
    }

   
    public function update(Request $request, $id)
    {
        $store = Store::where("id",auth()->user()->store_id)->first();
        $question = Question::where("id",$id)->first();
        $validators =[];
         foreach($store->languages as $lang){
             $validators['title-' . $lang->lang] = ['required',
             ];
         }   
         $request->validate($validators);
         foreach($store->languages as $lang){
             $data[$lang->lang] = ['title' => $request['title-' . $lang->lang],
             'text' => $request['text-' . $lang->lang],
           ];
         }
         $data["store_id"] = $store->id;
         $question->update($data);

        
     return redirect()->route("questions.index");
    
    }

    public function destroy($id)
    {
        $question = Question::where("id",$id)->first();
        $question->delete();
        return response()->json(['status' => true]);
    }
}
