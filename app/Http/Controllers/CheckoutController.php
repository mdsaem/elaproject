<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use App\Customer;
use Cart;

class CheckoutController extends Controller
{
    public function login_check(){
    	return view('pages.login');
    }
   public function customer_registration(Request $request)
   {
      $data=array();
      $data['customer_name']=$request->customer_name;
      $data['customer_email']=$request->customer_email;
      $data['password']= md5($request->password);
      $data['customer_number']=$request->customer_number;
      $customer_id=DB::table('customers')->insertGetId($data);
      Session::put('customer_id',$customer_id);
       Session::put('customer_name',$request->customer_name);

      session::put('message','Data Inseart Successfully');

      return redirect('/checkout');
   }


     public function checkout()
    {
       return view('pages.checkout');
    }

    public function save_shipping(Request $request)
    {
      $data=array();
      $data['shipping_email']=$request->shipping_email;
      $data['shipping_fristname']=$request->shipping_fristname;
      $data['shipping_lastname']=$request->shipping_lastname;
      $data['shipping_address']=$request->shipping_address;
      $data['shipping_number']=$request->shipping_number;
      $data['shipping_city']=$request->shipping_city;

      $shipping_id=DB::table('shippings')->insertGetId($data);
      Session::put('shipping_id',$shipping_id);
      session::put('message','Data Inseart Successfully');
      return redirect('/payment');
    }

    public function payment(){
    	
        return view('pages.payment');
    }


    public function order_place(Request $request)
    {
     $payment_getway=$request->payment_method;
     $paymentdata=array();
      $paymentdata['payment_method']=$payment_getway;
      $paymentdata['payment_status']='pending';
      $payment_id=DB::table('payments')->insertGetId($paymentdata);

       
     $orderdata=array();
      $orderdata['customer_id']=Session::get('customer_id');
      $orderdata['shipping_id']=Session::get('shipping_id');
      $orderdata['payment_id']=$payment_id;
      $orderdata['order_total']=Cart::total();
      $orderdata['order_status']='pending';
      $order_id=DB::table('orders')->insertGetId($orderdata);

     $contents=Cart::content();
     $orderdata=array();

      foreach ($contents as $content)
     {
     	$orderdata['order_id']=$order_id;
     	$orderdata['product_id']=$content->id;
     	$orderdata['product_name']=$content->name;
     	$orderdata['product_price']=$content->price;
     	$orderdata['product_sales_quantity']=$content->qty;
     	DB::table('order_details')->insert($orderdata);
     }
     if ($payment_getway=='handcash') {
     	Cart::destroy();
     	return view('pages.handcash');

     }
     elseif ($payment_getway =='cart') {
     	echo "Successfully Cart";
     }
     elseif ($payment_getway=='bkash') {
     	echo "Successfully bkash";
     }

     else{
     	echo "dont show payment method";
     }

      
    }



    public function customer_login(Request $request){
    	 $customer_email=$request->customer_email;
       $password=md5($request->password);
        $result=DB::table('customers')
      ->where('customer_email',$customer_email)
      ->where('password',$password)
      ->first();
       if ($result) {
     		session::put('customer_id',$result->customer_id);
     	return Redirect::to('/checkout');
     }
     else{
     	session::put('message','Invalid Email Or Password');
     	return Redirect::to('/login-check');

     }
    }

    public function customer_logout(){
       Session::flush();
       return Redirect::to('/');

    }

    //admin panel do the manage order
    public function manage_order()
    {
    	 $all_order_info=DB::table('orders')
         ->join('customers','orders.customer_id','=','customers.customer_id')
         ->select('orders.*','customers.customer_name')
         ->get();
         //echo "<pre>";
         //print_r($products);
         //echo "</pre>";
      //$products=Product::all();
      return view('admin.manage_order',['all_order_info'=>$all_order_info]);
    }

    public function unactive_order($order_id)
    {
           DB::table('orders')
            ->where('order_id',$order_id)
          ->update(['order_status' => 0 ]);
          return redirect::to('/manage-order')->with('message','Your Data is Unactive Successfully!!!!');
    }

     public function active_order($order_id)
    {
           DB::table('orders')
            ->where('order_id',$order_id)
          ->update(['order_status' => 1 ]);
           return redirect::to('/manage-order')->with('message','Your Data is Active Successfully!!!!');
    }

    public function view_order($order_id)
    {
    	$order_by_id=DB::table('orders')
         ->join('customers','orders.customer_id','=','customers.customer_id')
         ->join('order_details','orders.order_id','=','order_details.order_id')
         ->join('shippings','orders.shipping_id','=','shippings.shipping_id')
         ->select('orders.*','order_details.*','shippings.*','customers.*')
         ->get();
       
      return view('admin.view_order',['order_by_id'=>$order_by_id]);
    }
    public function delete_order($order_id)
    {
        DB::table('orders')
  	->where('order_id',$order_id)
  	->delete();
  	  return redirect::to('/manage-order')->with('message','Your Data is delete Successfully!!!!');
    }
}



    
   