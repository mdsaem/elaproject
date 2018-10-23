<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Slider;
use DB;
use Session;

class SliderController extends Controller
{
    public function index(){
      //$this->adminAuthCheck();
    	return view('admin.add_slider');
    }
    public function store_slider(Request $request)
    {
    	  $data=array();
       
         $data['publication_status']=$request->publication_status ;

         $image=$request->file('slider_image');
            if ($image) {

               $image_name=str_random(20);
               $text=strtolower($image->getClientOriginalExtension());
               $image_full_name=$image_name.'.'.$text;
               $upload_path='public/slider/';
               $image_url=$upload_path.$image_full_name;
               $success=$image->move($upload_path,$image_full_name);

               if($success){
                $data['slider_image']=$image_url;
              /*  echo "<pre>";
                print_r($data);
                echo "</pre>";
                exit();*/
                 DB::table('sliders')->insert($data);
                  return redirect('/add-slider')->with('message','Your Data has been Store Successfully');
               }

            }
                 $data['product_image']='';
                 DB::table('sliders')->insert($data);
                  return redirect('/add-slider')->with('message','Your Data has not Inseart successfully');


    }


    public function all_slider()
    {
        $sliders=Slider::all();
    	return view('admin.all_slider',['sliders'=>$sliders]);
     }

      public function unactive_slider($slider_id)
    {
          DB::table('sliders')
          ->where('slider_id',$slider_id)
          ->update(['publication_status' => 0 ]);
           return redirect('/all-slider')->with('message','Your Data is Unactive Successfully!!!!');
    }
     public function active_slider($slider_id)
    {
          DB::table('sliders')
          ->where('slider_id',$slider_id)
          ->update(['publication_status' => 1 ]);
           return redirect('/all-slider')->with('message','Your Data is Active Successfully!!!!');
    }

     public function delete_slider($slider_id){
  	DB::table('sliders')
  	->where('slider_id',$slider_id)
  	->delete();
  	 return redirect('/all-slider')->with('message','Your Data is delete Successfully!!!!');

  }

}
