@extends('admin_layout')
@section('admin_content')

<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Chi tiết đơn hàng
    </div>
<section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{URL::to('/dashboard')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="{{URL::to('/all-order')}}">Đơn hàng</a></li>
            <li class="active">chi tiết đơn hàng</li>
        </ol>
    </section>
       <section class="content">
        <!-- Default box -->

        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container123  col-md-6"   style="">
                            <h4></h4>

                            <table class="table table-bordered">
                                <thead>

                                <tr>
                                    <th class="col-md-4"><h5>THÔNG TIN NHẬN HÀNG</h5></th>
                                    <th class="col-md-6" style="text-align: center;font-size: 25px;color: green;"><i class="fa fa-user" ></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($customer_id as $key => $cus_id): ?>
                                <tr>
                                    <td>Người Nhận</td>
                                    <td>{{$cus_id->ten_kh}}</td>
                                </tr>
                                
                                <tr>
                                    <td>Số Điện Thoại</td>
                                    <td>{{$cus_id->sodt}}</td>
                                </tr>
                                <tr>
                                    <td>Địa Chỉ</td>
                                    <td>{{$cus_id->diachi}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$cus_id->email}}</td>
                                </tr>
                                <tr>
                                    <td>Ngày Đặt Hàng</td>
                                    <td>{{$cus_id->ngdat}}</td>
                                </tr>
                                <tr>
                                    <td>Ngày Giao Hàng</td>
                                    <td>{{$cus_id->nggiaodk}}</td>
                                </tr> 
                                 <?php endforeach ?>
                                </tbody>
                            </table>

                        </div>
                        <div class="container123  col-md-6"   style="">
                            <h4></h4>

                            <table class="table table-bordered">
                                <thead>

                                <tr>
                                    <th class="col-md-4"><h5>THÔNG TIN GIAO HÀNG</h5></th>
                                    <th class="col-md-6" style="text-align: center;font-size: 25px;color: red;"><i class="fa fa-user" ></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Tên Nhân Viên</td>
                                    <td><?php $name=Session::get('ten');
                                              $email_ad=Session::get('email');
                                              $phone=Session::get('sodt');
                                     if ($name) {echo $name;} ?></td>
                                </tr>
                                    <tr>
                                        <td>Số Điện Thoại</td>
                                        <td><?php if ($phone) {echo $phone;} ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php if ($email_ad) {echo $email_ad;} ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                        <table id="myTable" class="table table-bordered table-hover dataTable" style="width: 97%;
    margin: 16px;" role="grid" aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th >Mã sản phẩm</th>
                                <th >Tên sản phẩm</th>
                                <th >Size</th>
                                <th >Màu</th>
                                <th >Số lượng</th>
                                <th >Giá tiền</th>
                                <th >Trang thái</th>
                                
                            </thead>
                            <tbody>
                            <?php foreach ($order_detail_id as $key => $order_de_id): ?> 
                                <tr>                     
                                    <td>{{$order_de_id->ma_sp}}</td>
                                    <td>{{$order_de_id->ten_sp}}</td>
                                    <td>{{$order_de_id->size}}</td>
                                    <td>{{$order_de_id->ten_mau}}</td>
                                    <td>{{$order_de_id->solg_sp}}</td>
                                    
                                    <td><?php echo number_format($order_de_id->sotien) ?></td>
                                    <td>
                                    <form action="{{URL::to('/update-status-od/'.$order_de_id->so_ct)}}" method="post">
                                        @csrf
                                    <input type="hidden" name="ma_ddh_od" value="<?php echo $order_de_id->ma_ddh; ?>">
                                    <select name="status_od" class="status_order_detail">
                                        <?php 
                                        if ($order_de_id->trang_thai==0) {
                                            echo '<option value="0">Đang chờ lấy hàng</option>';
                                            echo '<option value="1">Đã lấy hàng</option>';   
                                        }elseif($order_de_id->trang_thai==1){
                                            echo '<option value="1">Đã lấy hàng</option>';
                                        }elseif($order_de_id->trang_thai==2){
                                            echo '<option value="1">Đang Giao</option>';
                                        }
                                         
                                         ?>
                                    </select>
                                    <button>UP</button>
                                    </form>
                                     </td>
                                   
                                </tr>
                            <?php endforeach ?>
                            <tr>
                                <?php foreach ($order_id as $key => $value_or): ?>
                                <td colspan="1"><b class="text-red">Tiền Trả Trước</b></td>
                                <td colspan="1">
                                <b class="text-red" style="font-size :25px;color:red">
                                <?php $tiencoc=$value_or->tien_coc; 
                                echo number_format($tiencoc).''.'vnd';?></b>
                                </td>
                                <td colspan="1"><b>Tổng Tiền</b></td>
                                <td colspan="3"><b class="text-red" style="font-size :25px;color:red"> 
                                    <?php $tong_tt=$value_or->tong_tt-$tiencoc;
                                    echo number_format($tong_tt).''.'vnd';?></b></td>
                                    <?php $ma_ddh=$value_or->ma_ddh; ?>
                                <?php endforeach ?>
                            </tr>  
                                <?php foreach ($delivery_id as $key => $value_dn): ?>
                            <tr>
                                <td colspan="1"><b class="text-red">Số Lần Còn Giao</b></td>
                                <td colspan="1">
                                <b class="text-red" style="font-size :25px;color:red">
                                    <?php 
                                        if ($value_dn->tienconlai>0) {
                                            echo "Còn 1 lần";
                                        }elseif($value_dn->tienconlai==0){
                                            echo "Đã Hoàn Thành";
                                        }
                                     ?>
                                 </b>
                                </td>
                                <td colspan="1"><b>Số Tiền Còn Lại</b></td>
                                <td colspan="3">
                                    <b class="text-red" style="font-size :25px;color:red"> 
                                     <?php if (isset($value_dn->tienconlai)) {
                                                $tien_tt=$value_dn->tienconlai;
                                            echo number_format($tien_tt);
                                        }?>    
                                    </b>
                                </td>
                                    
                                
                            </tr>
                                <?php endforeach ?>
                            </tbody>
                            <td class="giao">
                                <form action="{{URL::to('/save-delivery-notes/'.$ma_ddh)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="ma_ddh_h" value="<?php echo $ma_ddh; ?>">
                                    <input type="hidden" name="email_h" value="<?php echo $email_ad; ?>">
                                    <?php 
                                    if (isset($tien_tt)) {
                                        echo '<input type="hidden" name="tiencoc_h" value="0">';
                                        echo '<input type="hidden" name="tong_tt_h" value="'.$tien_tt.'">';
                                    }else{
                                     echo '<input type="hidden" name="tiencoc_h" value="'.$tiencoc.'">';
                                     echo '<input type="hidden" name="tong_tt_h" value="'.$tong_tt.'">';
                                    }?>
                                    <button>Giao</button>
                                </form>
                            </td>
                        </table>
                    </div>
                </div>
               

            </div>
        </div>
    </section>
     <footer class="panel-footer">
      <div class="row">
        
   
      </div>
    </footer>
  </div>
</div>
</section>
</section>
@endsection
