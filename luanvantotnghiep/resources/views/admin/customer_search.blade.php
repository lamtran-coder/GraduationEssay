@extends('admin_layout')
@section('admin_content')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Khách hàng cần tìm 
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-4">
         <div><a href="{{URL::to('/all-customer')}}"> trở về danh sách khách hàng</a></div>
      </div>
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
             <th>Mã khách hàng</th>
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>trạng thái</th>
            <th>địa chỉ</th>
            <th></th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
         
            @foreach ($search_cus as $key => $value)
          <tr>
            <td><span class="text-ellipsis">{{$value->ma_kh}}</span></td>
            <td><span class="text-ellipsis">{{$value->ten_kh}}</span></td>
            <td><span class="text-ellipsis">{{$value->email}}</span></td>
            <td><span class="text-ellipsis">{{$value->sodt}}</span></td>
            <td><span class="text-ellipsis">
            <?php if($value->trangthai==0){
                  echo"khách hàng tìm năng";
                }else{
                  echo"khách hàng chính thức";
                }
            ?>
                  
            </span></td>
            <td><span class="text-ellipsis">{{$value->diachi}}</span></td>
          </tr>
          
        @endforeach
          
         
          
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