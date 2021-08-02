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
                                        // $message=Session::get('message');
                                        // if($message){
                                        //     echo '<span style="color:red;size:20px;">'.$message.'<span>';

                                        //     Session::put('message',null);
                                        // }
                                     ?>
                                     </div>
                                </form>
                                <?php 
                                        // $message=Session::get('message');
                                        // if($message){
                                        //     echo '<span style="color:red;size:20px;">'.$message.'<span>';

                                        //     Session::put('message',null);
                                        // }
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
                             <form action="">
                            <?php if (isset($_GET['tim_thiet_ke'])) {
                                    $tim_thiet_ke=$_GET['tim_thiet_ke'];
                                 }else{
                                     $tim_thiet_ke="";
                                 }
                                 if (isset($_GET['tim_chat_lieu'])) {
                                    $tim_chat_lieu=$_GET['tim_chat_lieu'];
                                 }else{
                                     $tim_chat_lieu="";
                                 }
                             ?>
                            <div class="form-group" style="display:flex;">
                                <input type="text" class="form-control" style="width: 150px;" name="tim_thiet_ke" placeholder="nhập tên thiết kê" value="<?php echo $tim_thiet_ke ?>">
                                <input type="text" class="form-control" style="width: 150px;margin-left: 5px;" name="tim_chat_lieu" placeholder="nhập tên chất kiệu" value="<?php echo $tim_chat_lieu ?>" >
                                <button>Tìm</button>
                            </div>
                            </form>
                            <form role="form" action="{{URL::to('/save-Category')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục sản phẩm </label>
                                    <select name="category_key"  class="form-control input-sm m-bot15 main-styling" >
                                   
                                        <option value="AO">Áo</option>
                                        <option value="QU">Quần</option>
                                        <option value="GI">Giày</option>
                                        <option value="PK">Phụ kiện</option>
                                    </select>
                                    <?php if ($errors->has('category_key')): ?>
                                        <span style="color:red">{{$errors->first('category_key')}}</span>
                                    <?php endif ?>
                                </div>
                                <div class="form-group">

                                    <label for="exampleInputEmail1">Thiết kế</label>

                                   <select name="design_key"  class="form-control input-sm m-bot15 main-styling" >
                                    <?php foreach ($design_id as $key => $value_des): ?>
                                        <option value="{{$value_des->ma_tk}}">{{$value_des->ten_tk}}</option>
                                    <?php endforeach ?>
                                        
                                        
                                    </select>
                                     <?php if ($errors->has('design_key')): ?>
                                        <span style="color:red">{{$errors->first('design_key')}}</span>
                                    <?php endif ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chất liệu</label>
                                    <select name="material_key" class="form-control input-sm m-bot15 main-styling"  > 
                                    <?php foreach ($material_id as $key => $value_mat): ?>
                                          <option value="{{$value_mat->ma_cl}}">{{$value_mat->ten_cl}}</option>
                                    <?php endforeach ?>
                                    </select>
                                     <?php if ($errors->has('material_key')): ?>
                                        <span style="color:red">{{$errors->first('material_key')}}</span>
                                    <?php endif ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiện thị</label>
                                    <select name="category_status" class="form-control input-sm m-bot15 main-styling">
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
                            if($message){?>    
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    alert('<?php echo $message; ?>')
                                })
                            </script>
                           <?php  Session::put('message',null);
                             }?>
                        </div>
                    </div>
            </section>
        </div>
    </div>
    </section>
</section>
@endsection