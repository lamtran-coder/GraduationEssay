@extends('admin_layout')
@section('admin_content')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt Kê Danh Sách sản phẩm
    </div>
   <div class="row w3-res-tb">
    <div class="col-sm-4 m-b-xs">
      <form style="display: flex;">
        <select  name="option_product" class="form-control" style="width: 200px;">
          <option value="tatca">Tất Cả</option>
          <option value="tang">Giá Tăng Dần</option>
          <option value="giam">Giá Giảm Dân</option>
        </select>
           <button  type="submit">Tìm</button>
        </form>                
      </div>
      <div class="col-sm-4">
        <span style="font-size: 18px;font-weight: bold; text-transform: capitalize;">Tìm Kiếm Theo "</span><span style="color :red;font-weight: bold;">
        <?php if (isset($_GET['option_product'])) {
                  $result=$_GET['option_product'];
                  if ($result=='tang') {
                    echo "Giá Sale Tăng Dần";
                  }elseif($result=='giam'){
                    echo "Giá Sale Giảm Dần";
                  }else{
                    echo "Tất Cả";
                  }
              }elseif(isset($_GET['keywords_search'])){
                echo $result=$_GET['keywords_search'];
              }else{
                echo "Tất Cả";
              } 
        ?> "
        </span>
      </div>
       <form>
      <div class="col-sm-4">
        <div class="input-group">
          <input type="text" class="input-sm form-control"name="keywords_search">
          <span class="input-group-btn">
            <input type="button" class="btn btn-sm btn-default" value="Tìm">
          </span>
         </div>
        </div>
        </form>
      </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead style="font-size:15px">
          <tr >
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Mã sản phẩm<br>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Mô tả</th>
            <th>Giá góc</th>
            <th>Giá sale</th>
            <th>Trang thái</th>
            <th>Chiết khấu</th>
            <th>Danh mục</th>
            <th>Cài đặt</th>
           
          </tr>
        </thead>
        <tbody>
        <?php foreach ($all_product as $key_pro => $value_pro): ?>
         	
         
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><span class="text-ellipsis">{{$value_pro->ma_sp}}<hr>{{$value_pro->ten_sp}}</span></td>
            <td><span class="text-ellipsis">
              <a href="{{URL::to('/add-images-product/'.$value_pro->ma_sp)}}">              
              <?php
              foreach ($img_id as $key => $value_img) {
                if(($value_img->ma_sp==$value_pro->ma_sp)&&($value_img->goc_nhin==0)){

                echo '<img src="public/uploads/product/'.$value_img->hinhanh.'" alt="" height="100px" width="100px"></span></td>';
                }
              }
               ?>
             </a>
            <td><span class="text-ellipsis">{{$value_pro->solg_sp}}</span></td>
            <td><span class="text-ellipsis" id="AnHien{{$key_pro}}">{{$value_pro->mo_ta}}</span>
                 <script>
                  $(document).ready(function(){
                    $("#AnHien{{$key_pro}}").hide();
                      $("#button{{$key_pro}}").click(function(){
                          $("#AnHien{{$key_pro}}").toggle();
                      });
                  });
                  </script>
                  <button style="background:#0e9ada;" id="button{{$key_pro}}">...</button>
            </td>
           
            <td><span class="text-ellipsis"><?php echo number_format($value_pro->gia_goc); ?></span></td>
            <td><span class="text-ellipsis"><?php echo number_format($value_pro->gia_sale); ?></span></td>
            <td><span class="text-ellipsis">
               <?php

                if($value_pro->solg_sp==0){
                  echo "Tạm hết hàng";
                }else{
                  echo "còn sản phẩm";
                }
                ?>
            </span></td>
            <td><span class="text-ellipsis">{{$value_pro->chiet_khau}}%</span></td>
            <td><span class="text-ellipsis">{{$value_pro->ma_dm}}</span></td>
              
              
            <td>
              <form>
              <select name="dogMenu" id="{{$value_pro->ma_sp}}" class="dogMenu">
                <option selected="selected" value="{{url::to('/all-product')}}">Chọn</option>
                <option value="{{URL::to('/add-images-product/'.$value_pro->ma_sp)}}">Thêm Ảnh</option>
                <option value="{{URL::to('/add-detail-product/'.$value_pro->ma_sp)}}">Thêm Chi Tiêt</option>
              </select>
              </form>
              <script type="text/javascript">
               $(document).ready(function(){
                    $('#{{$value_pro->ma_sp}}').change(function(){
                      var chn=$(this).val();
                      if (chn||chn!=""||chn!="notthing") {
                        window.location=chn;
                      }
                      return false;
                    });
               });
              </script>
              <hr>
              <div class="action">
              <a href="{{URL::to('/edit-product/'.$value_pro->ma_sp)}}" class="active styling-edit" ui-toggle-class="">
              <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a href="{{URL::to('/delete-product/'.$value_pro->ma_sp)}}" class="active styling-edit" ui-toggle-class="" onclick="return confirm('bạn muốn xóa sản phẩm này?')">
              <i class="fa fa-times text-danger text"></i></a>    
              </div>  
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