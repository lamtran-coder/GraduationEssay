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
            <th>Mã khách hàng</th>
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>So điện thoại</th>
            <th>Địa chỉ</th>
            <th>Xem Địa Chỉ Nhận</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($use_id as $key => $value_user): ?>
            
         
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><span class="text-ellipsis">{{$value_user->user_id}}</span></td>
            <td><span class="text-ellipsis">{{$value_user->ten_nd}}</span></td>
            <td><span class="text-ellipsis">{{$value_user->email}}</span></td>
            <td><span class="text-ellipsis">{{$value_user->sodt}}</span></td>
            <td><span class="text-ellipsis">{{$value_user->diachi}}</span></td>
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