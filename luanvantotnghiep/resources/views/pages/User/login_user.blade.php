@extends('layout')
@section('index_content')				
<div class="main-w3layouts wrapper">
		<div class="main-agileinfo">
			<div class="agileits-top">
				<h1 class="color">điền thông tin</h1>
					<hr>
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
					<hr>
				<form action="{{URL::to('/login-us')}}"method="POST" >
					@csrf
					<label style="color:#FFF">Email</label>
					<?php if ($errors->has('email')): ?>
                    <span style="color:red;">{{$errors->first('email')}}</span>
                	<?php endif ?>
					<input class="text email" type="text" id="email" name="email" value="{{old('email')}}">
					<label style="color:#FFF">Mật Khẩu</label>
					<?php if ($errors->has('password')): ?>
                    <span style="color:red;">{{$errors->first('password')}}</span>
                	<?php endif ?>
					<input class="text" type="password" id="password" name="password"  value="{{old('password')}}">
					<input type="submit" class="submit-dangky" value="ĐĂNG NHẬP">
				</form>
				<p><a class="dangnhapngay" href="{{URL::to('/sign-up')}}">TÀI KHOẢN MỚI</a></p>
                <?php if ($errors->has('username')): ?>
                   <span style="color:red;">{{$errors->first('username')}}</span>
                <?php endif ?>
				
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
