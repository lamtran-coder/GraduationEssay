@extends('layout')
@section('index_content')
<div class="main-order">
	<h3>Đơn Đặt Hàng Của Bạn</h3>
	<?php  $content=Cart::content();
                // echo '<pre>';
                // print_r($content);
                // echo '</pre>';
			$email=Session::get('email');
            ?>
	<div class="order-you" >
		<div class="product-cart">
                  <table class="from-table">
                    <tbody class="from-table">
                        <tr class="form-tr" style="font-size :20px">
                            <td class="form-td" style="height :100px;">Hình Ảnh</td>
                            <td class="form-td">Mã Sản Phẩm</td>
                            <td class="form-td">Màu</td>
                            <td class="form-td">Size</td>
                            <td class="form-td">Số lượng</td>
                            <td class="form-td">Giá</td>
                            <td class="form-td">Giá Giảm</td>
                            <td class="form-td">Thành Tiền</td> 
                            <td class="form-td">Trang Thái</td>     
                        </tr>
                    </tbody>
					<tbody class="from-table">
						<?php foreach ($order_detail_view as $key => $v_order_detail): ?>
							
                        <tr class="form-tr">
                            <td class="form-td" style="height:120px"><img src="{{URL::to('public/uploads/product/'.$v_order_detail->hinhanh)}}" height="100px" width="100px" alt=""></td>
                            <td class="form-td">{{$v_order_detail->ma_sp}}</td>
                            <td class="form-td">{{$v_order_detail->ten_mau}}</td>
                            <td class="form-td">{{$v_order_detail->size}}</td>
                            <td class="form-td">{{$v_order_detail->solg_sp}}</td> 
                            <td class="form-td"><?php echo number_format($v_order_detail->gia_sale) ?>
                            </td>
                            <td class="form-td"><?php 
                            $result=$v_order_detail->solg_sp*$v_order_detail->gia_sale*$v_order_detail->chiet_khau/100;
                            echo number_format($result);
                             ?>
                            </td>
                            <td class="form-td"><?php echo number_format($v_order_detail->sotien).'VND'; ?></td>   
                            <td class="form-td" style="color: red;">
                                <?php 
                                    if ($v_order_detail->trang_thai==0){
                                        echo "Đang xử lý";
                                    }elseif($v_order_detail->trang_thai==1){
                                        echo "Đang giao";
                                    }elseif($v_order_detail->trang_thai==2){
                                        echo "Đã nhận";
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