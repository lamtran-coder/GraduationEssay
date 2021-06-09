@extends('layout')
@section('index_content')
  <div class="index-banner">
          <div class="wmuSlider example1" style="height: 560px;">
              <div class="wmuSliderWrapper">
                  <article style="position: relative; width: 100%; opacity: 1;"> 
                    <div class="banner-wrap">
                        <div class="slider-left">
                            <img src="{{asset('public/frontend/images/banner1.jpg')}}" alt=""/> 
                        </div>
                         <div class="slider-right">
                            <h1>Classic</h1>
                            <h2>White</h2>
                            <p>Lorem ipsum dolor sit amet</p>
                            <div class="btn"><a href="shop.html">Shop Now</a></div>
                         </div>
                         <div class="clear"></div>
                     </div>
                    </article>
                   <article style="position: absolute; width: 100%; opacity: 0;"> 
                     <div class="banner-wrap">
                        <div class="slider-left">
                            <img src="{{asset('public/frontend/images/banner02.jpg')}}" alt=""/> 
                        </div>
                         <div class="slider-right">
                            <h1>Classic</h1>
                            <h2>White</h2>
                            <p>Lorem ipsum dolor sit amet</p>
                            <div class="btn"><a href="shop.html">Shop Now</a></div>
                         </div>
                         <div class="clear"></div>
                     </div>
                   </article>
                   <article style="position: absolute; width: 100%; opacity: 0;">
                    <div class="banner-wrap">
                        <div class="slider-left">
                            <img src="{{asset('public/frontend/images/banner03.jpg')}}" alt=""/> 
                        </div>
                         <div class="slider-right">
                            <h1>Classic</h1>
                            <h2>White</h2>
                            <p>Lorem ipsum dolor sit amet</p>
                            <div class="btn"><a href="shop.html">Shop Now</a></div>
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
                 <script src="{{asset('public/frontend/js/jquery.wmuSlider.js')}}"></script> 
                 <script type="text/javascript" src="{{asset('public/frontend/js/modernizr.custom.min.js')}}"></script> 
                        <script>
                             $('.example1').wmuSlider();         
                        </script>                     
             </div>
             <div class="main">
                <div class="wrap">
                  <div class="content-top">
                          
                   </div>


                    <b> <h1 style="color: black;font-size: 30px;">Sản Phẩm Mới</h1></b>
                  <div class="content-bottom">
                   <div class="box1">
                    <div class="col_1_of_3 span_1_of_3"><a href="single.html">
                     <div class="view view-fifth">
                      <div class="top_box">
                        <h3 class="m_1">Tên sản phẩm</h3>
                        <p class="m_2">MÃ Sản phẩm</p>
                         <div class="grid_img">
                           <div class="css3"><img src="{{asset('public/frontend/images/hinhproduct.jpg')}}" alt=""/></div>
                              <div class="mask">
                                <div class="info">Xem Chi Tiết</div>
                              </div>
                        </div>
                       <div class="price" >
                          
                          <li >giá sale</li>
                       </div>
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
                        <label for="rating-input-1-1" class="rating-star"></label>&nbsp;
                      (1)
                      </span>
                         <ul class="list">
                          <li>
                            <img src="{{asset('public/frontend/images/plus.png')}}" alt=""/>
                            <ul class="icon1 sub-icon1 profile_img">
                              <li><a class="active-icon c1" href="#">Thêm Vào Giỏ </a>
                                <ul class="sub-icon1 list">
                                    <li><h3>sed diam nonummy</h3><a href=""></a></li>
                                    <li><p>Lorem ipsum dolor sit amet, consectetuer  <a href="">adipiscing elit, sed diam</a></p></li>
                                </ul>
                              </li>
                             </ul>
                           </li>
                         </ul>
                        <div class="clear"></div>
                    </a></div>
                    <div class="col_1_of_3 span_1_of_3"><a href="single.html">
                     <div class="view view-fifth">
                      <div class="top_box">
                        <h3 class="m_1">Lorem ipsum dolor sit amet</h3>
                        <p class="m_2">Lorem ipsum</p>
                        <div class="grid_img">
                           <div class="css3"><img src="{{asset('public/frontend/images/hinhproduct.jpg')}}" alt=""/></div>
                              <div class="mask">
                                <div class="info">Xem Chi Tiết</div>
                              </div>
                        </div>
                       <div class="price">£480</div>
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
                        <label for="rating-input-1-1" class="rating-star"></label>&nbsp;
                      (2)
                      </span>
                         <ul class="list">
                          <li>
                            <img src="{{asset('public/frontend/images/plus.png')}}" alt=""/>
                            <ul class="icon1 sub-icon1 profile_img">
                              <li><a class="active-icon c1" href="#">Thêm Vào Giỏ </a>
                                <ul class="sub-icon1 list">
                                    <li><h3>sed diam nonummy</h3><a href=""></a></li>
                                    <li><p>Lorem ipsum dolor sit amet, consectetuer  <a href="">adipiscing elit, sed diam</a></p></li>
                                </ul>
                              </li>
                             </ul>
                           </li>
                         </ul>
                        <div class="clear"></div>
                    </a></div>
                    <div class="col_1_of_3 span_1_of_3"><a href="single.html">
                     <div class="view view-fifth">
                      <div class="top_box">
                        <h3 class="m_1">Lorem ipsum dolor sit amet</h3>
                        <p class="m_2">Lorem ipsum</p>
                         <div class="grid_img">
                           <div class="css3"><img src="{{asset('public/frontend/images/hinhproduct.jpg')}}" alt=""/></div>
                              <div class="mask">
                                <div class="info">Xem Chi Tiết</div>
                              </div>
                        </div>
                       <div class="price">£480</div>
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
                        <label for="rating-input-1-1" class="rating-star"></label>&nbsp;
                      (3)
                      </span>
                         <ul class="list">
                          <li>
                            <img src="{{asset('public/frontend/images/plus.png')}}" alt=""/>
                            <ul class="icon1 sub-icon1 profile_img">
                              <li><a class="active-icon c1" href="#">Thêm Vào Giỏ </a>
                                <ul class="sub-icon1 list">
                                    <li><h3>sed diam nonummy</h3><a href=""></a></li>
                                    <li><p>Lorem ipsum dolor sit amet, consectetuer  <a href="">adipiscing elit, sed diam</a></p></li>
                                </ul>
                              </li>
                             </ul>
                           </li>
                         </ul>
                        <div class="clear"></div>
                    </a></div>
                  <div class="clear"></div>
                </div>
              <div class="box1">
                  <div class="col_1_of_3 span_1_of_3"><a href="single.html">
                     <div class="view view-fifth">
                      <div class="top_box">
                        <h3 class="m_1">Lorem ipsum dolor sit amet</h3>
                        <p class="m_2">Lorem ipsum</p>
                         <div class="grid_img">
                           <div class="css3"><img src="{{asset('public/frontend/images/hinhproduct.jpg')}}" alt=""/></div>
                              <div class="mask">
                                <div class="info">Xem Chi Tiết</div>
                              </div>
                        </div>
                       <div class="price">£480</div>
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
                        <label for="rating-input-1-1" class="rating-star"></label>&nbsp;
                      (4)
                      </span>
                         <ul class="list">
                          <li>
                            <img src="{{asset('public/frontend/images/plus.png')}}" alt=""/>
                            <ul class="icon1 sub-icon1 profile_img">
                              <li><a class="active-icon c1" href="#">Thêm Vào Giỏ </a>
                                <ul class="sub-icon1 list">
                                    <li><h3>sed diam nonummy</h3><a href=""></a></li>
                                    <li><p>Lorem ipsum dolor sit amet, consectetuer  <a href="">adipiscing elit, sed diam</a></p></li>
                                </ul>
                              </li>
                             </ul>
                           </li>
                         </ul>
                        <div class="clear"></div>
                    </a></div>


                    <div class="col_1_of_3 span_1_of_3"><a href="single.html">
                     <div class="view view-fifth">
                      <div class="top_box">
                        <h3 class="m_1">Lorem ipsum dolor sit amet</h3>
                        <p class="m_2">Lorem ipsum</p>
                         <div class="grid_img">
                           <div class="css3"><img src="{{asset('public/frontend/images/hinhproduct.jpg')}}" alt=""/></div>
                              <div class="mask">
                                <div class="info">Xem Chi Tiết</div>
                              </div>
                        </div>
                       <div class="price">£480</div>
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
                        <label for="rating-input-1-1" class="rating-star"></label>&nbsp;
                      (5)
                      </span>
                         <ul class="list">
                          <li>
                            <img src="{{asset('public/frontend/images/plus.png')}}" alt=""/>
                            <ul class="icon1 sub-icon1 profile_img">
                              <li><a class="active-icon c1" href="#">Thêm Vào Giỏ </a>
                                <ul class="sub-icon1 list">
                                    <li><h3>sed diam nonummy</h3><a href=""></a></li>
                                    <li><p>Lorem ipsum dolor sit amet, consectetuer  <a href="">adipiscing elit, sed diam</a></p></li>
                                </ul>
                              </li>
                             </ul>
                           </li>
                         </ul>
                        <div class="clear"></div>
                    </a></div>



                   <div class="col_1_of_3 span_1_of_3"><a href="single.html">
                     <div class="view view-fifth">
                      <div class="top_box">
                        <h3 class="m_1">Lorem ipsum dolor sit amet</h3>
                        <p class="m_2">Lorem ipsum</p>
                         <div class="grid_img">
                           <div class="css3"><img src="{{asset('public/frontend/images/hinhproduct.jpg')}}" alt=""/></div>
                              <div class="mask">
                                <div class="info">Xem Chi Tiết</div>
                              </div>
                        </div>
                       <div class="price">£480</div>
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
                        <label for="rating-input-1-1" class="rating-star"></label>&nbsp;
                      (6)
                      </span>
                         <ul class="list">
                          <li>
                            <img src="{{asset('public/frontend/images/plus.png')}}" alt=""/>
                            <ul class="icon1 sub-icon1 profile_img">
                              <li><a class="active-icon c1" href="#">Thêm Vào Giỏ </a>
                                <ul class="sub-icon1 list">
                                    <li><h3>sed diam nonummy</h3><a href=""></a></li>
                                    <li><p>Lorem ipsum dolor sit amet, consectetuer  <a href="">adipiscing elit, sed diam</a></p></li>
                                </ul>
                              </li>
                             </ul>
                           </li>
                         </ul>
                        <div class="clear"></div>
                    </a></div>
                  <div class="clear"></div>
                </div>
              </div>
             </div>
        </div>
@endsection      
