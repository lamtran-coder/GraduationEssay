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
 <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('public/frontend/css/form.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
<link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">

<link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
<link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
<link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">
<link href="{{asset('public/frontend/css/lightgallery.min.css')}}" rel="stylesheet">
<link href="{{asset('public/frontend/css/lightslider.css')}}" rel="stylesheet">
<link href="{{asset('public/frontend/css/prettify.css')}}" rel="stylesheet">
<link href="{{asset('public/frontend/css/vlite.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script type="text/javascript" src="{{asset('public/frontend/js/jquery.min.js')}}"></script>
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
</head>
<body>
  <div class="header-top">
     <div class="wrap"> 
        <div class="logo">
            <a href="{{URL::to('/trang-chu')}}"><img src="{{asset('public/frontend/images/logo123.jpg')}}" alt=""/></a>
        </div>
        <div class="cssmenu">
           <ul>
            <li class="active"><a href="{{URL::to('/sign-up')}}">đăng ký</a></li> 
            <li><a href="{{URL::to('/ke-hang')}}">cửa hàng</a></li> 
            <li><a href="checkout.html">thanh toán</a></li>
            

            <?php 
                    $user_id=Session::get('user_id');
                    if ($user_id !=NULL) {
             ?>
             
               <li class="active"><a href="{{URL::to('/logout-us')}}">Đăng Xuất</a></li> 
               <?php 
           }else{
               ?>
               <li class="active"><a href="{{URL::to('/login-user')}}">đăng nhập</a></li> 
               <?php 
           }

           ?>
            
           </ul>
        </div>
        <ul class="icon2 sub-icon2 profile_img">
            <li><a class="" href="#"><i class="fa fa-shopping-cart fa-shopping-cart-styling"></i></a>
                <ul class="sub-icon2 list">
                    <li><a href=""><h3>Giỏ hàng</h3></a></li> 
                    <table border="1px">
                        <tr>
                            <th style="width:250px;"><b>Hình Ảnh</b></th>
                            <th style="width:70px;">Số Lượng</th>
                            <th style="width:100px;">Thành Tiền</th>
                            <th style="width:30px;"></th>
                        </tr>
                        <tr>
                            <td><img src="{{asset('public/frontend/images/hinh140x175.jpg')}}" alt=""></td>
                            <td>X 50</td>
                            <td>50000000</td>
                            <td><input type="Submit" name="" id="" value="UP"></td>
                        </tr>
                        <tr>
                            <td><img src="{{asset('public/frontend/images/hinh140x175.jpg')}}" alt=""></td>
                            <td>X 50</td>
                            <td>50000000</td>
                            <td><input type="Submit" name="" id="" value="UP"></td>
                        </tr>
                    </table>
                    <li>tổng thanh toán : </li>
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
                                <h4>popular</h4>
                                <ul>
                                    @foreach ($cate_product as $key =>$cate)
                                    <li><a href="{{URL::to('danh-muc-san-pham/'.$cate->ma_dm)}}">{{$cate->danh_muc}}</a></li>
                                    @endforeach
                                </ul>   
                            </div>
                        </div>
                        <img src="{{asset('public/frontend/images/nav_img.jpg')}}" alt=""/>
                    </div>
                </div>
                </li>
               <li class="active grid"><a class="color4" href="#">Giới thiệu</a>
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
                           <img src="{{asset('public/frontend/images/nav_img1.jpg')}}" alt=""/>
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
                <li><a class="color5" href="#">Chính sách</a>
                <div class="megapanel">
                    <div class="row">
                        <div class="col1">
                            <div class="h_nav">
                                <h4>popular</h4>
                                <ul>
                                    <li><a href="shop.html">new arrivals</a></li>
                                    <li><a href="shop.html">men</a></li>
                                    <li><a href="shop.html">women</a></li>
                                    <li><a href="shop.html">accessories</a></li>
                                    <li><a href="shop.html">kids</a></li>
                                    <li><a href="shop.html">login</a></li>
                                </ul>   
                            </div>
                            <div class="h_nav">
                                <h4 class="top">man</h4>
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
                                <h4>style zone</h4>
                                <ul>
                                    <li><a href="shop.html">men</a></li>
                                    <li><a href="shop.html">women</a></li>
                                    <li><a href="shop.html">accessories</a></li>
                                    <li><a href="shop.html">kids</a></li>
                                    <li><a href="shop.html">brands</a></li>
                                </ul>   
                            </div>                          
                        </div>
                        <div class="col1"></div>
                        <div class="col1"></div>
                        <div class="col1"></div>
                        <div class="col1"></div>
                        <img src="{{asset('public/frontend/images/nav_img2.jpg')}}" alt=""/>
                    </div>
                </div>
                </li>
                <li><a class="color6" href="#">khuyến mãi</a>
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
                            <div class="h_nav">
                                <h4 class="top">my company</h4>
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
                                <h4>man</h4>
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
                <li><a class="color7" href="#">thể thao</a>
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
                <li><a class="color8" href="#">Tin tức</a>
                <div class="megapanel">
                    <div class="row">
                        <div class="col1">
                            <div class="h_nav">
                                <h4>style zone</h4>
                                <ul>
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
                                <h4>popular</h4>
                                <ul>
                                    <li><a href="shop.html">new arrivals</a></li>
                                    <li><a href="shop.html">men</a></li>
                                    <li><a href="shop.html">kids</a></li>
                                    <li><a href="shop.html">accessories</a></li>
                                    <li><a href="shop.html">login</a></li>
                                </ul>   
                            </div>
                    </div>
                </div>
                </li>
               <li>
                    <form action="{{URL::to('/tim-kiem')}}" method="post">
                    @csrf
                <li><a class="color9" href="#"><input type="text" style="width: 320px;" name="keywords_submit" value=""></a></li>
                <li><a class="color10 styling-search"  href="">  Tìm</a></li>
                </form>
            </li>
           </ul>
           <div class="clear"></div>
        </div>
       </div>
        
                 @yield('index_content')
       
        <div class="footer">
          <div class="footer-top">
            <div class="wrap">
                   <div class="col_1_of_footer-top span_1_of_footer-top">
                     <ul class="f_list">
                        <li><img src="{{asset('public/frontend/images/f_icon.png')}}" alt=""/><span class="delivery">Free delivery on all orders over £100*</span></li>
                     </ul>
                   </div>
                   <div class="col_1_of_footer-top span_1_of_footer-top">
                    <ul class="f_list">
                        <li><img src="{{asset('public/frontend/images/f_icon1.png')}}" alt=""/><span class="delivery">Customer Service :<span class="orange"> (800) 000-2587 (freephone)</span></span></li>
                     </ul>
                   </div>
                   <div class="col_1_of_footer-top span_1_of_footer-top">
                    <ul class="f_list">
                        <li><img src="{{asset('public/frontend/images/f_icon2.png')}}" alt=""/><span class="delivery">Fast delivery & free returns</span></li>
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
                            <li><a href="#">Australia<img class="flag" src="{{asset('public/frontend/images/as.png')}}" alt="" /><span class="value">AS</span></a></li>
                            <li><a href="#">Sri Lanka<img class="flag" src="{{asset('public/frontend/images/srl.png')}}" alt="" /><span class="value">SL</span></a></li>
                            <li><a href="#">Newziland<img class="flag" src="{{asset('public/frontend/images/nz.png')}}" alt="" /><span class="value">NZ</span></a></li>
                            <li><a href="#">Pakistan<img class="flag" src="{{asset('public/frontend/images/pk.png')}}" alt="" /><span class="value">Pk</span></a></li>
                            <li><a href="#">United Kingdom<img class="flag" src="{{asset('public/frontend/images/uk.png')}}" alt="" /><span class="value">UK</span></a></li>
                            <li><a href="#">United States<img class="flag" src="{{asset('public/frontend/images/us.png')}}" alt="" /><span class="value">US</span></a></li>
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
        <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>