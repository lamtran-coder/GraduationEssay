@extends('admin_layout')
@section('admin_content')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      liệt kê danh mục
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
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
            <th>Mã danh mục</th>
            <th>Tên danh mục</th>
            <th>Thiết kế</th>
            <th>Chất liệu</th>
            
            <th>Trang thái</th>
            <th>Cài đặt</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_Category as $key => $value)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><span class="text-ellipsis">{{$value->ma_dm}}</span></td>
            <td><span class="text-ellipsis">
              <?php
                if ($value->danh_muc=="AO") {
                  echo'Áo';
                }elseif($value->danh_muc=="QU"){
                  echo'Quần';
                }elseif($value->danh_muc=="GI"){
                  echo'Giày';
                }elseif($value->danh_muc=="PK"){
                  echo 'Phụ kiện';
                }
              
               ?>


            </span></td>

            <!-- //hiển thị tên thiết kế -->
            <?php foreach ($design_id as $key => $value_des): ?>
              <?php if ($value->ma_tk==$value_des->ma_tk): ?>
                <td><span class="text-ellipsis">{{$value_des->ten_tk}}</span></td>
              <?php endif ?>
            <?php endforeach ?>

            <!-- //hiển thị tên chất liệu -->
            <?php foreach ($material_id as $key => $value_mat): ?>
              <?php if ($value->ma_cl==$value_mat->ma_cl): ?>
                <td><span class="text-ellipsis">{{$value_mat->ten_cl}}</span></td>
              <?php endif ?>
            <?php endforeach ?> 


           
            <td><span class="text-ellipsis">
            <?php 
              if ($value->trang_thai==1) {
                ?>
                <a href="{{URL::to('/unactive-category/'.$value->ma_dm)}}" ><span class="fa-thumbs-styling fa fa-thumbs-up">Hiện thị</span></a>
            <?php 
             }else{
              ?>
               <a href="{{URL::to('/active-category/'.$value->ma_dm)}}"><span class="fa-thumbs-styling fa fa-thumbs-down">Ẩn</span></a>
            <?php
             }
             ?>

            </span></td>
            <td>
              <a href="{{URL::to('/edit-Category/'.$value->ma_dm)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                <br>
              <a href="{{URL::to('/delete-Category/'.$value->ma_dm)}}" class="active styling-edit" ui-toggle-class="" onclick="return confirm('bạn muốn xóa danh mục này?')">
              <i class="fa fa-times text-danger text"></i></a>
            </td>
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