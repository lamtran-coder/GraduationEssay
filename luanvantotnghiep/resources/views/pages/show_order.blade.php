@extends('layout')
@section('index_content')
<div class="main-order">
	<h3>Đơn Đặt Hàng Của Bạn</h3>
	<?php  $content=Cart::content();
                // echo '<pre>';
                // print_r($content);
                // echo '</pre>';
			$email=Session::get('email');
            $user_id=Session::get('user_id');
            $user_id=Crypt::encryptString($user_id);
            ?>
    <div class="status-order">
        <ul>
            <form>
            @csrf
                <a href="{{URL::to('/show-order/'.$user_id)}}"><li class="color5" >Tất Cả</li></a>
                <a href="{{Request::url()}}?status=0"><li class="color1" >Chờ Xác Nhận</li></a>
                <a href="{{Request::url()}}?status=1"><li class="color2" >Chờ Lấy Hàng</li></a>
                <a href="{{Request::url()}}?status=2"><li class="color3" >Đang Giao</li></a>
                 <a href="{{Request::url()}}?status=3"><li class="color4" >Đã Giao</li></a>
                <a href="{{Request::url()}}?status=4"><li class="color2" >Đơn Hủy</li></a>
            </form>
        </ul>
    </div>
	<div class="order-you" >
		<div class="product-cart">
                  <table class="from-table">
                    <tbody class="from-table">
                        <tr class="form-tr" style="font-size :20px">
                            <td class="form-td don-hang">Ngày<br> Đặt Hàng</td>
                            <td class="form-td don-hang">Tổng<br>  Sản Phẩm</td>
                            <td class="form-td don-hang">Thành Tiền</td>
                            <td class="form-td don-hang">Tiền Cọc</td>
                            <td class="form-td don-hang">Địa chỉ Nhận Hàng</td>
                            <td class="form-td don-hang">Trang Thai</td>
                            <td class="form-td don-hang">Chi Tiết</td>

                           
                        </tr>
                    </tbody>
					<tbody class="from-table">
						<?php foreach ($order_user_id as $key => $value_user): ?>
							
                        <tr class="form-tr">
                            <td class="form-td don-hang"><?php echo date('d-m-Y',strtotime($value_user->ngdat)); ?></td>
                            
                            <td class="form-td don-hang">{{$value_user->solg_sp}} SP</td>
                            
                            <td class="form-td don-hang"><?php echo number_format($value_user->tong_tt); ?> VND</td>
                            <td class="form-td don-hang"><?php echo number_format($value_user->tien_coc); ?> VND</td>
                            <td class="form-td don-hang">
                            	{{$value_user->ten_kh}}<hr>
                            	{{$value_user->sodt}}<hr>
                            	{{$value_user->diachi}}
                            </td> 
                            <td class="form-td don-hang" style="font-weight: 800;">
                                <?php 
                                if ($value_user->trangthai==0) {?>
                                    <b style="font-weight: bold;">Chờ Xác Nhận</b><hr>
                                    <a href="{{URL::to('/delete-order-now/'.$value_user->ma_ddh)}}" onclick="return confirm('bạn muốn hủy đơn hàng này?')">Hủy Đơn</a>

                                 <?php  }elseif($value_user->trangthai==1){
                                    echo'<b style="color:yellow">Chờ Lấy Hàng</b>';
                                }elseif($value_user->trangthai==2){
                                    echo'<b style="color:mediumblue">Đang Giao</b>';
                                }elseif($value_user->trangthai==3){
                                    echo'<b style="color:red">Đã Giao</b>';
                                }elseif($value_user->trangthai==4){
                                    echo'<b style="color:red">Đã Hủy</b>';
                                }

                         
                                ?>

                            </td>

                           	<td class="form-td don-hang"><a href="{{URL::to('/order-detail-view/'.$value_user->ma_ddh)}}"><i class="fa fa-search" style="font-size: 30px;"></i></a></td>
                        </tr>				
							
						<?php endforeach ?>
                    </tbody>                   
                  </table>
               {{$order_user_id->appends(Request::all())->links() }}

                
        </div>
	</div>
</div>
@endsection