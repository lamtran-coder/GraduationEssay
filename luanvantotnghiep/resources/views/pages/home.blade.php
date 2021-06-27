@extends('layout')
@section('index_content')
<!-- star index-baner -->
<div class="index-banner">
  <div class="wmuSlider example1" style="height: 560px;">
      <div class="wmuSliderWrapper">
           <article style="position: absolute; width: 100%; opacity: 0;"> 
             <div class="banner-wrap">
                <div class="slider-left">
                    <img  src="{{('public/frontend/images/banner02.jpg')}}" alt=""/> 
                </div>
                 <div class="slider-right">
                    <h1>Classic</h1>
                    <h2>White</h2>
                    <p>Lorem ipsum dolor sit amet</p>
                    <div class="btn"><a href="{{URL::to('/ke-hang')}}">Mua Ngay</a></div>
                 </div>
                 <div class="clear"></div>
             </div>
            </article>
        </div>
    <a class="wmuSliderPrev">Previous</a><a class="wmuSliderNext">Next</a>
        <ul class="wmuSliderPagination">
            <li><a href="#" class="">0</a></li>
            <li><a href="#" class="">1</a></li>
            <li><a href="#" class="wmuActive">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
        </ul>
     <a class="wmuSliderPrev">Previous</a><a class="wmuSliderNext">Next</a><ul class="wmuSliderPagination"><li><a href="#" class="wmuActive">0</a></li><li><a href="#" class="">1</a></li><li><a href="#" class="">2</a></li><li><a href="#" class="">3</a></li><li><a href="#" class="">4</a></li></ul></div>
     <script src="{{('public/frontend/js/jquery.wmuSlider.js')}}"></script> 
     <script type="text/javascript" src="{{('public/frontend/js/modernizr.custom.min.js')}}"></script> 
            <script>
                 $('.example1').wmuSlider();         
            </script>                     
</div>
<!-- end index-baner -->
<!--star main -->
<div class="main">
    <div class="wrap">
        <div class="new-product"><h2>SẢN PHẨM MỚI</h2></div>
        <div class="content-bottom">
 
                
        <!-- một hàng 3 sản phẩm -->
        <div class="box1">
                <!-- thanh phần 1 sản phẩm -->
        <?php foreach ($all_product as $key => $value_pro): ?>
             <?php if ($value_pro->goc_nhin==0): ?>                    
                <div class="col_1_of_3 span_1_of_3 show-pro">
                    <a href="{{URL::to('/product-details/'.$value_pro->ma_sp)}}">
                    <div class="view view-fifth">
                        <div class="top_box">
                            <h3 class="m_1">{{$value_pro->ma_sp}}</h3>
                            <p class="m_2">{{$value_pro->ten_sp}}</p>
                            <div class="grid_img">
                            <?php if ($value_pro->goc_nhin==0): ?>     
                            <div class="css3"><img src="public/uploads/product/{{$value_pro->hinhanh}}" height="300px" width="250px" alt=""/>
                            <?php endif ?>
                            </div>
                              <div class="mask">
                                <div class="info">Chi Tiết</div>
                              </div>
                            </div>
                           <div class="price">
                            <strike>
                            <?php echo number_format($value_pro->gia_goc);  ?>
                            </strike>&emsp;&emsp;&emsp;&emsp;
                            <?php echo number_format($value_pro->gia_sale).' VND';  ?></div>
                        </div>
                    </div>
                    <span class="rating">
                        <input type="radio" class="rating-input" id="rating-input-1-5" name="rating-input-1">
                        <label for="rating-input-1-5" class="rating-star1"></label>
                        <input type="radio" class="rating-input" id="rating-input-1-4" name="rating-input-1">
                        <label for="rating-input-1-4" class="rating-star1"></label>
                        <input type="radio" class="rating-input" id="rating-input-1-3" name="rating-input-1">
                        <label for="rating-input-1-3" class="rating-star1"></label>
                        <input type="radio" class="rating-input" id="rating-input-1-2" name="rating-input-1">
                        <label for="rating-input-1-2" class="rating-star"></label>
                        <input type="radio" class="rating-input" id="rating-input-1-1" name="rating-input-1">
                        <label for="rating-input-1-1" class="rating-star"></label>
                      </span>
                        <ul class="list">
                          <li>
                            <img src="{{('public/frontend/images/plus.png')}}" alt=""/>
                            <ul class="icon1 sub-icon1 profile_img">
                              <li><a class="active-icon c1" href="#">Mua Ngay</a>
                                <ul class="sub-icon1 list">
                                    <li><h3>sed diam nonummy</h3><a href=""></a></li>
                                    <li><p>Lorem ipsum dolor sit amet, consectetuer  <a href="">adipiscing elit, sed diam</a></p></li>
                                </ul>
                              </li>
                             </ul>
                           </li>
                         </ul>
                        <div class="clear"></div>
                    </a>
                </div>
                <?php endif ?>  
            <?php endforeach ?>
            
                <!-- thanh phần 1 sản phẩm -->    
          <div class="clear"></div>
        </div>
  
         <!-- một hàng 3 sản phẩm -->
    </div>
</div>
<!--end main -->
 
   
@endsection      
