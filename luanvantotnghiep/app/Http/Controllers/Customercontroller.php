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
         if (isset($_GET['Tien_Tieu'])) {
            $Tien_Tieu=$_GET['Tien_Tieu'];
            if ($Tien_Tieu=="tang") {
             $use_id=DB::table('user')
                ->join('khach_hang','khach_hang.email','=','user.email')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->where('don_dat_hang.trangthai','<>','4')
                ->selectRaw('user.*,Sum(don_dat_hang.tong_tt)as sodatieu')
                ->groupBy('user_id')
                ->orderby('sodatieu','DESC')
                ->paginate(10);     
            }elseif ($Tien_Tieu=="giam") {
               $use_id=DB::table('user')
                ->join('khach_hang','khach_hang.email','=','user.email')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->where('don_dat_hang.trangthai','<>','4')
                ->selectRaw('user.*,Sum(don_dat_hang.tong_tt)as sodatieu')
                ->groupBy('user_id')
                ->orderby('sodatieu','ASC')
                ->paginate(10); 
            }
        }
        elseif (isset($_GET['Sap_Xep_Dia_Chi'])) {
            $Sap_Xep_Dia_Chi=$_GET['Sap_Xep_Dia_Chi'];
            if ($Sap_Xep_Dia_Chi=="Z-A") {
             $use_id=DB::table('user')
                ->join('khach_hang','khach_hang.email','=','user.email')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->where('don_dat_hang.trangthai','<>','4')
                ->selectRaw('user.*,Sum(don_dat_hang.tong_tt)as sodatieu')
                ->groupBy('user_id')
                ->orderby('user.diachi','DESC')
                ->paginate(10);     
            }elseif ($Sap_Xep_Dia_Chi=="A-Z") {
               $use_id=DB::table('user')
                ->join('khach_hang','khach_hang.email','=','user.email')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->where('don_dat_hang.trangthai','<>','4')
                ->selectRaw('user.*,Sum(don_dat_hang.tong_tt)as sodatieu')
                ->groupBy('user_id')
                ->orderby('user.diachi','ASC')
                ->paginate(10); 
            }
        }
        elseif (isset($_GET['Sap_Xep_SDT'])) {
            $Sap_Xep_SDT=$_GET['Sap_Xep_SDT'];
            if ($Sap_Xep_SDT=="Z-A") {
             $use_id=DB::table('user')
                ->join('khach_hang','khach_hang.email','=','user.email')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->where('don_dat_hang.trangthai','<>','4')
                ->selectRaw('user.*,Sum(don_dat_hang.tong_tt)as sodatieu')
                ->groupBy('user_id')
                ->orderby('user.sodt','DESC')
                ->paginate(10);     
            }elseif ($Sap_Xep_SDT=="A-Z") {
               $use_id=DB::table('user')
                ->join('khach_hang','khach_hang.email','=','user.email')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->where('don_dat_hang.trangthai','<>','4')
                ->selectRaw('user.*,Sum(don_dat_hang.tong_tt)as sodatieu')
                ->groupBy('user_id')
                ->orderby('user.sodt','ASC')
                ->paginate(10); 
            }
        }
        elseif (isset($_GET['Sap_Xep_Email'])) {
            $Sap_Xep_Email=$_GET['Sap_Xep_Email'];
            if ($Sap_Xep_Email=="Z-A") {
             $use_id=DB::table('user')
                ->join('khach_hang','khach_hang.email','=','user.email')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->where('don_dat_hang.trangthai','<>','4')
                ->selectRaw('user.*,Sum(don_dat_hang.tong_tt)as sodatieu')
                ->groupBy('user_id')
                ->orderby('user.email','DESC')
                ->paginate(10);     
            }elseif ($Sap_Xep_Email=="A-Z") {
               $use_id=DB::table('user')
                ->join('khach_hang','khach_hang.email','=','user.email')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->where('don_dat_hang.trangthai','<>','4')
                ->selectRaw('user.*,Sum(don_dat_hang.tong_tt)as sodatieu')
                ->groupBy('user_id')
                ->orderby('user.email','ASC')
                ->paginate(10); 
            }
        }
        elseif (isset($_GET['Sap_Xep_Ten'])) {
            $Sap_Xep_Ten=$_GET['Sap_Xep_Ten'];
            if ($Sap_Xep_Ten=="Z-A") {
             $use_id=DB::table('user')
                ->join('khach_hang','khach_hang.email','=','user.email')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->where('don_dat_hang.trangthai','<>','4')
                ->selectRaw('user.*,Sum(don_dat_hang.tong_tt)as sodatieu')
                ->groupBy('user_id')
                ->orderby('user.ten_nd','DESC')
                ->paginate(10);     
            }elseif ($Sap_Xep_Ten=="A-Z") {
               $use_id=DB::table('user')
                ->join('khach_hang','khach_hang.email','=','user.email')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->where('don_dat_hang.trangthai','<>','4')
                ->selectRaw('user.*,Sum(don_dat_hang.tong_tt)as sodatieu')
                ->groupBy('user_id')
                ->orderby('user.ten_nd','ASC')
                ->paginate(10); 
            }
        }
        elseif (isset($_GET['keywords_search'])) {
            $keyword=$_GET['keywords_search'];
            $use_id=DB::table('user')
            ->join('khach_hang','khach_hang.email','=','user.email')
            ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
            ->where('don_dat_hang.trangthai','<>','4')
            ->selectRaw('user.*,Sum(don_dat_hang.tong_tt)as sodatieu')
            ->groupBy('user_id')
            ->where('user.ten_nd','like','%'. $keyword .'%')
            ->orwhere('user.diachi','like','%'. $keyword .'%')
            ->orwhere('user.email','like','%'. $keyword .'%')
            ->orwhere('user.sodt','like','%'. $keyword .'%')
            ->paginate(10);
        }else{
            $use_id=DB::table('user')
            ->join('khach_hang','khach_hang.email','=','user.email')
            ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
            ->where('don_dat_hang.trangthai','<>','4')
            ->selectRaw('user.*,Sum(don_dat_hang.tong_tt)as sodatieu')
            ->groupBy('user_id')
            ->orderby('sodatieu','ASC')
            ->paginate(10);
        }
        $order_id=DB::table('don_dat_hang')->get();
        return view('admin.Customer.customer_all')
        ->with('use_id',$use_id)
        ->with('order_id',$order_id)
        ;

    }
    public function customer_address($email){
         if (isset($_GET['Tong_Phi_Giao'])) {
            $Tong_Phi_Giao=$_GET['Tong_Phi_Giao'];
            if ($Tong_Phi_Giao=="tang") {
                 $customer_id=DB::table('khach_hang')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->selectRaw('Sum(don_dat_hang.solg_sp)as solgsp,khach_hang.*,count(don_dat_hang.ma_ddh) as sodon,Sum(don_dat_hang.tong_tt) as tongmua,Sum(don_dat_hang.phigiao)as tonggiao')
                ->groupBy('khach_hang.ma_kh')
                ->where('khach_hang.email',$email)
                ->orderby('tonggiao','ASC')
                ->paginate(5);   
            }
            elseif ($Tong_Phi_Giao=="giam") {
                 $customer_id=DB::table('khach_hang')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->selectRaw('Sum(don_dat_hang.solg_sp)as solgsp,khach_hang.*,count(don_dat_hang.ma_ddh) as sodon,Sum(don_dat_hang.tong_tt) as tongmua,Sum(don_dat_hang.phigiao)as tonggiao')
                ->groupBy('khach_hang.ma_kh')
                ->where('khach_hang.email',$email)
                ->orderby('tonggiao','DESC')
                ->paginate(5);
            }
        }
        elseif (isset($_GET['Tong_Mua_Sap'])) {
            $Tong_Mua_Sap=$_GET['Tong_Mua_Sap'];
            if ($Tong_Mua_Sap=="tang") {
                 $customer_id=DB::table('khach_hang')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->selectRaw('Sum(don_dat_hang.solg_sp)as solgsp,khach_hang.*,count(don_dat_hang.ma_ddh) as sodon,Sum(don_dat_hang.tong_tt) as tongmua,Sum(don_dat_hang.phigiao)as tonggiao')
                ->groupBy('khach_hang.ma_kh')
                ->where('khach_hang.email',$email)
                ->orderby('tongmua','ASC')
                ->paginate(5);   
            }
            elseif ($Tong_Mua_Sap=="giam") {
                 $customer_id=DB::table('khach_hang')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->selectRaw('Sum(don_dat_hang.solg_sp)as solgsp,khach_hang.*,count(don_dat_hang.ma_ddh) as sodon,Sum(don_dat_hang.tong_tt) as tongmua,Sum(don_dat_hang.phigiao)as tonggiao')
                ->groupBy('khach_hang.ma_kh')
                ->where('khach_hang.email',$email)
                ->orderby('tongmua','DESC')
                ->paginate(5);
            }
        }
        elseif (isset($_GET['Tong_San_Pham'])) {
            $Tong_San_Pham=$_GET['Tong_San_Pham'];
            if ($Tong_San_Pham=="tang") {
                 $customer_id=DB::table('khach_hang')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->selectRaw('Sum(don_dat_hang.solg_sp)as solgsp,khach_hang.*,count(don_dat_hang.ma_ddh) as sodon,Sum(don_dat_hang.tong_tt) as tongmua,Sum(don_dat_hang.phigiao)as tonggiao')
                ->groupBy('khach_hang.ma_kh')
                ->where('khach_hang.email',$email)
                ->orderby('solgsp','ASC')
                ->paginate(5);   
            }
            elseif ($Tong_San_Pham=="giam") {
                 $customer_id=DB::table('khach_hang')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->selectRaw('Sum(don_dat_hang.solg_sp)as solgsp,khach_hang.*,count(don_dat_hang.ma_ddh) as sodon,Sum(don_dat_hang.tong_tt) as tongmua,Sum(don_dat_hang.phigiao)as tonggiao')
                ->groupBy('khach_hang.ma_kh')
                ->where('khach_hang.email',$email)
                ->orderby('solgsp','DESC')
               ->paginate(5);
            }
        }
        elseif (isset($_GET['Tong_Don'])) {
            $Tong_Don=$_GET['Tong_Don'];
            if ($Tong_Don=="tang") {
                 $customer_id=DB::table('khach_hang')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->selectRaw('Sum(don_dat_hang.solg_sp)as solgsp,khach_hang.*,count(don_dat_hang.ma_ddh) as sodon,Sum(don_dat_hang.tong_tt) as tongmua,Sum(don_dat_hang.phigiao)as tonggiao')
                ->groupBy('khach_hang.ma_kh')
                ->where('khach_hang.email',$email)
                ->orderby('sodon','ASC')
                ->paginate(5);   
            }
            elseif ($Tong_Don=="giam") {
                 $customer_id=DB::table('khach_hang')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->selectRaw('Sum(don_dat_hang.solg_sp)as solgsp,khach_hang.*,count(don_dat_hang.ma_ddh) as sodon,Sum(don_dat_hang.tong_tt) as tongmua,Sum(don_dat_hang.phigiao)as tonggiao')
                ->groupBy('khach_hang.ma_kh')
                ->where('khach_hang.email',$email)
                ->orderby('sodon','DESC')
                ->paginate(5);
            }
        }
        elseif (isset($_GET['Sap_Xep_DC'])) {
            $Sap_Xep_DC=$_GET['Sap_Xep_DC'];
            if ($Sap_Xep_DC=="Z-A") {
            $customer_id=DB::table('khach_hang')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->selectRaw('Sum(don_dat_hang.solg_sp)as solgsp,khach_hang.*,count(don_dat_hang.ma_ddh) as sodon,Sum(don_dat_hang.tong_tt) as tongmua,Sum(don_dat_hang.phigiao)as tonggiao')
                ->groupBy('khach_hang.ma_kh')
                ->where('khach_hang.email',$email)
                ->orderby('khach_hang.diachi','ASC')
                ->paginate(5);   
            }elseif ($Sap_Xep_DC=="A-Z") {
               $customer_id=DB::table('khach_hang')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->selectRaw('Sum(don_dat_hang.solg_sp)as solgsp,khach_hang.*,count(don_dat_hang.ma_ddh) as sodon,Sum(don_dat_hang.tong_tt) as tongmua,Sum(don_dat_hang.phigiao)as tonggiao')
                ->groupBy('khach_hang.ma_kh')
                ->where('khach_hang.email',$email)
                ->orderby('khach_hang.diachi','DESC')
                ->paginate(5);  
            }
        }
        elseif (isset($_GET['Sap_Xep_SDT'])) {
            $Sap_Xep_SDT=$_GET['Sap_Xep_SDT'];
            if ($Sap_Xep_SDT=="Z-A") {
            $customer_id=DB::table('khach_hang')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->selectRaw('Sum(don_dat_hang.solg_sp)as solgsp,khach_hang.*,count(don_dat_hang.ma_ddh) as sodon,Sum(don_dat_hang.tong_tt) as tongmua,Sum(don_dat_hang.phigiao)as tonggiao')
                ->groupBy('khach_hang.ma_kh')
                ->where('khach_hang.email',$email)
                ->orderby('khach_hang.sodt','ASC')
                ->paginate(5);     
            }elseif ($Sap_Xep_SDT=="A-Z") {
               $customer_id=DB::table('khach_hang')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->selectRaw('Sum(don_dat_hang.solg_sp)as solgsp,khach_hang.*,count(don_dat_hang.ma_ddh) as sodon,Sum(don_dat_hang.tong_tt) as tongmua,Sum(don_dat_hang.phigiao)as tonggiao')
                ->groupBy('khach_hang.ma_kh')
                ->where('khach_hang.email',$email)
                ->orderby('khach_hang.sodt','DESC')
                ->paginate(5);  
            }
        }
        elseif (isset($_GET['Sap_Xep_Ten'])) {
            $Sap_Xep_Ten=$_GET['Sap_Xep_Ten'];
            if ($Sap_Xep_Ten=="Z-A") {
                $customer_id=DB::table('khach_hang')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->selectRaw('Sum(don_dat_hang.solg_sp)as solgsp,khach_hang.*,count(don_dat_hang.ma_ddh) as sodon,Sum(don_dat_hang.tong_tt) as tongmua,Sum(don_dat_hang.phigiao)as tonggiao')
                ->groupBy('khach_hang.ma_kh')
                ->where('khach_hang.email',$email)
                ->orderby('khach_hang.ten_kh','ASC')
                ->paginate(5);      
            }elseif ($Sap_Xep_Ten=="A-Z") {
                $customer_id=DB::table('khach_hang')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->selectRaw('Sum(don_dat_hang.solg_sp)as solgsp,khach_hang.*,count(don_dat_hang.ma_ddh) as sodon,Sum(don_dat_hang.tong_tt) as tongmua,Sum(don_dat_hang.phigiao)as tonggiao')
                ->groupBy('khach_hang.ma_kh')
                ->where('khach_hang.email',$email)
                ->orderby('khach_hang.ten_kh','DESC')
                ->paginate(5);   
            }
        }
        elseif (isset($_GET['Sap_Xep_Ma'])) {
            $Sap_Xep_Ma=$_GET['Sap_Xep_Ma'];
            if ($Sap_Xep_Ma=="tang") {
                 $customer_id=DB::table('khach_hang')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->selectRaw('Sum(don_dat_hang.solg_sp)as solgsp,khach_hang.*,count(don_dat_hang.ma_ddh) as sodon,Sum(don_dat_hang.tong_tt) as tongmua,Sum(don_dat_hang.phigiao)as tonggiao')
                ->groupBy('khach_hang.ma_kh')
                ->where('khach_hang.email',$email)
                ->orderby('khach_hang.ma_kh','ASC')
                ->paginate(5);   
            }
            elseif ($Sap_Xep_Ma=="giam") {
                 $customer_id=DB::table('khach_hang')
                ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
                ->selectRaw('Sum(don_dat_hang.solg_sp)as solgsp,khach_hang.*,count(don_dat_hang.ma_ddh) as sodon,Sum(don_dat_hang.tong_tt) as tongmua,Sum(don_dat_hang.phigiao)as tonggiao')
                ->groupBy('khach_hang.ma_kh')
                ->where('khach_hang.email',$email)
                ->orderby('khach_hang.ma_kh','DESC')
                ->paginate(5);
            }
        }
        else{ 
        $customer_id=DB::table('khach_hang')
        ->join('don_dat_hang','don_dat_hang.ma_kh','=','khach_hang.ma_kh')
        ->selectRaw('Sum(don_dat_hang.solg_sp)as solgsp,khach_hang.*,count(don_dat_hang.ma_ddh) as sodon,Sum(don_dat_hang.tong_tt) as tongmua,Sum(don_dat_hang.phigiao)as tonggiao')
        ->groupBy('khach_hang.ma_kh')
        ->where('khach_hang.email',$email)
        ->paginate(5);
        }
        return view('admin.Customer.customer_address')
        ->with('customer_id',$customer_id);
    }
    

}
