<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Visitors;
use App\Models\Phan_tich_so_lieu;
use Carbon\Carbon;
use App\Http\Requests;
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
    public function index(){
      
        return view('admin_login');
    }
    public function show_dashboard(Request $request){
         $this->AuthLogin();
    $user_ip_address = $request->ip(); 
    $early_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();

    $end_of_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

    $early_this_month = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();

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
    
    return view('admin.dashboard')
    ->with(compact('visitors_total','visitor_count','visitor_last_month_count','visitor_this_month_count','visitor_year_count','product','comment','order','customer'))
    ;
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
        $admin_id=DB::table('admin')->get();
      return view('admin.personal_information')
      ->with('admin_id',$admin_id); 
    
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
    public function loc_theo_ngay(Request $request){
        $data=$request->all();
        $from_date=$data['from_date'];
        $from_date=date('d-m-Y',strtotime($from_date));
        $to_date=$data['to_date'];
        $to_date=date('d-m-Y',strtotime($to_date));
        $get=DB::table('don_dat_hang')
        ->selectRaw('sum(solg_sp)as solg, sum(tong_tt)as banhang, count(ngdat)as tongdon,Sum(phigiao)as phivanchuyen,ngdat')
        ->groupBy('ngdat')
        ->orderby('ngdat','ASC')
        ->get();
        foreach ($get as $key => $val) {
            if (($from_date<=$val->ngdat)&&($to_date>=$val->ngdat)) {
                $chart_data[]=array(
                        'ngdat'=>$val->ngdat,
                        'tongdon'=>$val->tongdon,
                        'banhang'=>$val->banhang,
                        'phivanchuyen'=>$val->phivanchuyen,
                        'solg'=>$val->solg

                );
            }
        }
        echo $data=json_encode($chart_data);
    }



}
