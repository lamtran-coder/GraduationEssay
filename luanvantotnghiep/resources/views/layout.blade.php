<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Free Adidas Website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('public/frontend/css/edit_main.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('public/frontend/css/form.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="{{asset('public/frontend/js/jquery.min.js')}}"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="{{asset('public/frontend/js/sweetalert.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>
<!-- start menu -->     
<link href="{{asset('public/frontend/css/megamenu.css')}}" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="{{asset('public/frontend/js/megamenu.js')}}"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- end menu -->

<!-- top scrolling -->
<script type="text/javascript" src="{{asset('public/frontend/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/easing.js')}}"></script>
   <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){     
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
            });
        });
    </script>
<script type="text/javascript" src="{{asset('public/frontend/js/jquery.jscrollpane.min.js')}}"></script>
        <script type="text/javascript" id="sourcecode">
            $(function()
            {
                $('.scroll-pane').jScrollPane();
            });
        </script>
<!----details-product-slider--->
                <!-- Include the Etalage files -->
                    <link rel="stylesheet" href="{{asset('public/frontend/css/etalage.css')}}">
                    <script src="{{asset('public/frontend/js/jquery.etalage.min.js')}}"></script>
                <!-- Include the Etalage files -->
                <script>
                        jQuery(document).ready(function($){
            
                            $('#etalage').etalage({
                                thumb_image_width: 300,
                                thumb_image_height: 400,
                                
                                show_hint: true,
                                click_callback: function(image_anchor, instance_id){
                                    alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
                                }
                            });
                            // This is for the dropdown list example:
                            $('.dropdownlist').change(function(){
                                etalage_show( $(this).find('option:selected').attr('class') );
                            });

                    });
                </script>
<!----//details-product-slider--->  
<!-- top scrolling -->
<script type="text/javascript" src="{{asset('public/frontend/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/easing.js')}}"></script>
   <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){     
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
            });
        });
    </script>
