<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Http\Request;
use App\Manufacturer;
use DB;

class ManufacturerController extends Controller
{
   
    public function index()
    {
       $this->adminAuthCheck();
      return view('admin.add_manufacturer');
    }

   public function store_manufacturer(Request $request)
    {
          $result=['manufacturer_name'=>$request->manufacturer_name,
                  'manufacturer_description' => $request->manufacturer_description,
                  'publication_status' => $request->publication_status];

                  Manufacturer::create($result);
                return redirect('/add-manufacturer')->with('message','Your Data has been Store Successfully');
            
    }

     public function all_manufacturer()
    {
       $this->adminAuthCheck();
        $manufactures=Manufacturer::all();
        return view('admin.all_manufacturer',['manufactures'=>$manufactures]);
    }

   public function unactive_manufacturer($manufacturer_id)
    {
          DB::table('manufacturers')
          ->where('manufacturer_id',$manufacturer_id)
          ->update(['publication_status' => 0 ]);
           return redirect('/all-manufacturer')->with('message','Your Data is Unactive Successfully!!!!');
    }
     public function active_manufacturer($manufacturer_id)
    {
          DB::table('manufacturers')
          ->where('manufacturer_id',$manufacturer_id)
          ->update(['publication_status' => 1 ]);
           return redirect('/all-manufacturer')->with('message','Your Data is Active Successfully!!!!');
    }

    public function edit_manufacturer($manufacturer_id)
    {
       $this->adminAuthCheck();
         $manufacturer=Manufacturer::where('manufacturer_id',$manufacturer_id)
         ->first();
         return view('admin.edit_manufacturer',['manufacturer'=>$manufacturer]);
    }

        public function update_manufacturer(Request $request,$manufacturer_id){
          DB::table('manufacturers')->where('manufacturer_id',$manufacturer_id)
               ->update(['manufacturer_name'=>$request->manufacturer_name,
                'manufacturer_description'=>$request->manufacturer_description,
               
            ]);
            return redirect('/all-manufacturer')->with('message','Your Data is Update Successfully!!!!');

  }

  public function delete_manufacturer($manufacturer_id){
    DB::table('manufacturers')
    ->where('manufacturer_id',$manufacturer_id)
    ->delete();
     return redirect('/all-manufacturer')->with('message','Your Data is delete Successfully!!!!');

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

