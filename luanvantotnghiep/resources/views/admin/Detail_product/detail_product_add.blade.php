@extends('admin_layout')
@section('admin_content')
<section id="main-content">
	<section class="wrapper">
     	<div class="row">
            <div class="col-lg-12">
                <section class="content-header">
                    <ol class="breadcrumb">
                        <li><a href="{{URL::to('/dashboard')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                        <li><a href="{{URL::to('/all-product')}}">Sản phẩm</a></li>
                        <li class="active">Chi Tiết Sản Phẩm</li>
                    </ol>
                </section>
                    <section class="panel">
                        <header class="panel-heading">
                         	màu mới
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
                                <form role="form" action="{{URL::to('/save-color-product')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên màu </label>
                                        <input type="text" class="form-control main-styling" name="color_name" placeholder="tên màu" required="">
                                    </div>                           
                                    <button type="submit" class="btn btn-info main-styling"	name="add_color_product">Thêm Màu Mới</button>
                                </form>
                            </div>
                        </div>
                    </section>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            kích thước sản phẩm
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
                                <form role="form" action="{{URL::to('/save-size-product')}}" method="post">
                                    @csrf
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Mã kích thước </label>
                                        <input type="text" class="form-control main-styling" name="size_key" placeholder="mã màu" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Chiều cao </label>
                                        <input type="text" class="form-control main-styling" name="chieu_cao" placeholder="chiều cao" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Cân nặng</label>
                                        <input type="text" min=1 class="form-control main-styling" name="can_nang" placeholder="Cân nặng" value="0">
                                    </div>
                                   
                                    
                                    
                                    <button type="submit" class="btn btn-info main-styling"  name="add_size_product">Thêm Size Mới</button>
                                </form>
                            </div>
                        </div>
                    </section>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            chi tiết sản phẩm
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
                                <form role="form" action="{{URL::to('/save-detail-product')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">kích thước</label>
                                        <select name="ct_size" class="form-control input-sm m-bot15 main-styling"  style="height :150px" multiple  >
                                           
                                            <?php foreach ($size_id as $key => $value_size): ?>
                                                <option value="{{$value_size->ma_size}}">{{$value_size->ma_size}}</option> 
                                            <?php endforeach ?>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Màu Sắc</label>
                                        <select name="ct_mau" class="form-control input-sm m-bot15 main-styling"  style="height :150px" multiple >
                                             
                                            <?php foreach ($color_id as $key => $value_color): ?>
                                                <option value="{{$value_color->ma_mau}}">{{$value_color->ten_mau}}</option> 
                                            <?php endforeach ?>     
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mã sản phẩm</label>
                                        <select name="ct_sp" class="form-control input-sm m-bot15 main-styling" >
                                            <?php foreach ($product_id as $key => $value_pro): ?>
                                                <option value="{{$value_pro->ma_sp}}">{{$value_pro->ma_sp}}--{{$value_pro->ten_sp}}</option>
                                            <?php endforeach ?>              
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Số lượng</label>
                                        <input type="number" class="form-control main-styling" name="solg_sp" placeholder="số lượng" value="0" required="">
                                    </div>
                                    <button type="submit" class="btn btn-info main-styling"  name="add_detail_product">Thêm Chi Tiết Mới</button>
                                </form>
                            </div>
                        <div class="table-responsive" style="padding: 20px;">
                            <div class="panel-heading"> Liệt Kê Chi Tiết sản phẩm</div>
                              <table class="table table-striped b-t b-light">
                                <thead>
                                  <tr>
                                    <th style="width:20px;">
                                      <label class="i-checks m-b-none">
                                        <input type="checkbox"><i></i>
                                      </label>
                                    </th>
                                    <th>Tên sản phẩm</th>
                                    <th>Màu</th>
                                    <th>Size</th>
                                    <th>Số lượng</th>
                                    <th>Cập nhật số lượng</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($detail_product_id as $key => $value_del): ?>
                                    
                                 
                                  <tr>
                                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                    <td><span class="text-ellipsis">
                                      <?php foreach ($product_id as $key => $value_pro): ?>
                                        <?php if ($value_del->ma_sp==$value_pro->ma_sp): ?>
                                          
                                                {{$value_pro->ten_sp}}
                                        <?php endif ?>
                                      <?php endforeach ?>
                                    </span></td>
                                    <td><span class="text-ellipsis">
                                      <?php foreach ($color_id as $key => $value_color): ?>
                                        <?php if ($value_del->ma_mau==$value_color->ma_mau): ?>
                                          {{$value_color->ten_mau}}
                                        <?php endif ?>
                                      <?php endforeach ?>
                                    </span></td>
                                    <td><span class="text-ellipsis">{{$value_del->ma_size}}</span></td>
                                    <td><span class="text-ellipsis">{{$value_del->so_lg}}</span></td>
                                    <td>
                                      <form action="{{URL::to('/update-amount/'.$value_del->ma_sp)}}" method="post">
                                        @csrf
                                        <input type="number" name="so_lg" value="0">
                                        <input type="hidden" name="ma_size_h" value="{{$value_del->ma_size}}">
                                        <input type="hidden" name="ma_mau_h" value="{{$value_del->ma_mau}}">

                                        <button>Update</button>
                                       </form>
                                      </td>
                                  </tr>

                                <?php endforeach ?>
                                 
                                  
                                </tbody>
                              </table>
                        </div>
                        </div>

                    </section>
            </div>
        </div>
    </section>
</section>
@endsection