<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use PDF;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class Deliverynotescontroller extends Controller
{
    public function AuthLogin(){
      $email = Session::get('email');
      if($email){
         return Redirect::to('admin.dashboard');
      }else{
         return Redirect::to('admin')->send();
      }
    }
    public function save_delivery_notes (Request $request){
        $data=array();
        $date=getdate();
        $ma_ddh=$request->ma_ddh_h;
        $email=$request->email_h;
        $tiencoc=$request->tiencoc_h;
        $tong_tt=$request->tong_tt_h;
        $dem_star=0;
        //kiểm tra chi tiết đơn hàng đã lấy hàng chưa
        $order_detail_id_1=DB::table('chi_tiet_don_hang')->where('ma_ddh',$ma_ddh)->get();
        foreach ($order_detail_id_1 as $key => $value_star) {
            if ($value_star->trang_thai==1) {
                $dem_star++;
            }
        }
        if (($tong_tt>0)&&($dem_star>0)) 
        {
           
        $ma_pg=$date['year'].'M'.$date['mon'].'D'.$date['mday'].rand(0,9999);
        $data['ma_pg']= $ma_pg;
        $data['nggiao']=$date['mday'].'/'.$date['mon'].'/'.$date['year'];
        $Sum_mony_1=0;
        $Sum_mony=0;
        $Sum_qty=0;
        $dem_tt=0;
        $dem_tt_2=0;
        $order_detail=DB::table('chi_tiet_don_hang')->where('ma_ddh',$ma_ddh)->get();
        foreach ($order_detail as $key => $value_od) {
            if ($value_od->trang_thai==1){
                $Sum_mony_1+=$value_od->sotien;
                $Sum_qty+=$value_od->solg_sp;
            }
            if ($value_od->trang_thai==2) {    

            }
            $Sum_mony+=$value_od->sotien;
        }
        //tính chiết khấu
        $chiec_khau_tong=0;
        if($Sum_mony>=50000000){
            $chiec_khau_tong=15;    
        }elseif((($Sum_mony<50000000)&&($Sum_mony>=20000000))){
            $chiec_khau_tong=13;
        }elseif(($Sum_mony>=5000000)&&($Sum_mony<20000000)){
            $chiec_khau_tong=10;
        }
        elseif(($Sum_mony<5000000)&&($Sum_mony>=3000000)){
            $chiec_khau_tong=7;
        }elseif ((($Sum_mony<3000000)&&($Sum_mony>=1500000))){
            $chiec_khau_tong=5;
        }elseif((($Sum_mony<1500000)&&($Sum_mony>=500000))){
            $chiec_khau_tong=3;
        }else{
            $chiec_khau_tong=0;}

        $data['solg_sp']=$Sum_qty;
        $gia_dc=$Sum_mony_1*(100-$chiec_khau_tong)/100;
        if($gia_dc>=$tiencoc) {
            $gia_thu=($Sum_mony_1*(100-$chiec_khau_tong)/100)-$tiencoc;   
            $data['gia_thu']=$gia_thu;
            $tiencl=$tong_tt-$gia_thu;
            $data['tienconlai']=$tiencl;    
            $data['trangthai']=0;
            if ($tiencl==0) {
                $status['trangthai']=2;
                DB::table('don_dat_hang')
                ->where('ma_ddh',$ma_ddh)
                ->Where(function($query) {
                $query->where('trangthai','1')
                      ->orwhere('trangthai','0');
                 })
                ->update($status);
            }else{
                $status['trangthai']=1;
                DB::table('don_dat_hang')
                ->where('ma_ddh',$ma_ddh)
                ->Where(function($query) {
                $query-> where('trangthai','0')
                     -> orwhere('trangthai','1');
                 })->update($status);}
        }elseif($gia_dc<$tiencoc){
            $tiencoccon=$tiencoc-($Sum_mony_1*(100-$chiec_khau_tong)/100);   
            $data['gia_thu']=0;
            $tiencl=$tong_tt-$tiencoccon;
            $data['tienconlai']=$tiencl;
            $data['trangthai']=0;
            $status['trangthai']=1;
            if ($tiencl==0) {
                $status['trangthai']=2;
                DB::table('don_dat_hang')
                ->where('ma_ddh',$ma_ddh)
                ->Where(function($query) {
                $query->where('trangthai','1')
                      ->orwhere('trangthai','0');
                 })
                ->update($status);
            }
            else{
                $status['trangthai']=1;
                 DB::table('don_dat_hang')
                ->where('ma_ddh',$ma_ddh)
                ->Where(function($query) {
                $query->where('trangthai','1')
                      ->orwhere('trangthai','0');
                 })
                ->update($status);
            }
        }
        $data['ma_ddh']=$ma_ddh;
        $data['email']=$email;
        DB::table('phieu_giao')->insert($data);
        
        foreach ($order_detail as $key => $value_od) {
            if ($value_od->trang_thai==1){
                $data_delivery['ma_pg']=$ma_pg;
                $data_delivery['ma_sp']=$value_od->ma_sp;
                $data_delivery['mau']=$value_od->ten_mau;
                $data_delivery['size']=$value_od->size;
                $data_delivery['chiet_khau']=$value_od->chiet_khau;
                $data_delivery['solg']=$value_od->solg_sp;
                $data_delivery['sotien']=$value_od->sotien;
                $Sum_mony_1+=$value_od->sotien;
                $Sum_qty+=$value_od->solg_sp;
                $data_detail['trang_thai']=2;
                DB::table('chi_tiet_don_hang')->where('so_ct',$value_od->so_ct)->update($data_detail);
                DB::table('chi_tiet_phieu_giao')->insert($data_delivery);
            }
        }
            return Redirect::to('/all-delivery-notes');
        }else {
            Session::put('message_ct','Chưa Lấy Hàng');
            return Redirect::to('/order-details/'.$ma_ddh);
        }
            
    }

    //danh sách phiếu giao
    public function all_delivery_notes (){
        $this->AuthLogin();
        if (isset($_GET['keywords_submit'])){
            $keyword=$_GET['keywords_submit'];
            $delivery_id=DB::table('phieu_giao')
            ->where('ma_pg','like','%'. $keyword .'%')
            ->orwhere('ma_ddh','like','%'. $keyword .'%')
            ->paginate(10);
        }
        elseif (isset($_GET['date_star_dn'])&&isset($_GET['date_end_dn'])) {
            $date_star = $_GET['date_star_dn'];
            $date_end = $_GET['date_end_dn'];
            $date_star=date('d-m-Y',strtotime($date_star));
            $date_end=date('d-m-Y',strtotime('+1 day',strtotime($date_end)));
            $delivery_id=DB::table('phieu_giao')
            ->where('phieu_giao.nggiao','>=',$date_star)
            ->where('phieu_giao.nggiao','<=',$date_end)
            ->paginate(10);
        }
        elseif(isset($_GET['status_dn'])) {

            $status_dn = $_GET['status_dn'];
            if ($status_dn!='all') {
                $delivery_id=DB::table('phieu_giao')
                ->where('trangthai',$status_dn)->paginate(10);
            }else{
                return Redirect::to('/all-delivery-notes');
            }
        }else{

            $delivery_id=DB::table('phieu_giao')->paginate(10);
            $order_id=DB::table('don_dat_hang')->get();
        }
        $order_id=DB::table('don_dat_hang')->get();
        return view('admin.Deliverynotes.deliverynotes')
        ->with('order_id',$order_id)
        ->with('delivery_id',$delivery_id);
    }

    //chi tiet phiếu giao
    public function deliverynotes_detail($ma_pg){
        $this->AuthLogin();
        $deliverynotes_detail_id=DB::table('chi_tiet_phieu_giao')
        ->where('ma_pg',$ma_pg)->get();
        $product_id=DB::table('san_pham')->get();
        $deliverynotes_id=DB::table('phieu_giao')
        ->join('don_dat_hang','don_dat_hang.ma_ddh','=','phieu_giao.ma_ddh')
        ->join('khach_hang','khach_hang.ma_kh','=','don_dat_hang.ma_kh')
        ->where('phieu_giao.ma_pg',$ma_pg)->get();
        return view('admin.Deliverynotes.deliverynotes_in')
        ->with('deliverynotes_detail_id',$deliverynotes_detail_id)
        ->with('deliverynotes_id',$deliverynotes_id)
        ->with('product_id',$product_id)
        ;
    }

    public function unactive_delivery($ma_pg){
        $this->AuthLogin();
        DB::table('phieu_giao')->where('ma_pg',$ma_pg)->update(['trangthai'=>1]);
        $dem_tt_3=0;
        $dem_tt_ct=0;
        $order_detail_id=DB::table('don_dat_hang')
        ->join('chi_tiet_don_hang','chi_tiet_don_hang.ma_ddh','=','don_dat_hang.ma_ddh')
        ->join('phieu_giao','phieu_giao.ma_ddh','=','don_dat_hang.ma_ddh')
        ->select('chi_tiet_don_hang.ma_sp','chi_tiet_don_hang.trang_thai','don_dat_hang.ma_ddh','phieu_giao.ma_pg','chi_tiet_don_hang.size','chi_tiet_don_hang.ten_mau','chi_tiet_don_hang.solg_sp','.chi_tiet_don_hang.so_ct')
        ->where('phieu_giao.ma_pg',$ma_pg)
        ->get();
        $delivery_id=DB::table('phieu_giao')
        ->join('chi_tiet_phieu_giao','chi_tiet_phieu_giao.ma_pg','=','phieu_giao.ma_pg')
        ->where('chi_tiet_phieu_giao.ma_pg',$ma_pg)
        ->get();
        //chưa được
        //kiểm trả nếu tất cả trang thái Sản phẩm chi tiết đơn đặt hàng đều là 3 thì tăng trang thái đơn đặt hàng lên 4 
        foreach ($order_detail_id as $key => $value_od){
            if ($value_od->trang_thai==3||$value_od->trang_thai==2) {
                $dem_tt_3++;
            }
           $dem_tt_ct++;
        }
        if(($dem_tt_ct==$dem_tt_3)&&($dem_tt_3>0)&&($dem_tt_ct>0)) {  

            DB::table('don_dat_hang')
            ->join('phieu_giao','phieu_giao.ma_ddh','=','don_dat_hang.ma_ddh')
            ->where('ma_pg',$ma_pg)
            ->update(['don_dat_hang.trangthai'=>4]);

        }else{

            $order_id=DB::table('don_dat_hang')
            ->join('phieu_giao','phieu_giao.ma_ddh','=','don_dat_hang.ma_ddh')
            ->where('ma_pg',$ma_pg)
            ->Where(function($query){
            $query->orwhere('don_dat_hang.trangthai','1')   //Trang thái 1 ->3
                 -> orwhere('don_dat_hang.trangthai','2'); //Trang thái 2 ->3
             })->update(['don_dat_hang.trangthai'=>3]);
        }
            //xác thực sản phẩm 
            foreach ($delivery_id as $key => $value_dn) {
                foreach ($order_detail_id as $key => $value_od){
                    //sản phẩm chi tiết phiếu giao giống chi tiêt đơn đặt hàng để cập nhật trang thái sản phẩm trong chi tiết đơn hàng từ 2->3       
                    if (($value_dn->ma_sp==$value_od->ma_sp)&&($value_dn->size==$value_od->size)&&($value_dn->mau==$value_od->ten_mau)&&($value_dn->solg==$value_od->solg_sp)&&($value_od->trang_thai==2)) {
                        DB::table('chi_tiet_don_hang')
                        ->where('so_ct',$value_od->so_ct)
                        ->where('ma_sp',$value_od->ma_sp)
                        ->where('ten_mau',$value_od->ten_mau)
                        ->where('size',$value_od->size)
                        ->update(['chi_tiet_don_hang.trang_thai'=>3]);       
                    }
                }
            }
        
       
         return Redirect::to('/all-delivery-notes');
    }



    public function print_order($checkout_code){
        $this->AuthLogin();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();
    }
    public function print_order_convert($checkout_code){
        
        $this->AuthLogin();
        $deliverynotes_detail_id=DB::table('chi_tiet_phieu_giao')
        ->where('ma_pg',$checkout_code)->get();
        $product_id=DB::table('san_pham')->get();
        $deliverynotes_id=DB::table('phieu_giao')
        ->join('don_dat_hang','don_dat_hang.ma_ddh','=','phieu_giao.ma_ddh')
        ->join('khach_hang','khach_hang.ma_kh','=','don_dat_hang.ma_kh')
        ->where('phieu_giao.ma_pg',$checkout_code)->get();
        $output = '';
        $output.='<style>body{
            font-family: DejaVu Sans;
        }
        .table-styling{
            border:1px solid #000;

        }
        .table-styling tbody tr td{
            border:1px solid #000;
            border: dotted;
            padding:5px;
        }
                .footer-left {
            text-align:center;
            text-transform:uppercase;
            padding-top:24px;
            position:relative;
            height: 150px;
            width:50%;
            color:#000;
            float:left;
            font-size: 12px;
            bottom:1px;
        }
        .footer-right {
            text-align:center;
            text-transform:uppercase;
            padding-top:24px;
            position:relative;
            height: 150px;
            width:50%;
            color:#000;
            font-size: 12px;
            float:right;
            bottom:1px;
        }
        </style>
        <div class="col-md-12 ">
                        <div class="container123  col-md-6"   style="width: 100%;">
                            <div class="header-top">
                                <div class="logo">
                                    <a href=""><img src="'.url('/public/frontend/images/logo123.jpg').'" alt=""/></a>
                                </div>
                                <div>
                                    Địa chỉ : 180 Cao Lỗ P.4 Q.8 TP.HỒ CHÍ MINH
                                    <br>
                                    Số Điện Thoại : 0931 048 540
                                </div>
                            </div>
                            <div class="top-nav clearfix">
                                <ul class="nav top-menu" >
                                    
                                    
                                    <h4 style="text-align: center;font-size: 20px;
                                        padding: 5px;">Công Ty Thời Trang Nam Tiến Lên Nào</h4>
                                    <h2 style="text-align: center;">Phiếu Giao Hàng<br>-------oOo-------</h2>        
                                    <div style="padding: 5px;
                                    ">';
                        foreach ($deliverynotes_id as $key => $value_dn) {   
        $output.='
                                    <span>Mã phiếu :</span><span style="padding-left: 10px">'.$value_dn->ma_pg.'</span></div>
                                    <div style="padding: 5px;"><span>Ngày giao hàng :</span><span style="padding-left: 10px">'.$value_dn->nggiao.'</span></div>
                                    <div style="padding: 5px;"><span>Người Nhận :</span><span style="padding-left: 10px">'.$value_dn->ten_kh.'</span></div>
                                    <div style="padding: 5px;"><span>Địa Chỉ :</span><span style="padding-left: 10px">'.$value_dn->diachi.'</span></div>
                                    <div style="padding: 5px;"><span>Số Điện Thoại :</span><span style="padding-left: 10px">'.$value_dn->sodt.'</span></div>';
                        }
                                   
                               
         $output.='                </ul>
                            </div>
                            
                        
                        <table id="myTable" class="table-styling" style="width: 100%;
                                margin: 5px;font-size:10px" role="grid" aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th>Số TT</th>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Size</th>
                                <th>Màu</th>
                                <th>Số Lượng</th>
                                <th>Chiếc khấu</th>
                                <th>Thành Tiền</th>
                            </thead>
                            <tbody> '; 
                        foreach ($deliverynotes_detail_id as $key => $value_dd) {
                           
           $output.='           <tr>                         
                                    <td>'.($key+1).'</td>
                                    <td>'.$value_dd->ma_pg.'</td>';
                                    
                                       foreach ($product_id as $key => $value_pro) {
                                            if($value_dd->ma_sp==$value_pro->ma_sp){
            $output.='                    <td>'.$value_pro->ten_sp.'</td>';
                                        }
                                    }
                        
             $output.='             <td>'.$value_dd->size.'</td>
                                    <td>'.$value_dd->mau.'</td>
                                    <td>'.$value_dd->solg.'</td>
                                    <td>'.$value_dd->chiet_khau.'%'.'</td>
                                    <td>'.$value_dd->sotien.'</td> 
                                </tr> ';
                        }
                            $phigiao=$_GET['phigiao'];
                             foreach ($deliverynotes_id as $key => $value_dn) {      
            $output.='          <tr>
                                   
                                    <td colspan="2" title="position-center" style="font-size:20px"><b>Phí Vận Chuyển</b></td>
                                    <td colspan="5"><b class="text-red" style="font-size:20px">'.number_format($phigiao).' VND
                                    </b></td>
                                    <

                                </tr>
                                <tr>
                                   
                                    <td colspan="2" title="position-center" style="font-size:20px"><b>Tổng Tiền Thu</b></td>
                                    <td colspan="5"><b class="text-red" style="font-size:20px">'.number_format($value_dn->gia_thu+$value_dn->phigiao).' VND
                                    </b></td>
                                    <

                                </tr>';

                             }
            $output.='        </tbody>
                        </table>
                    <div class="footer-left">Hồ Chí Minh, ngày .. tháng .. năm 202..<br/>
    Khách hàng <br>(ký ghi gõ họ tên) </div>
  <div class="footer-right">Hồ Chí Minh , ngày .. tháng .. năm 202..<br/>
    Nhân viên <br>(ký ghi gõ họ tên) </div> 
                    </div>
                </div>';
        return $output;
    }
    
}
