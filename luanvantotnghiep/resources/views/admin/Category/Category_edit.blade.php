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
                       
                        <div class="panel-body">
                        <?php foreach ($edit_Category as $key => $edit_value):?>
                                
                           
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-Category/'.$edit_value->ma_dm)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mã mục sản phẩm : <h4>{{$edit_value->ma_dm}}</h4></label>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên danh mục sản phẩm 
                                        <h4><?php if ($edit_value->danh_muc=="AO") {
                                                echo 'Áo';
                                                }elseif($edit_value->danh_muc=="QU"){
                                                echo 'Quần';
                                                }elseif($edit_value->danh_muc=="GI"){
                                                echo 'Giày';
                                                }else{
                                                echo 'Phụ Kiện';
                                        } ?></h4></label>
                                    <input type="hidden" name="danh_muc" value="{{$edit_value->danh_muc}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Thiết kế </label><br>
                                        
                                        <select name="design_key" class="form-control input-sm m-bot15 main-styling">
                                        <?php foreach ($design_id as $key => $value_des): ?>
                                            <?php if ($value_des->ma_tk==$edit_value->ma_tk): ?>
                                                <option value="{{$value_des->ma_tk}}" >{{$edit_value->ma_tk}}-{{$value_des->ten_tk}}</option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                        <?php foreach ($design_id as $key => $value_des): ?>
                                            <?php if ($value_des->ma_tk!=$edit_value->ma_tk): ?>
                                                    <option value="{{$value_des->ma_tk}}">{{$value_des->ma_tk}}-{{$value_des->ten_tk}}</option> 
                                            <?php endif ?>
                                        <?php endforeach ?>                                     
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Chất liệu</label><br>
                                         <select name="material_key" class="form-control input-sm m-bot15 main-styling">
                                            <?php foreach ($material_id as $key => $value_mat): ?>
                                                <?php if ($value_mat->ma_cl==$edit_value->ma_cl): ?>
                                                    <option value="{{$value_mat->ma_cl}}">{{$edit_value->ma_cl}}-{{$value_mat->ten_cl}}</option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                            <?php foreach ($material_id as $key => $value_mat): ?>    
                                               <?php if ($value_mat->ma_cl!=$edit_value->ma_cl): ?>
                                                    <option value="{{$value_mat->ma_cl}}">{{$value_mat->ma_cl}}-{{$value_mat->ten_cl}}</option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                         </select>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-info main-styling"	name="update_category">Cập nhật Danh Mục</button>
                                </form>
                            </div>

                        <?php endforeach ?>
                        </div>
                    </section>
            </div>
             <?php 
                $message=Session::get('message');
                if($message){?>
                    <script type="text/javascript">
                    $(document).ready(function(){
                        alert('{{$message}}');
                    });
                    </script>';
            <?php Session::put('message',null);}?>
        </div>
    </section>
</section>
@endsection