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
        $request->validate([
            'size_hidden'=>'required',
            'mau_hidden'=>'required',
            'quantity_h'=>'required'
        ],['size_hidden.required'=>'Vui Lòng Chọn Size',
          'mau_hidden.required'=>'Vui Lòng Chọn Màu',
          'quantity_h.required'=>'Vui Lòng Chọn Số Lượng'
        ]);
        $ma_sp_h=$request->masp_hidden;
        $ma_size_h=$request->size_hidden;
        $mau_h=$request->mau_hidden;
        $quantity_h=$request->quantity_h;
        $product_info=DB::table('san_pham')
        ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','=','san_pham.ma_sp')
        ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
        ->join('mau','mau.ma_mau','=','chi_tiet_san_pham.ma_mau')
        ->where('chi_tiet_san_pham.ma_size',$ma_size_h)
        ->where('mau.ten_mau',$mau_h)
        ->where('chi_tiet_san_pham.so_lg','>=',$quantity_h)
        ->where('chi_tiet_san_pham.ma_sp',$ma_sp_h)
        ->first();
        if (isset($product_info)) {
        $data['id']=$product_info->ma_sp;
        $data['qty']=$quantity_h;
        $data['name']=$product_info->ten_sp;
        $data['price']=$product_info->gia_sale;
        $data['weight']=0;
        $data['options']['chiet_khau']=$product_info->chiet_khau;
        $data['options']['so_lg']=$product_info->so_lg;
        $data['options']['anh']=$product_info->hinhanh;
        $data['options']['ma_size']=$product_info->ma_size;
        $data['options']['ten_mau']=$product_info->ten_mau;
        Cart::add($data);   
        }
        $result=$_SERVER['HTTP_REFERER'];
        return Redirect::to($result);
    }

    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        $result=$_SERVER['HTTP_REFERER'];
        return Redirect::to($result);
    }
    public function update_qty_cart(Request $request){
        $rowId=$request->rowId_cart;
        $qty=$request->cart_quantity;
        $quantity_sum=$request->quantity_sum;
        if ($quantity_sum<$qty) {
            Session::put('quasoluong','Quá Số Lượng <br>'.$quantity_sum);
            $result=$_SERVER['HTTP_REFERER'];
            return Redirect::to($result);
        }
        Cart::update($rowId,$qty);
        $result=$_SERVER['HTTP_REFERER'];
        return Redirect::to($result);
    }
    public function show_cart(){
        $cate_product = DB::table('danh_muc_sp')
            ->select('danh_muc')
            ->groupBy('danh_muc')
            ->get();
        $design_id=DB::table('thiet_ke')
          ->join('danh_muc_sp','danh_muc_sp.ma_tk','thiet_ke.ma_tk')->where('danh_muc_sp.trang_thai','1')
          ->groupBy('thiet_ke.ma_tk')
          ->select('thiet_ke.ma_tk','danh_muc_sp.danh_muc','ten_tk')
          ->get();
        $message_id=DB::table('thong_bao')
      ->selectRaw('noi_dung,thoi_gian,user_id')
      ->get();
        $all_product=DB::table('san_pham')->where ('trang_thai','1')
        ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
        ->orderby('san_pham.ma_sp','desc')->get(); 
        $all_img=DB::table('hinh_anh')->get();
        return view('pages.Cart.show_cart')
        ->with('cate_product',$cate_product)
        ->with('design_id',$design_id)
        ->with('all_product',$all_product)
        ->with('message_id',$message_id);
    }
    
}
