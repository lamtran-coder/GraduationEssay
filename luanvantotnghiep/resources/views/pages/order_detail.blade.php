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
                            <td class="form-td" style="height :100px;">Mã <br> Sản Phẩm</td>
                            <td class="form-td">Ngày<br> Đặt Hàng</td>
                            <td class="form-td">Ngày<br> Giao Hàng</td>
                            <td class="form-td">Tổng<br>  Sản Phẩm</td>
                            <td class="form-td">Tổng<br> Chiếc Khấu</td>
                            <td class="form-td">Thành Tiền</td>
                            <td class="form-td">Tiền Cọc</td>
                            <td class="form-td">Địa chỉ Nhận Hàng</td>
                            <td class="form-td">Chi Tiết</td>

                           
                        </tr>
                    </tbody>
					<tbody class="from-table">
						<?php foreach ($order_user_id as $key => $value_user): ?>
							<?php if ($value_user->email==$email): ?>
                        <tr class="form-tr">
                            <td class="form-td" style="height:100px">{{$value_user->ma_ddh}}</td>
                            <td class="form-td">{{$value_user->ngdat}}</td>
                            <td class="form-td">{{$value_user->nggiaodk}}</td>
                            <td class="form-td">{{$value_user->solg_sp}} SP</td>
                            <td class="form-td">{{$value_user->ck_tong}} %</td>
                            <td class="form-td"><?php echo number_format($value_user->tong_tt); ?> VND</td>
                            <td class="form-td"><?php echo number_format($value_user->tien_coc); ?> VND</td>
                            <td class="form-td">
                            	{{$value_user->ten_kh}}<hr>
                            	{{$value_user->sodt}}<hr>
                            	{{$value_user->diachi}}
                            </td>   
                           	<td class="form-td"><a href=""><i class="fa fa-search" style="font-size: 30px;"></i></a></td>
                        </tr>				
							<?php endif ?>
						<?php endforeach ?>
                    </tbody>                   
                  </table>
                
        </div>
	</div>
</div>
@endsection