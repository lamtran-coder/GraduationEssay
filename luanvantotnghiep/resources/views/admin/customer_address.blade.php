@extends('admin_layout')
@section('admin_content')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách Người nhận
    </div>
    <div class="row w3-res-tb">
      
       <form action="{{URL::to('/search-customer')}}" method="post">
          @csrf
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control"name="keywords_submit" placeholder="nhập từ khóa" value="">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
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
            <th>Mã người nhận</th>
            <th>Tên người nhận</th>
            <th>So điện thoại</th>
            <th width="100px">Địa chỉ</th>
            <th>Tổng Đơn</th>
            <th>Tổng Sản Phẩm</th>
            <th>Tổng Tiền Mua Sắm</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($customer_id as $key => $value_cus): ?>
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><span class="text-ellipsis">{{$value_cus->ma_kh}}</span></td>
            <td><span class="text-ellipsis">{{$value_cus->ten_kh}}</span></td>
            <td><span class="text-ellipsis">{{$value_cus->sodt}}</span></td>
            <td><span class="text-ellipsis">{{$value_cus->diachi}}</span></td>
            <td><span class="text-ellipsis"><?php 
              $dem=0;
              foreach ($order_id as $key => $value_or) {
                if ($value_or->ma_kh==$value_cus->ma_kh) {
                    $dem++;
                }
              }echo $dem;

             ?></span></td>
             <td><span class="text-ellipsis" style="color:red;font-size: 18px;"><?php 
              $Sum_mony=0;
              foreach ($order_id as $key => $value_or) {
                if ($value_or->ma_kh==$value_cus->ma_kh) {
                    $Sum_mony+=$value_or->tong_tt;
                }
              }echo number_format($Sum_mony).' vnd';

             ?></span></td>
             <td><span class="text-ellipsis"><?php 
              $Sum_qty=0;
              foreach ($order_id as $key => $value_or) {
                if ($value_or->ma_kh==$value_cus->ma_kh) {
                    $Sum_qty+=$value_or->solg_sp;
                }
              }echo number_format($Sum_qty).' SP';

             ?></span></td>
          </tr>
          <?php endforeach ?>
         
          
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
</section>
@endsection