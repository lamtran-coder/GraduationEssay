@extends('admin_layout')
@section('admin_content')
<section id="main-content">
	<section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm Mã Khuyến Mãi
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/save-promotion')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="ma_km" class="form-control input-lg" placeholder="Mã khuyến mãi">
                                </div>
                                <div class="form-group">
                                    <select name="ma_sp" class="form-group input-lg" id="states">
                                    <option value="all">Khuyển Mãi Tất Cả Sản Phẩm
                                    </option>
                                    <?php foreach ($product_id as $key => $val_pro): ?>
                                    <option value="{{$val_pro->ma_sp}}">{{$val_pro->ten_sp}}<------->{{$val_pro->ma_sp}}
                                    </option>    
                                    <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="p_thuc" class="form-group input-lg">
                                        <option value="0">Giảm Theo Tiền</option>
                                        <option value="1">Giảm Theo %</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="gia_tri" class="form-control input-lg"placeholder="Giá Trị">
                                </div>
                                <div class="form-group">
                                    <input type="number" name="so_lg" class="form-control input-lg" min="1" value="1">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="ngcap" class="form-control input-lg"
                                    placeholder="Ngày Cấp">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="hsd" class="form-control input-lg"
                                    placeholder="Hạn Sử Dụng">
                                </div>
                                
                                <div class="form-group">
                                <button type="submit" style="font-size: 25px;text-transform: uppercase;" class="btn btn-info input-lg"  name="add_Category">Thêm mã</button>
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