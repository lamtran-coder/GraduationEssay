
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>adminlayout</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />

<link href="{{asset('public/backend/css/edit_main.css')}}" rel='stylesheet' type='text/css' />

<link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}">
<!-- //calendar -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<!-- //font-awesome icons -->
<script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
<script src="{{asset('public/backend/js/morris.js')}}"></script>
<meta name="csrf-token" content="{{csrf_token()}}"> <!-- binh luan -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="{{URL::to('/dashboard')}}" class="logo">
        ADMIN
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- settings start -->

        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-tasks"></i>
                <span class="badge bg-success">1</span>
            </a>
            <ul class="dropdown-menu extended tasks-bar">
                <li>
                    <p class="">Bạn có 1 nhiệm vụ đang chờ xử lý</p>
                </li>
                
                <li>
                    <a href="#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Mục tiêu bán</h5>
                                <p>25% , Hạn cuối ngày 1 tháng 9 năm 21</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="45">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>
               
                <li class="external">
                    <a href="#">Xem tất cả nhiệm vụ</a>
                </li>
            </ul>
        </li>

        <!-- settings end -->
        <!-- inbox dropdown start-->
        <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-envelope-o"></i>
                <span class="badge bg-important">1</span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <li>
                    <p class="red">Bạn có 1 Mails</p>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="{{('public/backend/images/3.png')}}"></span>
                                <span class="subject">
                                <span class="from">Trần Tiến</span>
                                <span class="time">Vừa rồi</span>
                                </span>
                                <span class="message">
                                    Xin chào, đây là một tin nhắn ví dụ.
                                </span>
                    </a>
                </li>
               
                <li>
                    <a href="#">Xem tất cả tin nhắn</a>
                </li>
            </ul>
        </li>
        <!-- inbox dropdown end -->
        <!-- notification dropdown start-->
        <li id="header_notification_bar" class="dropdown">
                
            
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                <i class="fa fa-bell-o"></i>
                <?php foreach ($solg_messe as $key => $so_lg): ?>
                    <span class="badge bg-warning">{{$so_lg->solg}}</span>     
                <?php endforeach ?>
            </a>
            <ul class="dropdown-menu extended notification">
                <li>
                    <p>
Thông báo</p>
                </li>
                <li>
            <?php foreach ($message_id as $key => $val_mes): ?>
                <?php if ($val_mes->che_do!='admin'): ?>
                    
               
                    <div class="alert alert-info clearfix" style="background:#e9e3e3;">
                        <span class="alert-icon"style="background:red;"><i class="fa fa-bolt" ></i></span>
                        <div class="noti-info">
                            <a href="#" style="text-transform: capitalize;">{{$val_mes->noi_dung}}</a>
                            <br><?php echo date('H:i:s d-m-Y',strtotime($val_mes->thoi_gian)); ?>
                        </div>
                    </div>
                 <?php endif ?>
            <?php endforeach ?>
                </li>

            </ul>
        </li>
        <!-- notification dropdown end -->
    </ul>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
           <!--  <input type="text" class="form-control search" placeholder=" Search" > -->
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{('public/backend/images/2.png')}}">
                <span class="username">
                <?php 
                $name=Session::get('ten');
                $email=Session::get('email');
                $phone=Session::get('sodt');
                if($name){echo $name;}
                ?>
         
     </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="{{url::to('/trang-ca-nhan')}}"><i class=" fa fa-suitcase"></i>Cá nhân</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Cài đặt</a></li>
                <li><a href="{{url::to('/logout')}}"><i class="fa fa-key"></i>Đăng xuất</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">    
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản Lý Ảnh Sự Kiện</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-slider')}}">Thêm Sự Kiện</a></li>
                        <li><a href="{{URL::to('/manage-slider')}}">Danh Sách Sự Kiện</a></li>
                    </ul>
                    
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản Lý Danh Mục </span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-Category')}}">Danh mục mới</a></li>
						<li><a href="{{URL::to('/all-Category')}}">Danh mục</a></li>
					</ul>
                    
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản Lý Sản phẩm</span>
                    </a>
                     <ul class="sub">
						<li><a href="{{URL::to('/add-product')}}">Sản phẩm mới</a></li>
						<li><a href="{{URL::to('/all-product')}}">Danh sách sản phẩm</a></li>    
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="{{URL::to('/comment')}}">
                        <i class="fa fa-book"></i>
                        <span>Danh Sách Bình luận</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="{{URL::to('/all-customer')}}">
                        <i class="fa fa-book"></i>
                        <span>Danh Sách Khách Hàng</span>
                    </a>              
                </li>
                <li class="sub-menu">
                    <a href="{{URL::to('/all-order')}}">
                        <i class="fa fa-book"></i>
                        <span>Danh Sách Đơn Đặt Hàng</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="{{URL::to('/all-delivery-notes')}}">
                        <i class="fa fa-book"></i>
                        <span>Danh Sách Phiếu Giao</span>
                    </a>
                </li>
                
               
               
            </ul>          
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<div>
    @yield('admin_content')
    @yield('personal_information_content')

