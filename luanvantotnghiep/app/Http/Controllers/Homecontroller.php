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

      $cate_product=DB::table('danh_muc_sp')->where ('trang_thai','0')->orderby('ma_dm','desc')->get();
      $all_product=DB::table('san_pham')->where ('trang_thai','0')->orderby('ma_sp','desc')->limit(4)->get();
        return view('pages.home')->with('cate_product',$cate_product)->with('all_product',$all_product);
    }
     public function search(Request $request){

      $keywords=$request->keywords_submit;
      $cate_product=DB::table('danh_muc_sp')->where ('trang_thai','0')->orderby('ma_dm','desc')->get();
      $search_product=DB::table('san_pham')->where('ten_sp','like','%'. $keywords .'%')->get();


      if ($search_product) {
         return view('pages.search')->with('cate_product',$cate_product)->with('search_product',$search_product);
      }
      else{
        Session::put ('message','san pham tim khong co');
        return view('pages.search');
      }

     }
}
