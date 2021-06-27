@extends('admin_layout')
@section('admin_content')
<section id="main-content">
	<section class="wrapper">
     	<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                         	màu mới
                        </header>
                        <?php 
                            $message=Session::get('message');
                            if($message){
                                echo '<span class>'.$message.'<span>';

                                Session::put('message',null);
                            }
                         ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-color-product')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Mã màu </label>
                                        <input type="text" class="form-control main-styling" name="color_key" placeholder="mã màu">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên màu </label>
                                        <input type="text" class="form-control main-styling" name="color_name" placeholder="tên màu">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">ảnh hình họa màu</label>
                                        <input type="file" id="exampleInputFile" name="images_color"  >
                                    </div>                            
                                    <button type="submit" class="btn btn-info main-styling"	name="add_color_product">Thêm Màu Mới</button>
                                </form>
                            </div>
                        </div>
                    </section>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            kích thước sản phẩm
                        </header>
                        <?php 
                            $message=Session::get('message');
                            if($message){
                                echo '<span class>'.$message.'<span>';

                                Session::put('message',null);
                            }
                         ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-size-product')}}" method="post">
                                    @csrf
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Mã kích thước </label>
                                        <input type="text" class="form-control main-styling" name="size_key" placeholder="mã màu">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Chiều cao </label>
                                        <input type="text" class="form-control main-styling" name="chieu_cao" placeholder="chiều cao">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Cân nặng</label>
                                        <input type="text" class="form-control main-styling" name="can_nang" placeholder="Cân nặng" value="">
                                    </div>
                                   
                                    
                                    
                                    <button type="submit" class="btn btn-info main-styling"  name="add_size_product">Thêm Size Mới</button>
                                </form>
                            </div>
                        </div>
                    </section>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            chi tiết sản phẩm
                        </header>
                        <?php 
                            $message=Session::get('message');
                            if($message){
                                echo '<span class>'.$message.'<span>';

                                Session::put('message',null);
                            }
                         ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-detail-product')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">kích thước</label>
                                        <select name="ct_size" class="form-control input-sm m-bot15 main-styling">
                                            <?php foreach ($size_id as $key => $value_size): ?>
                                                <option value="{{$value_size->ma_size}}">{{$value_size->ma_size}}</option> 
                                            <?php endforeach ?>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">màu sản phẩm</label>
                                        <select name="ct_mau" class="form-control input-sm m-bot15 main-styling">
                                            <?php foreach ($color_id as $key => $value_color): ?>
                                                <option value="{{$value_color->ma_mau}}">{{$value_color->ten_mau}}</option> 
                                            <?php endforeach ?>     
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">mã sản phẩm</label>
                                        <select name="ct_sp" class="form-control input-sm m-bot15 main-styling">
                                            <?php foreach ($product_id as $key => $value_pro): ?>
                                                <option value="{{$value_pro->ma_sp}}">{{$value_pro->ma_sp}}--{{$value_pro->ten_sp}}</option>
                                            <?php endforeach ?>              
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Số lượng</label>
                                        <input type="number" class="form-control main-styling" name="solg_sp" placeholder="số lượng" value="0" >
                                    </div>
                                    <button type="submit" class="btn btn-info main-styling"  name="add_detail_product">Thêm Chi Tiết Mới</button>
                                </form>
                            </div>
                        </div>
                    </section>
            </div>
        </div>
    </section>
</section>
@endsection