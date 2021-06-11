<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class Show_productcontroller extends Controller
{
    public function show_product(){
         $cate_product=DB::table('danh_muc_sp')->where ('trang_thai','0')->orderby('ma_dm','desc')->get();
       
        return view('pages.shop')->with('cate_product',$cate_product);;
    }
}
