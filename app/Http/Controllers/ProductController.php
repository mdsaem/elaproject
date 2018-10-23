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

class ProductController extends Controller
{
    
     
    public function index()
    {
       $this->adminAuthCheck();
        return view('admin.add_product');
    }

    public function store_product(Request $request)
    {


      $data=array();
        $data['product_name']=$request->product_name ;
        $data['category_id']=$request->category_id ;
        $data['manufacturer_id']=$request->manufacturer_id ;
        $data['product_short_description']=$request->product_short_description ;
        $data['product_logn_description']=$request->product_logn_description ;
        $data['product_price']=$request->product_price ;
       // $data['product_image']=$request->product_image ;
        $data['product_size']=$request->product_size ;
        $data['product_color']=$request->product_color ;
        $data['publication_status']=$request->publication_status ;

         $image=$request->file('product_image');
            if ($image) {

               $image_name=str_random(20);
               $text=strtolower($image->getClientOriginalExtension());
               $image_full_name=$image_name.'.'.$text;
               $upload_path='public/image/';
               $image_url=$upload_path.$image_full_name;
               $success=$image->move($upload_path,$image_full_name);

               if($success){
                $data['product_image']=$image_url;
              /*  echo "<pre>";
                print_r($data);
                echo "</pre>";
                exit();*/
                 DB::table('products')->insert($data);
                  return redirect('/add-product')->with('message','Your Data has been Store Successfully');
               }

            }
                 $data['product_image']='';
                 DB::table('products')->insert($data);
                  return redirect('/add-product')->with('message','Your Data has not Inseart successfully');

        }

   public function all_product()
    {
         $this->adminAuthCheck();
          $products=DB::table('products')
         ->join('categories','products.category_id','=','categories.category_id')
         ->join('manufacturers','products.manufacturer_id','=','manufacturers.manufacturer_id')
         ->select('products.*','categories.category_name','manufacturers.manufacturer_name')
         ->get();
         //echo "<pre>";
         //print_r($products);
         //echo "</pre>";
      //$products=Product::all();
      return view('admin.all_product',['products'=>$products]);
     }

      public function unactive_product($product_id)
    {
          DB::table('products')
          ->where('product_id',$product_id)
          ->update(['publication_status' => 0 ]);
           return redirect('/all-product')->with('message','Your Data is Unactive Successfully!!!!');
    }
     public function active_product($product_id)
    {
          DB::table('products')
          ->where('product_id',$product_id)
          ->update(['publication_status' => 1 ]);
           return redirect('/all-product')->with('message','Your Data is Active Successfully!!!!');
    }

   public function edit_product($product_id)
    {
       $this->adminAuthCheck();
       $show_category=DB::table('categories')->where('publication_status',1)->get();
        $show_manufacturer=DB::table('manufacturers')->where('publication_status',1)->get();
           
         $productById=Product::where('product_id',$product_id)
         ->first();
         return view('admin.edit_product',['productById'=>$productById,'show_category'=>$show_category,'show_manufacturer'=>$show_manufacturer]);
    }

  public function update_product(Request $request, $product_id)
    {
     // $oldimage = DB::table('products')->select('product_id')->find($product_id);;
     $oldimage=DB::table('products')
                ->where('product_id', $request->product_id)->first();

        if ($request->hasFile('product_image')) {

            $destinationPath="public/image";
            Storage::delete('image/'.$oldimage->product_image);
            $file = $request->product_image;
            $extention = $file->getClientOriginalExtension();
            $filename = rand(1111111, 9999999) . "." . $extention;
            $file->move($destinationPath,$filename);
            $product_image=$filename;
            $filename=($product_image);


             $data = ['product_name' =>$request->product_name,
                'category_id' =>$request->category_id,
                'manufacturer_id' =>$request->manufacturer_id,
                'product_short_description' => $request->product_short_description,
                'product_logn_description' => $request->product_logn_description,
                'product_price' => $request->product_price,
                'product_size' => $request->product_size,
                'product_color' => $request->product_color,
                'product_image' => $product_image];
         

          DB::table('products')
                ->where('product_id', $product_id)
                ->update($data);
             return redirect('/all-product')->with('message','Your Data is Active Successfully!!!!');

        
        } else {
                  $data = ['product_name' =>$request->product_name,
                'category_id' =>$request->category_id,
                'manufacturer_id' =>$request->manufacturer_id,
                'product_short_description' => $request->product_short_description,
                'product_logn_description' => $request->product_logn_description,
                'product_price' => $request->product_price,
                'product_size' => $request->product_size,
                'product_color' => $request->product_color,
                'product_image' => $product_image];

            DB::table('products')
                ->where('product_id', $product_id)
                ->update($data);
             return redirect('/all-product')->with('message','Your Data is Active Successfully!!!!');
        }


    }

    
   public function delete_product($product_id){
    DB::table('products')
    ->where('product_id',$product_id)
    ->delete();
     return redirect('/all-product')->with('message','Your Data is delete Successfully!!!!');

  }

   public function adminAuthCheck()
    {
       $admin_id=Session::get('admin_id');
       if ($admin_id) {
        return;
       }
       else{
        return Redirect::to('/admin')->send();
       }
    }

    }