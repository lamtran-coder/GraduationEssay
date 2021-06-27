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
    //chi tiết sản phẩm
        //
    public function add_detail_product(){
        $product_id=DB::table('san_pham')->orderby('ten_sp','desc')->get();
        $color_id=DB::table('mau')->orderby('ten_mau','desc')->get();
        $size_id=DB::table('size')->orderby('ma_size','desc')->get();
        return view('admin.detail_product_add')
        ->with('product_id',$product_id)
        ->with('color_id',$color_id)
        ->with('size_id',$size_id);
    }
        //lưu 
    public function save_detail_product(Request $request){
        $data=array();
        $data['ma_sp']=$request->ct_sp;
        $data['ma_mau']=$request->ct_mau;
        $data['ma_size']=$request->ct_size;
        $data['so_lg']=$request->solg_sp;
        // $updatedata['solg_sp']
        DB::table('chi_tiet_san_pham')->insert($data);
        Session::put('message','Thêm chi tiet sản phẩm thành công');
        return Redirect::to('/add-detail-product');
    }
    public function all_detail_product(){
        $product_id=DB::table('san_pham')->orderby('ten_sp','desc')->get();
        $color_id=DB::table('mau')->orderby('ten_mau','desc')->get();
        
        $all_detail_product=DB::table('chi_tiet_san_pham')->get();
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
        $data['ma_mau']=$request->color_key;
        $data['ten_mau']=$request->color_name;
        $data['anh_mh']=$request->images_color;
        $get_img_color=$request->file('images_color');
   

        if($get_img_color){
            $get_img_color_name=$get_img_color->getClientOriginalName();
            $name_imgages=current(explode('.',$get_img_color_name));
            $new_images=$name_imgages.'-'.rand(0,9999).'.'.$get_img_color->getClientOriginalExtension();
            $get_img_color->move('public/uploads/color',$new_images);
            $data['anh_mh'] = $new_images; 
            DB::table('mau')->insert($data);
            Session::put('message','Thêm màu sản phẩm thành công');
            return Redirect::to('/add-color-product');
        }
        else{
            Session::put('message','Thêm màu sản phẩm không thành công');
            return Redirect::to('/add-color-product');
        }
    }
    
}
