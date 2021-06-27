<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class Checkoutcontroller extends Controller
{
    public function show_checkout(){
        $cate_product=DB::table('danh_muc_sp')
        ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
        ->where ('trang_thai','1')
        ->orderby('danh_muc_sp.ma_dm','desc')->get();
        $all_product=DB::table('san_pham')->where ('trang_thai','1')
        ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
        ->orderby('san_pham.ma_sp','desc')->limit(6)->get(); 
        $customer_id=DB::table('khach_hang')->orderby('ma_kh','desc')->get();
       return view('pages.show_checkout')
        ->with('cate_product',$cate_product)
        ->with('all_product',$all_product)
        ->with('customer_id',$customer_id)
        ;
      
    }
    public function save_checkout_kh(Request $request){
        $data = array();
        $data ['ten_kh']    = $request->username;
        $data ['sodt']      = $request->phone;
        $data ['diachi']    = $request->address;
        $data ['email']     = $request->email;
        $data ['trangthai'] = 0;
        $data['ma_kh']=rand(0,9999999999) ;
        $customer_id=DB::table('khach_hang')
        ->join('user','user.email','=','khach_hang.email')
        ->get();
        $dem=0;
        foreach ($customer_id as $key => $value_cus) {
            if($request->email==$value_cus->email){
                $dem++;
            }  
        }
        if($dem<=2){
            $ma_khach_hang=DB::table('khach_hang')->insertGetId($data);
            Session::put('ma_kh',$ma_khach_hang);
            return Redirect::to('/payment');  
        }else{
            return Redirect::to('/show-checkout');
        }
          
   }
   public function delete_checkout_kh($ma_kh){
     DB::table('khach_hang')->where('ma_kh',$ma_kh)->delete();
     return Redirect::to('/show-checkout');
   }
   public function payment(){
        $all_customer=DB::table('khach_hang')->get();
        $cate_product=DB::table('danh_muc_sp')
        ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
        ->where ('trang_thai','1')
        ->orderby('danh_muc_sp.ma_dm','desc')->get();
        $all_product=DB::table('san_pham')->where ('trang_thai','1')
        ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
        ->orderby('san_pham.ma_sp','desc')->limit(6)->get(); 

       return view('pages.payment')
        ->with('cate_product',$cate_product)
        ->with('all_product',$all_product)
        ->with('all_customer',$all_customer);
   }

    
}