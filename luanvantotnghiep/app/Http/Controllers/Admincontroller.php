<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Visitors;
use App\Models\Phan_tich_so_lieu;
use Carbon\Carbon;
use App\Http\Requests;

use App\Models\Social; //sử dụng model Social
use Socialite; //sử dụng Socialite
use App\Models\Login; //sử dụng model Login

use Illuminate\Support\Facades\Redirect;
session_start();
class Admincontroller extends Controller
{   public function AuthLogin(){
      $email = Session::get('email');
      if($email){
         return Redirect::to('admin.dashboard');
      }else{
         return Redirect::to('admin')->send();
      }
    }

    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        
        $account = Social::where('provider','facebook')
        ->where('provider_user_id',$provider->getId())
        ->first();

        if($account){
            //login in vao trang quan tri  
            $account_name = Login::where('email',$account->user)->first();
            if ($account_name) {
               Session::put('ten',$provider->getName());
                Session::put('email',$provider->getEmail());
                return Redirect::to('/dashboard');
            }echo 'không đăng nhập được';
           
        }else{
            $data=array();
            $data['user']=$provider->getEmail();
            $data['provider_user_id'] = $provider->getId();
            $data['provider']= 'facebook';
            DB::table('tbl_social')->insert($data);
            

            $orang = Login::where('email',$provider->getEmail())->first();
            
            if(!$orang){
                $data_ad=array();
                $data_ad['email']=$provider->getEmail();
                $data_ad['ten'] = $provider->getName();
                $data_ad['matkhau']= '';
                $data_ad['tg_tao']= date('YmdHis');
                DB::table('admin')->insert($data_ad);

                Session::put('ten',$provider->getName());
                Session::put('email',$provider->getEmail());
                return Redirect::to('/dashboard');

            }else{
                Session::put('ten',$provider->getName());
                Session::put('email',$provider->getEmail());
                return Redirect::to('/dashboard');
            }
        } 
    }


    public function login_google(){
        return Socialite::driver('google')->redirect();
   }
