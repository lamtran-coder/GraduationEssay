@extends('layout')
@section('index_content')
    <div class="register_account">
          	<div class="wrap">
    	      <h4 class="title">Tạo tài khoản  </h4>
    		   <form action=" {{URL::to('/add-user')}}"method="POST">
    		   	@csrf
    			 <div class="col_1_of_2 span_1_of_2">
		   			 
		    			
		    		<input type="text" name="email" placeholder="email">
		    		<input type="text" name="matkhau" placeholder="matkhau">
		    			<button class="grey">Đăng ký</button>
		    			 <p class="terms">Tạo tài khoản nhanh để sử dụng trang </a>.</p>
		        
		    	 </div>
		    	  
		          <div class="clear"></div>
		        
		    </form>
    	  </div> 
        </div>
@endsection     
