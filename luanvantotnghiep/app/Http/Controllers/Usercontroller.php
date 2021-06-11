<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class Usercontroller extends Controller
{
    public function login_user(){
         $cate_product=DB::table('danh_muc_sp')->where ('trang_thai','0')->orderby('ma_dm','desc')->get();
        return view('pages.login_user')->with('cate_product',$cate_product);
    }
    public function sign_up(){
         $cate_product=DB::table('danh_muc_sp')->where ('trang_thai','0')->orderby('ma_dm','desc')->get();
        return view('pages.sign_up')->with('cate_product',$cate_product);
    }
    public function add_user(Request $request){
      $data = array();
      $data['email'] = $request->email;
      $data['matkhau'] = $request->matkhau;

      $user_id = DB::table('user')->insertGetId($data);

      Session::put('user_id',$user_id);
      Session::put('email',$request->email);
      return Redirect::to('/trang-chu');
    }
   
    public function logout_us (){
        Session::flush();
        return Redirect::to('/trang-chu');
   }
   public function login_us (Request $request){
        $email=$request->email;
        $matkhau=$request->matkhau;
        $result=DB::table('user')->where('email',$email)->where('matkhau',$matkhau)->first();

          if($result)
          {
               Session::put('user_id',$result->user_id);
               return Redirect('/trang-chu');
          }
          else
          {
               return Redirect('/login-user');
          }         
        
          
   } 

}
