<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class Productcontroller extends Controller
{
    public function add_product(){
        $cate_product=DB::table('danh_muc_sp')->orderby('danh_muc','desc')->get();
        return view('admin.product_add')->with('cate_product',$cate_product);
    }
    public function all_product(){
        return view('admin.product_all');
    }
    public function save_product(Request $request){
        $data=array();
        $data['ma_sp']=$request->product_key;
        $data['ten_sp']=$request->product_name;
        $data['solg_sp']=$request->amount_product;
        $data['gia_goc']=$request->corner_price;
        $data['gia_sale']=$request->sale_pricee;
        $data['trang_thai']=$request->product_status;
        $data['chiet_khau']=$request->discount;
        $data['ma_dm']=$request->category_product_id;
        DB::table('san_pham')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('/add-Category');
    }
}
