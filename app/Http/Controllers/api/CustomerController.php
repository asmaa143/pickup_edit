<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\CustomerInterface;

class CustomerController extends Controller
{
    

     //
    protected $customerInterface;


    /**
     * Create a new constructor for this controller
     */
    public function __construct(CustomerInterface $customerInterface)
    {
        $this->customerInterface = $customerInterface;
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function fetch_languages(Request $request){
        return $this->customerInterface->fetch_languages($request);
        
    }

    public function fetch_settings(Request $request){
        return $this->customerInterface->fetch_settings($request);

    }
    public function signup(Request $request)
    {
        return $this->customerInterface->signup($request);
    }

    public function login(Request $request)
    {
        return $this->customerInterface->login($request);
    }

     public function phone_verify(Request $request)
    {
        return $this->customerInterface->phone_verify($request);
    }

    public function check_phone(Request $request){
        return $this->customerInterface->check_phone($request);

    }
    public function fetch_my_locations(Request $request){
        return $this->customerInterface->fetch_my_locations($request);

    }

    public function reset_password(Request $request){
        return $this->customerInterface->reset_password($request);

    }
    public function change_password(Request $request){
        return $this->customerInterface->change_password($request);

    }

    public function categories(Request $request){
        return $this->customerInterface->categories($request);

    }

    public function adds(Request $request){
        return $this->customerInterface->adds($request);

    }

    public function pickup_adds(Request $request){
        return $this->customerInterface->pickup_adds($request);
        
    }

    public function index(Request $request){
        return $this->customerInterface->index($request);

    }

    public function indexAll(Request $request){
        return $this->customerInterface->indexAll($request);

    }

     public function fetch_seller_menu(Request $request){
        return $this->customerInterface->fetch_seller_menu($request);

    }


    public function get_product(Request $request){
        return $this->customerInterface->get_product($request);

    }

    public function customer_like_product(Request $request)
    {
        return $this->customerInterface->customer_like_product($request);

    }

    public function likes(Request $request)
    {
        return $this->customerInterface->likes($request);

    }

    public function customer_rate_product(Request $request)
    {
        return $this->customerInterface->customer_rate_product($request);

    }

    public function getRateproduct(Request $request){
        return $this->customerInterface->getRateproduct($request);

    }

    public function ExpectWord(Request $request){
        return $this->customerInterface->ExpectWord($request);

    }

    public function search(Request $request){
        return $this->customerInterface->search($request);

    }

    public function postCart(Request $request){
        return $this->customerInterface->postCart($request);

    }

     public function getCart(Request $request){
        return $this->customerInterface->getCart($request);

    }

    public function increaseCart(Request $request){
        return $this->customerInterface->increaseCart($request);

    }

     public function decreaseCart(Request $request){
        return $this->customerInterface->decreaseCart($request);
        
    }

    public function coupon(Request $request){
        return $this->customerInterface->coupon($request);
    }

    public function deleteCart(Request $request){
        return $this->customerInterface->deleteCart($request);

    }

    public function order(Request $request){
        return $this->customerInterface->order($request);

    }

    public function reorder(Request $request){
        return $this->customerInterface->reorder($request);

    }
    public function postAddress(Request $request){
        return $this->customerInterface->postAddress($request);

    }

    public function rateOrder(Request $request){
        return $this->customerInterface->rateOrder($request);

    }

   public function getOrders(Request $request){
        return $this->customerInterface->getOrders($request);

   }

   public function cancel_order(Request $request){
        return $this->customerInterface->cancel_order($request);

   }






}
