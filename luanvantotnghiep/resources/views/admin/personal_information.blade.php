@extends('admin_layout')
@section('admin_content')
<section id="main-content">
	<section class="wrapper">
     	<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                    	<?php 
                    		
                			$email=Session::get('email');
                    	 ?>
                    	
                        <header class="panel-heading">
                            Thông tin cá nhân nhân viên
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                
                                <?php foreach ($admin_id as $key => $value_ad): ?>
                                	
                             		<?php if ($value_ad->email==$email): ?>
                             			
                             		
	                                <div class="form-group ca-nhan">
	                                    <label for="exampleInputEmail1">Họ tên nhân viên</label>
	                                    <form action="{{URL('/update-ten-nv/'.$value_ad->email)}}" method="post">
	                                    @csrf
	                                    <input type="text" class="form-control" name="name_admin"  placeholder="Enter email" value="<?php echo $value_ad->ten; ?>" >
	                                     <button type="submit" class="btn btn-info">Cập nhật</button>
	                                    </form>
	                                </div>
	                                <div class="form-group ca-nhan">
	                                    <label for="exampleInputPassword1">Số điện thoại</label>
	                                    <form action="{{URL('/update-sodt-nv/'.$value_ad->email)}}" method="post">
	                                    @csrf
	                                    <input type="text" class="form-control" name="name_phone" placeholder="Enter email" value="<?php echo $value_ad->sodt; ?>">
	                                     <button type="submit" class="btn btn-info">Cập nhật</button>
	                                 	</form>
	                                </div>
	                                <div class="form-group ca-nhan">
	                                    <label for="exampleInputPassword1">Địa chỉ</label>
	                                    <form action="{{URL('/update-diachi-nv/'.$value_ad->email)}}" method="post">
	                                    @csrf
	                                   <input type="text" class="form-control" name="name_address"  placeholder="Enter email" value="<?php echo $value_ad->diachi; ?>">
	                                     <button type="submit" class="btn btn-info">Cập nhật</button>
	                                 	</form>
	                                </div>
	                                <?php endif ?>
	                            <?php endforeach ?>    
	                                <div class="form-group">
	                                    <form action="{{URL('/update-password/'.$value_ad->email)}}" method="post">
	                                    	@csrf
	                                    <label for="exampleInputPassword1">Mật Khẩu Cũ</label>
	                                   	<input type="password" class="form-control" name="passwordold"  placeholder="Enter email" value="">
	                                   	<label for="exampleInputPassword1">Mật Khẩu Mới</label>
	                                   	<input type="password" class="form-control" name="passwordnew" placeholder="Enter email" value="">
	                                   	<label for="exampleInputPassword1">Mật Khẩu Nhập Lại</label>
	                                   	<input type="password" class="form-control" name="passwordnew2"  placeholder="Enter email" value="">
	                                    <button style="margin: 10px;margin-left: 20px;" type="submit" class="btn btn-info">Đổi Mật Khẩu</button>
	                                 	</form>
	                                </div>
	                            
	                                
	                            
                            	
                            </div>

                        </div>
                    </section>

            </div>
        
        </div>
    </section>
</section>
@endsection