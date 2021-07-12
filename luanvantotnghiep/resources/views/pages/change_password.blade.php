@extends('layout')
@section('index_content')
   
<div class="main-w3layouts wrapper">
		<div class="main-agileinfo">
			<div class="agileits-top">
				<?php  $use_id=Session::get('user_id'); ?>
				<?php foreach ($user_id as $key => $value_ps): ?>
                                	
                    <?php if ($value_ps->user_id==$use_id): ?>
						
				<h1 class="color">Đổi mật khẩu<br> Khách Hàng</h1><br>
				<form action="{{URL('/update-pass/'.$value_ps->user_id)}}" method="post">
					@csrf
					<label style="color: white;">Mật khẩu hiện tại</label>
					<input class="text email" type="password" name="matkhau" value="<?php echo $value_ps->matkhau; ?>"
					required="">
					<label style="color: white;">Mật khẩu mới</label>
					<input class="text email" type="password" name="matkhau1" value="" 
					required="">
					<label style="color: white;">Xác nhận lại mật khẩu</label>
					<input class="text email" type="password" name="matkhau2" value=""
					required="">
						
					<input type="submit" class="submit-dangky" name="add_user" value="Cập Nhật">
				</form>
				<?php endif ?>
	            <?php endforeach ?>    
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