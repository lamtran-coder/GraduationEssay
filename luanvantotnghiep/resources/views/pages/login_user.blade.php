@extends('layout')
@section('index_content')				
<div class="main-w3layouts wrapper">
		<div class="main-agileinfo">
			<div class="agileits-top">
				<h1 class="color">điền thông tin</h1>
				<form action="{{URL::to('/login-us')}}"method="POST">
					@csrf
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="mật khẩu" required="">
					<input type="submit" class="submit-dangky" value="ĐĂNG NHẬP">
				</form>
				<p><a class="dangnhapngay" href="{{URL::to('/sign-up')}}">TÀI KHOẢN MỚI</a></p>
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
