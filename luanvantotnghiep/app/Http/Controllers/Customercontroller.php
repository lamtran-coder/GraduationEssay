s<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class Customercontroller extends Controller
{
    //admin
    public function all_customer(){
        $customer_id=DB::table('khach_hang')->orderby('ma_kh','desc')->get();
        return view('admin.customer_all')->with('customer_id',$customer_id);
    }
    //khách hàng
    

}
