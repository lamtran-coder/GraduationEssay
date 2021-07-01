@extends('admin_layout')
@section('admin_content')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      liệt kê sản phẩm
    </div>
   <div class="row w3-res-tb">
      <div class="col-sm-4">
         <div></div>
      </div>
       <form action="{{URL::to('/search-product-ad')}}" method="post">
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
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Mô tả</th>
            <th>Giá góc</th>
            <th>Giá sale</th>
            <th>Trang thái</th>
            <th>Chiết khấu</th>
            <th>Danh mục</th>
            <th>Cài đặt</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($all_product as $key => $value_pro): ?>
         	
         
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><span class="text-ellipsis">{{$value_pro->ma_sp}}</span></td>
            <td><span class="text-ellipsis">{{$value_pro->ten_sp}}</span></td>
            <td><span class="text-ellipsis">
              <?php
              foreach ($img_id as $key => $value_img) {
                if(($value_img->ma_sp==$value_pro->ma_sp)&&($value_img->goc_nhin==0)){

                echo '<img src="public/uploads/product/'.$value_img->hinhanh.'" alt="" height="100px" width="100px"></span></td>';
                }
              }
               ?>
            <td><span class="text-ellipsis">{{$value_pro->solg_sp}}</span></td>
             <?php 
                
              echo '<td><span class="text-ellipsis">'.substr($value_pro->mo_ta,0,20).'...'.'</span></td>';
            ?>
            <td><span class="text-ellipsis">{{$value_pro->gia_goc}}</span></td>
            <td><span class="text-ellipsis">{{$value_pro->gia_sale}}</span></td>
            <td><span class="text-ellipsis">
               <?php

                if($value_pro->solg_sp==0){
                  echo "Tạm hết hàng";
                }else{
                  echo "còn sản phẩm";
                }
                ?>
            </span></td>
            <td><span class="text-ellipsis">{{$value_pro->chiet_khau}}</span></td>
            <td><span class="text-ellipsis">{{$value_pro->ma_dm}}</span></td>
            <td> <a href="{{URL::to('/edit-product/'.$value_pro->ma_sp)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                <br>
              <a href="{{URL::to('/delete-product/'.$value_pro->ma_sp)}}" class="active styling-edit" ui-toggle-class="" onclick="return confirm('bạn muốn xóa sản phẩm này?')">
              <i class="fa fa-times text-danger text"></i></a>
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
            {{  $all_product->links() }}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
</section>
@endsection