@extends('layout')
@section('index_content')
    <div class="register_account">
          	<div class="wrap">
    	      <h4 class="title">Tạo tài khoản  </h4>
    		   <form action=" {{URL::to('/add-user')}}"method="POST">
    		   	@csrf
    			 <div class="col_1_of_2 span_1_of_2">	
		    		<input type="text" name="email" placeholder="email">
		    		<input type="password" name="matkhau" placeholder="mật khẩu">
		    		<input type="password" name="matkhau_xn" placeholder="mật khẩu xác nhận">
		    			<button class="grey">Đăng ký</button>
		    			 <p class="terms">Tạo tài khoản nhanh để sử dụng trang </a>.</p>
		    	 </div>
		    	 <?php 
	            $message=Session::get('message');
	            if($message){
	                echo '<span class>'.$message.'<span>';

	                Session::put('message',null);
	            }
            ?> 
		          <div class="clear"></div>		        
		    </form>	    
    	  </div>

        </div>
@endsection     
