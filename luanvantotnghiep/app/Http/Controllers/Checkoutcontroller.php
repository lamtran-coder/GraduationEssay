<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class Checkoutcontroller extends Controller
{
    public function AuthLogin_user(){
      $email = Session::get('email');
      if($email){
         return Redirect::to('/');
      }else{
         return Redirect::to('/login-user')->send();
      }
    }
    public function show_checkout(){
        $this->AuthLogin_user();
        $cate_product = DB::table('danh_muc_sp')
            ->select('danh_muc')
            ->groupBy('danh_muc')
            ->get();
        $design_id=DB::table('thiet_ke')
          ->join('danh_muc_sp','danh_muc_sp.ma_tk','thiet_ke.ma_tk')->where('danh_muc_sp.trang_thai','1')
          ->groupBy('thiet_ke.ma_tk')
          ->select('thiet_ke.ma_tk','danh_muc_sp.danh_muc','ten_tk')
          ->get();
        $message_id=DB::table('thong_bao')
          ->selectRaw('noi_dung,thoi_gian,user_id')
          ->get();
        $all_product=DB::table('san_pham')->where ('trang_thai','1')
        ->join('hinh_anh','hinh_anh.ma_sp','=','san_pham.ma_sp')
        ->orderby('san_pham.ma_sp','desc')->limit(6)->get(); 
        $customer_id=DB::table('khach_hang')->orderby('ma_kh','desc')->get();
       return view('pages.Checkout.show_checkout')
        ->with('cate_product',$cate_product)
        ->with('all_product',$all_product)
        ->with('design_id',$design_id)
        ->with('customer_id',$customer_id)
        ->with('customer_id',$customer_id)
        ->with('message_id',$message_id);
    }
    public function save_checkout_kh(Request $request){
        $data = array();
        $data ['ten_kh']    = $request->username;
        $data ['sodt']      = $request->phone;
        $data ['diachi']    = $request->address;
        $data ['email']     = $request->email;
        $data ['trangthai'] = 0;
        $data['ma_kh']=rand(0,9999999999) ;
        $customer_id=DB::table('khach_hang')
        ->join('user','user.email','=','khach_hang.email')
        ->get();
        DB::table('khach_hang')->insert($data);
        return Redirect::to('/show-checkout');  
          
   }
   public function delete_checkout_kh($ma_kh){
     DB::table('khach_hang')->where('ma_kh',$ma_kh)->delete();
     return Redirect::to('/show-checkout');
   }
   public function payment(){
     $this->AuthLogin_user();
        if (!isset($_GET['ma_kh_address'])) {
            session::put('message','Vui Chọn Địa Chỉ Giao');
            return Redirect::to('/show-checkout');
        }
        $cate_product = DB::table('danh_muc_sp')
            ->select('danh_muc')
            ->groupBy('danh_muc')
            ->get();
        $design_id=DB::table('thiet_ke')
          ->join('danh_muc_sp','danh_muc_sp.ma_tk','thiet_ke.ma_tk')->where('danh_muc_sp.trang_thai','1')
          ->groupBy('thiet_ke.ma_tk')
          ->select('thiet_ke.ma_tk','danh_muc_sp.danh_muc','ten_tk')
          ->get();
        $message_id=DB::table('thong_bao')
        ->selectRaw('noi_dung,thoi_gian,user_id')
        ->get();
       return view('pages.Payment.payment')
        ->with('cate_product',$cate_product)
        ->with('design_id',$design_id)
        ->with('message_id',$message_id)
        ;
   }
   public function create(Request $request)
    {
        session(['cost_id' => $request->id]);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "UDOPNWS1"; //Mã website tại VNPAY 
        $vnp_HashSecret = "EBAHADUGCOEWYXCMYZRMTMLSHGKNRPBN"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8000/return-vnpay";
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->input('amount') * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }
    public function return(Request $request){
    $url = session('url_prev','/');
    if($request->vnp_ResponseCode == "00") {
        $this->apSer->thanhtoanonline(session('cost_id'));
        return redirect($url)->with('success' ,'Đã thanh toán phí dịch vụ');
    }
    session()->forget('url_prev');
    return redirect($url)->with('errors' ,'Lỗi trong quá trình thanh toán phí dịch vụ');
    }
    
}