public function callback_google(){
        $users = Socialite::driver('google')->stateless()->user(); 
        // echo "<pre>";
        // print_r($users);
        // echo "</pre";

        $account=DB::table('tbl_social')->where('provider','google')
        ->where('provider_user_id',$users->getId())->first();
        if (isset($account)) {
            $account_name = Login::where('email',$account->user)->first();
            if ($account_name) {
                Session::put('ten',$users->getName());
                Session::put('email',$users->getEmail());
                return Redirect::to('/dashboard');
            }
            else{return Redirect::to('/admin');}

        }
        else{
        $ad_id=DB::table('admin')->where('email',$users->getEmail())->first();

        //nếu không tồn tại email trong admin thì thêm new ac
        if (!$ad_id) {
            $data_ad=array();
            $data_ad['email']=$users->getEmail();
            $data_ad['ten'] = $users->getName();
            $data_ad['matkhau']= '';
            $data_ad['tg_tao']= date('YmdHis');
            DB::table('admin')->insert($data_ad);
        }
        //nếu     
        if ($ad_id) {
            $data_gg=array();
            $data_gg['user']=$users->getEmail();
            $data_gg['provider']='google';
            $data_gg['provider_user_id']=$users->getId();
            DB::table('tbl_social')->insert($data_gg);         
        }else{
            return Redirect::to('/admin');
        }
        Session::put('ten',$users->getName());
        Session::put('email',$users->getEmail());
        return Redirect::to('/dashboard');
        } 
    }
   




    public function index(){
      
        return view('admin_login');
    }

    public function show_dashboard(Request $request) {
        $this->AuthLogin();
        $user_ip_address = $request->ip(); 
        $early_last_month = Carbon::now('Asia/Ho_Chi_Minh')
        ->subMonth()->startOfMonth()->toDateString();

        $end_of_last_month = Carbon::now('Asia/Ho_Chi_Minh')
        ->subMonth()->endOfMonth()->toDateString();

        $early_this_month = Carbon::now('Asia/Ho_Chi_Minh')
        ->startOfMonth()->toDateString();

        $oneyears = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            //total last month
        $visitor_of_lastmonth = Visitors::whereBetween('date_visitor',[$early_last_month,$end_of_last_month])->get(); 
        $visitor_last_month_count = $visitor_of_lastmonth->count();

            //total this month
        $visitor_of_thismonth = Visitors::whereBetween('date_visitor',[$early_this_month,$now])->get(); 
        $visitor_this_month_count = $visitor_of_thismonth->count();

            //total in one year
        $visitor_of_year = Visitors::whereBetween('date_visitor',[$oneyears,$now])->get(); 
        $visitor_year_count = $visitor_of_year->count();

            //total visitors
        $visitors = Visitors::all();
        $visitors_total = $visitors->count();

            //current online
        $visitors_current = Visitors::where('ip_address',$user_ip_address)->get();  
        $visitor_count = $visitors_current->count();

        if($visitor_count<1){
            $visitor = new Visitors();
            $visitor->ip_address = $user_ip_address;
            $visitor->date_visitor = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $visitor->save();
        }
            //total 
        $comment= $request->all(); 
        $product= $request->all(); 
        $order= $request->all(); 
        $customer= $request->all(); 
      
        $order = DB::table('don_dat_hang')->count();
        $customer =DB::table('khach_hang')->count();
        $comment=DB::table('binh_luan')->count();
        $product=DB::table('san_pham')->count();
        
        //thong báo
        $solg_messe=DB::table('thong_bao')
        ->selectRaw('count(*)as solg')->where('che_do',null)->get();
        $message_id=DB::table('thong_bao')
        ->selectRaw('noi_dung,thoi_gian,che_do')
        ->orderby('thoi_gian','desc')
        ->get();
        //Thông kê Trang Thái
        $Dangxuly=DB::table('don_dat_hang')->where('trangthai','0')->count();
        $Cholayhang=DB::table('don_dat_hang')->where('trangthai','1')->count();
        $Danggiao=DB::table('don_dat_hang')->where('trangthai','2')->count();
        $Danhan=DB::table('don_dat_hang')->where('trangthai','3')->count();
        $Dahuy=DB::table('don_dat_hang')->where('trangthai','4')->count();
        return view('admin.dashboard')
        ->with(compact('visitors_total','visitor_count','visitor_last_month_count','visitor_this_month_count','visitor_year_count','product','comment','order','customer'))
        ->with('message_id',$message_id)
        ->with('solg_messe',$solg_messe)
        ->with('Dangxuly',$Dangxuly)
        ->with('Cholayhang',$Cholayhang)
        ->with('Danggiao',$Danggiao)
        ->with('Danhan',$Danhan)
        ->with('Dahuy',$Dahuy);
    }
    public function dashboard(Request $request){

        $request->validate([
            'email'=>'required|email',
            'matkhau'=>'required|min:6|max:255'
        ],[
            'email.required'=>'Email không để trống',
            'email.email'=>'Email không hợp lệ',
            'matkhau.required'=>'Mât khẩu không để trống',
            'matkhau.min'=>'Mât khẩu ít nhất 6 ký tự',
            'matkhau.max'=>'Mât khẩu nhiều nhất 255 ký tự'

        ]);
    
        $email=$request->email;
        $matkhau=md5($request->matkhau);
        $result=DB::table('admin')->where('email',$email)->where('matkhau',$matkhau)->first();
        if($result){
            session::put('ten',$result->ten);
            session::put('sodt',$result->sodt);
            session::put('email',$result->email);
            session::put('tg_tao',$result->tg_tao);
            session::put('diachi',$result->diachi);
            
            return Redirect::to('/dashboard');}
        else{
            session::put('message','Mật khẩu hoặc email sai. Vui lòng nhập lại');
            return Redirect::to('/admin');
        }
        
        
    }
    public function logout(){
        session::put('ten',null);
        session::put('tg_tao',null);
        session::put('email',null);
        return Redirect::to('/admin');
    }
    //thông tin cá nhân
    public function personal_information(){
        $this->AuthLogin();
            //thong báo
        $solg_messe=DB::table('thong_bao')->selectRaw('count(*)as solg')->where('che_do',null)->get();
        $message_id=DB::table('thong_bao')
        ->selectRaw('noi_dung,thoi_gian,che_do')
        ->orderby('thoi_gian','desc')
        ->get();
        $admin_id=DB::table('admin')->get();
      return view('admin.personal_information')
      ->with('admin_id',$admin_id)
      ->with('solg_messe',$solg_messe)
      ->with('message_id',$message_id); 
    
    }
    public function update_name(Request $request,$email){
        $data=array();
        $data['ten']=$request->name_admin;
        DB::table('admin')->where('email',$email)->update($data);
        return Redirect::to('/trang-ca-nhan');
    }
    public function update_phone(Request $request,$email){
        $data=array();
        $data['sodt']=$request->name_phone;
        DB::table('admin')->where('email',$email)->update($data);
        return Redirect::to('/trang-ca-nhan');
    }
    public function update_address(Request $request,$email){
        $data=array();
        $data['diachi']=$request->name_address;
        DB::table('admin')->where('email',$email)->update($data);
        return Redirect::to('/trang-ca-nhan');
    }
    public function update_password(Request $request,$email){

        $matkhau=md5($request->passwordold);
        $result=DB::table('admin')->where('email',$email)->where('matkhau',$matkhau)->first();
        if ($result) {
            $data=array();
            if ($request->passwordnew==$request->passwordnew2) {
                  $data['matkhau']=md5($request->passwordnew);
                  DB::table('admin')->where('email',$email)->where('matkhau',$matkhau)->update($data);
            return Redirect::to('/trang-ca-nhan');
            }  
        }
        
        
    }
    //Biểu Đồ Thống kê doanh số theo tháng Lọc theo khoảng thời gian
    public function loc_theo_ngay(Request $request){
        $data=$request->all();
        $from_date=$data['from_date'];
        $to_date=$data['to_date'];
        $from_date=date('Y-m-d',strtotime($from_date));
        $to_date=date('Y-m-d',strtotime($to_date));
        $get=DB::table('don_dat_hang')
        ->selectRaw('sum(solg_sp)as solg, sum(tong_tt)as banhang, count(ngdat)as tongdon,Sum(phigiao)as phivanchuyen , ngdat')
        ->groupBy('ngdat')
        ->orderby('ngdat','ASC')
        ->get();
        foreach ($get as $key => $val) {
            if (($from_date<=$val->ngdat)&&($to_date>=$val->ngdat)) {
                        $ngdat=date('d-m-Y',strtotime($val->ngdat));
                        $chart_data[]=array(
                        'ngdat'=>$ngdat,
                        'tongdon'=>$val->tongdon,
                        'banhang'=>$val->banhang,
                        'phivanchuyen'=>$val->phivanchuyen,
                        'solg'=>$val->solg

                );
            }
        }
        echo $data=json_encode($chart_data);
    }
    //Biểu Đồ Thống kê doanh số theo tháng Lọc Giá Trị nhiều Ngày
    public function loc_nhieu_ngay(){
        $sub30days = Carbon::now('Asia/Ho_Chi_minh')->subdays(30)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_minh')->toDateString();
       
        $get=DB::table('don_dat_hang')
        ->selectRaw('sum(solg_sp)as solg, sum(tong_tt)as banhang, count(ngdat)as tongdon,Sum(phigiao)as phivanchuyen ,ngdat')
        ->groupBy('ngdat')
        ->orderby('ngdat','ASC')
        ->get();
          foreach ($get as $key => $val) {
                if (($sub30days<=$val->ngdat)&&($now>=$val->ngdat)){
                     $ngdat=date('d-m-Y',strtotime($val->ngdat));
                    $chart_data[]=array(
                            'ngdat'=>$ngdat,
                            'tongdon'=>$val->tongdon,
                            'banhang'=>$val->banhang,
                            'phivanchuyen'=>$val->phivanchuyen,
                            'solg'=>$val->solg

                    );
                }

            }
          echo $data = json_encode($chart_data);
    }
    //Biểu Đồ Thống kê doanh số theo tháng Lọc khoang thoi gian
    public function loc_khoang_thoi_gian(Request $request){

        $data = $request->all();
        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        if($data['dashboard_value']=='7ngay'){
            $get=DB::table('don_dat_hang')
            ->selectRaw('sum(solg_sp)as solg, sum(tong_tt)as banhang, count(ngdat)as tongdon,Sum(phigiao)as phivanchuyen ,ngdat')
            ->groupBy('ngdat')
            ->orderby('ngdat','ASC')
            ->get();
            foreach ($get as $key => $val) {
                if (($sub7days<=$val->ngdat)&&($now>=$val->ngdat)){
                     $ngdat=date('d-m-Y',strtotime($val->ngdat));
                    $chart_data[]=array(
                            'ngdat'=>$ngdat,
                            'tongdon'=>$val->tongdon,
                            'banhang'=>$val->banhang,
                            'phivanchuyen'=>$val->phivanchuyen,
                            'solg'=>$val->solg
                    );
                }
            }
        }elseif($data['dashboard_value']=='12thang'){
            $get=DB::table('don_dat_hang')
            ->selectRaw('sum(solg_sp)as solg, sum(tong_tt)as banhang, count(ngdat)as tongdon,Sum(phigiao)as phivanchuyen ,ngdat')
            ->groupBy('ngdat')
            ->orderby('ngdat','ASC')
            ->get();
            
            foreach ($get as $key => $val) {
                if (($sub365days<=$val->ngdat)&&($now>=$val->ngdat)){ 
                        $ngdat=date('d-m-Y',strtotime($val->ngdat));
                    $chart_data[]=array(
                            'ngdat'=>$ngdat,
                            'tongdon'=>$val->tongdon,
                            'banhang'=>$val->banhang,
                            'phivanchuyen'=>$val->phivanchuyen,
                            'solg'=>$val->solg
                    );
                }
            }
              
        }
        echo $data = json_encode($chart_data);
    }
    //Biểu Đô 10 sản phẩm bán chạy 
    public function banchaytop10(){
        $get=DB::table('chi_tiet_don_hang')
        ->join('san_pham','san_pham.ma_sp','=','chi_tiet_don_hang.ma_sp')
        ->selectRaw('SUM(solg_sp)AS solg,SUM(sotien)AS doanhso,san_pham.ma_sp,san_pham.ten_sp')
        ->groupBy('chi_tiet_don_hang.ma_sp')
        ->orderby('solg','desc')
        ->paginate(10);
        foreach ($get as $key => $val) {
            $chart_data_sp[]=array(
                'ma_sp'=>$val->ten_sp,
                'doanhsosp'=>$val->doanhso,
                'solgsp'=>$val->solg
            );
        }
        echo $data_sp = json_encode($chart_data_sp);
    }
    //Biểu Đô đáng giá nhân viên 
    public function danggianhanvien(){
        $get=DB::table('phieu_giao')
        ->selectRaw('count(*)as solgxl,email')
        ->groupBy('email')
        ->get();
        $admin_name=DB::table('admin')->get();
        foreach ($get as $key => $val) {
            foreach ($admin_name as $key => $val_ad) {
                if ($val->email== $val_ad->email) {   
                    $chart_data_dg[]=array(
                        'tennv'=>$val_ad->ten,
                        'solgxl'=>$val->solgxl
                    );
                }
            }
        }
        echo $data_dg = json_encode($chart_data_dg);
    }

    //Đăng nhập user bằng google
    public function login_user_google(){
        $h=date('Y-m-d');
        echo $h;
    }

}
