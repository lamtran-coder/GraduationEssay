@extends('layout')
@section('index_content')
<section id="container">
    <section id="main-content">
        <section class="wrapper">
            <div class="main-cart">
                <div class="panel panel-default shop-carts">
                <div class="panel-heading">
                   <strong><i class="fa fa-check" style="color:green;" aria-hidden="true"></i> Thông Tin Giao Nhận</strong> 
                </div>
              </div>
                

                <div class="user-billing">
                	<?php  $username=Session::get('username');
                		   $phone=Session::get('phone');
                		   $address=Session::get('address');
                		   $email=Session::get('email');
                     ?>
                    <header class="header-tt">Người Nhận Mới</header>
                    <div class="customer-cart">
                        <form action="{{URL::to('/save-checkout-kh')}}" method="POST" >
                            @csrf
                        <ul>
                        	<li><span>Tên Khách Hàng</span><input type="textbox" name="username" value="<?php echo ucwords($username); ?>"></li>
                        	<li><span>Số Điện thoại</span><input type="textbox" name="phone" value="<?php echo $phone; ?>"></li>
                        	<li><span>Địa Chỉ</span><input type="textbox" name="address" value="<?php echo $address; ?>"></li>
                        	<li><span>Email:</span>
                                <label><?php echo $email; ?></label>
                                <input type="hidden" name="email" value="<?php echo $email; ?>"></li>
                            <li><span>Nếu thay đổi mới địa chỉ mới </span><input type="submit" value="Lưu" /></li>
                        </ul>
                        </form>
                    </div>
                </div>
                <div class="address-user">
                    <h3>Danh Sách Các địa chỉ đã lưu</h3>
                       <?php $email=Session::get('email'); ?> 
                    <form method="GET" action="{{URL::to('/payment')}}">
                        <ul>
                            <?php 
                            if (isset($email)) {
                            
                            foreach ($customer_id as $key => $value_cus){
                                if($value_cus->email==$email){
                                 if($value_cus->ma_kh!=null){
                                    if($key==0){ ?> 
                                    <li>
                                        <span><label for="address_cus"><input name="ma_kh_address" size="20" checked="checked" id="address_cus" value="{{$value_cus->ma_kh}}" type="radio">{{$value_cus->ten_kh}}</label></span>
                                        <span>({{$value_cus->sodt}})</span>
                                        <span>{{$value_cus->diachi}}</span>
                                    </li>
                                <?php }else{ ?>
                                    <li>
                                        <span><label><input name="ma_kh_address" size="20" checked="checked" value="{{$value_cus->ma_kh}}" type="radio">{{$value_cus->ten_kh}}</label></span>
                                        <span>({{$value_cus->sodt}})</span>
                                        <span>{{$value_cus->diachi}}</span>
                                    </li>
                            <?php  }}}}
                            }?>
                        
                        </ul>    
                            <button class="btn_checkout">Tiếp Theo</button>
                    </form>
                    <?php 
                  $message=Session::get('message');
                 if($message){ ?>
                     <script type="text/javascript">
                        $(document).ready(function(){
                            alert('<?php echo $message; ?>')
                        });
                     </script>   
                    <?php Session::put('message',null); 
                    }?>  
                </div>
            </div>
        </section>
    </section>
</section>
@endsection   