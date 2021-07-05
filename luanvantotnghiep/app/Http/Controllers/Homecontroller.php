<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class Homecontroller extends Controller
{
    public function index(){
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
      $all_product=DB::table('san_pham')
      ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
      ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','san_pham.ma_sp')
      ->join('mau','mau.ma_mau','=','chi_tiet_san_pham.ma_mau')
      ->where ('san_pham.trang_thai','1')
      ->orderby('san_pham.gia_sale','desc')
      ->where('hinh_anh.goc_nhin','0')
      ->groupBy('san_pham.ma_sp')
      ->limit(12)->paginate(6);
        //hiện đánh ngoài index kết quả chưa được
      $rating= DB::table('danh_gia')
      ->select('ma_sp','rating')->get();
        //hiện đánh ngoài index kết quả chưa được
        return view('pages.home')
        ->with('cate_product',$cate_product)
        ->with('all_product',$all_product)
        ->with('rating',$rating)
        ->with('design_id',$design_id)
        ;
    }
    // tìm kiếm trên thanh tìm kiếm
     public function search(Request $request){

      $keywords=$request->keywords_submit;
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
      $search_product=DB::table('san_pham')
      ->join('danh_muc_sp','danh_muc_sp.ma_dm','=','san_pham.ma_dm')
      ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
      ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
      ->join('chat_lieu','chat_lieu.ma_cl','=','danh_muc_sp.ma_cl')
      ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','san_pham.ma_sp')
      ->join('mau','mau.ma_mau','=','chi_tiet_san_pham.ma_mau')
      ->where('danh_muc_sp.danh_muc','like','%'. $keywords .'%')
      ->where('san_pham.ten_sp','like','%'. $keywords .'%')
      ->orwhere('thiet_ke.ten_tk','like','%'. $keywords .'%')
      ->orwhere('chat_lieu.ten_cl','like','%'. $keywords .'%')
      ->groupBy('san_pham.ma_sp')
      ->get();
      $all_material=DB::table('chat_lieu')->orderby('ma_cl','desc')->get();
      $all_style=DB::table('thiet_ke')->orderby('ma_tk','desc')->get();
      $all_color=DB::table('mau')->orderby('ma_mau','desc')->get();


      if ($search_product) {
         return view('pages.search')
         ->with('cate_product',$cate_product)
         ->with('all_material',$all_material)
         ->with('design_id',$design_id)
         ->with('all_style',$all_style)
         ->with('all_color',$all_color)
         ->with('search_product',$search_product);
      }
      else{
        return view('pages.search');
      }

     }
}
