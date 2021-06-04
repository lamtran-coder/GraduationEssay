@extends('admin_layout')
@section('admin_content')
<section id="main-content">
	<section class="wrapper">
     	<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                         	cập nhập danh mục sản phẩm
                        </header>
                        <?php 
                            $message=Session::get('message');
                            if($message){
                                echo '<span class>'.$message.'<span>';

                                Session::put('message',null);
                            }
                         ?>
                        <div class="panel-body">
                        <?php foreach ($edit_Category as $key => $edit_value):?>
                                
                           
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-Category/'.$edit_value->ma_dm)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên danh mục sản phẩm </label>
                                        <input type="text" class="form-control" name="category_name" placeholder="tên danh mục" value="{{$edit_value->danh_muc}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Chất liệu </label>
                                        <input type="text" class="form-control" name="material_name" placeholder="tên chất liệu" value="{{$edit_value->chat_lieu}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Thiết kế</label>
                                        <input type="text" class="form-control" name="design_name" placeholder="tên danh mục" value="{{$edit_value->thiet_ke}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mô tả danh mục</label>
                                        <textarea style="resize: none;" rows="5" class="form-control" name="category_desic" placeholder="Mô tả danh mục" >{{$edit_value->mo_ta}}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-info"	name="update_category">Cập nhật Danh Mục</button>
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