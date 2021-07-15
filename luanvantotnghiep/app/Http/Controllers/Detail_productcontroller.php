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
        //
    public function add_detail_product($ma_sp){
        $this->AuthLogin();
        $product_id=DB::table('san_pham')->where('ma_sp',$ma_sp)->orderby('ten_sp','desc')->get();
        $color_id=DB::table('mau')->orderby('ten_mau','desc')->get();
        $size_id=DB::table('size')->orderby('ma_size','desc')->get();
        $detail_product_id=DB::table('chi_tiet_san_pham')->where('ma_sp',$ma_sp)->get();
        return view('admin.detail_product_add')
        ->with('product_id',$product_id)
        ->with('color_id',$color_id)
        ->with('size_id',$size_id)
        ->with('detail_product_id',$detail_product_id);
       
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
        $product_id=DB::table('san_pham')->where('ma_sp',$ma_sp)->get();
        foreach ($product_id as $key => $value_pro) {
            if ($value_pro->ma_sp==$ma_sp) {
                $sum['solg_sp']=$so_lg+$value_pro->solg_sp;
                DB::table('san_pham')
                ->where('ma_sp',$ma_sp)
                ->update($sum);
            }
        }       

        $result=$_SERVER['HTTP_REFERER'];
        return Redirect::to($result);
    }
    public function all_detail_product(){
         $this->AuthLogin();
        $product_id=DB::table('san_pham')->orderby('ten_sp','desc')->get();
        $color_id=DB::table('mau')->orderby('ten_mau','desc')->get();
        
        $all_detail_product=DB::table('chi_tiet_san_pham')->paginate(10);
        return view('admin.detail_product_all')->with('all_detail_product',$all_detail_product)
        ->with('product_id',$product_id)
        ->with('color_id',$color_id)
        ;
    }
    //size
           
    public function add_size_product(){
        $product_id=DB::table('san_pham')->orderby('ten_sp','desc')->get();
        $color_id=DB::table('mau')->orderby('ten_mau','desc')->get();
        $size_id=DB::table('size')->orderby('ma_size','desc')->get();
        return view('admin.detail_product_add')
        ->with('product_id',$product_id)
        ->with('color_id',$color_id)
        ->with('size_id',$size_id);
    }
    public function save_size_product(Request $request){
        $data=array();
        $data['ma_size']=$request->size_key;
        $data['chieu_cao']=$request->chieu_cao;
        $data['can_nang']=$request->can_nang;
        DB::table('size')->insert($data);
        Session::put('message','Thêm size sản phẩm thành công');
        return Redirect::to('/add-size-product');
    }





    //màu
    public function add_color_product(){
         $this->AuthLogin();
        $product_id=DB::table('san_pham')->orderby('ten_sp','desc')->get();
        $color_id=DB::table('mau')->orderby('ten_mau','desc')->get();
        $size_id=DB::table('size')->orderby('ma_size','desc')->get();
        return view('admin.detail_product_add')
        ->with('product_id',$product_id)
        ->with('color_id',$color_id)
        ->with('size_id',$size_id);
    }
    public function save_color_product(Request $request){
        $data=array();
        $data['ten_mau']=$request->color_name;
        DB::table('mau')->insert($data);
        Session::put('message','Thêm màu sản phẩm thành công');
        return Redirect::to('/add-color-product');
       
    }
    
}
