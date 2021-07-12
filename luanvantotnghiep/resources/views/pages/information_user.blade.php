@extends('layout')
@section('index_content')
   
<div class="main-w3layouts wrapper">
		<div class="main-agileinfo">
			<div class="agileits-top">
				<?php  $use_id=Session::get('user_id'); ?>
				
					<?php foreach ($user_id as $key => $value_ad): ?>
                                	
                    <?php if ($value_ad->user_id==$use_id): ?>
						
				<h1 class="color">Thông Tin<br> Khách Hàng</h1>
				<form action="{{URL('/update-ten-nv/'.$value_ad->user_id)}}" method="POST">
					@csrf
					<label style="color: white;">Tên Khách Hàng</label>
					<?php if ($errors->has('username')): ?>
                        <span style="color:red;">{{$errors->first('username')}}</span>
                        <br>
               		<?php endif ?>
					<input class="text email" type="text" name="username" value="<?php echo $value_ad->ten_nd; ?>">


					<label style="color: white;">Số Điện Thoại</label>
					<?php if ($errors->has('phone')): ?>
                        <span style="color:red;">{{$errors->first('phone')}}</span>
                        <br>
               		<?php endif ?>
					<input class="text email" type="text" name="phone" value="<?php echo $value_ad->sodt; ?>" >


					<label style="color: white;">Địa Chỉ</label>
					<?php if ($errors->has('address')): ?>
                        <span style="color:red;">{{$errors->first('address')}}</span>
                        <br>
               		<?php endif ?>
					<input class="text email" type="text" name="address" value="<?php echo $value_ad->diachi; ?>">


					<label style="color: white;">Email</label>
					<?php if ($errors->has('email')): ?>
                        <span style="color:red;">{{$errors->first('email')}}</span>
                        <br>
               		<?php endif ?>
					<input class="text email" type="text" name="email" value="<?php echo $value_ad->email; ?>">
					<p><a class="text email" href="{{URL::to('/change-pass')}}"> đổi mật khẩu</a></p>

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