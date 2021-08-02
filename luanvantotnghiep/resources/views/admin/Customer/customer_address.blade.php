@extends('admin_layout')
@section('admin_content')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
  <div class="panel panel-default">
    <section class="content-header">
                    <ol class="breadcrumb">
                        <li><a href="{{URL::to('/dashboard')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                        <li><a href="{{URL::to('/all-product')}}">Đang Sách Khách Hàng</a></li>
                        <li class="active">Người Nhận</li>
                    </ol>
    </section>  
    <div class="panel-heading">
      Danh sách Người nhận
    </div>
    <div class="row w3-res-tb">
       <form >
      <div class="col-sm-8">
        <div class="input-group" style="display:flex;">
          <input type="text" class="input-sm form-control"name="keywords_submit" placeholder="nhập từ khóa" value="">
          
            <button >Tìm</button>
        
        </div>
      </div>
      </form>
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
                <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Ma=giam">Mã người nhận&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Ma=tang">Mã người nhận&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Sap_Xep_Ma=tang">Mã người nhận</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['Sap_Xep_Ten'])) {
                $result=$_GET['Sap_Xep_Ten'];
                if ($result=="Z-A") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Ten=A-Z">Tên người nhận&darr;</a>
               <?php }elseif ($result=="A-Z"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Ten=Z-A">Tên người nhận&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Sap_Xep_Ten=Z-A">Tên người nhận</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['Sap_Xep_SDT'])) {
                $result=$_GET['Sap_Xep_SDT'];
                if ($result=="Z-A") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_SDT=A-Z">Số điện thoại&darr;</a>
               <?php }elseif ($result=="A-Z"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_SDT=Z-A">Số điện thoại&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Sap_Xep_SDT=Z-A">Số điện thoại</a>
              <?php  }?>
            </th>
            <th width="100px">
              <?php 
              if (isset($_GET['Sap_Xep_DC'])) {
                $result=$_GET['Sap_Xep_DC'];
                if ($result=="Z-A") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_DC=A-Z">Địa chỉ&darr;</a>
               <?php }elseif ($result=="A-Z"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_DC=Z-A">Địa chỉ&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Sap_Xep_DC=Z-A">Địa chỉ</a>
              <?php  }?>
            </th>
            <th>
               <?php 
              if (isset($_GET['Tong_Don'])) {
                $result=$_GET['Tong_Don'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Tong_Don=giam">Tổng Đơn&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Tong_Don=tang">Tổng Đơn&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Tong_Don=tang">Tổng Đơn</a>
              <?php  }?>
            </th>
            <th>
               <?php 
              if (isset($_GET['Tong_San_Pham'])) {
                $result=$_GET['Tong_San_Pham'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Tong_San_Pham=giam">Tổng Sản Phẩm&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Tong_San_Pham=tang">tổng Sản Phẩm&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Tong_San_Pham=tang">tổng Sản Phẩm</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['Tong_Mua_Sap'])) {
                $result=$_GET['Tong_Mua_Sap'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Tong_Mua_Sap=giam">Tổng Tiền Mua Sắm&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Tong_Mua_Sap=tang">Tổng Tiền Mua Sắm&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Tong_Mua_Sap=tang">Tổng Tiền Mua Sắm</a>
              <?php  }?>
            </th>
             <th>
              <?php 
              if (isset($_GET['Tong_Phi_Giao'])) {
                $result=$_GET['Tong_Phi_Giao'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Tong_Phi_Giao=giam">Tổng Phí Giao&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Tong_Phi_Giao=tang">Tổng Phí Giao&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Tong_Phi_Giao=tang">Tổng Phí Giao</a>
              <?php  }?>
             </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($customer_id as $key => $value_cus): ?>
          <tr>
           
            <td><span class="text-ellipsis">{{$value_cus->ma_kh}}</span></td>
            <td><span class="text-ellipsis">{{$value_cus->ten_kh}}</span></td>
            <td><span class="text-ellipsis">{{$value_cus->sodt}}</span></td>
            <td><span class="text-ellipsis">{{$value_cus->diachi}}</span></td>
            <td><span class="text-ellipsis">{{$value_cus->sodon}}</span></td>
            <td><span class="text-ellipsis">{{$value_cus->solgsp}}</span></td>
            <td><span class="text-ellipsis" style="color:red;font-size: 18px;"><?php echo number_format($value_cus->tongmua); ?></span></td>
            <td><span class="text-ellipsis" style="color:red;font-size: 18px;"><?php echo number_format($value_cus->tonggiao); ?></span></td>
          </tr>
          <?php endforeach ?>
         
          
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
         
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          {{$customer_id->appends(Request::all())->links()}}
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
</section>
@endsection