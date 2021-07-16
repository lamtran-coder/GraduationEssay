@extends('layout')
@section('index_content')
<section id="container">
    <section id="main-content">
        <section class="wrapper">
            <?php  $content=Cart::content();
                //echo '<pre>';
                // print_r($content);
                // echo '</pre>';
                $ma_kh_get=$_GET['ma_kh_address'];
            
                
            ?>
            <div class="main-cart">
                <div class="panel panel-default shop-carts">
                <div class="panel-heading">
                   <strong><i class="fa fa-money" style="color:green" aria-hidden="true"></i> Thanh Toán</strong> 
                </div>
                </div>
                <div class="discount-card">
                    <header class="header-tt">Chọn phương thức thanh toán</header>
                    <form method="GET" class="payment-methods" action="{{URL::to('/new-order')}}">
                        <input type="hidden" name="ma_kh_address" value="<?php echo  $ma_kh_get; ?>">
                        <ul>
                            <li>
                                <span><label><input name="payment-options" checked="checked" value="1" type="radio">Thanh Toán Tiền Mặt</label></span>
                            </li>
                            <li>
                                <span><label><input  name="payment-options" value="2" type="radio">Chuyển Khoảng Ngân Hàng</label></span>
                            </li>
                            <li>
                                <span><label><input  name="payment-options" value="3" type="radio">MoMo</label></span>
                            </li>
                        </ul>
                        <button class="btn_checkout">Tiếp Theo</button>
                     </form>
                </div>
            </div>
        </section>
    </section>
</section>
    


@endsection 