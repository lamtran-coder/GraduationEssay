@extends('admin_layout')
@section('admin_content')
<section id="main-content">
	<section class="wrapper">
     	<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            tạo thiết kế 
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-design')}}" method="post">
                                    @csrf 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Thiết kế</label>
                                        <input type="text" class="form-control input-sm m-bot15 main-styling" name="design_name" required="">
                                    </div>
                                    <button type="submit" class="btn btn-info"  name="add_design">Thêm thiết kế</button>
                                     <div>
                                     </div>
                                </form>
                            </div>
                        </div>
                        
                    </section>
                    <section class="panel">
                    <header class="panel-heading">
                            chất liệu mới 
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-material')}}" method="post">
                                    @csrf 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Chất liệu</label>
                                        <input type="text" class="form-control input-sm m-bot15 main-styling" name="material_name" required="">
                                    </div>
                                    <button type="submit" class="btn btn-info"  name="add_material">Thêm chất liệu</button>
                                     <div>
                                    <?php 
                                        $message=Session::get('message');
                                        if($message){
                                            echo '<span style="color:red;size:20px;">'.$message.'<span>';

                                            Session::put('message',null);
                                        }
                                     ?>
                                     </div>
                                </form>
                                <?php 
                                        $message=Session::get('message');
                                        if($message){
                                            echo '<span style="color:red;size:20px;">'.$message.'<span>';

                                            Session::put('message',null);
                                        }
                                     ?>
                            </div>
                        </div>
                    </section>

                
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        tạo danh mục sản phẩm
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/save-Category')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục sản phẩm </label>
                                    <select name="category_key" style="height :150px" class="form-control input-sm m-bot15 main-styling" multiple required="">
                                   
                                        <option value="AO">Áo</option>
                                        <option value="QU">Quần</option>
                                        <option value="GI">Giày</option>
                                        <option value="PK">Phụ kiện</option>
                                     
                                    </select>
                                </div>
                                <div class="form-group">

                                    <label for="exampleInputEmail1">Thiết kế</label>
                                   <select name="design_key" style="height :150px" class="form-control input-sm m-bot15 main-styling" multiple required="" >
                                    <?php foreach ($design_id as $key => $value_des): ?>
                                        <option value="{{$value_des->ma_tk}}">{{$value_des->ten_tk}}</option>
                                    <?php endforeach ?>
                                        
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chất liệu</label>
                                    <select name="material_key" style="height :150px" class="form-control input-sm m-bot15 main-styling" multiple required=""> 
                                    <?php foreach ($material_id as $key => $value_mat): ?>
                                          <option value="{{$value_mat->ma_cl}}">{{$value_mat->ten_cl}}</option>
                                    <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiện thị</label>
                                    <select name="category_status" class="form-control input-sm m-bot15 main-styling" required="">
                                        <option value="1">Hiện thị</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-info"  name="add_Category">Thêm Danh Mục</button>
                                 <div>
                                 </div>
                            </form>
                                <?php 
                                    $message=Session::get('message');
                                    if($message){
                                        echo '<span style="color:red;size:20px;">'.$message.'<span>';

                                        Session::put('message',null);
                                    }
                                 ?>
                        </div>
                    </div>
            </section>
        </div>
    </div>
    </section>
</section>
@endsection