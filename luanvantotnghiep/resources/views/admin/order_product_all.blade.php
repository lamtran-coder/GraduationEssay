@extends('admin_layout')
@section('admin_content')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách đơn hàng
    </div>
    <div class="row w3-res-tb">
      <form action="{{URL::to('/search-order')}}" method="post">
          @csrf
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control"name="keywords_submit" placeholder="nhập từ khóa" value="">
          <span class="input-group-btn">
          <button class="btn btn-sm btn-default" type="button">Tìm</button>
          </span>
        </div>
      </div>
      </form>
      </div>
    <div class="table-responsive">
        <div>
      <ul style="display: -webkit-inline-box;padding: 10px;">
        <form>
        <li style="padding-left: 20px;">
          <span>Từ</span>: 
          <input style="padding-left: 20px;" name="date_star" type="date">
          <span>Đến</span>:
          <input style="padding-left: 20px;"name="date_end" type="date">
         <button >Tìm</button>
        </li>
        </form>
      </ul>
      </div>
      <div style="float: right;padding-right: 13%;font-size: 20px;">
        <form >
          @csrf
        <select name="status_od"  >
          <option value="5">Hiện Thị Tất Cả</option>
          <option value="0">Đang Xử Lý</option>
          <option value="1">Đang Lấy Hàng</option>
          <option value="2">Đã Lấy Xong</option>
          <option value="3">Chưa Giao Hết</option>
           <option value="4">Đã Hoàn Thành</option>
        </select>
        <button>Tìm</button>
        </form>
      </div>
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
            
            <th>Tiền cọc</th>
            <th>Phí Giao</th>
            <th>tổng tiền</th>
            <th>ngày đặt</th>
            <th>trạng thái</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        
        
        <tbody>
          <?php foreach ($all_oder as $key => $value_oder): ?>  
        <tr>
         
         
           <th style="width:20px;">
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
            <td><span class="text-ellipsis">{{$value_oder->ngdat}}</span></td>
           
            <td><span class="text-ellipsis">
                  
                      <?php 
                          if($value_oder->trangthai==0){                
                            echo '<span style="color:#4C8720;">Đang xử lý</span>';
                          }elseif($value_oder->trangthai==1){
                            echo '<span style="color:#6AF3D6;">Đang lấy hàng</span>';
                          }elseif($value_oder->trangthai==2){
                            echo '<span style="color:#1A5FC6;">Đã Lấy Xong</span>';
                          }elseif($value_oder->trangthai==3){
                            echo '<span style="color:#E19712;">Chưa Giao Hết</span>';
                          }elseif($value_oder->trangthai==4){
                            echo '<span style="color:red;">Đã Hoàn Thành</span>';
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
          <small class="text-muted inline m-t-sm m-b-sm">showing 10</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          {{$all_oder->links()}}
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
</section>
@endsection