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
        <div class="col-sm-12">
        <form >
          <div class="input-group" style="display:flex;">
            <input type="text" class="input-lg form-control" name="keywords_search" placeholder="nhập tên khách hàng, số điện thoại, email, địa chỉ ">
              <button class="btn  btn-default">Tìm</button>
          </div>
        </form>
        </div>
      <div class="col-sm-4">
        
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr class="thanhloc">
            <th>
              <?php 
              if (isset($_GET['Sap_Xep_Ten'])) {
                $result=$_GET['Sap_Xep_Ten'];
                if ($result=="A-Z") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Ten=Z-A">Tên khách hàng&darr;</a>
               <?php }elseif ($result=="Z-A"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Ten=A-Z">Tên khách hàng&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Sap_Xep_Ten=A-Z">Tên khách hàng</a>
              <?php  }?>
            </th>
            <th>
               <?php 
              if (isset($_GET['Sap_Xep_Email'])) {
                $result=$_GET['Sap_Xep_Email'];
                if ($result=="A-Z") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Email=Z-A">Email&darr;</a>
               <?php }elseif ($result=="Z-A"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Email=A-Z">Email&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Sap_Xep_Email=A-Z">Email</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['Sap_Xep_SDT'])) {
                $result=$_GET['Sap_Xep_SDT'];
                if ($result=="A-Z") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_SDT=Z-A">Số điện thoại&darr;</a>
               <?php }elseif ($result=="Z-A"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_SDT=A-Z">Số điện thoại&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Sap_Xep_SDT=A-Z">Số điện thoại</a>
              <?php  }?>
            </th>
            <th>
              <?php 
              if (isset($_GET['Sap_Xep_Dia_Chi'])) {
                $result=$_GET['Sap_Xep_Dia_Chi'];
                if ($result=="A-Z") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Dia_Chi=Z-A">Địa chỉ&darr;</a>
               <?php }elseif ($result=="Z-A"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Sap_Xep_Dia_Chi=A-Z">Địa chỉ&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Sap_Xep_Dia_Chi=A-Z">Địa chỉ</a>
              <?php  }?>
            </th>
            
            <th><?php 
              if (isset($_GET['Trang_thai'])) {
                $result=$_GET['Trang_thai'];
                if ($result=="tang") { ?>
                <a style="color: #ff8181;" href="{{Request::url()}}?Trang_thai=giam">Trạng Thái&darr;</a>
               <?php }elseif ($result=="giam"){?>
               <a style="color: #ff8181;" href="{{Request::url()}}?Trang_thai=tang">Trạng Thái&uarr;</a>
              <?php }}else{ ?>
               <a href="{{Request::url()}}?Trang_thai=tang">Trạng Thái</a>
              <?php  }?></th>
            <th><i class="fa fa-users-cog"></i></th>
          </tr>
        </thead>
        <tbody  style="text-transform: none;">
          <?php foreach ($use_id as $key => $value_user): ?>
          <tr>
            <td><span class="text-ellipsis">{{$value_user->ten_nd}}</span></td>
            <td><span class="text-ellipsis">{{$value_user->email}}</span></td>
            <td><span class="text-ellipsis">{{$value_user->sodt}}</span></td>
            <td><span class="text-ellipsis" id="AnHien{{$key}}">{{$value_user->diachi}}</span>
                 <script>
                  $(document).ready(function() {
                    $("#AnHien{{$key}}").hide();
                      $("#button{{$key}}").click(function(){
                          $("#AnHien{{$key}}").toggle();
                      });
                  });
                  </script>
                  <button class="btn" id="button{{$key}}">...</button>
            </td>
    
            <td><span class="text-ellipsis" >
              <form action="{{URL::to('/update-status-user/'.$value_user->user_id)}}" method="post">
                @csrf
              <div class="form-group" style="display:flex;width: 200px;">
                  <?php if ($value_user->trang_thai==0){
                echo'<select class="form-control input-lg option-status" name="status_user" style="color:lime;background:#0994a1;width: 200px;">';
                    echo '<option value="0">Đang Hoạt Động</option>';
                    echo '<option style="color:yellow;" value="1">Khóa Tạm Thời</option>';
                    echo '<option style="color:#a30303;" value="2">Khóa Vĩnh Viển</option>';
                echo'</select>';    
                       }elseif ($value_user->trang_thai==1) {
                echo'<select class="form-control input-lg option-status" name="status_user" style="color:yellow;background:#0994a1;width: 200px;">';
                    echo '<option value="1">Khóa Tạm Thời</option>';
                    echo '<option style="color:lime;" value="0">Đang Hoạt Động</option>';
                echo'</select>';    
                       }elseif ($value_user->trang_thai==2) {
                echo'<select class="form-control input-lg option-status" name="status_user" style="color:#a30303;background:#0994a1;width: 200px;">';
                    echo '<option value="2">Khóa Vĩnh Viển</option>';    
                    echo '<option style="color:lime;" value="0">Đang Hoạt Động</option>';
                echo'</select>'; 
                       }
                  ?>
                
                <button class="btn">UPDATE</button>
              </div>
              </form>
            </span></td>
            <td><a href="{{URL::to('/dia-chi-nhan/'.$value_user->email)}}"><i class="fa fa-search" style="font-size: 30px;"></i></a></td>
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
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {{ $use_id->appends(Request::all())->links() }}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
</section>
@endsection