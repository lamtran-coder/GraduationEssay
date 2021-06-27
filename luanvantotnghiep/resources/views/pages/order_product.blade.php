@extends('layout')
@section('index_content')
<section id="container">
    <section id="main-content">
        <section class="wrapper">
            <?php  $content=Cart::content();
                // echo '<pre>';
                // print_r($content);
                // echo '</pre>';
                $ma_kh_address=$_GET['ma_kh_address'];
                $payment_option=$_GET['payment-options'];
            ?>

            
            <div class="main-cart">
                <div class="panel panel-default shop-carts">
                <div class="panel-heading">
                   <strong><i class="fa fa-shopping-basket" aria-hidden="true"></i>Xem Lại Giỏ Hàng</strong> 
                </div>
                <div class="product-cart">
                  <table class="from-table">
                    <tbody class="from-table">
                        <tr class="form-tr">
                            <td class="form-td">Mã/Tên</td>
                            <td class="form-td">Hình Ảnh</td>
                            <td class="form-td">Size<hr>Màu</td>
                            <td class="form-td">Giá</td>
                            <td class="form-td">Chiết<br>khấu</td>
                            <td class="form-td">Số lượng</td>
                            <td class="form-td">Giá Đã <br> Chiết khấu</td>
                            <td class="form-td"></td>
                           
                        </tr>
                    </tbody>
                    <?php $Sum_mony=0; ?>
                    <?php foreach ($content as $key_1 => $v_content): ?>  
                    <tbody class="from-table">
                      <tr class="form-tr">
                        <td class="form-td"><a href="{{URL::to('/product-details/'.$v_content->id)}}">{{$v_content->id}}<hr>{{$v_content->name}}</a></td>
                        <td class="form-td"><a href="{{URL::to('/product-details/'.$v_content->id)}}"><img  width="150px" height="150px" src="{{URL::to('public/uploads/product/'.$v_content->options->anh)}}" alt=""></a></td>
                        <td class="form-td"><span style="font-size:25px;">{{$v_content->options->ma_size}}<hr>{{$v_content->options->ten_mau}}
                        </span></td>
                        <td class="form-td"><span style="font-size:25px;"><?php echo number_format($v_content->price).' VND'; ?></span></td>
                        <td class="form-td"><span style="font-size:25px;">
                            <?php
                            
                            
                            $sum_qty_pro=0;
                            foreach ($content as $key_2 => $v_content_2) {
                               if(($v_content->id==$v_content_2->id)&&($key_1!=$key_2)){ 
                                    $sum_qty_pro+=$v_content->qty+$v_content_2->qty;      
                               } 
                            }   
                            if($sum_qty_pro>=20){
                                    $ck_sp=$v_content->options->chiet_khau;
                                     echo $ck_sp.'%';
                            }else{ $ck_sp=0;}
                             
                            ?>
                                
                            </span></td>
                        <td class="form-td"><span><form action="{{URL::to('/update-qty-cart')}}" method="POST">
                                    @csrf
                                <input class="textbot-update" type="textbox" name="cart_quantity" value="{{$v_content->qty}}">
                                <input type="hidden" name="rowId_cart" value="{{$v_content->rowId}}" >
                                <button class="button-update">update</button> 
                            </form></span></td>
                        <td class="form-td"><span style="font-size:25px;"><?php 
                            $subTotal=($v_content->price*$v_content->qty)*(100-$ck_sp)/100;
                            $Sum_mony+=$subTotal;
                            echo number_format($subTotal).''.'vnd';
                             ?></span></td>
                        <td class="form-td"><a href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-trash fa-trash-styling"></i></a></td>
                      </tr>
                    </tbody>
                    <?php endforeach ?>
                  </table>
                </div>
              </div>
                <div class="discount-card">
                    <h2>Thông Tin Giao Nhận</h2>
                    <div class="cus">
                    	<ul>
                            <?php foreach ($customer_id as $key => $value_cus): ?>
                                <li>{{$value_cus->ten_kh}}</li>
                                <li>{{$value_cus->sodt}}</li>
                                <li>{{$value_cus->diachi}}</li>
                            <?php endforeach ?>
                    	</ul>
                    </div>
                    <h2>Phương Thức Thanh Toán</h2>
                    <div class="pay">
                    	<ul><?php 
                                if($payment_option==1){
                                    $result='Thanh Toán Khi Nhận Hàng';
                                }elseif($payment_option==2){
                                    $result='Chuyển khoảng ngân hàng';
                                }elseif($payment_option==3){
                                    $result='Ví điện tử MOMO';
                                }
                            ?>
                    		<li><?php echo $result; ?></li>
                    	</ul>
                    </div>

                <div>
                	
                </div>
                         
                </div>
                <div class="product-billing">
                    <header class="header-tt">Tổng Tính Thanh Toán</header>
                    <div class="payment-item">
                        <ul>
                            <li>Tổng Số Sản phẩm<span><b>
                                <?php
                                $sum_qty=0; 
                                foreach ($content as $key => $v_content){       
                                        $sum_qty=$sum_qty+$v_content->qty;
                                }
                                echo $sum_qty;
                                 ?>
                            </b><p>SP</p></span></li>
                            <li>Tổng Số Tiền<span><b>
                                <?php echo number_format($Sum_mony); ?>
                                
                            </b><p>VND</p></span></li>
                            <li>Chiết Khấu Tổng<span><b>
                                <?php 
                                    if($Sum_mony>=5000000){
                                        $chiec_khau_tong=12;
                                    }elseif(($Sum_mony<5000000)&&($Sum_mony>=3000000)){
                                        $chiec_khau_tong=10;
                                    }elseif ((($Sum_mony<3000000)&&($Sum_mony>=1500000))) {
                                        $chiec_khau_tong=8;
                                    }elseif((($Sum_mony<1500000)&&($Sum_mony>=500000))){
                                        $chiec_khau_tong=5;
                                    }else{ $chiec_khau_tong=0; }
                                    echo $chiec_khau_tong;
                                 ?>
                            </b><p>%</p></span></li>
                            <li>Thành Tiền<span><b><?php $result=$Sum_mony*(100-$chiec_khau_tong)/100;
                            echo number_format($result); ?></b><p>VND</p></span></li>
                            <li>Tiền Cọc<span><b>
                            <?php
                                if($sum_qty>=40){
                                    $prepayment=$result*(30/100);
                                }else{
                                    $prepayment=0;
                                }
                                echo number_format($prepayment);
                            ?></b><p>VND</p></span></li>
                        </ul>
                    </div>
                    <div >
                        <form action="{{URL::to('/save-order')}}" class="form-order-new" method="POST">
                            @csrf
                            <input type="hidden" name="total_deductions" value="<?php echo $chiec_khau_tong; ?>">
                            <input type="hidden" name="total_payment" value="<?php echo $result; ?>">
                            <input type="hidden" name='sum_qty' value="<?php echo $sum_qty; ?>">
                            <input type="hidden" name="ma_kh" value="<?php echo $ma_kh_address; ?>">
                            <input type="hidden">
                            <input type="hidden">
                            <input type="hidden">
                            <input type="hidden">
                            <input type="submit" value="Đặt Hàng">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
</section>
@endsection