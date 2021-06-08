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
                                <form role="form" action="{{URL::to('/update-product')}}" method="post">
                                    @csrf
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
                                          
                                                <option value=""></option>
                                                
                                            
                                        </select>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-info"	name="add_product">Thêm Sản Phẩm Mới</button>
                                </form>
                            </div>
                        </div>
                    </section>
            </div>
        </div>
    </section>
</section>
@endsection