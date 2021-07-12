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
                                 <form role="form" action="{{URL::to('/insert-slider')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Sidler</label>
                                       
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên slide</label>
                                    <input type="text" name="slider_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục" value="{{old('slider_name')}}">
                                    </div>
                                    <div class="form-group">
                                         <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name="slider_image" class="form-control" id="exampleInputEmail1" placeholder="Slide" value="{{old('slider_image')}}">
                                            
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                       <label for="exampleInputPassword1">Mô tả slider</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="slider_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục" value="{{old('slider_desc')}}"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="slider_status" class="form-control input-sm m-bot15">
                                           <option value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                            
                                    </select>
                                    </div>
                                    <button type="submit" name="add_slider" class="btn btn-info">Thêm slider</button>
                                </form>
                                
                            </div>
                        </div>
                    </section>
            </div>
        </div>
       
        </div>
    </section>
</section>
@endsection