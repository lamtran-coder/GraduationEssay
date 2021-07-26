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
                                    <td><?php echo  date('d-m-Y',strtotime($cus_id->ngdat))?></td>
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
    margin: 16px;font-weight: bolder;" role="grid" aria-describedby="example2_info">
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
                                            echo '<option value="2">Đang Giao</option>';
                                        }elseif($order_de_id->trang_thai==3){
                                            echo '<option value="3">Đã Nhận</option>';
                                        }elseif($order_de_id->trang_thai==4){
                                            echo '<option value="4">Hủy Đơn</option>';
                                        }
                                         
                                         ?>
                                    </select>
                                    <button>UP</button>
                                    </form>
                                     </td>
                                   
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                        <?php 
                                    $message_ct=Session::get('message_ct');
                                    if($message_ct){
                                        echo '<span style="color:red;font-size:30px;padding-left:50px;">'.$message_ct.'<span>';

                                        Session::put('message_ct',null);
                                    }
                                   
                        ?>
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
