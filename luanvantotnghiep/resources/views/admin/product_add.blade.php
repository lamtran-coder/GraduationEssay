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
                                        <select name="category_product_id" class="form-control input-sm m-bot15 main-styling" multiple style="height: 130px;text-transform: capitalize;width: 550px;">
                                            
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
                                
                                        <input type="text" class="form-control main-styling" style="text-transform: capitalize;" name="product_name" value="{{old('product_name')}}">
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
    </section>
</section>
@endsection