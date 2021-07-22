@extends('admin_layout')
@section('admin_content')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách khách hàng
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-4">
        <?php if (isset($_GET['keywords_search'])): ?>
            <span style="color:red;font-size: 20px;padding-left: 30px;font-weight: bolder;">Từ Khóa: <?php echo $result=$_GET['keywords_search']; ?></span>
        <?php endif ?>
      </div>
      <div class="col-sm-3">
        <?php if (isset($_GET['keywords_search'])): ?>
        <a href="{{URL::to('/all-customer')}}" style="color:red;font-size: 20px;padding-left: 30px;font-weight: bolder;">Hiện Tất Cả</a>
        <?php endif ?>
      </div>
       <form >
        <div class="col-sm-4">
          <div class="input-group">
            <input type="text" class="input-sm form-control" name="keywords_search" placeholder="nhập từ khóa">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Tìm</button>
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
    
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>So điện thoại</th>
            <th>Địa chỉ</th>
            <th>Tiền Đã Tiêu</th>
            <th>Xem Người Nhận</th>
          </tr>
        </thead>
        <tbody  style="text-transform: none;">
          <?php foreach ($use_id as $key => $value_user): ?>
            
         
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
           
            <td><span class="text-ellipsis">{{$value_user->ten_nd}}</span></td>
            <td><span class="text-ellipsis">{{$value_user->email}}</span></td>
            <td><span class="text-ellipsis">{{$value_user->sodt}}</span></td>
            <td><span class="text-ellipsis" id="AnHien{{$key}}">{{$value_user->diachi}}</span>
                 <script>
                  $(document).ready(function() {
                    $("#AnHien{{$key}}").hide();
                      $("#button{{$key}}").click(function(){
                          $("#AnHien{{$key}}").toggle();
                      });
                  });
                  </script>
                  <button id="button{{$key}}">...</button>
            </td>
            <td><span class="text-ellipsis" style="color:red;font-size: 20px;">
                <?php
                 
                $Sum_od=0;
                foreach ($customer_id as $key => $val) {
                  if ($value_user->email==$val->email) {
                      foreach ($order_id as $key => $value_od) {
                        if ($val->ma_kh==$value_od->ma_kh) {
                          $Sum_od+=$value_od->tong_tt; 
                        }
                      }
                  }
                } 
                echo number_format($Sum_od);
                ?>
            </span></td>
            <td><a href="{{URL::to('/dia-chi-nhan/'.$value_user->email)}}"><i class="fa fa-search" style="font-size: 30px;"></i></a></td>
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
            {{$use_id->links()}}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
</section>
@endsection