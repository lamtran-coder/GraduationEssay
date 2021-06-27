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
      $data['ten_nd'] = $request->username;
      $data['diachi'] = $request->address;
      $data['sodt'] = $request->phone;
      $data['email'] = $request->email;
      $data['matkhau'] =md5($request->password);
      DB::table('user')->insert($data);
      Session::put('message','Tạo tài khoản thành công');
      return Redirect::to('/sign-up');
    }
   
    public function logout_us (){
        Session::flush();
        return Redirect::to('/trang-chu');
   }
   public function login_us (Request $request){
     $email=$request->email;    
     $password=md5($request->password);
     $result_user=DB::table('user')
     ->where('email',$email)
     ->where('matkhau',$password)->first();
     if($result_user){
          Session::put('username',$result_user->ten_nd);
          Session::put('phone',$result_user->sodt);
          Session::put('address',$result_user->diachi);
          Session::put('email',$result_user->email);
          return Redirect('/trang-chu');
     }else{    
          Session::put('message','Mật khẩu không trung khớp thành công');
          return Redirect('/login-user');
     }
    }
      
     public function all_customers_user(){
        $customer_id=DB::table('khach_hang')->orderby('ma_kh','desc')->get();
        return view('pages.show_checkout')->with('customer_id',$customer_id);
    }
    

}
