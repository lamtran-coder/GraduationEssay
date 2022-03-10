<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\wherein;
session_start();


class Promotioncontroller extends Controller
{
    public function add_promotion(){
        //thong báo
        $solg_messe=DB::table('thong_bao')->selectRaw('count(*)as solg')->where('che_do',null)->get();
        $message_id=DB::table('thong_bao')
        ->selectRaw('noi_dung,thoi_gian,che_do')
        ->orderby('thoi_gian','desc')
        ->get();
        $product_id=DB::table('san_pham')->get();
        return view('admin.Promotion.Promotion_add')
        ->with('message_id',$message_id)
        ->with('solg_messe',$solg_messe)
        ->with('product_id',$product_id);
    }
    public function save_promotion(Request $request){
        $data=array();
        $data['ma_km']=$request->ma_km;
        $data['p_thuc']=$request->p_thuc;
        $data['gia_tri']=$request->gia_tri;
        $data['ma_sp']=$request->ma_sp;
        $data['so_lg']=$request->so_lg;
        $data['ngcap']=$request->ngcap;
        $data['hsd']=$request->hsd;
        DB::table('khuyen_mai')->insert($data);
        return Redirect::to('/add-promotion');
    }
    public function all_promotion(){
        //thong báo
        $solg_messe=DB::table('thong_bao')->selectRaw('count(*)as solg')->where('che_do',null)->get();
        $message_id=DB::table('thong_bao')
        ->selectRaw('noi_dung,thoi_gian,che_do')
        ->orderby('thoi_gian','desc')
        ->get();
        $promotion_id=DB::table('khuyen_mai')->paginate(10);
        return view('admin.Promotion.Promotion_all')
        ->with('message_id',$message_id)
        ->with('solg_messe',$solg_messe)
        ->with('promotion_id',$promotion_id);
    }
}
