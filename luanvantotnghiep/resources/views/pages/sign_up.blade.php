@extends('layout')
@section('index_content')
   
<div class="main-w3layouts wrapper">
		<div class="main-agileinfo">
			<?php 
				if (isset($_GET['username'])){
					
					$username=$_GET['username'];
				}else{
					$username="";
				}
			 ?>
			<div class="agileits-top">
				<h1 class="color">điền thông tin</h1>
				<form action="{{URL::to('/add-user')}}" method="POST">
					@csrf
					<hr>
					
					<input class="text email" type="text" id="username" name="username" >

					
					<input class="text email" type="text" id="phone" name="phone" >

					
					<input class="text email" type="text" id="address" name="address">

					
					<input class="text email" type="email" id="email" name="email" >

					
					<input class="text email" type="password" id="password" name="password"  >

					
					<input class="text w3lpass" type="password" id="password2" name="password2" >
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
	<	!-- 	<script type="text/javascript">
			function checkusername()
			{
			    var username =document.getElementById('username').value;
			    var check_erro_name =document.getElementById('error_name');
			    var regexUsername = /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/;
			    if (username==""||username==null) {
			    	check_erro_name.innerHTML=" <: ** Không được để trống **";
			    	return false;
			    }else if(!regexUsername.test(username)){
			    	check_erro_name.innerHTML=" <: ** Định dạng không hợp lệ **";
			    	return false;
			    }else{
			    	check_erro_name.innerHTML="";
			    	return username;
			    }
			   
			}
			function checkphone()
			{	
			    var phone =document.getElementById('phone').value;
			    var check_erro_phone =document.getElementById('error_phone');
			    var regexPhone =/(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/;
			    if (phone==""||phone==null) {
			    	check_erro_phone.innerHTML=" <: **Không được để trống**";
			    	
			    }else if (!regexPhone.test(phone)) {
			    	check_erro_phone.innerHTML=" <: **Định dạng không hợp lệ**";
			    }else{
			    	check_erro_phone.innerHTML="";
			    	return phone;
			    }
			   
			}
			function checkaddress()
			{
			    var address =document.getElementById('address').value;
			    var check_erro_address =document.getElementById('error_address');
			   	
			    if (address==""||address==null) {
			    	check_erro_address.innerHTML=" <: **Không được để trống**";
			    	
			    }else{
			    	check_erro_address.innerHTML="";
			    	return address;
			    }
			   
			}
			function checkemail(){
				var email =document.getElementById('email').value;
			    var check_error_email =document.getElementById('error_email');
			   	var regexEmail=/\b[A-Z0-9._%+-]+@(?:[A-Z0-9-]+\.)+[A-Z]{2,6}\b/i;
			    if (email==""||email==null) {
			    	check_error_email.innerHTML=" : **Không được để trống**";
			    	
			    }else if (!regexEmail.test(email)) {
			    	check_error_email.innerHTML=" : **Định dạng không hợp lệ**";
			    }else{
			    	check_error_email.innerHTML="";
			    	return email;
			    }
			}

			function checkpassword(){
				var password =document.getElementById('password').value;
			    var check_error_password =document.getElementById('error_password');
			   
			    if (password==""||password==null) {
			    	check_error_password.innerHTML=" : **Không được để trống**";
			    	
			    }else{
			    	check_error_password.innerHTML="";
			    	return password;
			    }
			}
			function checkpassword2(){
				var password2 =document.getElementById('password2').value;
			    var check_error_password2 =document.getElementById('error_password2');
			   
			    if (password2==""||password2==null) {
			    	check_error_password2.innerHTML=" : **Không được để trống**";
			    	
			    }else{
			    	check_error_password2innerHTML="";
			    	return password2;
			    }
			}
			function validation(){
				var username =document.getElementById('username').value;
			    var check_erro_name =document.getElementById('error_name');
			    var regexUsername = /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/;
			    if (username==""||username==null) {
			    	check_erro_name.innerHTML=" <: ** Không được để trống **";
			    	return false;
			    }else if(!regexUsername.test(username)){
			    	check_erro_name.innerHTML=" <: ** Định dạng không hợp lệ **";
			    	return false;
			    }else{
			    	check_erro_name.innerHTML="";
			    	
			    }

			    var email =document.getElementById('email').value;
			    var check_error_email =document.getElementById('error_email');
			   	var regexEmail=/\b[A-Z0-9._%+-]+@(?:[A-Z0-9-]+\.)+[A-Z]{2,6}\b/i;
			    if (email==""||email==null) {
			    	check_error_email.innerHTML=" : **Không được để trống**";
			    	return false;
			    	
			    }else if (!regexEmail.test(email)) {
			    	check_error_email.innerHTML=" : **Định dạng không hợp lệ**";
			    	return false;
			    }else{
			    	check_error_email.innerHTML="";
			    	
			    }

			    var address =document.getElementById('address').value;
			    var check_erro_address =document.getElementById('error_address');
			   	
			    if (address==""||address==null) {
			    	check_erro_address.innerHTML=" <: **Không được để trống**";
			    	return false;
			    	
			    }else{
			    	check_erro_address.innerHTML="";
			    	
			    }

			    var phone =document.getElementById('phone').value;
			    var check_erro_phone =document.getElementById('error_phone');
			    var regexPhone =/(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/;
			    if (phone==""||phone==null) {
			    	check_erro_phone.innerHTML=" <: **Không được để trống**";
			    	return false;
			    	
			    }else if (!regexPhone.test(phone)) {
			    	check_erro_phone.innerHTML=" <: **Định dạng không hợp lệ**";
			    	return false;
			    }else{
			    	check_erro_phone.innerHTML="";
			    	
			    }

			    var password =document.getElementById('password').value;
			    var check_error_password =document.getElementById('error_password');
			   
			    if (password==""||password==null) {
			    	check_error_password.innerHTML=" : **Không được để trống**";
			    	return false;
			    	
			    }else{
			    	check_error_password.innerHTML="";
			    	
			    }

			    var password2 =document.getElementById('password2').value;
			    var check_error_password2 =document.getElementById('error_password2');
			   
			    if (password2==""||password2==null) {
			    	check_error_password2.innerHTML=" : **Không được để trống**";
			    	return false;
			    	
			    }else{
			    	check_error_password2innerHTML="";
			    	
			    }


			}
		</script> -->
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
