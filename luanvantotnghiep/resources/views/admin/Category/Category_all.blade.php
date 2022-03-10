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
       <form >
      <div class="col-sm-8">
        <div class="input-group" style="display:flex;">
          <input type="text" class="input-sm form-control"name="keywords_submit" placeholder="nhập Mã, Tên Danh Mục, Tên Thiết Kế, Tên Chất Liệu">
         
            <button >TÌM</button>
         
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
                <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Ma=giam">Mã danh mục&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Ma=tang">Mã danh mục&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Sap_Xep_Ma=tang">Mã danh mục</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['Sap_Xep_ten'])) {
                $result=$_GET['Sap_Xep_ten'];
                if ($result=="Z-A") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_ten=A-Z">Tên danh mục&darr;</a>
               <?php }elseif ($result=="A-Z"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_ten=Z-A">Tên danh mục&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Sap_Xep_ten=A-Z">Tên danh mục</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['Thiet_Ke'])) {
                $result=$_GET['Thiet_Ke'];
                if ($result=="Z-A") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Thiet_Ke=A-Z">Thiết kế&darr;</a>
               <?php }elseif ($result=="A-Z"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Thiet_Ke=Z-A">Thiết kế&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Thiet_Ke=A-Z">Thiết kế</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['Chat_Lieu'])) {
                $result=$_GET['Chat_Lieu'];
                if ($result=="Z-A") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Chat_Lieu=A-Z">Chất liệu&darr;</a>
               <?php }elseif ($result=="A-Z"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Chat_Lieu=Z-A">Chất liệu&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Chat_Lieu=A-Z">Chất liệu</a>
              <?php  }?>
            </th>
            
            <th>
              <?php 
              if (isset($_GET['Trang_thai'])) {
                $result=$_GET['Trang_thai'];
                if ($result=="0") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Trang_thai=1">Trang thái&darr;</a>
               <?php }elseif ($result=="1"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Trang_thai=0">Trang thái&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Trang_thai=1">Trang thái</a>
              <?php  }?>
            </th>
            <th></th>
            
          </tr>
        </thead>
        <tbody>
          @foreach($all_Category as $key => $value)
          <tr>
           
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
            <td><span class="text-ellipsis">{{$value->ten_tk}}</span></td>
            <td><span class="text-ellipsis">{{$value->ten_cl}}</span></td>
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
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {{$all_Category->appends(Request::all())->links() }}
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