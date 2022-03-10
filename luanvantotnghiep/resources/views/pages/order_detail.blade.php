@extends('layout')
@section('index_content')
<div class="main-order">
	<?php  $content=Cart::content();
                // echo '<pre>';
                // print_r($content);
                // echo '</pre>';
			$email=Session::get('email');
            $user_id=Session::get('user_id');
            $user_id=Crypt::encryptString($user_id);
            $ma_ddh=Session::get('ma_ddh')
            ?>
	<h3>Chi Tiết Đơn Đặt Hàng Có Mã Đơn:<?php echo $ma_ddh; ?></h3>
    <div class="status-order">
        <ul>
            <form>
            @csrf
                <a href="{{URL::to('/show-order/'.$user_id)}}"><li class="color1" style="display: inline-flex;"><i class="fa fa-arrow-left"></i>Đơn Đặt Hàng</li></a>
                <a href="{{Request::url()}}?status_de=0"><li class="color3" >Đang Xử Lý</li></a>
                <a href="{{Request::url()}}?status_de=1"><li class="color2" >Đang Lấy Hàng</li></a>
                <a href="{{Request::url()}}?status_de=2"><li class="color3" >Đang Giao</li></a>
                <a href="{{Request::url()}}?status_de=3"><li class="color4" >Đã Nhận</li></a>
                <a href="{{Request::url()}}?status_de=5"><li class="color5" >Hủy Hàng</li></a>
            </form>
        </ul>
    </div>
	<div class="order-you" >
		<div class="product-cart">
                  <table class="from-table">
                    <tbody class="from-table">
                        <tr class="form-tr">
                            <td class="form-td don-hang don-hang">Hình Ảnh</td>
                            <td class="form-td don-hang don-hang">Màu</td>
                            <td class="form-td don-hang don-hang">Size</td>
                            <td class="form-td don-hang don-hang">Số lượng</td>
                            <td class="form-td don-hang don-hang">Giá</td>
                            <td class="form-td don-hang don-hang">Giá Giảm</td>
                            <td class="form-td don-hang don-hang">Thành Tiền</td> 
                            <td class="form-td don-hang don-hang">Trang Thái</td> 
                         
                        </tr>
                    </tbody>
					<tbody class="from-table">
						<?php foreach ($order_detail_view as $key => $v_order_detail): ?>
							
                        <tr class="form-tr">
                            <td class="form-td don-hang don-hang" style="height:120px"><a href="{{url::to('/product-details/'.$v_order_detail->ma_sp)}}"><img src="{{URL::to('public/uploads/product/'.$v_order_detail->hinhanh)}}" height="100px" width="100px" alt=""></a></td>
                            <td class="form-td don-hang don-hang">{{$v_order_detail->ten_mau}}</td>
                            <td class="form-td don-hang don-hang">{{$v_order_detail->size}}</td>
                            <td class="form-td don-hang don-hang">{{$v_order_detail->solg_sp}}</td> 
                            <td class="form-td don-hang don-hang"><?php echo number_format($v_order_detail->gia_sale) ?>
                            </td>
                            <td class="form-td don-hang don-hang"><?php 
                            $result=$v_order_detail->solg_sp*$v_order_detail->gia_sale*$v_order_detail->chiet_khau/100;
                            echo number_format($result);
                             ?>
                            </td>
                            <td class="form-td don-hang don-hang"><?php echo number_format($v_order_detail->sotien).'VND'; ?></td>   
                            <td class="form-td don-hang don-hang" style="color: red;">
                                <?php 
                                    if ($v_order_detail->trang_thai==0){
                                        echo "Đang xử lý";
                                    }elseif($v_order_detail->trang_thai==1){
                                        echo '<p style="color:green">Đang Lấy Hàng</p>';
                                    }elseif($v_order_detail->trang_thai==2){
                                        echo '<p style="color:blue">Đang Giao</p>';
                                    }elseif($v_order_detail->trang_thai==3){
                                        echo '<p style="color:blue">Đã Nhận</p>';
                                    }elseif($v_order_detail->trang_thai==4){
                                        echo '<p style="color:blue">Đã Hủy</p>';
                                    }
                                ?>
                            </td>
                        </tr>				
						<?php endforeach ?>
                    </tbody>                   
                  </table>
                {{$order_detail_view->links()}}
        </div>
	</div>
</div>
@endsection