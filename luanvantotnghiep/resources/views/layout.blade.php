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
<script type="text/javascript" src="{{asset('public/frontend/js/edit_script.js')}}"></script>
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
<div class="header">
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
                      $user_id=Session::get('user_id');
                    if ($username!=null) { ?>
                    <li><a style="color: #FFF;" href="{{URL::to('/thong-tin-ca-nhan')}}">Thông Tin Cá Nhân</a></li>
                    <li><a style="color: #FFF;" href="{{URL::to('/show-order/'.$user_id)}}">Đơn Mua</a></li>
                    <li><a style="color: #FFF;" href="{{URL::to('/logout-us')}}">Đăng Xuất</a></li> 
                        <?php }else{ ?>
                    <li><a style="color: #FFF;" href="{{URL::to('/login-user')}}">đăng nhập</a></li>  
                <?php } ?>
                    </a></li> 
                </ul>
            </li>
            <?php $username=Session::get('username');
                      $user_id=Session::get('user_id');
                    if ($username!=null) { ?>
            <li><a href=""><p style="font-weight: bolder;"><?php echo ucwords($username); ?></p></a></li>
            <?php }?>
            </ul>
           </ul>
        </div>
                    <?php  $content=Cart::content(); ?> 
        <ul class="icon2 sub-icon2 profile_img">
            <li><a class="" href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart fa-shopping-cart-styling"></i><i
                class="message_qty_cart">
                (<?php 
                $dem_sp=0;
                foreach ($content as $key => $val_con) {
                    $dem_sp++;
                } 
                echo $dem_sp;
                ?>)
            </i></a>
                <ul class="sub-icon2 list">
                    <li><a href="{{URL::to('/show-cart')}}"><h3>Giỏ hàng</h3></a></li>
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
    <div class="wrap" style="font-size: 25px;">
        <!-- start header menu -->
        <ul class="megamenu skyblue">
            <li><a class="color1" href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
            <li class="grid"><a class="color2" href="#">Danh mục</a>
                <div class="megapanel">
                    <div class="row">
                        <?php foreach ($cate_product as $key => $value_cate): ?>
                            <div class="col1">
                                <div class="h_nav">
                                    <h2 style="font-size:30px;text-align: center;">
                                        <?php 
                                        if($value_cate->danh_muc=='AO'){
                                            $danh_muc_sp='ÁO';
                                        }
                                        if($value_cate->danh_muc=='QU'){
                                            $danh_muc_sp='QUẦN';
                                        }
                                        if($value_cate->danh_muc=='GI'){
                                            $danh_muc_sp='GIÀY';
                                        }
                                        if($value_cate->danh_muc=='PK'){
                                         $danh_muc_sp='PHỤ KIỆN'; }
                                            echo $danh_muc_sp;
                                         ?>
                                    </h2>
                                    <hr>
                                    <div>
                                    <ul class="cart-des">
                                        <?php foreach ($design_id as $key => $value_des): ?>
                                            <?php if ($value_des->danh_muc==$value_cate->danh_muc): ?>
                                            <form action="{{URL::to('/ke-hang')}}">       
                                           
                                                <input type="hidden" name="ma_tk_search" value="<?php echo $value_des->ma_tk ?>">
                                                <button type="submit" class="search_ma_tk"><li><?php echo mb_strtoupper($value_des->ten_tk,'utf-8') ?></li></button>
                                            
                                            </form> 
                                            <?php endif ?>  
                                        <?php endforeach ?>
                                    </ul>
                                    </div>          
                                </div>
                            </div>
                        <?php endforeach ?>

                    </div>

                </div>
                </li>
               <li class="active grid"><a class="color4" href="{{URL::to('/gioi-thieu')}}">Giới thiệu</a></li>               
                <li><a class="color5" href="{{URL::to('/chinh-sach')}}">Chính sách</a></li>
                <li><a class="color6" href="{{URL::to('/ke-hang')}}">Cửa Hàng</a></li>
                    
                
                <ul class="icon2 sub-icon2 profile_img">
                <li><a class="" href=""><i class="fa fa-bell fa-bell-styling" aria-hidden="true"></i></a>
                    <ul class="sub-icon2 list fa-bell-styling">
                    <?php
                     $user_id=Session::get('user_id'); 
                    if (isset($user_id)){ ?>
                        <?php
                        $fl=false; 
                        foreach ($message_id as $key => $val_mes){ ?>
                            <?php if ($user_id==$val_mes->user_id){ ?>
                                <li><i class="fa fa-bell" style="color:yellow;font-size: 30px;" aria-hidden="true"></i>{{$val_mes->noi_dung}}<br>
                                    <p style="float:right;"><?php echo date('H:i:s d-m-Y',strtotime($val_mes->thoi_gian)); ?></p></li>
                            <?php  $fl=true; } ?>
                        <?php }
                        if($fl==false){ ?>
                        <li style="color:black;">Chưa Có Thông Báo Mới...</li>
                        <?php } ?>
                    <?php } ?>
                    </ul>
                </li>
                </ul>
                
           </ul>
           <div class="clear"></div>
        </div>
        <div class="search-product" >
            <form class="form-search-sp " action="{{URL::to('/ke-hang')}}" method="get">
                <input type="text" class="input-search" name="keywords_submit" placeholder="nhập tên sản phẩm, danh mục, thiết kế, chất liệu,..."> 
            </form>
        </div>
       </div>
       </div>
       <div class="index_content">
        
                 @yield('index_content')
       </div>
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
                   
                 </div>
                <div class="col_1_of_middle span_1_of_middle">
                   
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
        <script type="text/javascript">
    function remove_background(ma_sp)
     {
      for(var count = 1; count <= 5; count++)
      {
       $('#'+ma_sp+'-'+count).css('color', '#ccc');
      }
    }
    //hover chuột đánh giá sao
   $(document).on('mouseenter', '.raiting', function(){
      var index = $(this).data("index");
      var ma_sp = $(this).data('ma_sp');
    // alert(index);
    // alert(ma_sp);
      remove_background(ma_sp);
      for(var count = 1; count<=index; count++)
      {
       $('#'+ma_sp+'-'+count).css('color', '#ffcc00');
      }
    });
   //nhả chuột ko đánh giá
   $(document).on('mouseleave', '.raiting', function(){
      var index = $(this).data("index");
      var ma_sp = $(this).data('ma_sp');
      var rating = $(this).data("rating");
      remove_background(ma_sp);
      // alert(rating);
      for(var count = 1; count<=rating; count++)
      {
       $('#'+ma_sp+'-'+count).css('color', '#ffcc00');
      }
     });

    //click đánh giá sao
    $(document).on('click', '.raiting', function(){
        var index = $(this).data("index");
        var ma_sp = $(this).data('ma_sp');
        var user_id=$('.user_id').val();
        var _token = $('input[name="_token"]').val();
            // alert(index)
            // alert(ma_sp)
            // alert(_token)
            // alert(user_id)
          $.ajax({
           url:"{{url('insert-rating')}}",
           method:"POST",
           data:{index:index, ma_sp:ma_sp,_token:_token,user_id:user_id},
           success:function(data)
           {
            if(data == 'done')
            {
             alert("Bạn đã đánh giá "+index +" trên 5 . Vui lòng cho chúng tôi cảm nhận về sản phẩm");
             location.reload();
            }
            else
            {
             alert("Lỗi đánh giá");
            }
           }
    });
          
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
        <!--  loc theo gia tang dan -->
           <script type="text/javascript">
                $(document).ready(function(){

                    $('#sort').on('change',function(){

                        var url = $(this).val(); 
                        // alert(url);
                          if (url) { 
                              window.location = url;
                          }
                        return false;
                    });

                }); 
        </script>
            <!-- Sản phẩm Đã xem -->
        <script type="text/javascript">
            function viewed(){
                     if(sessionStorage.getItem('viewed')!=null){

                         var data = JSON.parse(sessionStorage.getItem('viewed'));

                         data.reverse();
                         document.getElementById('row_viewed').style.overflowY = 'scroll';
                         document.getElementById('row_viewed').style.height = '550px';

                         for(i=0;i<data.length;i++){

                            var name = data[i].name;
                            var price = data[i].price;
                            var image = data[i].image;
                            var url = data[i].url;

                            $('#row_viewed').append('<li><a href="'+url+'"><div  class="product_viewed"style="margin:10px"style="display:block;"><div><img width="125px" height="150px" src="'+image+'"></div><div class="edit_url"><p><a href="'+url+'">'+name+'</a></p> <p>'+price+'</p></div> </div> </a></li>');
                        }

                    }

                }

                viewed();
               
                product_viewed();
               function product_viewed(){
                    var id_product=$('#product_viewed_id').val();

                   if(id_product!= undefined){
                    var id = id_product
                    var name = document.getElementById('viewed_productname'+id).value;
                    var price = document.getElementById('viewed_productprice'+id).value;
                    var image = document.getElementById('viewed_productimage'+id).value;
                    var url = document.getElementById('viewed_producturl'+id).value;

                    var newItem = {
                        'url':url,
                        'id' :id,
                        'name': name,
                        'price': price,
                        'image': image
                    }

                    if(sessionStorage.getItem('viewed')==null){
                       sessionStorage.setItem('viewed', '[]');
                    }

                    var old_data = JSON.parse(sessionStorage.getItem('viewed'));

                    var matches = $.grep(old_data, function(obj){
                        return obj.id == id;
                    })

                    if(matches.length){
                      
                    }else{

                        old_data.push(newItem);

                       $('#row_viewed').append('<div class="product_viewed"style="margin:10px 0"><div ><img width="125px" height="150px" src="'+image+'"></div><div class="edit_url"><p><a href="'+url+'">'+name+'</a></p> <p>'+price+'</p></div> </div>');

                    }
                   
                    sessionStorage.setItem('viewed', JSON.stringify(old_data));
                    }
                    
                }
        </script>
        <!-- Sản phẩm Đã xem -->

        <!-- Sản phẩm yêu thích -->
<script type="text/javascript">

     function view(){
        

         if(sessionStorage.getItem('data')!=null){

             var data = JSON.parse(sessionStorage.getItem('data'));

             data.reverse();

             document.getElementById('row_wishlist').style.overflowY = 'scroll';
             document.getElementById('row_wishlist').style.height = '550px';
            
             for(i=0;i<data.length;i++){

                var name = data[i].name;
                var price = data[i].price;
                var image = data[i].image;
                var url = data[i].url;

                $('#row_wishlist').append('<div class="row product_viewed" style="margin:10px 0"><div class="col-md-4"><img width="125px" height="150px" src="'+image+'"></div><div class="edit_url"><p><a href="'+url+'">'+name+'</a></p> <p>'+price+'</p></div>');
            }

        }

    }

    view();
   

   function add_wistlist(clicked_id){
       
        var id = clicked_id;

        var name = document.getElementById('wishlist_productname'+id).value;
        var price = document.getElementById('wishlist_productprice'+id).value;
        var image = document.getElementById('wishlist_productimage'+id).value;
        var url = document.getElementById('wishlist_producturl'+id).value;

        var newItem = {
            'url':url,
            'id' :id,
            'name': name,
            'price': price,
            'image': image
        }

        if(sessionStorage.getItem('data')==null){
           sessionStorage.setItem('data', '[]');
        }

        var old_data = JSON.parse(sessionStorage.getItem('data'));
          
        var matches = $.grep(old_data, function(obj){
            return obj.id == id;
        })

        if(matches.length){
            alert('Sản phẩm bạn đã yêu thích,nên không thể thêm');

        }else{

            old_data.push(newItem);

           $('#row_wishlist').append('<div class="row" style="margin:10px 0"><div class="col-md-4"><img width="125px" height="150px" src="'+image+'"></div><div class="edit_url"><p><a href="'+url+'">'+name+'</a></p> <p>'+price+'</p></div>');
        }    
        sessionStorage.setItem('data', JSON.stringify(old_data));
        
       
   }
</script>
         <!-- Sản phẩm yêu thích -->

        <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>