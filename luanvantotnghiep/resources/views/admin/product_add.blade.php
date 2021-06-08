@extends('admin_layout')
@section('admin_content')
<section id="main-content">
	<section class="wrapper">
     	<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                         	tạo sản phẩm mới
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
                                <form role="form" action="{{URL::to('/save-product')}}" method="post">
                                    @csrf
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Mã sản phẩm </label>
                                        <input type="text" class="form-control" name="product_key" placeholder="mã danh mục">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên sản phẩm </label>
                                        <input type="text" class="form-control" name="product_name" placeholder="tên danh mục">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá góc</label>
                                        <input type="text" class="form-control" name="corner_price" placeholder="tên chất liệu">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá sale</label>
                                        <input type="text" class="form-control" name="sale_pricee" placeholder="tên danh mục">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Trang thị</label>
                                        <select name="product_status" class="form-control input-sm m-bot15">
                                            <option value="0">Còn hàng</option>
                                            <option value="1">Tạm hết</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Chiết khấu</label>
                                        <input type="text" class="form-control" name="discount" placeholder="Chiết khấu">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Số lượng</label>
                                        <input type="text" class="form-control" name="amount_product" placeholder="số lượng" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Danh mục</label>
                                        <select name="category_product_id" class="form-control input-sm m-bot15">

                                            <?php foreach ($cate_product as $key => $value_cate): ?>
                                                <option value="{{$value_cate->ma_dm}}">{{$value_cate->danh_muc}}</option>
                                            <?php endforeach ?>     
                                            
                                        </select>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-info"	name="add_product">Thêm Sản Phẩm Mới</button>
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
                            hình ảnh mới
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
                                <form role="form" action="{{URL::to('/save-images-product')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Góc nhìn</label>
                                        <select name="images_view" class="form-control input-sm m-bot15">
                                            <option value="0">Trước</option>
                                            <option value="1">Sau</option>
                                            <option value="2">Trái</option>
                                            <option value="3">Phải</option>
                                            <option value="4">trên</option>
                                            <option value="5">Dưới</option>
                                        </select>
                                    </div>
         
                                    <div class="form-group">
                                        <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                                        <input type="file" id="exampleInputFile" name="images_pro">
                                    </div>
                                   
                                   
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Sản phẩm</label>
                                        <select name="product_images_id" class="form-control input-sm m-bot15">
                                            <?php foreach ($product_id as $key => $value_pro): ?>
                                                <option value="{{$value_pro->ma_sp}}">{{$value_pro->ma_sp}}</option>
                                           <?php endforeach ?>
                                        </select>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-info"  name="add_images_product">Thêm Hình Ảnh</button>
                                </form>
                            </div>
                        </div>
                    </section>
            </div>
        </div>
    </section>
</section>
@endsection