</div>
	
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  
			</div>
		  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
<!-- morris JavaScript -->	
<!-- binhluan -->
<link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="{{asset('public/frontend/js/sweetalert.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
<!-- binh luan -->

<!-- biều đồ Thống kê doanh thu theo tháng -->
<script type="text/javascript">
        $(document).ready(function(){
                chart30daysorder();
                    var chart = new Morris.Bar({
                          element: 'mychart',
                          //option chart
                          barColors: ['#819C79', '#fc8710','#FF6541', '#A4ADD3', '#766B56'],
                            parseTime: false,
                            hideHover: 'auto',
                            xkey: 'ngdat',
                           ykeys: ['tongdon', 'banhang','phivanchuyen','solg'],
                            labels: ['đơn hàng','doanh số','Phi vận chuyển','số lượng']
                        
                        });
            
             function chart30daysorder(){
                 var _token = $('input[name="_token"]').val();
                 $.ajax({
                     url: "{{url('/loc-nhieu-ngay')}}",
                     method: "POST",
                     dataType: "JSON",
                     data:{_token:_token},
                     success:function(data){
                         chart.setData(data);
                     }
                 });
                }

            $('#btn-dashboard-filter').click(function(){
               
                var _token = $('input[name="_token"]').val();

                var from_date = $('#datepicker').val();
                var to_date = $('#datepicker2').val();
                 $.ajax({
                    url:"{{url('/loc-theo-ngay')}}",
                    method:"POST",
                    dataType:"JSON",
                    data:{from_date:from_date,to_date:to_date,_token:_token},
                    success:function(data)
                        {
                            chart.setData(data);
                        }   
                });
            });
            $('.loc_khoang_thoi_gian').change(function(){
                var dashboard_value = $(this).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{url('/loc-khoang-thoi-gian')}}",
                    method: "POST",
                    dataType: "JSON",
                    data:{dashboard_value:dashboard_value,_token:_token},
                    success:function(data){
                        chart.setData(data);
                    }
                });
            });
        });
    </script>
<!-- //biều đồ Thống kê doanh thu theo tháng -->

<!-- biều đồ sản phẩm bán chạy nhất -->
<script type="text/javascript">
    $(document).ready(function(){
        banchaytop10();  
        var dcchart=new Morris.Bar({
                element: 'top10product',
                barColors: ['#FF6541','#766B56','#819C79', '#fc8710', '#A4ADD3'],
                parseTime: false,
                hideHover: 'auto',
                xkey: 'ma_sp',
                ykeys: ['solgsp'],
                labels: ['số lượng']
            });
        function banchaytop10(){
             var _token = $('input[name="_token"]').val();
             $.ajax({
                 url: "{{url('/ban-chay-top10')}}",
                 method: "POST",
                 dataType: "JSON",
                 data:{_token:_token},
                 success:function(data){
                     dcchart.setData(data);
                 }
             });
            }
        });
</script>
<!-- //biều đồ sản phẩm bán chạy nhất -->

<!-- duyet binh lan -->
<script type="text/javascript">
    $('.comment_duyet_btn').click(function(){
        var comment_status = $(this).data('comment_status');
        var comment_id = $(this).data('comment_id');
        var comment_product_id = $(this).attr('id');
        // alert(comment_status);
        //  alert(comment_id);
        //   alert(comment_product_id);
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


<!-- calendar -->
	<script type="text/javascript" src="{{asset('public/backend/js/monthly.js')}}"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
    <script type="text/javascript">
      $( function() {
        $( "#datepicker2" ).datepicker({
            prevText:"Tháng Trước",
             nextText:"Tháng Sau", 
             dateFormat:"dd-mm-yy",
              dayNamesMin:['Thứ 2','Thứ 3','Thứ 4','Thứ 5','Thứ 6','Thứ 7','Chủ Nhật'], 
              duration:"show"
        });
      } );
      $( function() {
        $( "#datepicker" ).datepicker({
            prevText:"Tháng Trước",
             nextText:"Tháng Sau", 
             dateFormat:"dd-mm-yy",
              dayNamesMin:['Thứ 2','Thứ 3','Thứ 4','Thứ 5','Thứ 6','Thứ 7','Chủ Nhật'], 
              duration:"show"
        });
      } );  
    </script>
	<!-- //calendar -->
    
</body>
</html>
