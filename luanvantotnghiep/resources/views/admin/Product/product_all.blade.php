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
      </div>
      
      <div class="col-sm-8">
       <form>
        <div class="input-group">
          <input type="text" class="input-sm form-control"name="keywords_search" placeholder="nhập mã sản phẩm, tên sản phẩm, mã danh mục" >
          <span class="input-group-btn">
            <input type="button" class="btn btn-sm btn-default" value="Tìm" >
          </span>
         </div>
        </form>
        </div>
      </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr class="thanhloc">
            <th>
              <?php 
              if (isset($_GET['Sap_Xep_Ma'])) {
                $result=$_GET['Sap_Xep_Ma'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Ma=giam">Mã sản phẩm&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Ma=tang">Mã sản phẩm&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Sap_Xep_Ma=tang">Mã sản phẩm</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['Sap_Xep_Ten'])) {
                $result=$_GET['Sap_Xep_Ten'];
                if ($result=="A-Z") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Ten=Z-A">Tên&darr;</a>
               <?php }elseif ($result=="Z-A"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Ten=A-Z">Tên&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Sap_Xep_Ten=A-Z">Tên</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['Hinh'])) {
                $result=$_GET['Hinh'];
                if ($result=="khong") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Hinh=co">Hình ảnh&darr;</a>
               <?php }elseif ($result=="co"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Hinh=khong">Hình ảnh&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Hinh=khong">Hình ảnh</a>
              <?php  }?>
            </th>
          
            <th style="width: 70px;">
              <?php 
              if (isset($_GET['Mo_Ta'])) {
                $result=$_GET['Mo_Ta'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Mo_Ta=giam">Mô tả&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Mo_Ta=tang">Mô tả&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Mo_Ta=tang">Mô tả</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['Gia_Goc'])) {
                $result=$_GET['Gia_Goc'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Gia_Goc=giam">Giá gốc&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Gia_Goc=tang">Giá gốc&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Gia_Goc=tang">Giá gốc</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['Gia_Sale'])) {
                $result=$_GET['Gia_Sale'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Gia_Sale=giam">Giá sale&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Gia_Sale=tang">Giá sale&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Gia_Sale=tang">Giá sale</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['so_luong'])) {
                $result=$_GET['so_luong'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?so_luong=giam">Số lượng&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?so_luong=tang">Số lượng&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?so_luong=tang">Số lượng</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['chiet_khau'])) {
                $result=$_GET['chiet_khau'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?chiet_khau=giam">Chiết khấu&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?chiet_khau=tang">Chiết khấu&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?chiet_khau=tang">Chiết khấu</a>
              <?php  }?>
            </th>
            <th>
               <?php 
              if (isset($_GET['Danh_Muc'])) {
                $result=$_GET['Danh_Muc'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Danh_Muc=giam">Danh mục&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Danh_Muc=tang">Danh mục&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Danh_Muc=tang">Danh mục</a>
              <?php  }?>
            </th>
            <th></th>
           
          </tr>
        </thead>
        <tbody>
        <?php foreach ($all_product as $key_pro => $value_pro): ?>
         	
         
          <tr>
            
            <td><span class="text-ellipsis">{{$value_pro->ma_sp}}</span></td>
            <td><span class="text-ellipsis">{{$value_pro->ten_sp}}</span></td>
            <td><span class="text-ellipsis">
              <a href="{{URL::to('/add-images-product/'.$value_pro->ma_sp)}}">              
              <img src="{{URL::to('public/uploads/product/'.$value_pro->hinhanh)}}" alt="" height="100px" width="100px"></span></td>
             </a>
          
            <td>
              <span class="text-ellipsis" id="AnHien{{$key_pro}}">{{$value_pro->mo_ta}}</span>
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
            <td><span class="text-ellipsis">{{$value_pro->solg}}</span></td>
            <td><span class="text-ellipsis">{{$value_pro->chiet_khau}}%</span></td>
            <td><span class="text-ellipsis">{{$value_pro->ma_dm}}</span></td>
              
              
            <td>
              <form>
              <select name="dogMenu" id="{{$value_pro->ma_sp}}" class="dogMenu">
                <option selected="selected" value="{{url::to('/all-product')}}">Chọn</option>
                <option value="{{URL::to('/add-images-product/'.$value_pro->ma_sp)}}">Hình Ảnh</option>
                <option value="{{URL::to('/add-detail-product/'.$value_pro->ma_sp)}}">Chi Tiêt</option>
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
              <!-- <a href="{{URL::to('/delete-product/'.$value_pro->ma_sp)}}" class="active styling-edit" ui-toggle-class="" onclick="return confirm('bạn muốn xóa sản phẩm này?')">
              <i class="fa fa-times text-danger text"></i></a>     -->
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
          {{$all_product->appends(Request::all())->links() }}
          </ul>
        </div>
      </div>
    </footer>
   

  </div>
</div>
</section>
</section>
@endsection