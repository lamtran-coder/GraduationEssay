<?php
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
        if (isset($_GET['keywords_search'])) {
            $keyword=$_GET['keywords_search'];
            $use_id=DB::table('user')
            ->orwhere('ten_nd','like','%'. $keyword .'%')
            ->orwhere('sodt','like','%'. $keyword .'%')
            ->orderby('user_id','desc')->paginate(10);
        }else{

        $use_id=DB::table('user')->orderby('user_id','desc')->get();
        }
        $customer_id=DB::table('khach_hang')->orderby('ma_kh','desc')->paginate(10);
        return view('admin.customer_all')
        ->with('customer_id',$customer_id)
        ->with('use_id',$use_id)
        ;

    }
    public function customer_address($email){
        $customer_id=DB::table('khach_hang')->orderby('ma_kh','desc')->where('email',$email)->get();
        $order_id=DB::table('don_dat_hang')->get();
        return view('admin.customer_address')
        ->with('customer_id',$customer_id)
        ->with('order_id',$order_id)
        ;
    }
    //tìm kiếm khách hàng qua tên khách hàng ,so dien thoại
     public function search_customer(Request $request){
         $keywords=$request->keywords_submit;
         $search_cus=DB::table('khach_hang')
         ->where('ten_kh','like','%'. $keywords .'%')
         ->orwhere('sodt','like','%'. $keywords .'%')
         ->orwhere('email','like','%'. $keywords .'%')
         ->get();
          if ($search_cus||$search_cus_1) {
              return view('admin.customer_search')->with('search_cus',$search_cus);
          }else{
            return view('admin.customer_all');
          }
           
       }

}
