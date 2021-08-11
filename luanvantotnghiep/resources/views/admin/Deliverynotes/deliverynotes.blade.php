@extends('admin_layout')
@section('admin_content')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
  <?php 
        if (isset($_GET['date_star_dn'])&&isset($_GET['date_end_dn'])) {
        $date_star_dn=$_GET['date_star_dn'];
        $date_end_dn=$_GET['date_end_dn'];
        }else{
          $date_star_dn="";
          $date_end_dn="";
        }
        if (isset($_GET['keywords_submit'])) {
          $keywords_submit=$_GET['keywords_submit'];
        }else{
          $keywords_submit="";
        }
  ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách Phiếu Giao
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-4">
       <form>
        <div class="input-group" style="display:flex;">
          <input type="text" class="input-lg form-control"name="keywords_submit" placeholder="nhập mã đơn, mã phiếu giao" value="<?php echo $keywords_submit; ?>">
          <button class="btn">Tìm</button>
         </div>
       </form>
      </div>
      <div class="col-sm-4">
       <form>
          <div style="display:flex;align-items: center;">
          <span>Từ:</span> 
          <input  class="input-lg form-control" style="width: 130px" name="date_star_dn" type="text" id="date_star_dn" value="<?php echo $date_star_dn; ?>">
          <span>Đến:</span> 
          <input class="input-lg form-control" style="width: 130px" name="date_end_dn" type="text" id="date_end_dn" value="<?php echo $date_end_dn; ?>">
          <button class="btn">Tìm</button>
          </div>
          <script type="text/javascript">
            $( function() {
              $( "#date_star_dn" ).datepicker({
                  prevText:"Tháng Trước",
                   nextText:"Tháng Sau", 
                   dateFormat:"dd-mm-yy",
                    dayNamesMin:['Thứ 2','Thứ 3','Thứ 4','Thứ 5','Thứ 6','Thứ 7','Chủ Nhật'], 
                    duration:"show"
              });
            } );
            $( function() {
              $( "#date_end_dn" ).datepicker({
                  prevText:"Tháng Trước",
                   nextText:"Tháng Sau", 
                   dateFormat:"dd-mm-yy",
                    dayNamesMin:['Thứ 2','Thứ 3','Thứ 4','Thứ 5','Thứ 6','Thứ 7','Chủ Nhật'], 
                    duration:"show"
              });
            } );  
          </script>
         </form>
        </div>
        <div class="col-sm-4" style="float:right;">
        <form action="">
          <div class="form-group" style="display:flex;">
           <select name="status_dn" class="input-lg form-control" style="width:200px;margin-left: 30px;">
            <option value="all">Hiện Thị Tất Cả</option>
            <option value="0">Đang Giao</option>
            <option value="1">Đã Giao</option>
            <option value="2">Đã Hủy</option>
          </select>
          <button class="btn">Lọc</button>
          </div>
        </form>
        </div>
      
      </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr class="thanhloc">
            <th>
               <?php 
              if (isset($_GET['Ma_Phieu_Giao'])) {
                $result=$_GET['Ma_Phieu_Giao'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Ma_Phieu_Giao=giam">Mã Phiếu Giao&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Ma_Phieu_Giao=tang">Mã Phiếu Giao&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Ma_Phieu_Giao=tang">Mã Phiếu Giao</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['Ma_Don_Hang'])) {
                $result=$_GET['Ma_Don_Hang'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Ma_Don_Hang=giam">Mã Đặt Hàng&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color:#ff8181;" href="{{Request::url()}}?Ma_Don_Hang=tang">Mã Đặt Hàng&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Ma_Don_Hang=tang">Mã Đặt Hàng</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['Sap_Xep_Ngay_Giao'])) {
                $result=$_GET['Sap_Xep_Ngay_Giao'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Ngay_Giao=giam">Ngày Giao&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Ngay_Giao=tang">Ngày Giao&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Sap_Xep_Ngay_Giao=tang">Ngày Giao</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['so_luong'])) {
                $result=$_GET['so_luong'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?so_luong=giam">số lượng&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?so_luong=tang">số lượng&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?so_luong=tang">số lượng</a>
              <?php  }?>
            </th>
            <th>
           
            <?php 
              if (isset($_GET['phi_giao'])) {
                $result=$_GET['phi_giao'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?phi_giao=giam">Phí Giao&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?phi_giao=tang">Phí Giao&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?phi_giao=tang">Phí Giao</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['Thanh_Toan'])) {
                $result=$_GET['Thanh_Toan'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Thanh_Toan=giam">Thanh Toán&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Thanh_Toan=tang">Thanh Toán&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Thanh_Toan=tang">Thanh Toán</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['Tien_Tra_Sau'])) {
                $result=$_GET['Tien_Tra_Sau'];
                if ($result=="tang") { ?>
                <a style="color: #7a0101;" href="{{Request::url()}}?Tien_Tra_Sau=giam">Tiền Trả Sau&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #7a0101;" href="{{Request::url()}}?Tien_Tra_Sau=tang">Tiền Trả Sau&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Tien_Tra_Sau=tang">Tiền Trả Sau</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['Trang_thai'])) {
                $result=$_GET['Trang_thai'];
                if ($result=="tang") { ?>
                <a style="color: #7a0101;" href="{{Request::url()}}?Trang_thai=giam">Trang Thái&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #7a0101;" href="{{Request::url()}}?Trang_thai=tang">Trang Thái&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Trang_thai=tang">Trang Thái</a>
              <?php  }?>
            </th>
            <th style="color:white;">Xuất</th>
            
          </tr>
        </thead>
        <tbody>
          <?php $qty_pro=0; ?>
          <?php foreach ($delivery_id as $key => $value_dn): ?>  
        <tr>
  
            <td><span class="text-ellipsis"><a href="{{URL::to('/order-details/'.$value_dn->ma_ddh)}}">{{$value_dn->ma_pg}}</a></span></td>
              <td><span class="text-ellipsis">{{$value_dn->ma_ddh}}</span></td>
            <td><span class="text-ellipsis"><?php echo date('d-m-Y',strtotime($value_dn->nggiao)); ?></span></td>
            <td><span class="text-ellipsis">{{$value_dn->solg_sp}}</span></td>
             <td><span class="text-ellipsis"><?php
                foreach ($order_id as $key => $value_od) {
                  if ($value_od->ma_ddh==$value_dn->ma_ddh) {
                      $qty_pro+=$value_dn->solg_sp;
                      if ($value_od->solg_sp<$qty_pro) {
                         $phigiao=$value_od->phigiao;
                      }else{
                        $phigiao=0;
                      }
                     
                  }
                }
                echo number_format($phigiao);
            ?></span></td>
            <td><span class="text-ellipsis"><?php echo number_format($value_dn->gia_thu+$phigiao); ?></span></td>
            <td><span class="text-ellipsis"><?php echo number_format($value_dn->tienconlai); ?></span></td>
            <td>
              <form action="{{URL::to('/update-delivery/'.$value_dn->ma_pg)}}" style="display:flex;" method="post">
                @csrf
                <?php 
                  if ($value_dn->trangthai==0) {
                      $color='blue';
                      $button="";
                  }elseif ($value_dn->trangthai==1) {
                      $color='red';
                      $button='none';
                  }elseif ($value_dn->trangthai==2) {
                      $color='#000';
                      $button='none';
                  }
                 ?>
              <select class="input-sl form-control" name="update_status_de" style="color: <?php echo $color; ?>;font-weight: 800;">
                <?php if ($value_dn->trangthai==0): ?>
                <option value="0">Đang Giao</option>
                <option value="1">Đã Giao</option>
                <option value="2">Không Nhận</option>
                <?php endif ?>
                <?php if ($value_dn->trangthai==1): ?>
                <option value="1">Đã Giao</option>
                <?php endif ?>
                <?php if ($value_dn->trangthai==2): ?>
                <option value="2">Đã Hủy</option>
                <?php endif ?>
              </select>
                <button style="display: <?php echo $button; ?>">Up</button>
              </form>
            </td>
            
            <td>
               <!-- <a href="{{URL::to('/deliverynotes-detail/'.$value_dn->ma_pg)}}"><i class="fa fa-print" style="font-size: 30px;color: yellowgreen;" aria-hidden="true"></i></a> -->
               <form action="{{URL::to('/deliverynotes-detail/'.$value_dn->ma_pg)}}">
                <input type="hidden" name="phigiao" value="<?php echo $phigiao;?>">
               <button style="background:#FFF"><i class="fa fa-print" style="font-size: 30px;color: yellowgreen;" aria-hidden="true"></i></button>
               </form>
             </td>
          </tr>
         <?php endforeach ?>
          
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
          {{$delivery_id->appends(Request::all())->links() }}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
</section>
@endsection