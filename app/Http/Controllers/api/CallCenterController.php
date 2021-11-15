<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\CallCenterInterface;

class CallCenterController extends Controller
{
    

     //
    protected $callcenterInterface;


    /**
     * Create a new constructor for this controller
     */
    public function __construct(CallCenterInterface $callcenterInterface)
    {
        $this->callcenterInterface = $callcenterInterface;
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

   

    public function login(Request $request)
    {
        return $this->callcenterInterface->login($request);
    }

    public function categories(Request $request){
        return $this->callcenterInterface->categories($request);

    }

    public function products(Request $request){
        return $this->callcenterInterface->products($request);
    }

    public function postCart(Request $request){
        return $this->callcenterInterface->postCart($request);

    }


     public function getCart(Request $request){
        return $this->callcenterInterface->getCart($request);

    }

    public function increaseCart(Request $request){
        return $this->callcenterInterface->increaseCart($request);

    }

     public function decreaseCart(Request $request){
        return $this->callcenterInterface->decreaseCart($request);
        
    }

     public function deleteCart(Request $request){
        return $this->callcenterInterface->deleteCart($request);

    }

    public function postAddress(Request $request){
        return $this->callcenterInterface->postAddress($request);

    }

    public function getClient(Request $request){
        return $this->callcenterInterface->getClient($request);

    }
     public function search_clients(Request $request){
        return $this->callcenterInterface->search_clients($request);
        
    }

  

   
   
    

    


  

    






}
