@extends('layout')
@section('index_content')
<div class="main-w3layouts wrapper">
		<div class="main-agileinfo">
			<div class="agileits-top">
				<h1 class="color">điền thông tin</h1>
				<form action="{{URL::to('/add-user')}}" method="POST" style="font-size: 14px;">
					@csrf
					<hr>
					<label style="color:white;">Họ Và Tên</label>
					<?php if ($errors->has('username')): ?>
                        <span style="color:red;">{{$errors->first('username')}}</span>
                        <br>
                    <?php endif ?>
					<input class="text email" type="text" id="username" name="username" value="{{old('username')}}">

					<label style="color:white;">Số Điện Thoại</label>
					<?php if ($errors->has('phone')): ?>
                        <span style="color:red;">{{$errors->first('phone')}}</span>
                        <br>
                    <?php endif ?>
					<input class="text email" type="text" id="phone" name="phone" value="{{old('phone')}}">

					<label style="color:white;">Địa Chỉ</label>
					<?php if ($errors->has('address')): ?>
                        <span style="color:red;">{{$errors->first('address')}}</span>
                        <br>
                    <?php endif ?>
					<input class="text email" type="text" id="address" name="address" value="{{old('address')}}">

					<label style="color:white;">Email</label>
					<?php if ($errors->has('email')): ?>
                        <span style="color:red;">{{$errors->first('email')}}</span>
                        <br>
                    <?php endif ?>
					<input class="text email" type="text" id="email" name="email" value="{{old('email')}}">

					<label style="color:white;">Mật Khẩu</label>
					<?php if ($errors->has('password')): ?>
                        <span style="color:red;">{{$errors->first('password')}}</span>
                        <br>
                    <?php endif ?>
					<input class="text email" type="password" id="password" name="password"  value="{{old('password')}}">

					<label style="color:white;">Mật Khẩu Xác Nhận</label>
					<?php if ($errors->has('password2')): ?>
                        <span style="color:red;">{{$errors->first('password2')}}</span>
                        <br>
                    <?php endif ?>
					<input class="text w3lpass" type="password" id="password2" name="password2" value="{{old('password2')}}" >
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" >
							<span>Tôi đồng ý với các <a class="dieukhoan" href="">Điều khoản & Điều kiện</a></span>
						</label>
						<div class="clear"> </div>
					</div>
				
					<input type="submit" class="submit-dangky" name="add_user" value="ĐĂNG KÝ">

				</form>
				<p><a class="dangnhapngay" href="{{URL::to('/login-user')}}"> ĐĂNG NHẬP NGAY</a></p>
			</div>
		</div>
		<?php 
          $message=Session::get('message');
           if($message){ ?>
             <script type="text/javascript">
                $(document).ready(function(){
                    alert('<?php echo $message; ?>')
                });
             </script>   
            <?php Session::put('message',null); 
        }?> 
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
