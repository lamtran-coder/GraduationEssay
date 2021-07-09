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
                        <div style="text-align: center;"><?php 
                                    $message=Session::get('message');
                                    if($message){
                                        echo '<span style="color:red;font-size:30px;">'.$message.'<span>';

                                        Session::put('message',null);
                                    }
                                 ?>
                                </div>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-product')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Danh mục</label>
                                        <select name="category_product_id" class="form-control input-sm m-bot15 main-styling" required="">
                                            <option>Chọn Danh Mục</option>
                                            <?php 
                                            foreach ($cate_product as $key => $value_cate) {
                                               foreach ($design_id as $key => $value_des) {
                                                   if($value_cate->ma_tk==$value_des->ma_tk){
                                                        $result1=$value_des->ten_tk;
                                                    }

                                                }
                                                foreach($material_id as $key => $value_mat){
                                                    if($value_cate->ma_cl==$value_mat->ma_cl){
                                                        $result2=$value_mat->ten_cl;
                                                    }
                                                }
                                                $result=$value_cate->ma_dm;
                                                echo '<option value="'.$result.'">'.$result.'-'.$result1.'-'.$result2.'</option>';
                                            }
                                            ?>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên sản phẩm </label>
                                        <input type="text" class="form-control main-styling" name="product_name" placeholder="tên sản phẩm" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mô Tả </label>
                                        <textarea class="form-control main-styling" rows="5"  name="product_desc" placeholder="tên mô tả sản phẩm" required="">
                                            
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá góc</label>
                                        <input type="text" class="form-control main-styling" name="corner_price" placeholder="tên chất liệu" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá sale</label>
                                        <input type="text" class="form-control main-styling" name="sale_pricee" placeholder="tên danh mục" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Chiết khấu</label>
                                        <input type="text" class="form-control main-styling" name="discount" placeholder="Chiết khấu" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Số lượng</label>
                                        <input type="text" class="form-control main-styling" name="amount_product" placeholder="số lượng" value="0" required="">
                                    </div>     
                                    <button type="submit" class="btn btn-info main-styling"	name="add_product">Thêm Sản Phẩm</button>
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
                        <div style="text-align: center;"><?php 
                                    $message=Session::get('message');
                                    if($message){
                                        echo '<span style="color:red;font-size:30px;">'.$message.'<span>';

                                        Session::put('message',null);
                                    }
                                 ?>
                                </div>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-images-product')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Góc nhìn</label>
                                        <select name="images_view" class="form-control input-sm m-bot15 main-styling" required="">
                                            <option value="1">Ảnh phụ</option>
                                            <option value="0">Ảnh đại điện</option>
                                        </select>
                                    </div>
         
                                    <div class="form-group">
                                        <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                                        <input type="file" id="exampleInputFile" name="images_pro" required="">
                                    </div>
                                   
                                   
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Sản phẩm</label>
                                        <select name="product_images_id" class="form-control input-sm m-bot15 main-styling" required="">
                                            <?php foreach ($product_id as $key => $value_pro): ?>
                                                <option value="{{$value_pro->ma_sp}}">{{$value_pro->ma_sp}}-{{$value_pro->ten_sp}}</option>
                                           <?php endforeach ?>
                                        </select>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-info main-styling"  name="add_images_product">Thêm Hình Ảnh</button>
                                </form>
                            </div>
                        </div>
                    </section>
            </div>
        </div>
    </section>
</section>
@endsection