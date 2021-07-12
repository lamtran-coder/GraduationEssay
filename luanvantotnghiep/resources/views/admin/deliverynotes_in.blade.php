@extends('admin_layout')
@section('admin_content')

<section id="main-content" style="background: #ffffff;">
    <section class="wrapper">
        <div class="panel-body">
                            
                        
        <div class="table-agile-info">
       <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container123  col-md-6"   style="width: 100%;">
                        	<div class="header-top">
                        		<div class="logo">
                                    <a href=""><img src="{{asset('public/frontend/images/logo123.jpg')}}" alt=""/></a>
                                </div>
                                <div>
                                    Địa chỉ : 180 Cao Lỗ P.4 Q.8 TP.HỒ CHÍ MINH
                                    <br>
                                    Số Điện Thoại : 0931 048 540
                                </div>
                        	</div>
                        	<div class="top-nav clearfix">
                                <ul class="nav top-menu" >
                                    <?php foreach ($deliverynotes_id as $key => $value_dn): ?>
                                    
                            		<h4 style="text-align: center;font-size: 30px;
                                        padding: 20px;">Công Ty Thời Trang Nam Tiến Lên Nào</h4>
                                   	<h1 style="text-align: center;">Phiếu Giao Hàng<br>-------oOo-------</h1>        
                                   	<div style="padding: 5px;
                                    padding-left: 30px;"><span>Mã phiếu :</span><span style="padding-left: 10px"><?php echo $ma_pg=$value_dn->ma_pg; ?></span></div>
                                    <div style="padding: 5px;
                                    padding-left: 30px;"><span>Ngày giao hàng :</span><span style="padding-left: 10px"><?php echo $value_dn->nggiao; ?></span></div>
                                    <div style="padding: 5px;
                                    padding-left: 30px;"><span>Người Nhận :</span><span style="padding-left: 10px"><?php echo $value_dn->ten_kh; ?></span></div>
                                    <div style="padding: 5px;
                                    padding-left: 30px;"><span>Địa Chỉ :</span><span style="padding-left: 10px"><?php echo $value_dn->diachi; ?></span></div>
                                    <div style="padding: 5px;
                                    padding-left: 30px;"><span>Số Điện Thoại :</span><span style="padding-left: 10px"><?php echo $value_dn->sodt; ?></span></div>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            
                        
                        <table id="myTable" class="table table-bordered table-hover dataTable" style="width: 95%;
    margin: 25px;" role="grid" aria-describedby="example2_info">
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
                            <tbody>  
                            <?php foreach ($deliverynotes_detail_id as $key => $value_dd): ?>   
                                <tr>                         
                                    <td><?php echo $key+1; ?></td>
                                    <td><?php echo $value_dd->ma_sp; ?></td>
                                    <td><?php 
                                            foreach ($product_id as $key => $value_pro) {
                                                if($value_dd->ma_sp==$value_pro->ma_sp){
                                                    echo $value_pro->ten_sp;
                                                }
                                            }

                                     ?></td>
                                    <td>{{$value_dd->size}}</td>
                                    <td>{{$value_dd->mau}}</td>
                                    <td>{{$value_dd->solg}}</td>
                                    <td>{{$value_dd->chiet_khau}}</td>
                                    <td>{{$value_dd->sotien}}</td> 
                                </tr>
                             <?php endforeach ?> 
                                <tr>
                               		<?php foreach ($deliverynotes_id as $key => $value_dn): ?>
                                    <td colspan="2" title="position-center"><b>Tổng Tiền</b></td>
                                    <td colspan="5"><b class="text-red" style="font-size:20px"><?php echo number_format($value_dn->gia_thu).' VND'; ?></b></td>
                                    <?php endforeach ?>

                                </tr>
                            </tbody>
                        </table>
                    <div class="footer-left">Hồ Chí Minh, ngày .. tháng .. năm 202..<br/>
    Khách hàng <br>(ký ghi gõ họ tên) </div>
  <div class="footer-right">Hồ Chí Minh , ngày .. tháng .. năm 202..<br/>
    Nhân viên <br>(ký ghi gõ họ tên) </div> 
                    </div>
                </div>
               
            </div>
        </div>
    </section>
     <footer class="panel-footer">
      <div class="row">
            <div style="text-align:center;">
            
                <p><a href="{{URL::to('/print-deliverynotes/'.$ma_pg)}}" ><i class="fa fa-print" style="font-size: 50px;color: red;" aria-hidden="true"></i></a></p>
            </div>
        
        </div>
      </div>
    </footer>
  </div>


</div>
</section>
</section>

@endsection