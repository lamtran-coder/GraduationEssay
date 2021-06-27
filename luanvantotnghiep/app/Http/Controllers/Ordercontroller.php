<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class Ordercontroller extends Controller
{   
    //frontend
    public function new_order(Request $request){
        $ma_kh_h=$request->ma_kh_address;

        $customer_id=DB::table('khach_hang')->where('ma_kh',$ma_kh_h)->get();   
        $cate_product=DB::table('danh_muc_sp')
        ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
        ->where ('trang_thai','1')
        ->orderby('danh_muc_sp.ma_dm','desc')->get();
         $all_product=DB::table('san_pham')->where ('trang_thai','1')
        ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
        ->orderby('san_pham.ma_sp','desc')->get(); 
        $all_img=DB::table('hinh_anh')->get();
        return view('pages.order_product')
        ->with('cate_product',$cate_product)
        ->with('all_product',$all_product)
        ->with('customer_id',$customer_id)
        ;
    }
    public function save_order(Request $request){
        $data=array();
        $date=getdate();
        $ma_ddh=$date['year'].'Y'.$date['mon'].'M'.$date['mday'].'D'.rand(0,9999);
        $data['ma_ddh']=$ma_ddh;
        $data['ngdat']=$date['mday'].'-'.$date['mon'].'-'.$date['year'];
        $data['nggiaodk']=$date['mday'].'-'.$date['mon'].'-'.$date['year'];
        $data['ck_tong']=$request->total_deductions;
        $data['tong_tt']=$request->total_payment;
        $data['trangthai']=0;
        $data['solg_sp']=$request->sum_qty;
        if (($request->sum_qty)>=40) {
           $data['tien_coc']=($request->total_payment)*(30/100);
        }else{
            $data['tien_coc']=0;
        }
        $data['ma_kh']=$request->ma_kh;
        DB::table('don_dat_hang')->insert($data);

        $content=Cart::content();
        // echo"<pre>";
        // print_r($content);
        // echo "</pre>";
        foreach ($content as $key => $v_content) 
        {
           
            $data_detail['ma_ddh']=$ma_ddh;
            $data_detail['ma_sp']=$v_content->id;
            $data_detail['ten_mau']=$v_content->options->ten_mau;
            $data_detail['size']=$v_content->options->ma_size;
            $data_detail['solg_sp']=$v_content->qty;
            $data_detail['sotien']=($v_content->qty)*($v_content->price);
            $sum_qty_pro=0; 
            foreach ($content as $key_2 => $v_content_2) {
               if(($v_content->id==$v_content_2->id)&&($key!=$key_2)){ 
                    $sum_qty_pro+=$v_content->qty+$v_content_2->qty;      
               } 
            }   
            if($sum_qty_pro>=20){
                    $ck_sp=$v_content->options->chiet_khau;
            }else{ 
                $ck_sp=0;}
            $data_detail['chiet_khau']=$ck_sp;

            echo"<pre>";
            print_r($data_detail);
            echo "</pre>";
            DB::table('chi_tiet_don_hang')->insert($data_detail);

        }   
       
        Session::put('message','Đặt Hàng Thành Công');
        return Redirect::to('/show-order'); 

    }

    public function show_order(){
        $cate_product=DB::table('danh_muc_sp')
      ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
      ->where ('danh_muc_sp.trang_thai','1')
      ->orderby('danh_muc_sp.ma_dm','desc')->get();
        $order_user_id=DB::table('don_dat_hang')
        ->join('khach_hang','khach_hang.ma_kh','=','don_dat_hang.ma_kh')
        ->orderby('ngdat','desc')->get();
        return view('pages.show_order')
        ->with('cate_product',$cate_product)
        ->with('order_user_id',$order_user_id)
        ;
    }




    //backend
    public function all_order_product(){
        return view('admin.order_product_all');
    }
}
    
                
           