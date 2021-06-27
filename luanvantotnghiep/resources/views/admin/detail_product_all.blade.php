@extends('admin_layout')
@section('admin_content')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      liệt kê chi tiết sản phẩm sản phẩm
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
            <th>Tên sản phẩm</th>
            <th>Màu</th>
            <th>Size</th>
            <th>Số lượng</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($all_detail_product as $key => $value_del): ?>
         	
         
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><span class="text-ellipsis">
              <?php foreach ($product_id as $key => $value_pro): ?>
                <?php if ($value_del->ma_sp==$value_pro->ma_sp): ?>
                  
                        {{$value_pro->ten_sp}}
                <?php endif ?>
              <?php endforeach ?>
            </span></td>
            <td><span class="text-ellipsis">
              <?php foreach ($color_id as $key => $value_color): ?>
                <?php if ($value_del->ma_mau==$value_color->ma_mau): ?>
                  <img src="public/uploads/color/{{$value_color->anh_mh}}" width="100px" height="20px" alt="">
                <?php endif ?>
              <?php endforeach ?>
            </span></td>
            <td><span class="text-ellipsis">{{$value_del->ma_size}}</span></td>
            <td><span class="text-ellipsis">{{$value_del->so_lg}}</span></td>s
            <td><span class="text-ellipsis">
            <td> <!-- <a href="{{URL::to('/edit-detail-product/'.$value_del->ma_sp)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                <br>
              <a href="{{URL::to('/delete-product/'.$value_del->ma_sp)}}" class="active styling-edit" ui-toggle-class="" onclick="return confirm('bạn muốn xóa sản phẩm này?')">
              <i class="fa fa-times text-danger text"></i></a> -->
            </td>
          </tr>

    	<?php endforeach ?>
         
          
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm"></small>
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