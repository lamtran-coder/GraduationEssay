<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use Carbon;
use PDF;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class Ordercontroller extends Controller
{   
    //frontend
     public function AuthLogin_user(){
      $email = Session::get('email');
      if($email){
         return Redirect::to('/');
      }else{
         return Redirect::to('/login-user')->send();
      }
    }
    public function new_order(Request $request){
        $this->AuthLogin_user();
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
        $user_id=$request->user_id;
        $data=array();
        $date_mo=date('Y-m-d');
        $newdate=strtotime('+7 day',strtotime($date_mo));
        $newdate=date('d-m-Y',$newdate);
        //echo $newdate.'<br>'.$data['ngdat'];
        $data['nggiaodk']=$newdate;
        $date_ht=getdate();
        $ma_ddh=$date_ht['year'].'Y'.$date_ht['mon'].'M'.$date_ht['mday'].'D'.rand(0,9999);
        $data['ma_ddh']=$ma_ddh;
        $date_dh=date('Y-m-d');
        $data['ngdat']=$date_dh;
        $data['ck_tong']=$request->total_deductions;
        $data['tong_tt']=$request->total_payment;
        $data['trangthai']=0;
        $data['solg_sp']=$request->sum_qty;
        if (($request->sum_qty)>=40) {
           $data['tien_coc']=($request->total_payment)*(30/100);
        }else{
            $data['tien_coc']=0;
        }
        if (($request->sum_qty)<20) {
           $data['phigiao']=35000;
        }else{
            $data['phigiao']=0;
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
            $data_detail['trang_thai']=0;
            $sum_qty_pro=$v_content->qty; 
            foreach ($content as $key_2 => $v_content_2) {
               if(($v_content->id==$v_content_2->id)&&($key!=$key_2)){ 
                    $sum_qty_pro+=$v_content->qty+$v_content_2->qty;      
               } 
            }   
            if($sum_qty_pro>=20){
                $ck_sp=$v_content->options->chiet_khau;
            }else{
                $ck_sp=0;
            }
            $data_detail['chiet_khau']=$ck_sp;
            $data_detail['sotien']=($v_content->qty)*($v_content->price)*(100-$ck_sp)/100;
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

      
        return Redirect::to('/show-order/'.$user_id); 

    }

    public function show_order($user_id){
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
        if (isset($_GET['status'])) {
            $status = $_GET['status'];
            
            $order_user_id=DB::table('don_dat_hang')
            ->join('khach_hang','khach_hang.ma_kh','=','don_dat_hang.ma_kh')
            ->join('user','user.email','=','khach_hang.email')
            ->select('don_dat_hang.trangthai','don_dat_hang.ma_ddh','don_dat_hang.ngdat','don_dat_hang.solg_sp','don_dat_hang.tong_tt','don_dat_hang.tien_coc','khach_hang.ten_kh','khach_hang.diachi','khach_hang.sodt','khach_hang.email')
            ->orderby('ngdat','ASC')
            ->where('user.user_id',$user_id)
            ->where('don_dat_hang.trangthai',$status)
            ->paginate(10);
            return view('pages.show_order')
            ->with('cate_product',$cate_product)
            ->with('design_id',$design_id)
            ->with('order_user_id',$order_user_id);
            
        }else{
            $order_user_id=DB::table('don_dat_hang')
            ->join('khach_hang','khach_hang.ma_kh','=','don_dat_hang.ma_kh')
            ->join('user','user.email','=','khach_hang.email')
            ->select('don_dat_hang.trangthai','don_dat_hang.ma_ddh','don_dat_hang.ngdat','don_dat_hang.solg_sp','don_dat_hang.tong_tt','don_dat_hang.tien_coc','khach_hang.ten_kh','khach_hang.diachi','khach_hang.sodt','khach_hang.email')
            ->where('user.user_id',$user_id)
            ->orderby('ngdat','ASC')
            ->paginate(10);
            return view('pages.show_order')
            ->with('cate_product',$cate_product)
            ->with('design_id',$design_id)
            ->with('order_user_id',$order_user_id);
        }
        
    }
    //chi tiet đơn đặt hàng
    public function order_detail_view($ma_ddh){ 
        $this->AuthLogin_user();
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
        if (isset($_GET['status_de'])) {
            $status_de = $_GET['status_de'];
        $order_detail_view = DB::table('chi_tiet_don_hang')
        ->join('san_pham','san_pham.ma_sp','chi_tiet_don_hang.ma_sp')
        ->join('hinh_anh','hinh_anh.ma_sp','san_pham.ma_sp')
        ->select('chi_tiet_don_hang.ma_sp','chi_tiet_don_hang.solg_sp','chi_tiet_don_hang.sotien','hinh_anh.hinhanh','chi_tiet_don_hang.size','chi_tiet_don_hang.ten_mau','san_pham.gia_sale','chi_tiet_don_hang.trang_thai','chi_tiet_don_hang.chiet_khau')
        ->where('hinh_anh.goc_nhin','0')
        ->where('chi_tiet_don_hang.trang_thai',$status_de)
        ->where('chi_tiet_don_hang.ma_ddh',$ma_ddh)
        ->paginate(5);
        }else{
        $order_detail_view = DB::table('chi_tiet_don_hang')
        ->join('san_pham','san_pham.ma_sp','chi_tiet_don_hang.ma_sp')
        ->join('hinh_anh','hinh_anh.ma_sp','san_pham.ma_sp')
        ->select('chi_tiet_don_hang.ma_sp','chi_tiet_don_hang.solg_sp','chi_tiet_don_hang.sotien','hinh_anh.hinhanh','chi_tiet_don_hang.size','chi_tiet_don_hang.ten_mau','san_pham.gia_sale','chi_tiet_don_hang.trang_thai','chi_tiet_don_hang.chiet_khau')
        ->where('hinh_anh.goc_nhin','0')
        ->where('chi_tiet_don_hang.ma_ddh',$ma_ddh)
        ->paginate(5);
        }   
        
        return view('pages.order_detail')
        ->with('cate_product',$cate_product)
        ->with('design_id',$design_id)
        ->with('order_detail_view',$order_detail_view)
         ;

    }



    //backend
    public function AuthLogin(){
      $email = Session::get('email');
      if($email){
         return Redirect::to('admin.dashboard');
      }else{
         return Redirect::to('admin')->send();
      }
    }
    public function all_order_product(){
        $this->AuthLogin();
        if (isset($_GET['date_star'])&&isset($_GET['date_end'])){
            $date_star = $_GET['date_star'];
            $date_end = $_GET['date_end'];
            $date_star=date('d-m-Y',strtotime($date_star));
            $date_end=date('d-m-Y',strtotime($date_end));
            $all_oder=DB::table('don_dat_hang')
            ->where('ngdat','>=',$date_star)
            ->where('ngdat','<=',$date_end)
            ->paginate(10);
        }
        elseif(isset($_GET['status_od'])&&($_GET['status_od']<5)) {
            $status_od = $_GET['status_od'];
            $all_oder=DB::table('don_dat_hang')
            ->where('trangthai',$status_od)
            ->orderby('ngdat','ASC')
            ->paginate(10);
        }elseif(isset($_GET['status_od'])&&($_GET['status_od']==5)){
            $all_oder=DB::table('don_dat_hang')->orderby('ngdat','ASC')->paginate(10);
        }
        elseif(isset($_GET['keywords_search'])){
            $keywords=$_GET['keywords_search'];
            $all_oder=DB::table('don_dat_hang')
            ->join('khach_hang','khach_hang.ma_kh','=','don_dat_hang.ma_kh')
            ->select('don_dat_hang.*','khach_hang.ten_kh')
            ->where('ma_ddh','like','%'. $keywords .'%')
            ->orwhere('khach_hang.ten_kh','like','%'. $keywords .'%')
            ->orderby('ngdat','ASC')->paginate(10);
        }
        else{
        $all_oder=DB::table('don_dat_hang')->orderby('ngdat','ASC')->paginate(10);
        }
        $all_cus=DB::table('khach_hang')->get();
        //nhiệm vụ hàng ngày
        // $date_dh=date('Y-m-d');
        // $date_dh=date('d-m-Y',strtotime($date_dh));
        // $delivery_date=DB::table('phieu_giao')->where('nggiao',$date_dh)->where('trangthai','0')->get();
        return view('admin.order_product_all')
        //->with('delivery_date',$delivery_date)
        ->with('all_cus',$all_cus)
        ->with('all_oder',$all_oder);
    }
   

    public function order_details($ma_ddh){
        $this->AuthLogin();
        $customer_id=DB::table('khach_hang')
        ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
        ->where('don_dat_hang.ma_ddh',$ma_ddh)->get();
       
        $order_detail_id = DB::table('chi_tiet_don_hang')
        ->join('san_pham','san_pham.ma_sp','=','chi_tiet_don_hang.ma_sp') 
        ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp') 
        ->where('hinh_anh.goc_nhin','0')
        ->where('chi_tiet_don_hang.ma_ddh',$ma_ddh)
        ->select('chi_tiet_don_hang.ma_sp','san_pham.ten_sp','chi_tiet_don_hang.size','chi_tiet_don_hang.ten_mau','chi_tiet_don_hang.solg_sp','chi_tiet_don_hang.sotien','chi_tiet_don_hang.trang_thai','chi_tiet_don_hang.so_ct','chi_tiet_don_hang.ma_ddh')
        ->get();
        $order_id = DB::table('don_dat_hang')->where('ma_ddh',$ma_ddh)->get();
        $admin_id = DB::table('admin')->where('vi_tri','GH')->get();
        $delivery_id=DB::table('phieu_giao')
        ->where('ma_ddh',$ma_ddh)->orderby('tienconlai','desc')->get();
        
        return view('admin.order_detail_all')
        ->with('customer_id',$customer_id)
        ->with('order_detail_id',$order_detail_id)
        ->with('order_id',$order_id)
        ->with('admin_id',$admin_id)
        ->with('delivery_id',$delivery_id)
        ;
       
    }
    public function update_status_order_detail(Request $request,$so_ct){
        $this->AuthLogin();
        $result=$request->ma_ddh_od;
        $data['trang_thai']=$request->status_od;
        DB::table('chi_tiet_don_hang')->where('so_ct',$so_ct)->update($data);
       return Redirect::to('/order-details/'.$result);
    }
    

}
    
                
           