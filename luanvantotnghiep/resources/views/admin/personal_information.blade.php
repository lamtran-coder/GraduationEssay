@extends('admin_layout')
@section('admin_content')
<section id="main-content">
	<section class="wrapper">
     	<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thông tin cá nhân nhân viên
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form">
	                                <div class="form-group">
	                                    <label for="exampleInputEmail1">Họ tên nhân viên</label>
	                                    <input type="text" class="form-control"  placeholder="Enter email">
	                                </div>
	                                <div class="form-group">
	                                    <label for="exampleInputPassword1">Ngày sinh</label>
	                                    <input type="date" class="form-control"  placeholder="Password">
	                                </div>
	                                <div class="form-group">
	                                    <label for="exampleInputPassword1">Số thẻ căn cước</label>
	                                    <input type="password" class="form-control"  placeholder="Password">
	                                </div>
	                                <div class="form-group">
	                                    <label for="exampleInputPassword1">Email</label>
	                                    <input type="email" class="form-control"  placeholder="Password">
	                                </div>
	                                <div class="form-group">
	                                    <label for="exampleInputPassword1">Địa chỉ</label>
	                                    <input type="text" class="form-control"  placeholder="Password">
	                                </div>
	                            
	                                
	                                <button type="submit" class="btn btn-info">Cập nhật</button>
                            	</form>
                            </div>

                        </div>
                    </section>

            </div>
        
        </div>
    </section>
</section>
@endsection