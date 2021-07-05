@extends('admin_layout')
@section('admin_content')

<section id="main-content">
	<section class="wrapper">
		<!-- //market-->
		<style type="text/css">
				p.title_thongke {
				    text-align: center;
				    font-size: 20px;
				    font-weight: bold;
				}
			</style>
		<div>
			<div class="market-updates">
				<div class="col-md-3 market-update-gd">
					<div class="market-update-block clr-block-2">
						<div class="col-md-4 market-update-right">
							<i class="fa fa-eye"> </i>
						</div>
						 <div class="col-md-8 market-update-left">
						 <h4>Khách hàng</h4>
						<h3><?php echo $customer ?></h3>
						<p>Tổng Khách hàng Đang Có </p>
					  </div>
					  <div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-3 market-update-gd">
					<div class="market-update-block clr-block-1">
						<div class="col-md-4 market-update-right">
							<i class="fa fa-users" ></i>
						</div>
						<div class="col-md-8 market-update-left">
						<h4>Bình luận</h4>
							<h3><?php echo $comment ?></h3>
							<p>Tổng Bình Luận Đang Có </p>
						</div>
					  <div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-3 market-update-gd">
					<div class="market-update-block clr-block-3">
						<div class="col-md-4 market-update-right">
							<i class="fa fa-usd"></i>
						</div>
						<div class="col-md-8 market-update-left">
							<h4>Sản phẩm</h4>
							<h3><?php echo $product ?></h3>
							<p>Tổng Sản Phẩm Đang Có </p>
						</div>
					  <div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-3 market-update-gd">
					<div class="market-update-block clr-block-4">
						<div class="col-md-4 market-update-right">
							<i class="fa fa-shopping-cart" aria-hidden="true"></i>
						</div>
						<div class="col-md-8 market-update-left">
							<h4>Đơn hàng</h4>
							<h3><?php echo $order ?></h3>
							<p>Tổng Đơn Hàng Đang Có </p>
						</div>
					  <div class="clearfix"> </div>
					</div>
				</div>
			   <div class="clearfix"> </div>
			</div>	
		<!-- //market-->
		<div class="row">
			<div class="panel-body">
				<div class="col-md-12 w3ls-graph">

				</div>
			</div>
		</div>
		<div class="agil-info-calendar">
		<!-- calendar -->
		<div class="col-md-6 agile-calendar">
			<div class="calendar-widget">
                <div class="panel-heading ui-sortable-handle">
					<span class="panel-icon">
                      <i class="fa fa-calendar-o"></i>
                    </span>
                    <span class="panel-title"> Calendar Widget</span>
                </div>
				<!-- grids -->
					<div class="agile-calendar-grid">
						<div class="page">
							
							<div class="w3l-calendar-left">
								<div class="calendar-heading">
									
								</div>
								<div class="monthly" id="mycalendar"></div>
							</div>
							
							<div class="clearfix"> </div>
						</div>
					</div>
			</div>
		</div>
		<!-- //calendar -->
		<div class="col-md-6 w3agile-notifications">
			<div class="notifications">
				<!--notification start-->
				
					<header class="panel-heading">
						Notification 
					</header>
					<div class="notify-w3ls">
						<div class="alert alert-info clearfix">
							<span class="alert-icon"><i class="fa fa-envelope-o"></i></span>
							<div class="notification-info">
								<ul class="clearfix notification-meta">
									<li class="pull-left notification-sender"><span><a href="#">Jonathan Smith</a></span> send you a mail </li>
									<li class="pull-right notification-time">1 min ago</li>
								</ul>
								<p>
									Urgent meeting for next proposal
								</p>
							</div>
						</div>
						<div class="alert alert-danger">
							<span class="alert-icon"><i class="fa fa-facebook"></i></span>
							<div class="notification-info">
								<ul class="clearfix notification-meta">
									<li class="pull-left notification-sender"><span><a href="#">Jonathan Smith</a></span> mentioned you in a post </li>
									<li class="pull-right notification-time">7 Hours Ago</li>
								</ul>
								<p>
									Very cool photo jack
								</p>
							</div>
						</div>
						<div class="alert alert-success ">
							<span class="alert-icon"><i class="fa fa-comments-o"></i></span>
							<div class="notification-info">
								<ul class="clearfix notification-meta">
									<li class="pull-left notification-sender">You have 5 message unread</li>
									<li class="pull-right notification-time">1 min ago</li>
								</ul>
								<p>
									<a href="#">Anjelina Mewlo, Jack Flip</a> and <a href="#">3 others</a>
								</p>
							</div>
						</div>
						<div class="alert alert-warning ">
							<span class="alert-icon"><i class="fa fa-bell-o"></i></span>
							<div class="notification-info">
								<ul class="clearfix notification-meta">
									<li class="pull-left notification-sender">Domain Renew Deadline 7 days ahead</li>
									<li class="pull-right notification-time">5 Days Ago</li>
								</ul>
								<p>
									Next 5 July Thursday is the last day
								</p>
							</div>
						</div>
						<div class="alert alert-info clearfix">
							<span class="alert-icon"><i class="fa fa-envelope-o"></i></span>
							<div class="notification-info">
								<ul class="clearfix notification-meta">
									<li class="pull-left notification-sender"><span><a href="#">Jonathan Smith</a></span> send you a mail </li>
									<li class="pull-right notification-time">1 min ago</li>
								</ul>
								<p>
									Urgent meeting for next proposal
								</p>
							</div>
						</div>
						
					</div>
				
				<!--notification end-->
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		
		<div class="agileits-w3layouts-stats">
					<div class="col-md-4 stats-info widget">
						<div class="stats-info-agileits">
							<div class="stats-title">
								<h4 class="title_thongke">Thống kê tổng sản phẩm bài viết đơn hàng</h4>
							</div>
							<div class="stats-body" id="donut">
								<ul class="list-unstyled">


								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-8 stats-info stats-last widget-shadow">
						<div class="stats-last-agile">
							<table class="table stats-table ">
								<thead>
								<div class="row">
	<style type="text/css">
		table.table.table-bordered.table-dark {
		    background: #32383e;
		}
		table.table.table-bordered.table-dark tr th {
		    color: #fff;
		}
	</style>

<p class="title_thongke">Thống kê truy cập</p>

<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">Đang online</th>
      <th scope="col">Tổng tháng trước</th>
      <th scope="col">Tổng tháng này</th>
      <th scope="col">Tổng một năm</th>
      <th scope="col">Tổng truy cập</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{$visitor_count}}</td>
      <td>{{$visitor_last_month_count}}</td>
      <td>{{$visitor_this_month_count}}</td>
      <td>{{$visitor_year_count}}</td>
      <td>{{$visitors_total}}</td>
    </tr>
   
  </tbody>
</table>

</div>
								</thead>
								<tbody>
								
						
					
								
								
								</tbody>
							</table>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
		</div>
	</section>
</section>
@endsection