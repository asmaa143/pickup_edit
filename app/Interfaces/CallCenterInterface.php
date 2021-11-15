<?php

namespace App\Interfaces;
use Illuminate\Http\Request;
// use App\Http\Requests\TravelRequest;


interface CallCenterInterface
{

/**
     * Get all customer
     * 
     * @method  GET api/customer
     * @access  public
     */

         public function login(Request $request);
         public function categories(Request $request);
         public function postCart(Request $request);
         public function getCart(Request $request);
         public function increaseCart(Request $request);
         public function decreaseCart(Request $request);
         public function deleteCart(Request $request);
         public function postAddress(Request $request);
         public function getClient(Request $request);
         public function search_clients(Request $request);
        





}