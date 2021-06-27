<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class Cartcontroller extends Controller
{
    public function save_cart(Request $request)
    {
        $ma_sp_h=$request->masp_hidden;
        $ma_size_h=$request->size_hidden;
        $mau_h=$request->mau_hidden;
        $quantity=1;
        $product_info=DB::table('san_pham')
        ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','=','san_pham.ma_sp')
        ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
        ->where('san_pham.ma_sp',$ma_sp_h)
        ->first();

        echo"<pre>";
        print_r($product_info);
        echo"</pre>";

        $data['id']=$product_info->ma_sp;
        $data['qty']=$quantity;
        $data['name']=$product_info->ten_sp;
        $data['price']=$product_info->gia_sale;
        $data['options']['chiet_khau']=$product_info->chiet_khau;
        $data['options']['anh']=$product_info->hinhanh;
        $data['options']['ma_size']=$ma_size_h;
        $data['options']['ten_mau']=$mau_h;
        Cart::add($data);

        return Redirect::to('/product-details/'.$ma_sp_h);
    }

    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        $result=$_SERVER['HTTP_REFERER'];
        return Redirect::to($result);
    }
    public function update_qty_cart(Request $request){
        $rowId=$request->rowId_cart;
        $qty=$request->cart_quantity;
        Cart::update($rowId,$qty);
        $result=$_SERVER['HTTP_REFERER'];
          return Redirect::to($result);
    }
    public function show_cart(){
        $cate_product=DB::table('danh_muc_sp')
        ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
        ->where ('trang_thai','1')
        ->orderby('danh_muc_sp.ma_dm','desc')->get();
         $all_product=DB::table('san_pham')->where ('trang_thai','1')
        ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
        ->orderby('san_pham.ma_sp','desc')->get(); 
        $all_img=DB::table('hinh_anh')->get();
        return view('pages.show_cart')
        ->with('cate_product',$cate_product)
        ->with('all_product',$all_product);
    }
    
}
