<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
   public function index()
   {
       return view('admin_login');
   }
/*
   public function show_dashboard(){
   	return view('admin.dashboard');
   }*/

   public function dashboard(Request $request)
   {
        $admin_email=$request->admin_email;
       $admin_password=md5($request->admin_password);
      $result=DB::table('tbl_admin')
      ->where('admin_email',$admin_email)
      ->where('admin_password',$admin_password)
      ->first();
      
     if ($result) {
     	session::put('admin_name',$result->admin_name);
     	session::put('admin_id',$result->admin_id);
     	return Redirect::to('/dashboard');
     }
     else{
     	session::put('message','Invalid Email Or Password');
     	return Redirect::to('/admin');

     }
   }

  public function  add_admin()
  {
     return view('admin.add_admin');

  }

  public function store_admin()
  {
     DB::table('tbl_admin')->insert([
            'admin_email' => 'admin_email',
            'admin_password' => bcrypt('admin_password'),
            'admin_name' =>'admin_name',
            'admin_phone' =>'admin_phone',
        ]);
        session::put('message','Data Inseart Successfully');
      return Redirect::to('/add-admin');

  }

   
}
