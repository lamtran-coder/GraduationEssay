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
                                        <select name="category_product_id" class="form-control input-sm m-bot15 main-styling" multiple style="height: 130px;">
                                            
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
                                    <?php if ($errors->has('category_product_id')): ?>
                                        <span style="color:red">{{$errors->first('category_product_id')}}</span>
                                    <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên sản phẩm </label>
                                
                                        <input type="text" class="form-control main-styling" name="product_name" value="{{old('product_name')}}">
                                        <?php if ($errors->has('product_name')): ?>
                                        <span style="color:red">{{$errors->first('product_name')}}</span>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mô Tả </label>
                                        <textarea class="form-control main-styling"  name="product_desc" value="{{old('product_desc')}}"></textarea>
                                        <?php if ($errors->has('product_desc')): ?>
                                        <span style="color:red">{{$errors->first('product_desc')}}</span>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá góc</label>
                                        <input type="text" class="form-control main-styling" name="corner_price"  value="{{old('corner_price')}}">
                                        <?php if ($errors->has('corner_price')): ?>
                                        <span style="color:red">{{$errors->first('corner_price')}}</span>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá sale</label>
                                        <input type="text" class="form-control main-styling" name="sale_pricee" value="{{old('sale_pricee')}}" >
                                        <?php if ($errors->has('sale_pricee')): ?>
                                        <span style="color:red">{{$errors->first('sale_pricee')}}</span>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Chiết khấu</label>
                                        <input type="text" class="form-control main-styling" name="discount" value="{{old('discount')}}">
                                        <?php if ($errors->has('discount')): ?>
                                        <span style="color:red">{{$errors->first('discount')}}</span>
                                        <?php endif ?>
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
                                    $message_img=Session::get('message_img');
                                    if($message_img){
                                        echo '<span style="color:red;font-size:30px;">'.$message_img.'<span>';

                                        Session::put('message_img',null);
                                    }
                                 ?>
                                </div>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-images-product')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Góc nhìn</label>
                                        <select name="images_view" class="form-control input-sm m-bot15 main-styling" multiple="" style="height: 75px;">
                                            <option value="1">Ảnh phụ</option>
                                            <option value="0">Ảnh đại điện</option>
                                        </select>
                                        <?php if ($errors->has('images_view')): ?>
                                        <span style="color:red">{{$errors->first('images_view')}}</span>
                                        <?php endif ?>
                                    </div>
         
                                    <div class="form-group">
                                        <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                                        <input type="file" id="exampleInputFile" name="images_pro" value="{{old('images_pro')}}">
                                        <?php if ($errors->has('images_pro')): ?>
                                        <span style="color:red">{{$errors->first('images_pro')}}</span>
                                        <?php endif ?>
                                    </div>
                                   
                                   
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Sản phẩm</label>
                                        <select name="product_images_id" class="form-control input-sm m-bot15 main-styling" multiple="" style="height: 200px;">
                                            <?php foreach ($product_id as $key => $value_pro): ?>
                                                <option value="{{$value_pro->ma_sp}}">{{$value_pro->ma_sp}}-{{$value_pro->ten_sp}}</option>
                                           <?php endforeach ?>
                                        </select>
                                        <?php if ($errors->has('product_images_id')): ?>
                                        <span style="color:red">{{$errors->first('product_images_id')}}</span>
                                        <?php endif ?>
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