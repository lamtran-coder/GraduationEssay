<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class Admincontroller extends Controller
{   public function AuthLogin(){
      $admin_id = Session::get('admin_id');
      if($admin_id){
         return Redirect::to('admin.dashboard');
      }else{
         return Redirect::to('admin')->send();
      }
    }
    public function index(){
        return view('admin_login');
    }
    public function show_dashboard(){
        return view('admin.dashboard');
    }
    public function dashboard(Request $request){

        $email=$request->email;
        $matkhau=md5($request->matkhau);

        $result=DB::table('admin')->where('email',$email)->where('matkhau',$matkhau)->first();
        if($result){
            session::put('ten',$result->ten);
            session::put('sodt',$result->sodt);
            session::put('email',$result->email);
            session::put('tg_tao',$result->tg_tao);

            return Redirect::to('/dashboard');}
        else{
            session::put('message','Mật khẩu hoặc email sai. Vui lòng nhập lại');
            return Redirect::to('/admin');
        }
        
        
    }
    public function personal_information(){
      return view('admin.personal_information'); 
    }
    public function logout(){
        session::put('ten',null);
        session::put('tg_tao',null);
        return Redirect::to('/admin');
    }
    
}
