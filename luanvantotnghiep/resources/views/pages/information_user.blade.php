@extends('layout')
@section('index_content')
   
<div class="main-w3layouts wrapper">
		<div class="main-agileinfo">
			<div class="agileits-top">
				<?php  $use_id=Session::get('user_id'); ?>
				
					
						
				<h1 class="color">Thông Tin<br> Khách Hàng</h1>
				<form action="{{URL::to('/add-user')}}" method="POST">
					@csrf
					<label style="color: white;">Tên Khách Hàng</label>
					<input class="text email" type="text" name="username" placeholder="Tên Khách Hàng" 
					required="">
					<label style="color: white;">Số Điện Thoại</label>
					<input class="text email" type="text" name="phone" placeholder="số điện thoại" 
					required="">
					<label style="color: white;">Địa Chỉ</label>
					<input class="text email" type="text" name="address" placeholder="địa chỉ" 
					required="">
					
					<input type="submit" class="submit-dangky" name="add_user" value="Cập Nhật">
				</form>
				
			</div>
		</div>
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
@endsection     