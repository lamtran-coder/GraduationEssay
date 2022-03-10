<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class Detail_productcontroller extends Controller
{   

    public function AuthLogin(){
      $email = Session::get('email');
      if($email){
         return Redirect::to('admin.dashboard');
      }else{
         return Redirect::to('admin')->send();
      }
    }
    //chi tiết sản phẩm
    public function add_detail_product($ma_sp){
        $this->AuthLogin();
        $product_id=DB::table('san_pham')->where('ma_sp',$ma_sp)->orderby('ten_sp','desc')->get();
        $color_id=DB::table('mau')->orderby('ten_mau','desc')->get();
        $loai=substr($ma_sp,0,2);
        if ($loai=='AO') {
            $size_id=DB::table('size')
            ->where('ma_size','regexp',"^[a-z ,.'-]")
            ->orderby('ma_size','desc')
            ->get();
        }elseif($loai=='PK'){
            $size_id=DB::table('size')
            ->where('ma_size','regexp',"[0-9]")
            ->orderby('ma_size','desc')
            ->get();
        }
        else{
            $size_id=DB::table('size')
            ->where('ma_size','regexp',"[0-9]")
            ->where('ma_size','>','0')
            ->orderby('ma_size','desc')
            ->get();
        }
        $detail_product_id=DB::table('chi_tiet_san_pham')->where('ma_sp',$ma_sp)->get();
        //thong báo
        $solg_messe=DB::table('thong_bao')->selectRaw('count(*)as solg')->where('che_do',null)->get();
        $message_id=DB::table('thong_bao')
        ->selectRaw('noi_dung,thoi_gian,che_do')
        ->orderby('thoi_gian','desc')
        ->get();
        return view('admin.Detail_product.detail_product_add')
        ->with('product_id',$product_id)
        ->with('color_id',$color_id)
        ->with('size_id',$size_id)
        ->with('detail_product_id',$detail_product_id)
        ->with('solg_messe',$solg_messe)
        ->with('message_id',$message_id);
       
    }
        //lưu 
    public function save_detail_product(Request $request){
        $data=array();
        $data['ma_sp']=$request->ct_sp;
        $result=$request->ct_sp;
        $data['ma_mau']=$request->ct_mau;
        $data['ma_size']=$request->ct_size;
        $data['so_lg']=$request->solg_sp;
        $solg_update=DB::table('san_pham')->get();
            foreach ($solg_update as $key => $value) {
                if($value->ma_sp==$result){
                    $sum_sl['solg_sp']=$value->solg_sp+$request->solg_sp;
                    DB::table('san_pham')->where('ma_sp',$result)->update($sum_sl);
                }
            }
        DB::table('chi_tiet_san_pham')->insert($data);
        Session::put('message','Thêm chi tiet sản phẩm thành công');
        $result=$_SERVER['HTTP_REFERER'];
        return Redirect::to($result);
    }
    public function update_amount(Request $request,$ma_sp){
        
        $data=array();
        $so_lg=$request->so_lg;
        $ma_mau=$request->ma_mau_h;
        $ma_size=$request->ma_size_h;
        $detail_amount=DB::table('chi_tiet_san_pham')->where('ma_sp',$ma_sp)->get();
        foreach ($detail_amount as $key => $value) {
            if (($value->ma_mau==$ma_mau)&&($value->ma_size==$ma_size)) {
                $result['so_lg']=$value->so_lg+$so_lg;
                DB::table('chi_tiet_san_pham')
                ->where('ma_sp',$ma_sp)
                ->where('ma_mau',$ma_mau)
                ->where('ma_size',$ma_size)
                ->update($result);
                           
            }
        }
        $result=$_SERVER['HTTP_REFERER'];
        return Redirect::to($result);
    }
    
    public function save_size_product(Request $request){
        $data=array();
        $data['ma_size']=$request->size_key;
        $data['chieu_x']=$request->chieu_cao;
        $data['chieu_y']=$request->can_nang;
        DB::table('size')->insert($data);
        $result=$_SERVER['HTTP_REFERER'];
        return Redirect::to($result);
    }

    //màu
    public function save_color_product(Request $request){
        $data=array();
        $data['ten_mau']=$request->color_name;
        DB::table('mau')->insert($data);
        $result=$_SERVER['HTTP_REFERER'];
        return Redirect::to($result);
       
    }
    
}
