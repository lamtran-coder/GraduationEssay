@extends('layout')
@section('index_content')
<div class="main">
                <div class="wrap">
                  <div class="content-top">             
                   </div>
                    <b> <h1 style="color: black;font-size: 30px;">San pham tim kiem</h1></b>
                    <?php 
                            $message=Session::get('message');
                            if($message){
                                echo '<span class>'.$message.'<span>';

                                Session::put('message',null);
                            }
                         ?>
                  <div class="content-bottom">
                   <div class="box1">
                    
                  <div class="clear"></div>
                </div>
                 @foreach ($search_product as $key =>$product)
               
              <div class="box1">
                  <div class="col_1_of_3 span_1_of_3"><a href="single.html">
                     <div class="view view-fifth">
                      <div class="top_box">
                        <h3 class="m_1">{{$product->ten_sp}}</h3>
                        <p class="m_2">Lorem ipsum</p>
                         <div class="grid_img">
                           <div class="css3"><img src="{{asset('public/frontend/images/hinhproduct.jpg')}}" alt=""/></div>
                              <div class="mask">
                                <div class="info">Quick View</div>
                              </div>
                        </div>
                       <div class="price">Giá Gốc : {{$product->gia_goc}}</div>
                       <div class="price">Giá khuyến mãi : {{$product->gia_sale}}</div>
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
                              <li><a class="active-icon c1" href="#">Add To Bag </a>
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
                                <div class="info">Quick View</div>
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
                              <li><a class="active-icon c1" href="#">Add To Bag </a>
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
                                <div class="info">Quick View</div>
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
                              <li><a class="active-icon c1" href="#">Add To Bag </a>
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
                 @endforeach
              </div>
             </div>
        </div>
@endsection    