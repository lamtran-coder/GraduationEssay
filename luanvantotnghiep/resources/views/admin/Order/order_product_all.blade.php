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
      <div class="col-sm-4">
      <form>
        <div class="input-group" style="display:flex;">
          <input type="text" class="input-sm form-control" name="keywords_search" placeholder="nhập mã đơn, tên khách hàng">
          <button>Tìm</button>
        </div>
      </form>
      </div>
      <div class="col-sm-5" >
        <form style="display:flex;align-items: center;">
        <span>Từ</span>: 
          <input name="date_star" type="text" style="width: 100px;margin-left: 5px;" id="date_star">
          <span> Đến</span>:
          <input name="date_end" type="text" style="width: 100px;margin-left: 5px;"  id="date_end">
         <button style="height: 28px;">Tìm</button>
        </form>
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
      </div>
      <div class="col-sm-3">
        <form style="display:flex;">
          <select name="status_od" class="form-control" style="width: 200px;font-size: 18px;">
          <option value="tatca">Hiện Thị Tất Cả</option>
          <option value="0">Chờ Xác Nhận</option>
          <option value="1">Chờ Lấy Hàng</option>
          <option value="2">Đang Giao</option>
          <option value="3">Đã Giao</option>
          <option value="4">Đã Hủy</option>
          </select>
        <button>Tìm</button>
        </form>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead >
          <tr class="thanhloc">
            
            <th>
              <?php 
              if (isset($_GET['Sap_Xep_Ma'])) {
                $result=$_GET['Sap_Xep_Ma'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Ma=giam">Mã Đơn&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Ma=tang">Mã Đơn&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Sap_Xep_Ma=tang">Mã Đơn</a>
              <?php  }?>
            </th>
            <th>
             <?php 
              if (isset($_GET['ten'])) {
                $result=$_GET['ten'];
                if ($result=="Z-A") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?ten=A-Z">Tên Khách Hàng&darr;</a>
               <?php }elseif ($result=="A-Z"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?ten=Z-A">Tên Khách Hàng&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?ten=Z-A">Tên Khách Hàng</a>
              <?php  }?>
            </th>
            <th>
              <?php 
                if (isset($_GET['so_luong'])) {
                  $result=$_GET['so_luong'];
                  if ( $result=="tang") { ?>
                  <a style="color: #ff8181;" href="{{Request::url()}}?so_luong=giam">số lượng&darr;</a>
                 <?php }else{?>
                 <a style="color: #ff8181;" href="{{Request::url()}}?so_luong=tang">số lượng&uarr;</a>
                <?php }}else{ ?>
                 <a href="{{Request::url()}}?so_luong=tang">số lượng</a>
                <?php  }?>
            </th>
            <th>
              <?php 
                if (isset($_GET['phi_giao'])) {
                  $result=$_GET['phi_giao'];
                  if ( $result=="tang") { ?>
                 <a style="color: #ff8181;" href="{{Request::url()}}?phi_giao=giam">Phí Giao&darr;</a>
                 <?php }elseif ($result=="giam"){?>
                 <a style="color: #ff8181;" href="{{Request::url()}}?phi_giao=tang">Phí Giao&uarr;</a>
                 <?php }}else{ ?>
                 <a href="{{Request::url()}}?phi_giao=tang">Phí Giao</a>
                <?php  }?>
            </th>
            <th>
              <?php 
                if (isset($_GET['tien_coc'])) {
                  $result=$_GET['tien_coc'];
                  if ( $result=="tang") { ?>
                 <a style="color: #ff8181;" href="{{Request::url()}}?tien_coc=giam">Tiền Cọc&darr;</a>
                 <?php }elseif ($result=="giam"){?>
                 <a style="color: #ff8181;" href="{{Request::url()}}?tien_coc=tang">Tiền Cọc&uarr;</a>
                 <?php }}else{ ?>
                 <a href="{{Request::url()}}?tien_coc=tang">Tiền Cọc</a>
                <?php  }?>
            </th>
            <th>
               <?php 
                if (isset($_GET['tong_tien'])) {
                  $result=$_GET['tong_tien'];
                  if ( $result=="tang") { ?>
                 <a style="color: #ff8181;" href="{{Request::url()}}?tong_tien=giam">Tổng Tiền&darr;</a>
                 <?php }elseif ($result=="giam"){?>
                 <a style="color: #ff8181;" href="{{Request::url()}}?tong_tien=tang">Tổng Tiền&uarr;</a>
                 <?php }}else{ ?>
                 <a href="{{Request::url()}}?tong_tien=tang">Tổng Tiền</a>
                <?php  }?>
            </th>
            <th>
              <?php 
                if (isset($_GET['Ngay_Dat'])) {
                  $result=$_GET['Ngay_Dat'];
                  if ( $result=="tang") { ?>
                 <a style="color: #ff8181;" href="{{Request::url()}}?Ngay_Dat=giam">Ngày Đặt&darr;</a>
                 <?php }elseif ($result=="giam"){?>
                 <a style="color: #ff8181;" href="{{Request::url()}}?Ngay_Dat=tang">Ngày Đặt&uarr;</a>
                 <?php }}else{ ?>
                 <a href="{{Request::url()}}?Ngay_Dat=tang">Ngày Đặt</a>
                <?php  }?>
            </th>
            <th>
              <?php 
                if (isset($_GET['Trang_thai'])) {
                  $result=$_GET['Trang_thai'];
                  if ( $result=="tang") { ?>
                 <a style="color: #ff8181;" href="{{Request::url()}}?Trang_thai=giam">Trang Thái&darr;</a>
                 <?php }elseif ($result=="giam"){?>
                 <a style="color: #ff8181;" href="{{Request::url()}}?Trang_thai=tang">Trang Thái&uarr;</a>
                 <?php }}else{ ?>
                 <a href="{{Request::url()}}?Trang_thai=tang">Trang Thái</a>
                <?php  }?>
            </th>
            <th></th>
          </tr>
        </thead>
        
        
        <tbody>
          <?php foreach ($all_oder as $key => $value_oder): ?>  
        <tr>
         
         
           
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
           
            <td><span class="text-ellipsis" style="font-size: 17px;font-weight: 800;">
                  
                      <?php 
                          if($value_oder->trangthai==0){                
                            echo '<span style="color:green;">Chờ Xác Nhận</span>';
                          }elseif($value_oder->trangthai==1){
                            echo '<span style="color:orangered;">Chờ lấy hàng</span>';
                          }elseif($value_oder->trangthai==2){
                            echo '<span style="color:blue;">Đang Giao</span>';
                          }elseif($value_oder->trangthai==3){
                            echo '<span style="color:red;">Đã Giao</span>';
                          }elseif($value_oder->trangthai==4){
                            echo '<span style="color:#b90909;">Đã Hủy</span>';
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
        {{$all_oder->appends(Request::all())->links() }}
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
</section>
@endsection