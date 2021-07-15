@extends('admin_layout')
@section('admin_content')
<section id="main-content">
	<section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            hình ảnh mới 
                        </header>
                        <div style="text-align: center;"><?php 
                                    $message_img=Session::get('message_img');
                                    if($message_img){
                                        echo '<span style="color:red;font-size:30px;">'.$message_img.'<span>';

                                        Session::put('message_img',null);
                                    }
                                 ?>
                                </div>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-images-product')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Góc nhìn</label>
                                        <select name="images_view" class="form-control input-sm m-bot15 main-styling" multiple="" style="height: 75px;">
                                            <option value="1">Ảnh phụ</option>
                                            <option value="0">Ảnh đại điện</option>
                                        </select>
                                        <?php if ($errors->has('images_view')): ?>
                                        <span style="color:red">{{$errors->first('images_view')}}</span>
                                        <?php endif ?>
                                    </div>
         
                                    <div class="form-group">
                                        <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                                        <input type="file" id="exampleInputFile" name="images_pro" value="{{old('images_pro')}}">
                                        <?php if ($errors->has('images_pro')): ?>
                                        <span style="color:red">{{$errors->first('images_pro')}}</span>
                                        <?php endif ?>
                                    </div>
                                   
                                   
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Sản phẩm</label>
                                        <select name="product_images_id" class="form-control input-sm m-bot15 main-styling" >
                                            <?php foreach ($product_id as $key => $value_pro): ?>
                                                <option value="{{$value_pro->ma_sp}}">{{$value_pro->ma_sp}}-{{$value_pro->ten_sp}}</option>
                                           <?php endforeach ?>
                                        </select>
                                        <?php if ($errors->has('product_images_id')): ?>
                                        <span style="color:red">{{$errors->first('product_images_id')}}</span>
                                        <?php endif ?>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-info main-styling"  name="add_images_product">Thêm Hình Ảnh</button>
                                </form>
                            </div>
                            <div style="padding:10px">
                                <?php foreach ($img_id as $key => $value_img): ?>
                                    <?php if ($value_img->goc_nhin==0){ ?>
                                        <img src="{{URL::to('public/uploads/product/'.$value_img->hinhanh)}}" height="300px" width="250px" style="border: 10px solid red;" alt=""/>
                                    <?php }else{ ?>    
                                        <img src="{{URL::to('public/uploads/product/'.$value_img->hinhanh)}}" height="300px" width="250px" alt=""/>
                                    <?php } ?>
                                    
                                <?php endforeach ?>
                            </div>
                            {{$img_id->links()}}
                        </div>
            </section>
            </div>
        </div>
    </section>
</section>
@endsection