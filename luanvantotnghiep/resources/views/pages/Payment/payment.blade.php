@extends('layout')
@section('index_content')
<section id="container">
    <section id="main-content">
        <section class="wrapper">
            <?php  $content=Cart::content();
                $ma_kh_get=$_GET['ma_kh_address'];
                $prepayment=Session::get('prepayment');
            ?>
            <div class="main-cart">
                <div class="panel panel-default shop-carts">
                <div class="panel-heading">
                   <strong><i class="fa fa-money" style="color:green" aria-hidden="true"></i> Thanh Toán</strong> 
                </div>
                </div>
                <div class="discount-card">
                    <header class="header-tt">Chọn phương thức thanh toán </header>
                    <form method="GET" class="payment-methods" action="{{URL::to('/new-order')}}">
                        <input type="hidden" name="ma_kh_address" value="<?php echo  $ma_kh_get; ?>">
                        <ul class="payment">
                            <?php if($prepayment==0){ ?>
                            <li>
                                <input class="radio-payment" name="payment-options" checked="checked" value="1" type="radio" id="po1">
                                <label for="po1" class="ladel-payment">Thanh Toán Tiền Mặt</label>
                            </li>
                            <?php } ?>
                            <li>
                                <input class="radio-payment" name="payment-options" checked="checked" value="2" type="radio" id="po2">
                                <label for="po2" class="ladel-payment">Chuyển Khoảng Ngân Hàng</label>
                            </li>
                            <li>
                                <input class="radio-payment" name="payment-options" value="3" type="radio" id="po3">
                                <label for="po3" class="ladel-payment">MoMo</label>
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