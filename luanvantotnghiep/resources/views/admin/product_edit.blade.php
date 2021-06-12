@extends('admin_layout')
@section('admin_content')
<section id="main-content">
	<section class="wrapper">
     	<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                         	Cập nhật sản phẩm
                        </header>
                        <?php 
                            $message=Session::get('message');
                            if($message){
                                echo '<span class>'.$message.'<span>';

                                Session::put('message',null);
                            }
                         ?>
                        <div class="panel-body">
                            <?php foreach ($edit_product_id as $key => $edit_value): ?>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-product'.$edit_value->ma_sp)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Danh mục</label>
                                        <select name="category_product_id" class="form-control input-sm m-bot15 main-styling">
                                            <?php    
                                             foreach ($cate_product_id as $key => $value_cate){
                                                if ($edit_value->ma_dm==$value_cate->ma_dm){
                                                    foreach ($material_id as $key => $value_mat){
                                                         if ($value_cate->ma_cl==$value_mat->ma_cl){
                                                             $result1=$value_mat->ten_cl;
                                                         }                                                      
                                                    }
                                                    foreach($design_id as $key =>$value_des){
                                                        if ($value_cate->ma_tk==$value_des->ma_tk) {
                                                            $result2=$value_des->ten_tk;
                                                        }
                                                    }
                                                    echo'<option value="'.$value_cate->ma_dm.'">'.$value_cate->ma_dm.'-'.$result2.'-'.$result1.'</option>';
                                                }
                                                      
                                             }
                                                
                                                                      
                                            ?>
                                            <?php

                                                foreach ($cate_product_id as $key => $value_cate){
                                                    if ($edit_value->ma_dm!=$value_cate->ma_dm){
                                                        foreach ($material_id as $key => $value_mat)
                                                             if ($value_cate->ma_cl==$value_mat->ma_cl){
                                                                 $result3=$value_mat->ten_cl;
                                                             }
                                                        foreach($design_id as $key =>$value_des){
                                                            if ($value_cate->ma_tk==$value_des->ma_tk) {
                                                                $result4=$value_des->ten_tk;
                                                            }
                                                        }
                                                    }
                                                    echo'<option value="'.$value_cate->ma_dm.'">'.$value_cate->ma_dm.'-'.$result4.'-'.$result3.'</option>';        
                                                 }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên sản phẩm </label>
                                        <input type="text" class="form-control main-styling" name="product_name" value="{{$edit_value->ten_sp}}" placeholder="tên danh mục">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá góc</label>
                                        <input type="text" class="form-control main-styling" name="corner_price" value="{{$edit_value->gia_goc}}" placeholder="tên chất liệu">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá sale</label>
                                        <input type="text" class="form-control main-styling" value="{{$edit_value->gia_sale}}" name="sale_pricee" placeholder="tên danh mục">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Chiết khấu</label>
                                        <input type="number" class="form-control main-styling" style="width: 200px;" name="discount" value="{{$edit_value->chiet_khau}}" placeholder="Chiết khấu">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Số lượng</label>
                                        <input type="number" class="form-control main-styling" style="width: 200px;" name="amount_product" placeholder="số lượng" value="0">
                                    </div>
                                    
                                    <button type="submit" class="btn btn-info main-styling"	name="add_product">Cập nhật</button>
                                </form>
                            </div>
                             <?php endforeach ?>
                        </div>
                    </section>
            </div>
        </div>
    </section>
</section>
@endsection