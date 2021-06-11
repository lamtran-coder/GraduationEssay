@extends('layout')
@section('index_content')
 <div class="login">
          <div class="wrap">
				<div class="col_1_of_login span_1_of_login">
					<h4 class="title">Khách Hàng Mới</h4>
					<h5 class="sub_title">Tạo Tài Khoản</h5>
					<p>Bạn cần có tài khoản để đăng nhập vào webiste của chúng tôi
					<br> Nếu bạn chưa có tài khoản ấn vào đây để tạo tài khoản</p>
					<div class="button1">
					   <a href="{{URL::to('/sign-up')}}"><input type="submit" name="Tạo tài khoản	" value="Tạo tài khoản"></a>
					 </div>
					 <div class="clear"></div>
				</div>
				<div class="col_1_of_login span_1_of_login">
				  <div class="login-title">
	           		<h4 class="title">Đăng Nhập </h4>
					 <div class="comments-area">
						<form action="{{URL::to('/login-us')}}"method="POST">
							@csrf
							<p>
								<label>Tài khoản email</label>
								<span>*</span>
								<input type="text" name="email" value="">
							</p>
							<p>
								<label>Mật khẩu</label>
								<span>*</span>
								<input type="password" name="matkhau" value="">
							</p>
							 <p id="login-form-remember">
								<label><a href="#">Bạn quên mật khẩu ? </a></label>
								<p>
								<input type="submit" value="Đăng Nhập">
							</p>
							 </p>
						 	<p><?php 
                            $message=Session::get('message');
                            if($message){
                                echo '<span class>'.$message.'<span>';

                                Session::put('message',null);
                            }
                         ?>	 </p>
						</form>
					</div>
			      </div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
@endsection      
