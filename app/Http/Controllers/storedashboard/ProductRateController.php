<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\ProductRateDataTable;
use App\Models\ProductRate;
class ProductRateController extends Controller
{
    public function index(ProductRateDataTable $dataTable)
    {
     return $dataTable->render("storedashboard.products.index");
    }public function show($id){
       $prorate =  ProductRate::whereId($id)->first();
        return view("storedashboard.productrates.show",compact("prorate"));
    }
}
