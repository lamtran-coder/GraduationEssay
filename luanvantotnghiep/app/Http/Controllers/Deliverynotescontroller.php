<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class Deliverynotescontroller extends Controller
{
    public function save_delivery_notes (Request $request){
        $data=array();
        $date=getdate();
        $ma_ddh=$request->ma_ddh_h;
        $email=$request->email_h;
        $tiencoc=$request->tiencoc_h;
        $tong_tt=$request->tong_tt_h;
        if ($tong_tt>0) {
           
        $ma_pg=$date['year'].'M'.$date['mon'].'D'.$date['mday'].rand(0,9999);
        $data['ma_pg']= $ma_pg;
        $data['nggiao']=$date['mday'].'/'.$date['mon'].'/'.$date['year'];
        $Sum_mony_1=0;
        $Sum_mony=0;
        $Sum_qty=0;
        $dem_tt=0;
        $dem_tt_2=0;
        $order_detail=DB::table('chi_tiet_don_hang')->where('ma_ddh',$ma_ddh)->get();
        foreach ($order_detail as $key => $value_od) {
            if ($value_od->trang_thai==1){
                $Sum_mony_1+=$value_od->sotien;
                $Sum_qty+=$value_od->solg_sp;
            }
            if ($value_od->trang_thai==2) {    
            }
            $Sum_mony+=$value_od->sotien;
        }

        $chiec_khau_tong=0;
        if($Sum_mony>=50000000){
            $chiec_khau_tong=15;    
        }elseif((($Sum_mony<50000000)&&($Sum_mony>=20000000))){
            $chiec_khau_tong=13;
        }elseif(($Sum_mony>=5000000)&&($Sum_mony<20000000)){
            $chiec_khau_tong=10;
        }
        elseif(($Sum_mony<5000000)&&($Sum_mony>=3000000)){
            $chiec_khau_tong=7;
        }elseif ((($Sum_mony<3000000)&&($Sum_mony>=1500000))){
            $chiec_khau_tong=5;
        }elseif((($Sum_mony<1500000)&&($Sum_mony>=500000))){
            $chiec_khau_tong=3;
        }else{
            $chiec_khau_tong=0;}

        $data['solg_sp']=$Sum_qty;
        $gia_dc=$Sum_mony_1*(100-$chiec_khau_tong)/100;
        if($gia_dc>=$tiencoc) {
            $gia_thu=($Sum_mony_1*(100-$chiec_khau_tong)/100)-$tiencoc;   
            $data['gia_thu']=$gia_thu;
            $tiencl=$tong_tt-$gia_thu;
            $data['tienconlai']=$tiencl;    
            $data['trangthai']=0;
            if ($tiencl==0) {
                $status['trangthai']=2;
                DB::table('don_dat_hang')->where('ma_ddh',$ma_ddh)->update($status);
            }else{
                $status['trangthai']=1;
                DB::table('don_dat_hang')->where('ma_ddh',$ma_ddh)->update($status); 
        }
        }elseif($gia_dc<$tiencoc){
            $tiencoccon=$tiencoc-($Sum_mony_1*(100-$chiec_khau_tong)/100);   
            $data['gia_thu']=0;
            $tiencl=$tong_tt-$tiencoccon;
            $data['tienconlai']=$tiencl;
            $data['trangthai']=0;
            $status['trangthai']=1;
            if ($tiencl==0) {
                $status['trangthai']=2;
                DB::table('don_dat_hang')->where('ma_ddh',$ma_ddh)->update($status);
            }else{
                $status['trangthai']=1;
                DB::table('don_dat_hang')->where('ma_ddh',$ma_ddh)->update($status); 
            }
        }
        $data['ma_ddh']=$ma_ddh;
        $data['email']=$email;
        DB::table('phieu_giao')->insert($data);
        
        foreach ($order_detail as $key => $value_od) {
            if ($value_od->trang_thai==1){
                $data_delivery['ma_pg']=$ma_pg;
                $data_delivery['ma_sp']=$value_od->ma_sp;
                $data_delivery['mau']=$value_od->ten_mau;
                $data_delivery['size']=$value_od->size;
                $data_delivery['chiet_khau']=$value_od->chiet_khau;
                $data_delivery['solg']=$value_od->solg_sp;
                $data_delivery['sotien']=$value_od->sotien;
                $Sum_mony_1+=$value_od->sotien;
                $Sum_qty+=$value_od->solg_sp;
                $data_detail['trang_thai']=2;
                DB::table('chi_tiet_don_hang')->where('so_ct',$value_od->so_ct)->update($data_detail);
                DB::table('chi_tiet_phieu_giao')->insert($data_delivery);
            }
        }
            return Redirect::to('/all-delivery-notes');
        }else {
            return Redirect::to('/all-delivery-notes');
        }
            
    }

    //danh sách phiếu giao
    public function all_delivery_notes (){
        if (isset($_GET['date_star_dn'])&&isset($_GET['date_end_dn'])) {
            $date_star = $_GET['date_star_dn'];
            $date_end = $_GET['date_end_dn'];
            $date_star=date('d-m-Y',strtotime($date_star));
            $date_end=date('d-m-Y',strtotime('+1 day',strtotime($date_end)));
            $delivery_id=DB::table('phieu_giao')
            ->where('phieu_giao.nggiao','>=',$date_star)
            ->where('phieu_giao.nggiao','<=',$date_end)
            ->paginate(10);
        }
        elseif(isset($_GET['status_dn'])) {
            $status_dn = $_GET['status_dn'];
            $delivery_id=DB::table('phieu_giao')
            ->where('trangthai',$status_dn)->paginate(10);
        }else{
            $delivery_id=DB::table('phieu_giao')->paginate(10);
        }
        return view('admin.deliverynotes')->with('delivery_id',$delivery_id);
    }

    //chi tiet phiếu giao
    public function deliverynotes_detail($ma_pg){
        $deliverynotes_detail_id=DB::table('chi_tiet_phieu_giao')
        ->where('ma_pg',$ma_pg)->get();
        $product_id=DB::table('san_pham')->get();
        $deliverynotes_id=DB::table('phieu_giao')
        ->join('don_dat_hang','don_dat_hang.ma_ddh','=','phieu_giao.ma_ddh')
        ->join('khach_hang','khach_hang.ma_kh','=','don_dat_hang.ma_kh')
        ->where('phieu_giao.ma_pg',$ma_pg)->get();
        return view('admin.deliverynotes_in')
        ->with('deliverynotes_detail_id',$deliverynotes_detail_id)
        ->with('deliverynotes_id',$deliverynotes_id)
        ->with('product_id',$product_id)
        ;
    }
    
}
