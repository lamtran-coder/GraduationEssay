@extends('layout')
@section('index_content')

 <div class="login">
        <div class="wrap">
          <div class="rsidebar span_1_of_left">
  <!-- danh mục lọc -->
    <section  class="sky-form">
                <h4>Danh mục</h4>
    <div class="row row1 scroll-pane">
      <div class="col col-4">
        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Quần</label>
        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Áo</label>
        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Giày</label>
        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Phụ kiện</label>
         
      </div>
    </div>
                <h4>Category</h4>
      <div class="row row1 scroll-pane">
        <div class="col col-4">
        @foreach ($all_style as $key =>$style)
        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>{{$style->ten_tk}}</label>
         @endforeach
      </div>
      </div>
    <h4>Styles</h4>
    <div class="row row1 scroll-pane">
      <div class="col col-4">
        @foreach ($all_color as $key =>$color)
        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>{{$color->ten_mau}}</label>
        @endforeach
      </div>
    </div>
    <h4>Chất lieu</h4>
    <div class="row row1 scroll-pane">
      <div class="col col-4">
        @foreach ($all_material as $key =>$material)
        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>{{$material->ten_cl}}</label>
        @endforeach
      </div>
    </div>
    </section>
  <!--  danh mục lọc -->
     </div>
  <div class="cont span_2_of_3">
   <div class="mens-toolbar">
          <div class="sort">
            <div class="sort-by">
              <label>Sort By</label>
              <select>
                     <option value="">Popularity</option>
                     <option value="">Price : High to Low</option>
                     <option value="">Price : Low to High</option>
              </select>
              <a href=""><img src="{{asset('public/frontend/images/arrow2.gif')}}" alt="" class="v-middle"></a>
            </div>
      </div>
          <div class="pager">   
             <div class="limiter visible-desktop">
              <label>Show</label>
               <select>
         <option value="" selected="selected">9</option>
              <option value="">15</option>
              <option value="">30</option>
          </select> per page        
              </div>
          <ul class="dc_pagination dc_paginationA dc_paginationA06">
          <li><a href="#" class="previous">Pages</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
      </ul>
       <div class="clear"></div>
         </div>
          <div class="clear"></div>
       </div>
  <div class="box1">
  <?php foreach ($category_by_id as $key => $value_pro): ?>
      <?php if ($value_pro->goc_nhin==0): ?>
        
      
     <div class="col_1_of_single1 span_1_of_single1 show-pro"><a href="{{URL::to('/product-details/'.$value_pro->ma_sp)}}">
          <div class="view1 view-fifth1">
            <div class="top_box">
            <h3 class="m_1">{{$value_pro->ma_sp}}</h3>
            <p class="m_2">{{$value_pro->ten_sp}}</p>
                <div class="grid_img">
                 <div class="css3"><img src="{{URL::to('public/uploads/product/'.$value_pro->hinhanh)}}" width="250px" height="300px" alt=""/></div>
                  <div class="mask1">
                <div class="info">Chi tiết</div>
                        </div>
                </div>
             <div class="price"><strike>{{$value_pro->gia_goc}}VND</strike>&emsp;{{$value_pro->gia_sale}}VND</div>
          </div>
      </div>
      <span class="rating1">
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
         <ul class="list2">
          <li>
            <img src="{{asset('public/frontend/images/plus.png')}}" alt=""/>
            <ul class="icon1 sub-icon1 profile_img">
            <li><a class="active-icon c1" href="#">THÊM</a>
            <ul class="sub-icon1 list">
              <li><h3>sed diam nonummy</h3><a href=""></a></li>
              <li>
                <p>Lorem ipsum dolor sit amet,<a href="">adipiscing elit, sed diam</a></p>
              </li>
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
    <div class="clear"></div>
          
    </div>
  </div>
  <div class="clear"></div>
  </div>
</div>     
@endsection    