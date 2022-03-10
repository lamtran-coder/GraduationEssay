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
                        <div class="panel-body">
                            <?php 
                            $message=Session::get('message');
                            if($message){?>
                                <script type="text/javascript">
                                $(document).ready(function(){
                                    alert('{{$message}}');
                                });
                                </script>';
                            <?php Session::put('message',null);}?>
                            
                            <?php foreach ($edit_product_id as $key => $edit_value): ?>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-product/'.$edit_value->ma_sp)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mã sản phẩm là :<p style="font-size: 25px;color:red;">{{$edit_value->ma_sp}}</p> </label>
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm </label>
                                    <input type="text" class="form-control main-styling" name="product_name" value="{{$edit_value->ten_sp}}" placeholder="tên sản phẩm">
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Giá gốc</label>
                                    <input type="text" class="form-control main-styling" name="corner_price" value="{{$edit_value->gia_goc}}" placeholder="Giá Gốc">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá bán</label>
                                        <input type="text" class="form-control main-styling" value="{{$edit_value->gia_sale}}" name="sale_pricee" placeholder="Giá bán">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Chiết khấu</label>
                                        <input type="number" class="form-control main-styling" style="width: 200px;" name="discount" value="{{$edit_value->chiet_khau}}" placeholder="Chiết khấu">
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