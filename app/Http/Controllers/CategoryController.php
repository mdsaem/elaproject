<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Category;
use DB;
use Session;
//session_start();

class CategoryController extends Controller
{
    public function index(){
      $this->adminAuthCheck();
    	return view('admin.add_category');
    }

    public function store_category(Request $request)
    {
           $data=['category_name'=>$request->category_name,
            'category_description' => $request->category_description,
            'publication_status' => $request->publication_status];

             Category::create($data);
            return redirect('/add-category')->with('message','Your Data has been Store Successfully');
            
    }

    public function all_category()
    {
      $this->adminAuthCheck();
    	$categories=Category::all();
    	return view('admin.all_category',['categories'=>$categories]);
    }

    public function unactive_category($category_id)
    {
          DB::table('categories')
          ->where('category_id',$category_id)
          ->update(['publication_status' => 0 ]);
           return redirect('/all-category')->with('message','Your Data is Unactive Successfully!!!!');
    }
     public function active_category($category_id)
    {
          DB::table('categories')
          ->where('category_id',$category_id)
          ->update(['publication_status' => 1 ]);
           return redirect('/all-category')->with('message','Your Data is Active Successfully!!!!');
    }

    public function edit_category($category_id)
    {
        $this->adminAuthCheck();
         $categoryById=Category::where('category_id',$category_id)
         ->first();
         return view('admin.edit_category',['categoryById'=>$categoryById]);
    }

        public function update_category(Request $request,$category_id){
	      DB::table('categories')->where('category_id',$category_id)
               ->update(['category_name'=>$request->category_name,
                'category_description'=>$request->category_description,
               
            ]);
            return redirect('/all-category')->with('message','Your Data is Update Successfully!!!!');

  }

  public function delete_category($category_id){
  	DB::table('categories')
  	->where('category_id',$category_id)
  	->delete();
  	 return redirect('/all-category')->with('message','Your Data is delete Successfully!!!!');

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


