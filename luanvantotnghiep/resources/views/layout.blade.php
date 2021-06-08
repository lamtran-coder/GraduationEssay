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
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="{{('public/frontend/js/jquery.min.js')}}"></script>
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
<script src="{{asset('public/frontend/js/jquery.wmuSlider.js')}}"></script> 
<script type="text/javascript" src="{{('public/frontend/js/modernizr.custom.min.js')}}"></script> 
<script>
     $('.example1').wmuSlider();         
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
</head>
<body>
  <div class="header-top">
     <div class="wrap"> 
        <div class="logo">
            <a href="{{URL::to('/trang-chu')}}"><img src="{{('public/frontend/images/logo.png')}}" alt=""/></a>
        </div>
        <div class="cssmenu">
           <ul>
             <li class="active"><a href="register.html">Đăng ký & Lưu</a></li> 
             <li><a href="shop.html">Định vị</a></li> 
             <li><a href="login.html">Tài khoản</a></li> 
             <li><a href="checkout.html">Thanh toán</a></li> 
           </ul>
        </div>
        <ul class="icon2 sub-icon2 profile_img">
            <li><a class="active-icon c2" href="#"> </a>
                <ul class="sub-icon2 list">
                    <li><h3>Gỏ hàng</h3><a href=""></a></li>
                    <li><h3>sản phẩm</h3></li>
                    <li><p><a href="">vào gỏ</a></p></li>
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
            <li><a class="color1" href="#">Trang chủ</a></li>
            <li class="active grid"><a class="color4" href="#">Danh mục</a>
                <div class="megapanel">
                    <div class="row">
                        <div class="col1">
                            <div class="h_nav">
                                <h4>shop</h4>
                                <ul>
                                    <li><a href="shop.html">new arrivals</a></li>
                                    <li><a href="shop.html">men</a></li>
                                    <li><a href="shop.html">women</a></li>
                                    <li><a href="shop.html">accessories</a></li>
                                    <li><a href="shop.html">kids</a></li>
                                    <li><a href="shop.html">brands</a></li>
                                </ul>   
                            </div>                          
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <h4>help</h4>
                                <ul>
                                    <li><a href="shop.html">trends</a></li>
                                    <li><a href="shop.html">sale</a></li>
                                    <li><a href="shop.html">style videos</a></li>
                                    <li><a href="shop.html">accessories</a></li>
                                    <li><a href="shop.html">kids</a></li>
                                    <li><a href="shop.html">style videos</a></li>
                                </ul>   
                            </div>                          
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <h4>my company</h4>
                                <ul>
                                    <li><a href="shop.html">trends</a></li>
                                    <li><a href="shop.html">sale</a></li>
                                    <li><a href="shop.html">style videos</a></li>
                                    <li><a href="shop.html">accessories</a></li>
                                    <li><a href="shop.html">kids</a></li>
                                    <li><a href="shop.html">style videos</a></li>
                                </ul>   
                            </div>                                              
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <h4>account</h4>
                                <ul>
                                    <li><a href="shop.html">login</a></li>
                                    <li><a href="shop.html">create an account</a></li>
                                    <li><a href="shop.html">create wishlist</a></li>
                                    <li><a href="shop.html">my shopping bag</a></li>
                                    <li><a href="shop.html">brands</a></li>
                                    <li><a href="shop.html">create wishlist</a></li>
                                </ul>   
                            </div>                      
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <h4>popular</h4>
                                <ul>
                                    <li><a href="shop.html">new arrivals</a></li>
                                    <li><a href="shop.html">men</a></li>
                                    <li><a href="shop.html">women</a></li>
                                    <li><a href="shop.html">accessories</a></li>
                                    <li><a href="shop.html">kids</a></li>
                                    <li><a href="shop.html">style videos</a></li>
                                </ul>   
                            </div>
                        </div>
                        <div class="col1">
                         <div class="h_nav">
                           <img src="{{('public/frontend/images/nav_img1.jpg')}}" alt=""/>
                         </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col2"></div>
                        <div class="col1"></div>
                        <div class="col1"></div>
                        <div class="col1"></div>
                        <div class="col1"></div>
                    </div>
                    </div>
            </li>
        <li><!-- tìm kiếm sản phẩm -->
            <div class="search1">
                <input type="text" align="right" name="nhap_tu_khoa">
                <input type="submit" name="timkiemsp">
            </div>
        </li>              
        </ul>
           <div class="clear"></div>
        </div>
       </div>
            <div>
                @yield('content')
            </div>
        <div class="footer">
          <div class="footer-top">
            <div class="wrap">
                   <div class="col_1_of_footer-top span_1_of_footer-top">
                     <ul class="f_list">
                        <li><img src="{{('public/frontend/images/f_icon.png')}}" alt=""/><span class="delivery">Free delivery on all orders over £100*</span></li>
                     </ul>
                   </div>
                   <div class="col_1_of_footer-top span_1_of_footer-top">
                    <ul class="f_list">
                        <li><img src="{{('public/frontend/images/f_icon1.png')}}" alt=""/><span class="delivery">Customer Service :<span class="orange"> (800) 000-2587 (freephone)</span></span></li>
                     </ul>
                   </div>
                   <div class="col_1_of_footer-top span_1_of_footer-top">
                    <ul class="f_list">
                        <li><img src="{{('public/frontend/images/f_icon2.png')}}" alt=""/><span class="delivery">Fast delivery & free returns</span></li>
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
                    <dt><a href="#"><span>Please Select a Country</span></a></dt>
                    <dd>
                        <ul>
                            <li><a href="#">Australia<img class="flag" src="{{('public/frontend/images/as.png')}}" alt="" /><span class="value">AS</span></a></li>
                            <li><a href="#">Sri Lanka<img class="flag" src="{{('public/frontend/images/srl.png')}}" alt="" /><span class="value">SL</span></a></li>
                            <li><a href="#">Newziland<img class="flag" src="{{('public/frontend/images/nz.png')}}" alt="" /><span class="value">NZ</span></a></li>
                            <li><a href="#">Pakistan<img class="flag" src="{{('public/frontend/images/pk.png')}}" alt="" /><span class="value">Pk</span></a></li>
                            <li><a href="#">United Kingdom<img class="flag" src="{{('public/frontend/images/uk.png')}}" alt="" /><span class="value">UK</span></a></li>
                            <li><a href="#">United States<img class="flag" src="{{('public/frontend/images/us.png')}}" alt="" /><span class="value">US</span></a></li>
                        </ul>
                     </dd>
                    </dl>
                 </div>
                <div class="col_1_of_middle span_1_of_middle">
                    <ul class="f_list1">
                        <li><span class="m_8">Sign up for email and Get 15% off</span>
                        <div class="search">      
                            <input type="text" name="s" class="textbox" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                            <input type="submit" value="Subscribe" id="submit" name="submit">
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
              <p>© All rights reserved | Template by&nbsp;<a href="http://w3layouts.com/"> W3Layouts</a></p>
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
        <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>