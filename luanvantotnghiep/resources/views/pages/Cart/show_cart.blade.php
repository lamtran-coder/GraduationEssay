@extends('layout')
@section('index_content')
<?php $demsi=0; ?>
<section id="container">
    <section id="main-content">
        <section class="wrapper">
           
             <?php  $content=Cart::content();
                $dem_sp=0;
                foreach ($content as $key => $value) {
                    $dem_sp++;
                }
               if ($dem_sp==0) 
            { ?> 
                <p style="font-size:30px;padding:50px">Giỏ Hàng Hiện Không Có Mặt Hàng 
                    <br>Đến Tại <a class="color7" href="{{URL::to('/ke-hang')}}">Cửa Hàng</a></p>
                
             <?php }else{ ?>
                        <div class="main-cart">

            <div class="panel panel-default shop-carts">

                <div class="panel-heading">
                   <strong><i class="fa fa-shopping-basket" aria-hidden="true"></i> Giỏ Hàng</strong> 
                </div>
               
                <div class="product-cart">
                  <table class="from-table">
                    <tbody class="from-table">
                        <tr class="form-tr">
                        
                            <td class="form-td">Hình Ảnh</td>
                            <td class="form-td">Size<hr>Màu</td>
                            <td class="form-td">Giá</td>
                            <td class="form-td">Chiết<br>khấu</td>
                            <td class="form-td">Số lượng</td>
                            <td class="form-td">Mã Giảm Giá</td>
                            <td class="form-td">Giá Đã <br> Chiết khấu</td>
                            <td class="form-td"></td>
                        </tr>
                    </tbody>
                    <?php $Sum_mony=0;$demsi=0; ?>
                    <?php foreach ($content as $key_1 => $v_content): ?>  
                    <tbody class="from-table">
                      <tr class="form-tr">
                        <td class="form-td">
                            <a href="{{URL::to('/product-details/'.$v_content->id)}}"><img src="{{URL::to('public/uploads/product/'.$v_content->options->anh)}}" alt=""></a></td>
                        <td class="form-td"><span style="font-size: 90%">{{$v_content->options->ma_size}}<hr>{{$v_content->options->ten_mau}}
                        </span></td>
                        <td class="form-td"><span style="font-size: 90%"><?php echo number_format($v_content->price).' VND'; ?></span></td>
                        <td class="form-td"><span style="font-size: 90%">
                            <?php
                                $sum_qty_pro=$v_content->qty;
                                foreach ($content as $key_2 => $v_content_2) {
                                   if(($v_content->id==$v_content_2->id)&&($key_1!=$key_2)){ 
                                        $sum_qty_pro+=$v_content_2->qty;

                                    }
                                }
                                if ($sum_qty_pro>=20) {
                                    $ck_sp=$v_content->options->chiet_khau;
                                }
                                
                                    else{$ck_sp=0;
                                }
                                echo $ck_sp.'%';
                            ?>
                                
                            </span></td>
                        <td class="form-td"><span>
                            <form action="{{URL::to('/update-qty-cart')}}" method="POST">
                                @csrf
                                <input class="textbot-update qty_fm" type="number" name="cart_quantity" value="{{$v_content->qty}}">
                                <input type="hidden" name="rowId_cart" value="{{$v_content->rowId}}" >
                                <input type="hidden" name="quantity_sum" value="{{$v_content->options->so_lg}}">
                                <button class="button-update">update</button> 
                            </form>
                            <?php $quasoluong=Session::get('quasoluong');
                            if($quasoluong){
                                echo '<span style="color:red;size:20px;"><hr>'.$quasoluong.'<span>';

                                Session::put('quasoluong',null);
                            } ?>
                        </span></td>
                        <td><form action="">
                                <select>
                                    <optgroup label="Không Có">
                                        <option>Không Có</option>
                                        <option>Có</option>
                                    </optgroup>
                                    
                                </select>
                            </form>
                        </td>
                        <td class="form-td"><span class="font-size-gia"><?php 
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
                    <span>Với giảm giá trên tổng giá trị đơn hàng ta có các mức sau:</span>
                    <ul >
                        <li>Tổng giá trị đơn hàng trên 500.000 vnd đến dưới 1.500.000 vnd giảm 3%.</li>
                        <li>Tổng giá trị đơn hàng trên 1.500.000 vnd đến 3.000.000 vnd giảm 5% .</li>
                        <li>Tổng giá trị đơn hàng trên 3.000.000 vnd đến 5.000.000 vnd giảm 7%.</li>
                        <li>Tổng giá trị đơn hàng trên 5.000.000 giảm 10%.</li>
                        <li>Tổng giá trị đơn hàng trên 20 triệu và dưới 50 tr sẽ được chiết khấu thêm 13% trên tổng hóa đơn.</li>
                        <li>Tổng giá trị đơn hàng sỉ trên 50 triệu sẽ được chiết khấu thêm 15% trên tổng hóa đơn.</li>
                        <li>Ngoài ra khách hàng số lượng trên 20 sản phẩm sẽ thành toán tiền cộc 30%.</li>
                    </ul>
                    <span>Đối với khách hàng sỉ là khách hàng nhu cầu mua sản phẩm với số lượng lớn sản phẩm với giá được chiết khấu: </span>
                    <ul >
                        <li>Mỗi lô cần phải trên 20 sản phẩm có cùng một mã sản phẩm được tính giá chiếc khấu từng loại sản phẩm và cũng được tính chiếc khấu tổng giá trị đơn hàng như trên.</li>
                        <li>Khách hàng đặt hàng đăng nhập vào hệ thống chọn phương thức thanh toán(bắt buộc) chuyển khoản 30% giá trị đơn hàng.</li>
                    </ul>     
                </div>
                <div class="product-billing">
                    <header class="header-tt">Tổng Tính Thanh Toán</header>
                    <div class="payment-item">
                        <ul>
                            <li>Số Sản phẩm<span><b>
                                <?php
                                $sum_qty=0; 
                                foreach ($content as $key => $v_content){       
                                        $sum_qty=$sum_qty+$v_content->qty;
                                }
                                echo $sum_qty;
                                 ?>
                            </b><p>SP</p></span></li>
                            <li style="display: flex;">Nhập Khuyến Mãi
                                <form action="">
                                <select>
                                    <optgroup label="Không Có">
                                        <option></option>
                                    </optgroup>
                                </select>
                                </form>
                            </li>
                            <li>Tổng Tiền Chưa Giảm<span><b>
                                <?php echo number_format($Sum_mony); ?>
                                
                            </b><p>VND</p></span></li>
                            <li>Tiền Giảm<span><b>
                                 <?php
                                    $chiec_khau_tong=0;
                                        if($Sum_mony>=50000000){
                                            $chiec_khau_tong=15;    
                                        }elseif((($Sum_mony<50000000)&&($Sum_mony>=20000000))){
                                            $chiec_khau_tong=13;
                                        }elseif(($Sum_mony>=5000000)&&($Sum_mony<20000000)){
                                            $chiec_khau_tong=10;
                                        }
                                        elseif(($Sum_mony<5000000)&&($Sum_mony>=3000000)){
                                            $chiec_khau_tong=7;
                                        }elseif ((($Sum_mony<3000000)&&($Sum_mony>=1500000))){
                                            $chiec_khau_tong=5;
                                        }elseif((($Sum_mony<1500000)&&($Sum_mony>=500000))){
                                            $chiec_khau_tong=3;
                                        }else{$chiec_khau_tong=0;}
                                   
                                 ?>
                                 <?php $tienck=($Sum_mony*$chiec_khau_tong)/100;
                                    echo number_format($tienck); ?>
                            </b><p>VND</p></span></li>
                            <li>Phí Giao<span><b>
                                 
                                <?php if($sum_qty<20){
                                    $mony_deli=35000;
                                }else{
                                    $mony_deli=0;
                                }
                                echo $mony_deli;
                                ?>
                            </b><p>VND</p></span></li>
                            <li >Tổng Tiền<span><b>
                            <?php $thanhtien=$Sum_mony*(100-$chiec_khau_tong)/100;
                            echo number_format($thanhtien+$mony_deli); ?></b><p>VND</p></span></li>
                            <li style="color:red;" class="thanh-tien">Tiền Cọc<span><b>
                            <?php
                                if($sum_qty>=20){
                                    $prepayment=$thanhtien*(30/100);

                                }else{
                                    $prepayment=0;
                                }
                                Session::put('prepayment',$prepayment);
                                echo number_format($prepayment);
                            ?></b><p>VND</p></span>
                            </li>
                            <li style="color:red;" class="thanh-tien">Tiền Trả Sau<span><b>
                            <?php
                                if($sum_qty>=20){
                                    $prepayment=$thanhtien*(70/100);
                                }else{
                                    $prepayment=0;
                                }
                                echo number_format($prepayment);
                            ?></b><p>VND</p></span>
                            </li>
                        </ul>
                    </div>
                    <div class="checkout-order">
                        <?php $user_id=Session::get('user_id');
                                if ($user_id !=NULL) { ?>
                       <a  href="{{URL::to('/show-checkout')}}">Tiếp Theo</a>
                        <?php }else{ ?>
                       <a  href="{{URL::to('/login-user')}}">Tiếp Theo</a>
                       <?php } ?>
                    </div>
                </div>
            </div>
         <?php }?>
        </section>
    </section>
</section>
@endsection