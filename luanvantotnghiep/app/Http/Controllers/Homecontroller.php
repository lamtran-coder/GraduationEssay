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
        $cate_product_id=DB::table('danh_muc_sp')->orderby('danh_muc','desc')->get();
        return view('pages.home')->with('cate_product_id',$cate_product_id);
    }
}
