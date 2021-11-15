<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\DataTables\CustomerDataTable;
use App\DataTables\OrderCustomerDataTable;
class CustomerController extends Controller
{
    public function index(CustomerDataTable $dataTable)
    {
     return $dataTable->render("storedashboard.customers.index");
    } public function orders(OrderCustomerDataTable $dataTable,$id)
    {
        $dataTable->id =$id;
     return $dataTable->render("storedashboard.customers.orders");
    }
}
