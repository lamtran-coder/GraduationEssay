
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
Th??ng b??o</p>
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
                <li><a href="{{url::to('/trang-ca-nhan')}}"><i class=" fa fa-suitcase"></i>C?? nh??n</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> C??i ?????t</a></li>
                <li><a href="{{url::to('/logout')}}"><i class="fa fa-key"></i>????ng xu???t</a></li>
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
                        <span>Qu???n L?? ???nh S??? Ki???n</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-slider')}}">Th??m S??? Ki???n</a></li>
                        <li><a href="{{URL::to('/manage-slider')}}">Danh S??ch S??? Ki???n</a></li>
                    </ul>
                    
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Qu???n L?? Danh M???c </span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-Category')}}">Danh m???c m???i</a></li>
						<li><a href="{{URL::to('/all-Category')}}">Danh m???c</a></li>
					</ul>
                    
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Qu???n L?? S???n ph???m</span>
                    </a>
                     <ul class="sub">
						<li><a href="{{URL::to('/add-product')}}">S???n ph???m m???i</a></li>
						<li><a href="{{URL::to('/all-product')}}">Danh s??ch s???n ph???m</a></li>    
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Qu???n L?? Khuy???n M??i</span>
                    </a>
                     <ul class="sub">
                        <li><a href="{{URL::to('/add-promotion')}}">Th??m M?? M???i</a></li>
                        <li><a href="{{URL::to('/all-promotion')}}">Danh s??ch Khuy???n M??i</a></li>    
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="{{URL::to('/comment')}}">
                        <i class="fa fa-book"></i>
                        <span>Danh S??ch B??nh lu???n</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="{{URL::to('/all-customer')}}">
                        <i class="fa fa-book"></i>
                        <span>Danh S??ch Kh??ch H??ng</span>
                    </a>              
                </li>
                <li class="sub-menu">
                    <a href="{{URL::to('/all-order')}}">
                        <i class="fa fa-book"></i>
                        <span>Danh S??ch ????n ?????t H??ng</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="{{URL::to('/all-delivery-notes')}}">
                        <i class="fa fa-book"></i>
                        <span>Danh S??ch Phi???u Giao</span>
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

<!-- bi???u ????? Th???ng k?? doanh thu theo th??ng -->
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
                            labels: ['????n h??ng','doanh s???','Phi v???n chuy???n','s??? l?????ng']
                        
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
<!-- //bi???u ????? Th???ng k?? doanh thu theo th??ng -->

<!-- bi???u ????? s???n ph???m b??n ch???y nh???t -->
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
                labels: ['s??? l?????ng']
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
<!-- //bi???u ????? s???n ph???m b??n ch???y nh???t -->




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
            prevText:"Th??ng Tr?????c",
             nextText:"Th??ng Sau", 
             dateFormat:"dd-mm-yy",
              dayNamesMin:['Th??? 2','Th??? 3','Th??? 4','Th??? 5','Th??? 6','Th??? 7','Ch??? Nh???t'], 
              duration:"show"
        });
      } );
      $( function() {
        $( "#datepicker" ).datepicker({
            prevText:"Th??ng Tr?????c",
             nextText:"Th??ng Sau", 
             dateFormat:"dd-mm-yy",
              dayNamesMin:['Th??? 2','Th??? 3','Th??? 4','Th??? 5','Th??? 6','Th??? 7','Ch??? Nh???t'], 
              duration:"show"
        });
      } );  
    </script>
	<!-- //calendar -->
    
</body>
</html>
