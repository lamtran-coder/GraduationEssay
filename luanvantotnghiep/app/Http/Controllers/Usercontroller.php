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
    public function AuthLogin_user(){
      $email = Session::get('email');
      if($email){
         return Redirect::to('/');
      }else{
         return Redirect::to('/login-user')->send();
      }
    }
    public function login_user(){
        $cate_product = DB::table('danh_muc_sp')
            ->select('danh_muc')
            ->groupBy('danh_muc')
            ->get();
        $design_id=DB::table('thiet_ke')
          ->join('danh_muc_sp','danh_muc_sp.ma_tk','thiet_ke.ma_tk')->where('danh_muc_sp.trang_thai','1')
          ->groupBy('thiet_ke.ma_tk')
          ->select('thiet_ke.ma_tk','danh_muc_sp.danh_muc','ten_tk')
          ->get();
        return view('pages.login_user')
        ->with('cate_product',$cate_product)
        ->with('design_id',$design_id);
    }
    public function sign_up(){
        $cate_product = DB::table('danh_muc_sp')
            ->select('danh_muc')
            ->groupBy('danh_muc')
            ->get();
        $design_id=DB::table('thiet_ke')
          ->join('danh_muc_sp','danh_muc_sp.ma_tk','thiet_ke.ma_tk')->where('danh_muc_sp.trang_thai','1')
          ->groupBy('thiet_ke.ma_tk')
          ->select('thiet_ke.ma_tk','danh_muc_sp.danh_muc','ten_tk')
          ->get();
        return view('pages.sign_up')
        ->with('cate_product',$cate_product)
        ->with('design_id',$design_id);
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
         Session::put('username',NULL);
          Session::put('user_id',null);
          Session::put('phone',null);
          Session::put('address',null);
          Session::put('email',null);
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
          Session::put('user_id',$result_user->user_id);
          Session::put('phone',$result_user->sodt);
          Session::put('address',$result_user->diachi);
          Session::put('email',$result_user->email);
          return Redirect('/trang-chu');
     }else{    
          Session::put('message','Mật khẩu không trung khớp thành công');
          return Redirect('/login-user');
     }
    }
     

    //thông tin cá nhân người dùng
    public function information_user(){
        $this->AuthLogin_user();
         $cate_product = DB::table('danh_muc_sp')
            ->select('danh_muc')
            ->groupBy('danh_muc')
            ->get();
        $design_id=DB::table('thiet_ke')
          ->join('danh_muc_sp','danh_muc_sp.ma_tk','thiet_ke.ma_tk')->where('danh_muc_sp.trang_thai','1')
          ->groupBy('thiet_ke.ma_tk')
          ->select('thiet_ke.ma_tk','danh_muc_sp.danh_muc','ten_tk')
          ->get();
        return view('pages.information_user')
        ->with('cate_product',$cate_product)
        ->with('design_id',$design_id);
    }


    



    public function all_customers_user(){
        $customer_id=DB::table('khach_hang')->orderby('ma_kh','desc')->get();
        return view('pages.show_checkout')->with('customer_id',$customer_id);
    }
    

}
