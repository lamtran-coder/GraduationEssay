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
     
      
        <div class="col-sm-8">
          <div class="form-group">
       <form style="display:flex;">
          <input type="text" class="input-sm form-control"name="keywords_submit" placeholder="nhập tên ảnh sự kiện" value="">
          <button >TÌM</button>
       </form>
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
             <th>Tên Ảnh Sự Kiện</th>
            <th>Hình ảnh</th>
            <th>Mô tả</th>
            <th>Tình trạng</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
       <tbody>
          @foreach($all_slide as $key => $slide)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $slide->slider_name }}</td>
            <td><img src="public/uploads/slider/{{ $slide->slider_image }}" height="300" width="500"></td>
            <td>{{ $slide->slider_desc }}</td>
            <td><span class="text-ellipsis">
              <?php
               if($slide->slider_status==1){
                ?>
                <a href="{{URL::to('/unactive-slide/'.$slide->slider_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up" 
                  style="font-size: 25px;color: green;"></span></a>
                <?php
                 }else{
                ?>  
                 <a href="{{URL::to('/active-slide/'.$slide->slider_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"
                   style="font-size: 25px;color: red;"></span></a>
                <?php
               }
              ?>
            </span></td>
            <td>
             
              <a onclick="return confirm('Bạn có chắc là muốn xóa slide này ko?')" href="{{URL::to('/delete-slide/'.$slide->slider_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>

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
            {{ $all_slide->links() }}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
</section>
@endsection