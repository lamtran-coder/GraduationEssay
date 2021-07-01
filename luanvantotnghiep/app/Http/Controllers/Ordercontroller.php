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
        $cate_product = DB::table('danh_muc_sp')
            ->select('danh_muc')
            ->groupBy('danh_muc')
            ->get();
        $design_id=DB::table('thiet_ke')
          ->join('danh_muc_sp','danh_muc_sp.ma_tk','thiet_ke.ma_tk')->where('danh_muc_sp.trang_thai','1')
          ->groupBy('thiet_ke.ma_tk')
          ->select('thiet_ke.ma_tk','danh_muc_sp.danh_muc','ten_tk')
          ->get();

         $all_product=DB::table('san_pham')->where ('trang_thai','1')
        ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
        ->orderby('san_pham.ma_sp','desc')->get();

        $all_img=DB::table('hinh_anh')->get();
        return view('pages.order_product')
        ->with('cate_product',$cate_product)
        ->with('design_id',$design_id)
        ->with('all_product',$all_product)
        ->with('customer_id',$customer_id)
        ;
    }
    public function save_order(Request $request){
        $data=array();
        $date_mo=date('Y-m-d');
        $newdate=strtotime('+7 day',strtotime($date_mo));
        $newdate=date('d-m-Y',$newdate);
        //echo $newdate.'<br>'.$data['ngdat'];
        $data['nggiaodk']=$newdate;
        $date_ht=getdate();
        $ma_ddh=$date_ht['year'].'Y'.$date_ht['mon'].'M'.$date_ht['mday'].'D'.rand(0,9999);
        $data['ma_ddh']=$ma_ddh;
        $data['ngdat']=$date_ht['mday'].'-'.$date_ht['mon'].'-'.$date_ht['year'];
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
            DB::table('chi_tiet_don_hang')->insert($data_detail);

            $details_product=DB::table('chi_tiet_san_pham')
            ->join('mau','mau.ma_mau','=','chi_tiet_san_pham.ma_mau')
            ->get();
            foreach ($details_product as $key => $value_det_pro) {
                if (($value_det_pro->ten_mau==$v_content->options->ten_mau) && ($value_det_pro->ma_size == $v_content->options->ma_size)&&($value_det_pro->ma_sp==$v_content->id)) 
                {
                    $Sub_detail_sp['so_lg']=$value_det_pro->so_lg-$v_content->qty;
                    DB::table('chi_tiet_san_pham')
                    ->where('ma_sp',$value_det_pro->ma_sp)
                    ->where('ma_size',$value_det_pro->ma_size)
                    ->where('ma_mau',$value_det_pro->ma_mau)->update($Sub_detail_sp);
                }
            }
            $product_id=DB::table('san_pham')->get();
            foreach ($product_id as $key => $value_pro) {
                if ($value_pro->ma_sp==$v_content->id) 
                {
                    $Sub_sp['solg_sp']=$value_pro->solg_sp-$v_content->qty;
                    DB::table('san_pham')
                    ->where('ma_sp',$value_pro->ma_sp)
                    ->update($Sub_sp);
                }
            }

           
            

        }   
        
        Session::put('message','Đặt Hàng Thành Công');
        return Redirect::to('/show-order'); 

    }

    public function show_order(){
        $cate_product = DB::table('danh_muc_sp')
            ->select('danh_muc')
            ->groupBy('danh_muc')
            ->get();
        $design_id=DB::table('thiet_ke')
          ->join('danh_muc_sp','danh_muc_sp.ma_tk','thiet_ke.ma_tk')->where('danh_muc_sp.trang_thai','1')
          ->groupBy('thiet_ke.ma_tk')
          ->select('thiet_ke.ma_tk','danh_muc_sp.danh_muc','ten_tk')
          ->get();
        if (isset($_GET['status'])) {
            $status = $_GET['status'];
            $order_user_id=DB::table('don_dat_hang')
            ->join('khach_hang','khach_hang.ma_kh','=','don_dat_hang.ma_kh')
            ->select('don_dat_hang.trangthai','don_dat_hang.ma_ddh','don_dat_hang.ngdat','don_dat_hang.solg_sp','don_dat_hang.tong_tt','don_dat_hang.tien_coc','khach_hang.ten_kh','khach_hang.diachi','khach_hang.sodt','khach_hang.email')
            ->orderby('ngdat','desc')
            ->where('don_dat_hang.trangthai',$status)
            ->paginate(3);
            return view('pages.show_order')
            ->with('cate_product',$cate_product)
            ->with('design_id',$design_id)
            ->with('order_user_id',$order_user_id);
        }else{
            $order_user_id=DB::table('don_dat_hang')
            ->join('khach_hang','khach_hang.ma_kh','=','don_dat_hang.ma_kh')
            ->select('don_dat_hang.trangthai','don_dat_hang.ma_ddh','don_dat_hang.ngdat','don_dat_hang.solg_sp','don_dat_hang.tong_tt','don_dat_hang.tien_coc','khach_hang.ten_kh','khach_hang.diachi','khach_hang.sodt','khach_hang.email')
            ->orderby('ngdat','desc')
            ->where('don_dat_hang.trangthai','0')
            ->paginate(3);
            return view('pages.show_order')
            ->with('cate_product',$cate_product)
            ->with('design_id',$design_id)
            ->with('order_user_id',$order_user_id);
        }
        
    }
    //chi tiet đơn đặt hàng
    public function order_detail_view($ma_ddh){ 
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
        $order_detail_view = DB::table('chi_tiet_don_hang')
        ->join('san_pham','san_pham.ma_sp','chi_tiet_don_hang.ma_sp')
        ->join('hinh_anh','hinh_anh.ma_sp','san_pham.ma_sp')
        ->select('chi_tiet_don_hang.ma_sp','chi_tiet_don_hang.solg_sp','chi_tiet_don_hang.sotien','hinh_anh.hinhanh','chi_tiet_don_hang.size','chi_tiet_don_hang.ten_mau','san_pham.gia_sale')
        ->where('hinh_anh.goc_nhin','0')
        ->where('chi_tiet_don_hang.ma_ddh',$ma_ddh)
        ->paginate(5);
        return view('pages.order_detail')
        ->with('cate_product',$cate_product)
        ->with('design_id',$design_id)
        ->with('order_detail_view',$order_detail_view);

    }



    //backend
    public function all_order_product(){
        $all_cus=DB::table('khach_hang')->get();
        $all_oder=DB::table('don_dat_hang')->get();
        return view('admin.order_product_all')
        ->with('all_cus',$all_cus)
        ->with('all_oder',$all_oder);
    }
    //tìm kiếm đơn hàng qua mã đơn hàng
    public function search_order(Request $request){
         $keywords=$request->keywords_submit;
            $all_cus=DB::table('khach_hang')->get();
         $search_oder_id=DB::table('don_dat_hang')
         ->where('ma_ddh','like','%'. $keywords .'%')
         ->orwhere('ngdat','like','%'. $keywords .'%')
         ->get();
          if ($search_oder_id) {
              return view('admin.order_search')->with('search_oder_id',$search_oder_id) ->with('all_cus',$all_cus);
          }else{
            return view('admin.order_product_all');
          }
           
       }
    public function update_order(Request $request, $ma_ddh)
    {
        $data=array();
        $data['trangthai']=$request->status;
        DB::table('don_dat_hang')->where('ma_ddh',$ma_ddh)->update($data);
        return Redirect::to('/all-order');
    }



}
    
                
           