</head>
<body>
  <div class="header-top">
     <div class="wrap"> 
        <div class="logo">
            <a href="{{URL::to('/trang-chu')}}"><img src="{{asset('public/frontend/images/logo123.jpg')}}" alt=""/></a>
        </div>
        <div class="cssmenu">
           <ul>
            
            <li> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</li>
            <ul class="icon2 sub-icon2 profile_img">
            <li><a class="" href="{{URL::to('/login-user')}}"><i class="fa fa-user fa-user-styling"></i></a>
                <ul class="sub-icon2 list user-styling">
                    <li><a href="">
                <?php $username=Session::get('username');
                    if ($username!=null) { ?>
                    <li><a href="">Thông Tin Cá Nhân</a></li>
                    <li><a href="{{URL::to('/show-order')}}">Đơn Mua</a></li>
                    <li><a href="{{URL::to('/logout-us')}}">Đăng Xuất</a></li> 
                        <?php }else{ ?>
                    <li><a href="{{URL::to('/login-user')}}">đăng nhập</a></li>  
                <?php } ?>
                    </a></li> 
                </ul>
            <li><a href=""><p><?php echo ucwords($username); ?></p></a></li>
            </li>
            </ul>
           </ul>
        </div>
        <ul class="icon2 sub-icon2 profile_img">
            <li><a class="" href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart fa-shopping-cart-styling"></i></a>
                <ul class="sub-icon2 list">
                    <li><a href="{{URL::to('/show-cart')}}"><h3>Giỏ hàng</h3></a></li>
                    <?php  $content=Cart::content();
                        // echo '<pre>';
                        // print_r($content);
                        // echo '</pre>';
                    ?> 
                       <table class="show-cart-mini">
                            <tbody>
                                <?php foreach ($content as $key => $v_content): ?> 
                                  <tr>
                                    <td><span><a href="{{URL::to('/product-details/'.$v_content->id)}}"><img width="70px" height="70px" src="{{URL::to('public/uploads/product/'.$v_content->options->anh)}}" alt=""></a></span></td>
                                    <td><span>{{$v_content->options->ma_size}}<hr>{{$v_content->options->ten_mau}}</span></td>
                                    <td><span><?php $dvk=$v_content->price/1000; echo $dvk.'K'?></span></td>
                                    <td><span>
                                        <form action="{{URL::to('/update-qty-cart')}}" method="POST">
                                                @csrf
                                            <input class="textbot-update-mini" type="textbox" name="cart_quantity" value="{{$v_content->qty}}">
                                            <input type="hidden" name="rowId_cart" value="{{$v_content->rowId}}" >
                                            <button class="button-update-mini">update</button> 
                                        </form>
                                    </span></td>
                                    <td><span>
                                        <?php 
                                            $subTotal=$v_content->price*$v_content->qty;
                                            if ($subTotal<=999999) {
                                                $subTotal=($subTotal/1000).'K';
                                            }elseif($subTotal>999999){
                                                $subTotal=($subTotal/1000000).'M';
                                            }
                                            echo $subTotal;?>
                                
                                    </span></td>
                                    <td><a href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-trash fa-trash-styling-mini"></td>
                                  </tr>
                                <?php endforeach ?>  
                            </tbody>
                      </table>
                    <div>tổng thanh toán : {{Cart::subtotal()}}</div>
                    <div class="checkout-order-mini"><a  href="{{URL::to('/show-cart')}}">Xem Chi Tiết Giỏ</a>  
                    </div>
                </ul>
            </li>
        </ul>
        <div class="clear"></div>
    </div>
   </div>
   <div class="header-bottom">
    <div class="wrap">
        <!-- start header menu -->
        <ul class="megamenu skyblue">
            <li><a class="color1" href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
            <li class="grid"><a class="color2" href="#">Danh mục</a>
                <div class="megapanel">
                    <div class="row">
                        <div class="col1">
                            <div class="h_nav">
                                <h2 style="font-size:50px">Áo</h2>
                                <hr>
                                <ul>
                                <?php
                                // echo"<pre>";
                                //         print_r($d)
                                //       echo"</pre>";
                                // foreach ($design_id as $key => $value_des) {
                                //     echo $value_des->ma_tk;
                                // }
                                 ?>
                                 <hr>
                                <?php foreach ($cate_product as $key => $value_cate): ?>
                                    <?php if ($value_cate->danh_muc=="AO"): ?>
                                      <li><a href="{{URL::to('danh-muc-san-pham/'.$value_cate->ma_dm)}}">
                                          {{$value_cate->ten_tk}}
                                      </a></li>
                                    <?php endif ?>
                                <?php endforeach ?>
                                </ul>          
                            </div>
                        </div>               
                    </div>
                </div>
                </li>
               <li class="active grid"><a class="color4" href="#">Giới thiệu</a></li>               
                <li><a class="color5" href="#">Chính sách</a></li>
                <li><a class="color6" href="#">khuyến mãi</a></li>
                <li><a class="color7" href="{{URL::to('/ke-hang')}}">Cửa Hàng</a></li>
                <li><a class="color8" href="#">Tin tức</a></li>
                <li>
                
                </li>

                
           </ul>
           <div class="clear"></div>
        </div>
        <div class="search-product" >
            <form class="form-search-sp " action="{{URL::to('/tim-kiem')}}" method="post">
                @csrf
                    <input type="text" class="input-search"  name="keywords_submit" value="" placeholder="nhập từ khóa"> 
            </form>
        </div>
       </div>
        
                 @yield('index_content')
       
        <div class="footer">
          <div class="footer-top">
            <div class="wrap">
                   <div class="col_1_of_footer-top span_1_of_footer-top">
                     <ul class="f_list">
                        <li><img src="{{asset('public/frontend/images/f_icon.png')}}" alt=""/><span class="delivery">Giao hàng miễn phí cho tất cả các đơn đặt hàng trên 10M</span></li>
                     </ul>
                   </div>
                   <div class="col_1_of_footer-top span_1_of_footer-top">
                    <ul class="f_list">
                        <li><img src="{{asset('public/frontend/images/f_icon1.png')}}" alt=""/><span class="delivery">Chăm sóc khách hàng : <span class="orange">0931-048-540</span></span></li>
                     </ul>
                   </div>
                   <div class="col_1_of_footer-top span_1_of_footer-top">
                    <ul class="f_list">
                        <li><img src="{{asset('public/frontend/images/f_icon2.png')}}" alt=""/><span class="delivery">Giao hàng nhanh chóng và trả hàng miễn phí</span></li>
                     </ul>
                   </div>
                  <div class="clear"></div>
             </div>
         </div>
         <div class="footer-middle">
            <div class="wrap">
                <div class="section group">
                <div class="col_1_of_middle span_1_of_middle">
                    <dl id="sample" class="dropdown">
                    <dt><a href="#"><span>Vui lòng chọn một quốc gia</span></a></dt>
                    <dd>
                        <ul>
                            <li><a href="#">Hoa Kỳ<img class="flag" src="{{asset('public/frontend/images/us.png')}}" alt="" /><span class="value">US</span></a></li>
                        </ul>
                     </dd>
                    </dl>
                 </div>
                <div class="col_1_of_middle span_1_of_middle">
                    <ul class="f_list1">
                        <li><span class="m_8">ĐĂNG KÝ EMAIL VÀ ĐƯỢC GIẢM GIÁ 15%</span>
                        <div class="search-email">      
                            <input type="text" name="s" class="textbox" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                            <input type="submit" value="Tìm" id="submit" name="submit">
                            <div id="response"> </div>
                        </div><div class="clear"></div>
                        </li>
                    </ul>
                </div>
                <div class="clear"></div>
               </div>
            </div>
         </div>
         <div class="copy">
           <div class="wrap">
              <h3><p>Đề tài xây dựng website phân phối si và lẻ </p></h3>
           </div>
         </div>
       </div>
       <script type="text/javascript">
            $(document).ready(function() {
            
                var defaults = {
                    containerID: 'toTop', // fading element id
                    containerHoverID: 'toTopHover', // fading element hover id
                    scrollSpeed: 1200,
                    easingType: 'linear' 
                };
                
                
                $().UItoTop({ easingType: 'easeOutQuart' });
                
            });
        </script>
        <!-- bình luận -->
           <script type="text/javascript">
                 $(document).ready(function(){
                     load_comment();
                 function load_comment(){
                    var ma_sp = $('.comment_product_id').val();
                    var _token = $('input[name="_token"]').val();
                    // alert(ma_sp);
                    // alert(_token);
                    $.ajax({
                      url:"{{url('/load-comment')}}",
                      method:"POST",
                      data:{ma_sp:ma_sp, _token:_token},
                      success:function(data){
                        $('#comment_show').html(data);
                      }
                    });
                }
                $('.send-comment').click(function(){
                    var ma_sp = $('.comment_product_id').val();
                    var comment_name = $('.comment_name').val();
                    var comment_content = $('.comment_content').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                      url:"{{url('/send-comment')}}",
                      method:"POST",
                      data:{ma_sp:ma_sp,comment_name:comment_name,comment_content:comment_content, _token:_token},
                      success:function(data){
                        $('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công / đang chờ duyệt </span>');
                             load_comment();
                        $('#notify_comment').fadeOut(9000);
                        $('.comment_name').val('');
                        $('.comment_content').val('');
                      }
                    });
                });
                 });
           </script>
        <!--  bình luận -->
        <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>