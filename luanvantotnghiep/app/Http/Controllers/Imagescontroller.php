<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class Imagescontroller extends Controller
{
    public function add_images_product(){
        $product_id=DB::table('san_pham')->orderby('ten_sp','desc')->get();
        return view('admin.images_product_add')->with('product_id',$product_id);
    }

    public function all_images_product(){
        return view('admin.images_product_all');
    }
    public function save_images_product(Request $request){
        $data=array();
        $data['goc_nhin']=$request->images_view;
        $data['ma_sp']=$request->product_images_id;

        $get_images=$request->file('images_pro');

        if($get_images){
            $get_images_name=$get_images->getClientOriginalName();
            $name_imgages=current(explode('.',$get_images_name));
            $new_images=$name_imgages.'-'.rand(0,9999).'.'.$get_images->getClientOriginalExtension();
            $get_images->move('public/uploads/product',$new_images);
            $data['hinhanh'] = $new_images; 
            DB::table('hinh_anh')->insert($data);
            Session::put('message','Thêm hinh ảnh sản phẩm thành công');
            return Redirect::to('/add-images-product');
        }
        else{
            Session::put('message','Thêm hình ảnh sản phẩm không thành công');
            return Redirect::to('/add-images-product');
        }
        
    }
}
