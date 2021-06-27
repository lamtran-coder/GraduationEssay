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

      $cate_product=DB::table('danh_muc_sp')
      ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
      ->where ('danh_muc_sp.trang_thai','1')
      ->orderby('danh_muc_sp.ma_dm','desc')->get();
      $design_id=DB::table('thiet_ke')
      ->get();
      $all_product=DB::table('san_pham')
      ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
      ->where('hinh_anh.goc_nhin','0')
      ->where ('san_pham.trang_thai','1')
      ->orderby('san_pham.ma_sp','desc')->limit(6)->get();
        return view('pages.home')
        ->with('cate_product',$cate_product)
        ->with('all_product',$all_product)
        ->with('design_id',$design_id)
        ;
    }
     public function search(Request $request){

      $keywords=$request->keywords_submit;
      $cate_product=DB::table('danh_muc_sp')
      ->join('thiet_ke','thiet_ke.ma_tk','=','danh_muc_sp.ma_tk')
      ->where ('trang_thai','1')
      ->orderby('ma_dm','desc')->get();
      $search_product=DB::table('san_pham')
      ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
      ->where('ten_sp','like','%'. $keywords .'%')->get();
      $all_material=DB::table('chat_lieu')->orderby('ma_cl','desc')->get();
      $all_style=DB::table('thiet_ke')->orderby('ma_tk','desc')->get();
      $all_color=DB::table('mau')->orderby('ma_mau','desc')->get();


      if ($search_product) {
         return view('pages.search')
         ->with('cate_product',$cate_product)
         ->with('all_material',$all_material)
         ->with('all_style',$all_style)
         ->with('all_color',$all_color)
         ->with('search_product',$search_product);
      }
      else{
        return view('pages.search');
      }

     }
}
