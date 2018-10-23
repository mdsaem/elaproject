<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

//use Cart::session($userId)->getTotal();
use DB;
use Cart;

class CartController extends Controller
{
    public function add_to_cart(Request $request){
    	$qty=$request->qty;
    	$product_id=$request->product_id;
    	$productIdShow=DB::table('products')
    	              ->where('product_id',$product_id)
    	              ->first();
   
    	$data['qty']=$qty;
    	$data['id']=$productIdShow->product_id;
    	$data['name']=$productIdShow->product_name;
    	$data['price']=$productIdShow->product_price;
    	$data['options']['image']=$productIdShow->product_image;

    Cart::add($data);
    	    return redirect::to('/show-cart');
    }

    public function show_cart()
    {
       $category=  DB::table('categories')
            ->where('publication_status',1)
            ->get();
             return view('pages.add_to_cart',['category'=>$category]);
    }

    public function delete_to_cat($rowId){
    	Cart::update($rowId,0);
        return Redirect::to('/show-cart');
}
public function update_cart(Request $request)
{
      $qty=$request->qty;
      $rowId=$request->rowId;
      Cart::update($rowId,$qty);
      return Redirect::to('/show-cart');
}
}
