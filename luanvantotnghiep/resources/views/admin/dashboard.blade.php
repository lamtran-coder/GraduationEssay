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

			<div class="thongke">
				<div class="bieudo">
				<form autocomplete="off" >
					@csrf 
							<p>Từ Ngày:</p> 
							<input type="text" class="form-control"  id="datepicker" style="width: 160px;">
							<p>Đến ngày:</p>
							<input type="text" class="form-control"  id="datepicker2"  style="width: 160px;" >
							<input type="button" id="btn-dashboard-filter" value="Lọc Kết Quả">
							<select class="loc_khoang_thoi_gian form-control" style="width: 160px;font-size: 17px;">
								<option>Chọn</option>
								<option value="7ngay">7 ngày</option>
								<option value="thangtruoc">Tháng Trước</option>
								<option value="12thang">12 tháng</option>
							</select>
				</form>

				<hr>
						<h3 style="text-align: center;text-transform: capitalize;">Thống kê danh số Tháng</h3>

					<div style="margin-top: 70px;background: white;">			
							<div id="mychart" style="height: 300px;"></div>
					</div>
			</div>
			</div>
		</div>



		
		<div class="agileits-w3layouts-stats">
					<div class="col-md-6 stats-info stats-last widget-shadow">
						<div class="stats-last-agile" style="background:#c7ebce;">
							
								
							<div class="row">
										

							<p class="title_thongke">Truy cập thống kê</p>
							<div id="my_statistical_access" style="height: 250px;background: #FFF; border-radius: 15px;"></div>
							<script type="text/javascript">
								new Morris.Bar({
									 
									  element: 'my_statistical_access',
									  
									 barColors: ['blue'],
									  data: [
									    { key: 'Đang online', value: <?php echo $visitor_count; ?> },
									    { key: 'Tháng trước', value: <?php echo $visitor_last_month_count; ?> },
									    { key: 'Tháng này', value: <?php echo $visitor_this_month_count; ?> },
									    { key: 'Một năm', value: <?php echo $visitor_year_count; ?> },
									    { key: 'Tổng truy cập', value: <?php echo $visitors_total; ?> }
									  ],
									  xkey: 'key',
									  ykeys: ['value'],
									  labels: ['Lược truy cập']
									});
							</script>
						</div>
								
							
						</div>
					</div>
					<div class="col-md-6 stats-info stats-last widget-shadow">
						<div class="stats-last-agile" style="background:#c7ebce;">
							
								
							<div class="row">	
							<p class="title_thongke" style="text-transform: capitalize;">Top 10 sản phẩm bán chạy nhất</p>
								<div id="top10product" style="height: 250px;background: #FFF; border-radius: 15px;text-transform: capitalize;" ></div>
							
						</div>
								
							
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
		</div>
	</section>

					
</section>
@endsection