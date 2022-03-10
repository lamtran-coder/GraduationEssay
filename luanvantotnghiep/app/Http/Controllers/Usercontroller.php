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
          ->join('danh_muc_sp','danh_muc_sp.ma_tk','thiet_ke.ma_tk')
          ->where('danh_muc_sp.trang_thai','1')
          ->groupBy('thiet_ke.ma_tk')
          ->select('thiet_ke.ma_tk','danh_muc_sp.danh_muc','ten_tk')
          ->get();
        //thông báo
        $message_id=DB::table('thong_bao')
        ->selectRaw('noi_dung,thoi_gian,user_id')
        ->get();  
        return view('pages.User.login_user')
        ->with('cate_product',$cate_product)
        ->with('design_id',$design_id)
        ->with('message_id',$message_id)
        ;
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
        //thông báo
        $message_id=DB::table('thong_bao')
        ->selectRaw('noi_dung,thoi_gian,user_id')
        ->get();
        return view('pages.User.sign_up')
        ->with('cate_product',$cate_product)
        ->with('design_id',$design_id)
        ->with('message_id',$message_id);
    }
    public function add_user(Request $request){
      $validator=$request->validate([
        'username'=>['required',"regex:/[^a-z0-9A-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]/u"],
        'address'=>'required',"regex:/[^a-z0-9A-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]/u",
        'phone'=>['required','regex:/(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/','unique:user,sodt'],
        'email'=>'required|email|unique:user,email',
        'password'=>'required|min:6|max:255',
        'password2'=>'required|same:password',

      ],[

        'username.required'=>' Không Để Trống',
        'username.regex'=>' Không Hợp Lệ',
        
        'address.required'=>' Không Để Trống',
        'address.regex'=>' Không Hợp Lệ',

        'phone.required'=>' Không Để Trống',
        'phone.regex'=>'Không Đúng Số Điện Thoại Việt Nam',
        'phone.unique'=>' Đã Tồn Tại',

        'email.required'=>' Không Để Trống',
        'email.email'=>' Không Hợp Lệ',
        'email.unique'=>' Đã Tồn Tại',

        'password.required'=>' Không Để Trống',
        'password.min'=>' ít nhất 6 ký tự',
        'password.max'=>' nhiều nhất 255 ký tự',

        'password2.required'=>' Xác Nhận Không Để Trống',
        'password2.same'=>' Xác Nhận Không Trung Khớp'
      ]);
    
      $data = array();
      $data['ten_nd'] = $request->username;
      $data['diachi'] = $request->address;
      $data['sodt'] = $request->phone;
      $data['email'] = $request->email;
      $data['matkhau'] =md5($request->password);
      $data['trang_thai'] =0;
      
      DB::table('user')->insert($data);
      Session::put('message','Tạo tài khoản thành công');
      return Redirect::to('/login-user');
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
    $validator=$request->validate([
        'email'=>'required|email',
        'password'=>'required|min:6|max:255',
      ],[
        'email.required'=>' Không Để Trống',
        'email.email'=>' Không Hợp Lệ',

        'password.required'=>' Không Để Trống',
        'password.min'=>' ít nhất 6 ký tự',
        'password.max'=>' nhiều nhất 255 ký tự',
      ]);
     $email=$request->email;    
     $password=md5($request->password);
     $result_user=DB::table('user')
     ->where('email',$email)
     ->where('matkhau',$password)
     ->first();
     if(($result_user)&&($result_user->trang_thai==0)){
      Session::put('username_us',$result_user->ten_nd);
      Session::put('user_id',$result_user->user_id);
      Session::put('phone',$result_user->sodt);
      Session::put('address',$result_user->diachi);
      Session::put('email',$result_user->email);
      return Redirect('/trang-chu');
     }
     elseif(($result_user)&&($result_user->trang_thai==1)) {
         Session::put('message','Khách Hàng Đã Boom Hàng Nhiều Lần tạm khóa 7 ngày');
          return Redirect('/login-user');
     }
     elseif(($result_user)&&($result_user->trang_thai==2)) {
         Session::put('message','Khóa Vĩnh Viễn Tài Khoản');
          return Redirect('/login-user');
     }
     else{    
          Session::put('message','Mật khẩu không trung khớp thành công');
          return Redirect('/login-user');
     }
    }
     

    //thông tin cá nhân người dùng
    public function information_user(){
         $user_id=DB::table('user')->get();
         $cate_product = DB::table('danh_muc_sp')
            ->select('danh_muc')
            ->groupBy('danh_muc')
            ->get();
        $design_id=DB::table('thiet_ke')
          ->join('danh_muc_sp','danh_muc_sp.ma_tk','thiet_ke.ma_tk')->where('danh_muc_sp.trang_thai','1')
          ->groupBy('thiet_ke.ma_tk')
          ->select('thiet_ke.ma_tk','danh_muc_sp.danh_muc','ten_tk')
          ->get();
        //thông báo
        $message_id=DB::table('thong_bao')
        ->selectRaw('noi_dung,thoi_gian,user_id')
        ->get();
        return view('pages.User.information_user')
        ->with('cate_product',$cate_product)
        ->with('design_id',$design_id)
        ->with('user_id',$user_id)
        ->with('message_id',$message_id);
    }
    public function update_user(Request $request,$use_id){
        
        $data=array();
        $data['ten_nd']=$request->username;
        $data['sodt']=$request->phone;
        $data['diachi']=$request->address;
        $data['email']=$request->email;
        $data['trang_thai']=0;
        DB::table('user')->where('user_id',$use_id)->update($data);
        return Redirect::to('/thong-tin-ca-nhan');

    }
    public function change_pass(){
        $user_id=DB::table('user')->get();
         $cate_product = DB::table('danh_muc_sp')
            ->select('danh_muc')
            ->groupBy('danh_muc')
            ->get();
        $design_id=DB::table('thiet_ke')
          ->join('danh_muc_sp','danh_muc_sp.ma_tk','thiet_ke.ma_tk')->where('danh_muc_sp.trang_thai','1')
          ->groupBy('thiet_ke.ma_tk')
          ->select('thiet_ke.ma_tk','danh_muc_sp.danh_muc','ten_tk')
          ->get();
        //thông báo
        $message_id=DB::table('thong_bao')
        ->selectRaw('noi_dung,thoi_gian,user_id')
        ->get();
        return view('pages.User.change_password')
        ->with('cate_product',$cate_product)
        ->with('design_id',$design_id)
        ->with('user_id',$user_id)
        ->with('message_id',$message_id);
    }
    public function update_pass(Request $request,$use_id){
        $data=array();
        if ($request->matkhau1==$request->matkhau2) {
        $data['matkhau']=md5($request->matkhau1);
        DB::table('user')->where('user_id',$use_id)->update($data);
            return Redirect::to('/change-pass');
        }else{
            Session::put('message','Mật khẩu không trung khớp thành công');
            return Redirect::to('/change-pass');
        }

    }


    // public function all_customers_user(){
    //     $customer_id=DB::table('khach_hang')->orderby('ma_kh','desc')->get();
    //     return view('pages.show_checkout')->with('customer_id',$customer_id);
    // }
    

}
