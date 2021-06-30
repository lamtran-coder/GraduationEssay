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
      <div class="col-sm-4">
         <div><a href="{{URL::to('/dashboard')}}"> trở về trang admin</a></div>
      </div>
       <form action="{{URL::to('/search-order')}}" method="post">
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
             <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>số lượng<br> sản phẩm</th>
            
             <th>Tiền cọc</th>
            <th>tổng tiền</th>
             <th>ngày đặt</th>
              
            <th>trạng thái</th>
            <th></th>
            <th style="width:30px;"></th>
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
            
            <td><span class="text-ellipsis">{{$value_oder->tien_coc}}</span></td>
            <td><span class="text-ellipsis">{{$value_oder->tong_tt}}</span></td>
            <td><span class="text-ellipsis">{{$value_oder->ngdat}}</span></td>
           
            <td><span class="text-ellipsis">
                <select>
                  <option>Đang chờ</option>
                  <option>Đang lấy Hàng</option>
                  <option>Đang giao</option>
                  <option>Đã Hủy</option>
                </select>
            </span></td>
                
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
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
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