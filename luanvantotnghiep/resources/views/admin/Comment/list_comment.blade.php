@extends('admin_layout')
@section('admin_content')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách bình luận
    </div>
  
      <div id="notify_comment"></div>
      <div class="table-responsive">
         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <div id="notify_comment"></div>
        <thead>
          <tr>
            <th>Duyệt</th>
            <th>Tên người gửi</th>
            <th>Bình luận</th>
            <th>Ngày bình luận</th>
            <th>Sản phẩm</th>
            <th>Quản lý</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($comment as $key => $com): ?>
          <tr>
            <td><span class="text-ellipsis">
              @if($com->comment_status==1)
                <input type="button" data-comment_status="0" data-comment_id="{{$com->comment_id}}" id="{{$com->comment_product_id}}" class="btn btn-primary btn-xs comment_duyet_btn" value="Duyệt" >
              @else 
                <input type="button" data-comment_status="1" data-comment_id="{{$com->comment_id}}" id="{{$com->comment_product_id}}" class="btn btn-danger btn-xs comment_duyet_btn" value="Bỏ Duyệt" >
              @endif
             <style type="text/css">
                ul.list_rep li {
                  list-style-type: decimal;
                  color: blue;
                  margin: 5px 40px;
              }
              </style>

            </span></td>
            <td>{{$com->comment_name}}</td>
           <td>{{ $com->comment}}
            <ul class="list_rep">
              Trả lời :
              <?php foreach ($comment_rep as $key => $com_reply): ?>
                <?php if ($com_reply->comment_parent_comment==$com->comment_id): ?>
                <li>{{$com_reply->comment}}</li>
                <?php endif ?>
               <?php endforeach ?>
            </ul>
              @if($com->comment_status==0)
              <br/><textarea class="form-control reply_comment_{{$com->comment_id}}" rows="5"></textarea>
              <br/><button class="btn btn-reply-comment" data-product_id="{{$com->comment_product_id}}"  data-comment_id="{{$com->comment_id}}">Trả lời bình luận</button>
              @endif
           </td>
            <td><?php echo date("H:i:s d-m-Y ",strtotime($com->comment_date)); ?></td>
            <?php foreach ($all_product as $key => $value_pro): ?>
              <?php if ($com->comment_product_id==$value_pro->ma_sp): ?>     
            <td><a href="{{URL::to('/product-details/'.$value_pro->ma_sp)}} " target="_blank"> {{$value_pro->ten_sp}}</a></td>
             <?php endif ?>
            <?php endforeach ?>
            <td><span class="text-ellipsis">
              <a href="{{URL::to('/delete-comment/'.$com->comment_id)}}" class="active styling-edit" ui-toggle-class="" onclick="return confirm('bạn muốn xóa bình luận này?')">
              <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          
        <?php endforeach ?>
         	
         <!-- duyet binh lan -->
          <script type="text/javascript">
              $('.comment_duyet_btn').click(function(){
                  var comment_status = $(this).data('comment_status');
                  var comment_id = $(this).data('comment_id');
                  var comment_product_id = $(this).attr('id');
                  if(comment_status==0){
                      var alert = 'Thay đổi thành duyệt thành công';
                  }else{
                      var alert = 'Thay đổi thành không duyệt thành công';
                  }
                    $.ajax({
                          url:"{{url('/allow-comment')}}",
                          method:"POST",

                          headers:{
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                          data:{comment_status:comment_status,comment_id:comment_id,comment_product_id:comment_product_id},
                          success:function(data){
                              location.reload();
                             $('#notify_comment').html('<span class="text text-alert">'+alert+'</span>');

                          }
                      });
              });
              // tra loi binh luan
              $('.btn-reply-comment').click(function(){
                  var comment_id = $(this).data('comment_id');
                  var comment = $('.reply_comment_'+comment_id).val();
                  var comment_product_id = $(this).data('product_id');
                  
                  // alert(comment);
                  // alert(comment_id);
                  // alert(comment_product_id);
                  
                    $.ajax({
                          url:"{{url('/reply-comment')}}",
                          method:"POST",

                          headers:{
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                          data:{comment:comment,comment_id:comment_id,comment_product_id:comment_product_id},
                          success:function(data){
                              $('.reply_comment_'+comment_id).val('');
                               location.reload();
                             $('#notify_comment').html('<span class="text text-alert">Trả lời bình luận thành công</span>');

                          }
                      });
                     });
          </script>
          <!--  duyet binh luan them vao 2 file js sweetalert.min.js va sweetalert.js vaf css sweetalert.css -->
          
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm"></small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          {{$comment->appends(Request::all())->links() }}
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
</section>
@endsection