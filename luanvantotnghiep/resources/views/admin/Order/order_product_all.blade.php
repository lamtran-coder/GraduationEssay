@extends('admin_layout')
@section('admin_content')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách đơn hàng
    </div>
    <div class="row w3-res-tb ">
      <div class="col-sm-3">
      <form>
        <input type="text" style="width: 170px;" name="keywords_search" placeholder="Nhập Mã Đơn Đặt Hàng , tên khách hàng">
          <button>Tìm</button>
      </form>
      </div>
      <div class="col-sm-6" >
        <form style="display:flex;">
        <span>Từ</span>: 
          <input name="date_star" type="text" id="date_star" class="form-control" style="width:100px" value="{{old('date_star')}}">
          <span>Đến</span>:
          <input name="date_end" type="text" id="date_end" class="form-control" style="width:100px" value="{{old('date_end')}}">
         <button >Tìm</button>
        </form>
        
      </div>
      <div class="col-sm-3">
        <form style="display:flex;">
          <select name="status_od" class="form-control" style="width: 200px;">
          <option value="0">Đang Xử Lý</option>
          <option value="1">Đang Lấy Hàng</option>
          <option value="2">Đang Giao</option>
          <option value="3">Đã nhận</option>
          <option value="4">Đơn hủy</option>
          </select>
        <button>Tìm</button>
        </form>
      </div>
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
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>số lượng</th>
            
            <th>Phí Giao</th>
            <th>Tiền cọc</th>
            <th>tổng tiền</th>
            <th>ngày đặt</th>
            <th>trạng thái</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        
        
        <tbody>
          <?php foreach ($all_oder as $key => $value_oder): ?>  
        <tr>
         
         
           <th style="width:10px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <td><span class="text-ellipsis">{{$value_oder->ma_ddh}}</span></td>
            
               <?php foreach ($all_cus as $key => $value_cus): ?>
               <?php if ($value_oder->ma_kh==$value_cus->ma_kh): ?>
             <td><span class="text-ellipsis"> {{$value_cus->ten_kh}}</span></td>
               <?php endif ?>
                <?php endforeach ?>
            <td><span class="text-ellipsis">{{$value_oder->solg_sp}}</span></td>
            <td><span class="text-ellipsis">{{$value_oder->phigiao}}</span></td>
            <td><span class="text-ellipsis"><?php echo number_format($value_oder->tien_coc); ?></span></td>

            <td><span class="text-ellipsis"><?php echo number_format($value_oder->tong_tt+$value_oder->phigiao); ?></span></td>
            <td><span class="text-ellipsis"><?php echo date('d-m-Y',strtotime($value_oder->ngdat)); ?></span></td>
           
            <td><span class="text-ellipsis">
                  
                      <?php 
                          if($value_oder->trangthai==0){                
                            echo '<span style="color:#4C8720;">Đang xử lý</span>';
                          }elseif($value_oder->trangthai==1){
                            echo '<span style="color:#6AF3D6;">Đang lấy hàng</span>';
                          }elseif($value_oder->trangthai==2){
                          ?>
                           <a href="{{URL::to('/update-recieve/'.$value_oder->ma_ddh)}}"><span style="color:blue;font-weight: 800;">Đang Giao</span></a>
                          <?php
                          }elseif($value_oder->trangthai==3){
                            echo '<span style="color:#E19712;">Đã nhận</span>';
                          }elseif($value_oder->trangthai==4){
                            echo '<span style="color:red;">Hủy Đơn</span>';
                          }

                        ?>

            </span></td>
                <td><a href="{{URL::to('/order-details/'.$value_oder->ma_ddh)}}" class="active styling-edit" ui-toggle-class="">
               <i class="fa fa-search" style="font-size: 30px;"></i></a>
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
          
        </div>
        <div class="col-sm-3">
          {{$all_oder->links()}}
        </div>
      </div>
    </footer>
  </div>
</div>
<script type="text/javascript">
           $( function() {
            $( "#date_star" ).datepicker({
                prevText:"Tháng Trước",
                 nextText:"Tháng Sau", 
                 dateFormat:"dd-mm-yy",
                  dayNamesMin:['Thứ 2','Thứ 3','Thứ 4','Thứ 5','Thứ 6','Thứ 7','Chủ Nhật'], 
                  duration:"show"
            });
          } );
          $( function() {
            $( "#date_end" ).datepicker({
                prevText:"Tháng Trước",
                 nextText:"Tháng Sau", 
                 dateFormat:"dd-mm-yy",
                  dayNamesMin:['Thứ 2','Thứ 3','Thứ 4','Thứ 5','Thứ 6','Thứ 7','Chủ Nhật'], 
                  duration:"show"
            });
          } );
        </script>
</section>
</section>
@endsection