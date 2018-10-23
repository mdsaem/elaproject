<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
use App\Product;
use App\Category;
use ApP\Manufacturer;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(){

    	 $products=DB::table('products')
         ->join('categories','products.category_id','=','categories.category_id')
         ->join('manufacturers','products.manufacturer_id','=','manufacturers.manufacturer_id')
         ->select('products.*','categories.category_name','manufacturers.manufacturer_name')
          ->where('products.publication_status',1)
         ->limit(9)
         ->get();
       
      return view('pages.home_content',['products'=>$products]);
    	//return view('pages.home_content');
    }

    public function show_product_by_category($category_id){

           $category_by_product=DB::table('products')
         ->join('categories','products.category_id','=','categories.category_id')
         ->select('products.*','categories.category_name')
          ->where('categories.category_id',$category_id)
          ->where('products.publication_status',1)
         ->limit(9)
         ->get();
    
      
        return view('pages.product_by_category',['category_by_product'=>$category_by_product]);

    }
    public function show_product_by_manufacturer($manufacturer_id){

           $manufacturer_by_product=DB::table('products')
         ->join('manufacturers','products.manufacturer_id','=','manufacturers.manufacturer_id')
         ->select('products.*','manufacturers.manufacturer_name')
          ->where('manufacturers.manufacturer_id',$manufacturer_id)
          ->where('products.publication_status',1)
         ->limit(9)
         ->get();
    
      
        return view('pages.product_by_manufacturer',['manufacturer_by_product'=>$manufacturer_by_product]);

    }

     public function view_product_details($product_id){

        $products=DB::table('products')
         ->join('categories','products.category_id','=','categories.category_id')
         ->join('manufacturers','products.manufacturer_id','=','manufacturers.manufacturer_id')
         ->select('products.*','categories.category_name','manufacturers.manufacturer_name')
           ->where('products.product_id',$product_id)
          ->where('products.publication_status',1)
         ->first();
       
      return view('pages.view_product',['products'=>$products]);

    }
}
