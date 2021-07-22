<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Slider;
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
      $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
      $all_product=DB::table('san_pham')
      ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
      ->join('chi_tiet_san_pham','chi_tiet_san_pham.ma_sp','san_pham.ma_sp')
      ->join('mau','mau.ma_mau','=','chi_tiet_san_pham.ma_mau')
      ->where ('san_pham.trang_thai','1')
      ->orderby('san_pham.thoi_gian','desc')
      ->where('hinh_anh.goc_nhin','0')
      ->groupBy('san_pham.ma_sp')
      ->limit(12)->get();
        //hiện đánh ngoài index kết quả chưa được
      $rating_id= DB::table('danh_gia')->get();
        //hiện đánh ngoài index kết quả chưa được
        return view('pages.Home.home')
        ->with('cate_product',$cate_product)
        ->with('all_product',$all_product)
        ->with('rating_id',$rating_id)
        ->with('design_id',$design_id)
        ->with('slider',$slider)
        
        ;
    }
     //trang gioi thieu
    public function about(){
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
        return view('pages.About.about')->with('cate_product',$cate_product)->with('design_id',$design_id);
    }
    // trang chính sách
    public function policy(){
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
        return view('pages.Policy.policy')->with('cate_product',$cate_product)->with('design_id',$design_id);
    }
}
