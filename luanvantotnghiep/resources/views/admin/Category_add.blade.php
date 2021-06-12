@extends('admin_layout')
@section('admin_content')
<section id="main-content">
	<section class="wrapper">
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
                                        <select name="category_name" class="form-control input-sm m-bot15">
                                       
                                            <option value="AO">Áo</option>
                                            <option value="QU">Quần</option>
                                            <option value="GI">Giầy</option>
                                            <option value="PK">Phụ kiện</option>
                                         
                                        </select>
                                    </div>
                                    <div class="form-group">

                                        <label for="exampleInputEmail1">Thiết kế</label>
                                       <select name="design_key" class="form-control input-sm m-bot15">
                                        <?php foreach ($design_id as $key => $value_des): ?>
                                            <option value="{{$value_des->ma_tk}}">{{$value_des->ten_tk}}</option>
                                        <?php endforeach ?>
                                            
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Chất liệu</label>
                                        <select name="material_key" class="form-control input-sm m-bot15"> 
                                        <?php foreach ($material_id as $key => $value_mat): ?>
                                              <option value="{{$value_mat->ma_cl}}">{{$value_mat->ten_cl}}</option>
                                        <?php endforeach ?>
                                          
                                           
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mô tả danh mục</label>
                                        <textarea style="resize: none;" rows="5" class="form-control" name="category_desic" placeholder="Mô tả danh mục"></textarea>
                                    </div>
                               
                                    <div class="form-group">
                                    	<label for="exampleInputPassword1">Hiện thị</label>
                                        <select name="category_status" class="form-control input-sm m-bot15">
    		                                <option value="1">Hiện thị</option>
                                            <option value="0">Ẩn</option>
                               			</select>
                                    </div>

                                    <button type="submit" class="btn btn-info"	name="add_category">Thêm Danh Mục</button>
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
                            </div>
                        </div>

                    </section>
            </div>
        </div>
    </section>
</section>
@endsection