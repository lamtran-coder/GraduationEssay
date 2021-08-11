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
			<div class="col-md-4 stats-info stats-last widget-shadow">
				<div class="stats-last-agile" style="background:#c7ebce;">
					<div class="row">
					<p class="title_thongke">Trang Thái Đơn Đặt Hàng</p>
					<div id="donut" style="height: 250px;background: #FFF; border-radius: 15px;"></div>
				    </div>
				</div>
			</div>
			<div class="col-md-4 stats-info stats-last widget-shadow">
				<div class="stats-last-agile" style="background:#c7ebce;">
					
						
					<div class="row">	
					<p class="title_thongke" style="text-transform: capitalize;">Top 10 sản phẩm bán chạy nhất</p>
						<div id="top10product" style="height: 250px;background: #FFF; border-radius: 15px;text-transform: capitalize;" ></div>
					
				</div>
						
					
				</div>
			</div>
			<div class="col-md-4 stats-info stats-last widget-shadow">
				<div class="stats-last-agile" style="background:#c7ebce;">
					
						
					<div class="row">	
					<p class="title_thongke" style="text-transform: capitalize;">Số Lượng Xử Lý Của Nhân Viên</p>
						<div id="danhgianv" style="height: 250px;background: #FFF; border-radius: 15px;text-transform: capitalize;" ></div>
					<!-- biều đồ trang thái đơn hàng-->
					<script type="text/javascript">
					    $(document).ready(function(){
					            var donut = Morris.Donut({
					              element: 'donut',
					              resize: true,
					              colors: [
					                'green',
					                '#f5b942',
					                '#4842f5',
					                'orange',
					                'red'
					                
					              ],    
					              data: [
					                {label:"Đang Xữ Lý", value:<?php echo $Dangxuly; ?>},
					                {label:"Cho Lấy Hàng", value:<?php echo $Cholayhang; ?>},
					                {label:"Đang Giao", value:<?php echo $Danggiao; ?>},
					                {label:"Đã Nhận", value:<?php echo $Danhan; ?>},
					                {label:"Đã Hủy", value:<?php echo $Dahuy; ?>} 
					              ]
					            });
					         
					    });
					</script>
					<!-- biều đồ trang thái đơn hàng-->
					</div>
						
				<!-- biều đồ Đanh giá Xử lý của nhận viên-->
				<script type="text/javascript">
				$(document).ready(function(){
				        danhgianv();
				        var dgchart=new Morris.Bar({
				                element: 'danhgianv',
				                barColors: ['green','#766B56','#819C79', '#fc8710', '#A4ADD3'],
				                parseTime: false,
				                hideHover: 'auto',
				                xkey: 'tennv',
				                ykeys: ['solgxl'],
				                labels: ['số lượng phiếu giao']
				            });
				        function danhgianv(){
				            var _token = $('input[name="_token"]').val();
				             $.ajax({
				                 url: "{{url('/dang-gia-nhan-vien')}}",
				                 method: "POST",
				                 dataType: "JSON",
				                 data:{_token:_token},
				                 success:function(data){
				                     dgchart.setData(data);
				                 }
				            });
				        }
				     
				});
				</script>
				<!-- biều đồ Đanh giá Xử lý của nhận viên-->
	
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	  </div>
	</section>

					
</section>
@endsection