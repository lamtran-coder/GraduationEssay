@extends('admin_layout')
@section('admin_content')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách Phiếu Giao
    </div>
    <div class="row w3-res-tb">
       <form>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control"name="keywords_submit" placeholder="nhập từ khóa" value="">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Tim</button>
          </span>
         </div>
        </div>
       </form>
       <form>
        <div class="col-sm-6">
          <div style="display:flex;">
          <span style="padding:5px">Từ :</span> 
          <input style="padding-left: 20px;width: 170px;" class="input-sm form-control" name="date_star_dn" type="date">
          <span style="padding:5px">Đến :</span> 
          <input style="padding-left: 20px;width: 170px;" class="input-sm form-control" name="date_end_dn" type="date">
          <button>Tìm</button>
          </div>
        </div>
        </form>
        <form action="">
        <div class="col-sm-3">
          <div class="form-group" style="display:flex;">
           <select name="status_dn" class="input-sm form-control" style="width:140px">
            <option value="all">Hiện Thị Tất Cả</option>
            <option value="0">Đang Giao</option>
            <option value="1">Đã Giao</option>
          </select>
          <button>Lọc</button>
          </div>
        </div>
      </form>
      
      </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Mã Phiếu Giao</th>
            <th>Mã Đơn Đặt Hàng</th>
            <th>Ngày Giao</th>
            <th>số lượng</th>
            <th>Phí Giao</th>
            <th>Thanh Toán</th>
            <th>Tiền trả sau</th>
            <th>Trang Thái</th>
            <th>Chi Tiêt</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php $qty_pro=0; ?>
          <?php foreach ($delivery_id as $key => $value_dn): ?>  
        <tr>
           <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <td><span class="text-ellipsis"><a href="{{URL::to('/order-details/'.$value_dn->ma_ddh)}}">{{$value_dn->ma_pg}}</a></span></td>
              <td><span class="text-ellipsis">{{$value_dn->ma_ddh}}</span></td>
            <td><span class="text-ellipsis">{{$value_dn->nggiao}}</span></td>
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
            <td><span class="text-ellipsis">
              <?php
              if ($value_dn->trangthai==0) {
                ?>
                <a href="{{URL::to('/unactive-delivery/'.$value_dn->ma_pg)}}" >Đang Giao</a>
            <?php 
             }else{
              ?>
               <a  style="color: red;">Đã Giao</a>
            <?php
             }
             ?>
            </span></td>
            
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
            {{$delivery_id->links()}}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
</section>
@endsection