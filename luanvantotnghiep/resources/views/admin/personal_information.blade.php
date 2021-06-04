@extends('admin_layout')
@section('admin_content')
<section id="main-content">
	<section class="wrapper">
     	<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            personal information
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form">
	                                <div class="form-group">
	                                    <label for="exampleInputEmail1">Họ tên nhân viên</label>
	                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
	                                </div>
	                                <div class="form-group">
	                                    <label for="exampleInputPassword1">Ngày sinh</label>
	                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	                                </div>
	                                <div class="form-group">
	                                    <label for="exampleInputPassword1">Số thẻ căn cước</label>
	                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	                                </div>
	                                <div class="form-group">
	                                    <label for="exampleInputPassword1">Email</label>
	                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	                                </div>
	                                <div class="form-group">
	                                    <label for="exampleInputPassword1">Địa chỉ</label>
	                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	                                </div>
	                                <div class="form-group">
	                                    <label for="exampleInputFile">Hình đại điện</label>
	                                    <input type="file" id="exampleInputFile">
	                                    <p class="help-block">Example block-level help text here.</p>
	                                </div>
	                                <div class="checkbox">
	                                    <label>
	                                        <input type="checkbox"> Check me out
	                                    </label>
	                                </div>
	                                <button type="submit" class="btn btn-info">Submit</button>
                            	</form>
                            </div>

                        </div>
                    </section>

            </div>
        
        </div>
    </section>
</section>
@endsection