@extends('layout')
@section('index_content')
   
<div class="main-w3layouts wrapper">
		<div class="main-agileinfo">
			<div class="agileits-top">
				<h1 class="color">điền thông tin</h1>
				<form action="{{URL::to('/add-user')}}" method="POST">
					@csrf
					<input class="text email" type="text" name="username" placeholder="Tên Khách Hàng" 
					required="">
					<input class="text email" type="text" name="phone" placeholder="số điện thoại" 
					required="">
					<input class="text email" type="text" name="address" placeholder="địa chỉ" 
					required="">
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="mật khẩu" required="">
					<input class="text w3lpass" type="password" name="password2" placeholder="Xác nhận mật khẩu"
					 required="">
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>Tôi đồng ý với các <a class="dieukhoan" href="">Điều khoản & Điều kiện</a></span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" class="submit-dangky" name="add_user" value="ĐĂNG KÝ">
				</form>
				<p><a class="dangnhapngay" href="{{URL::to('/login-user')}}"> ĐĂNG NHẬP NGAY</a></p>
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
