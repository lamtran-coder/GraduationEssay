@extends('layout')
@section('index_content')				
<div class="main-w3layouts wrapper">
		<div class="main-agileinfo">
			<div class="agileits-top">
				<h1 class="color">điền thông tin</h1>
				<form action="{{URL::to('/login-us')}}"method="POST"onsubmit="return validation();">
					@csrf
					<input class="text email" type="text" id="email" name="email" placeholder="Email" >
					<input class="text" type="password" id="password" name="password" placeholder="mật khẩu" >
					<input type="submit" class="submit-dangky" value="ĐĂNG NHẬP">
				</form>
				<p><a class="dangnhapngay" href="{{URL::to('/sign-up')}}">TÀI KHOẢN MỚI</a></p>
                
			</div>
		</div>
<script type="text/javascript">
	function validation()
	{
	    var email_user =document.getElementById('email').value;
	    var password_user =document.getElementById('password').value;
	    var regexEmail=/\b[A-Z0-9._%+-]+@(?:[A-Z0-9-]+\.)+[A-Z]{2,6}\b/i;
	    var regexPassword=/\ /;
	    if(email_user==""||password_user==""){
	        alert("*** vui lòng nhập [email - mật khẩu] không để trống ***");
	        return false;
	    }else if(!regexEmail.test(email_user)){
	    	alert("*** vui lòng nhập định đạng email không hợp lệ ***");
	        return false;
	    }else if (regexPassword.test(password_user)) {
	    	alert("*** vui lòng nhập lại mật khẩu***")
	    	return false;
	    }
	}
</script>
		
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
