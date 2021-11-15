<?php

namespace App\Interfaces;
use Illuminate\Http\Request;
// use App\Http\Requests\TravelRequest;


interface CustomerInterface
{

/**
     * Get all customer
     * 
     * @method  GET api/customer
     * @access  public
     */

         public function fetch_languages(Request $request);
         public function fetch_settings(Request $request);
	     public function signup(Request $request);
         public function login(Request $request);
         public function phone_verify(Request $request);
         public function check_phone(Request $request);
         public function fetch_my_locations(Request $request);
         public function reset_password(Request $request);
	     public function change_password(Request $request);
         public function categories(Request $request);
         public function adds(Request $request);
         public function pickup_adds(Request $request);
         public function index(Request $request);
         public function indexAll(Request $request);
         public function fetch_seller_menu(Request $request);
         public function get_product(Request $request);
         public function customer_like_product(Request $request);
         public function likes(Request $request);
         public function customer_rate_product(Request $request);
         public function getRateproduct(Request $request);
         public function ExpectWord(Request $request);
         public function search(Request $request);
         public function postCart(Request $request);
         public function getCart(Request $request);
         public function increaseCart(Request $request);
         public function decreaseCart(Request $request);
         public function coupon(Request $request);
         public function deleteCart(Request $request);
         public function order(Request $request);
         public function reorder(Request $request);
         public function rateOrder(Request $request);
         public function getOrders(Request $request);
         public function cancel_order(Request $request);
         public function postAddress(Request $request);




}