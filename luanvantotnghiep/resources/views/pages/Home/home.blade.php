@extends('layout')
@section('index_content')
<!-- star index-baner -->
 

<div class="index-banner">
  <div class="wmuSlider example1" style="height: 560px;">
     <div class="wmuSliderWrapper">
        @php 
                            $i = 0;
                    @endphp
                        @foreach($slider as $key => $slide)
                            @php 
                                $i++;
                            @endphp
           <article style="position: absolute; width: 100%; opacity: 0;"> 
             <div class="banner-wrap">
                    
             
                <div class="slider-left {{$i==1 ? 'active' : '' }} ">
                    <img  src="{{asset('public/uploads/slider/'.$slide->slider_image)}}" height="100%" width="100%" class=""alt="{{$slide->slider_desc}}"/> 
                </div>

                 <div class="slider-right">
                    <h1>{{$slide->slider_name}}</h1>
                    <p>{{$slide->slider_desc}}</p>
                    <div class="btn"><a href="{{URL::to('/ke-hang')}}">Mua Ngay</a></div>
                 </div> 
                 <div class="clear"></div>
             </div>

            </article>
             @endforeach 
        </div>>
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
     <!-- <script type="text/javascript" src="{{('public/frontend/js/modernizr.custom.min.js')}}">
     </script> --> 
            <script>
                 $('.example1').wmuSlider();         
            </script>                     
</div>
<!-- end index-baner -->
<!--star main -->
<div class="main">
    <div class="wrap">
        <div class="new-product"><h2><i class="fa fa-product-hunt" style="color:green"></i> SẢN PHẨM MỚI</h2></div>
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
                        <ul class="list-inline" style="display: -webkit-box;" title="Average Raiting">
                        <?php
                        $sum=0;
                        $dem=0;
                        foreach ($rating_id as $key => $value_rai) {
                            if ($value_pro->ma_sp==$value_rai->ma_sp) {
                               $sum+=$value_rai->rating;
                               $dem++;
                            }
                            
                        }
                        if (($sum!=0)&&($dem!=0)) {
                            $result_rai=round($sum/$dem);
                            
                            for ($count=1; $count<=5; $count++) { 
                                if (isset($result_rai)) {
                                    if($count<=$result_rai){
                                    $color = 'color:#ffcc00;';}
                                    else{
                                    $color = 'color:#black;';} 
                                }   
                            echo '<li style="cursor: pointer;'.$color.'font-size: 15px;" >&#9733;</li>';
                            } 
                        }else{
                            for ($count=1; $count<=5; $count++) {     
                            if($count<=5){
                             $color = 'color:#ffcc00;';
                            }
                            else{
                             $color = 'color:#black;';}
                            echo '<li style="cursor: pointer;'.$color.'font-size: 15px;" >&#9733;</li>';
                            }
                         }

                        ?>
                        </ul>
                            </a>

                    </span>
                        <ul class="list">
                          <li>
                            <form action="{{URL::to('/save-cart')}}" method="POST">
                                       @csrf    
                                       <input type="hidden" name="masp_hidden" min="1" value="{{$value_pro->ma_sp}}">
                                       <input type="hidden" name="mau_hidden" min="1" value="{{$value_pro->ten_mau}}">
                                       <input type="hidden" name="size_hidden" min="1" value="{{$value_pro->ma_size}}">
                                       <input type="hidden" name="quantity_h" min="1" value="1">
                            <button class="btn_mua_nhanh">Mua Ngay</button>
                                        
                            </form>
                           </li>
                         </ul>
                        <div class="clear"></div>
                </div>
                <?php endif ?>  
            <?php endforeach ?>
            
                <!-- thanh phần 1 sản phẩm -->    
          <div class="pakes-new-product"><p style="float:right;"></p></div>
          <div class="clear"></div>
        </div>
         <!-- một hàng 3 sản phẩm -->
    </div>
</div>
<!--end main -->
 
   
@endsection      
