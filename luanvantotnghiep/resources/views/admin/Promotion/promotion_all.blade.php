@extends('admin_layout')
@section('admin_content')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh Sách khuyến mãi
    </div>
   <div class="row w3-res-tb">      
      <div class="col-sm-5">
        <?php 
          if(isset($_GET['keywords_search'])){
            $keywords_search=$_GET['keywords_search'];
          }else{$keywords_search="";}
         ?>
       <form>
        <div class="input-group" style="display:flex;">
          <input type="text" class="input-lg form-control"name="keywords_search" placeholder="nhập mã khuyến mãi" value="<?php echo $keywords_search ?>">
            <button class="btn">Tìm</button>
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
                <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Ma=giam">Mã Khuyến Mãi&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Ma=tang">Mã Khuyến Mãi&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Sap_Xep_Ma=tang">Mã Khuyến Mãi</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['Sap_Xep_Gia_Tri'])) {
                $result=$_GET['Sap_Xep_Gia_Tri'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Gia_Tri=giam">Giá Trị&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Gia_Tri=tang">Giá Trị&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Sap_Xep_Gia_Tri=tang">Giá Trị</a>
              <?php  }?>
            </th>
             <th>
              <?php 
              if (isset($_GET['Phuong_Thuc'])) {
                $result=$_GET['Phuong_Thuc'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Phuong_Thuc=giam">Phương Thức&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Phuong_Thuc=tang">Phương Thức&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Phuong_Thuc=tang">Phương Thức</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['So_luong'])) {
                $result=$_GET['So_luong'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?So_luong=giam">Số Lượng&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?So_luong=tang">Số Lượng&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?So_luong=tang">Số Lượng</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['Ngay_Cap'])) {
                $result=$_GET['Ngay_Cap'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Ngay_Cap=giam">Ngày Cấp&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Ngay_Cap=tang">Ngày Cấp&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Ngay_Cap=tang">Ngày Cấp</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['Han_Su_Dung'])) {
                $result=$_GET['Han_Su_Dung'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Han_Su_Dung=giam">Hạn Sử Dụng&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Han_Su_Dung=tang">Hạn Sử Dụng&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Han_Su_Dung=tang">Hạn Sử Dụng</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['Ma_San_Pham'])) {
                $result=$_GET['Ma_San_Pham'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Ma_San_Pham=giam">Chế Độ&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Ma_San_Pham=tang">Chế Độ&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Ma_San_Pham=tang">Chế Độ</a>
              <?php  }?>
            </th>
            <th>Gửi Email</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($promotion_id as $key_pro => $value_pmt): ?>
          <tr>
            <td><span class="text-ellipsis">{{$value_pmt->ma_km}}</span></td>
            <td><span class="text-ellipsis">{{number_format($value_pmt->gia_tri)}}</span></td>
            <td><span class="text-ellipsis">
              <?php if ($value_pmt->p_thuc==0) {
                echo 'Vnd';
              }else{
                echo '%';
              } ?>
            </span></td>
            <td><span class="text-ellipsis">{{$value_pmt->ngcap}}</span></td>
            <td><span class="text-ellipsis">{{$value_pmt->hsd}}</span></td>
            <td><span class="text-ellipsis">{{$value_pmt->so_lg}}</span></td>
            <td><span class="text-ellipsis">{{$value_pmt->ma_sp}}</span></td>
            <td><span class="text-ellipsis">
              <button type="submit" class="btn btn-info">Sử Dụng</button>
              <button>Đã Hủy</button>
            </span></td>
            <td>
              <div class="action">
              <a href="{{URL::to('/edit-product/')}}" class="active styling-edit" ui-toggle-class="">
              <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a href="{{URL::to('/delete-product/')}}" class="active styling-edit" ui-toggle-class="" onclick="return confirm('bạn muốn xóa sản phẩm này?')">
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
          {{$promotion_id->appends(Request::all())->links() }}
          </ul>
        </div>
      </div>
    </footer>
    <?php 
      $message=Session::get('message');
      if($message){?>
          <script type="text/javascript">
          $(document).ready(function(){
              alert('{{$message}}');
          });
          </script>';
  <?php Session::put('message',null);}?>

  </div>
</div>
</section>
</section>
@endsection