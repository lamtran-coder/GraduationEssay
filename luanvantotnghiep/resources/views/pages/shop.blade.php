@extends('layout')
@section('index_content')
 <div class="login">
        <div class="wrap">
     	    <div class="rsidebar span_1_of_left">
	<!-- danh mục lọc -->
		<section  class="sky-form">
		<h4>Lọc Giá</h4>
		<div class="Loc-theo-gia">
			<form>
	                   <div id="slider-range"></div>
	                   <style type="text/css">
	                       .style-range p {
	                           float: left;
	                           width: ;
	                       }
	                   </style>
	                     <div class="style-range">
	                       <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
	                      
	                   </div>
	                   <input type="hidden" name="start_price" id="start_price">
	                   <input type="hidden" name="end_price" id="end_price">

	                    <br>
	                    <div class="clearfix"></div>
	                    <button>Lọc</button>
	                    <!-- <input type="submit" name="filter_price" value="Lọc giá"> -->
	               </form>
		</div>
  
        <h4>Thiết Kế</h4>
		<div class="row row1 scroll-pane">
		<div class="col col-4">
		@foreach ($all_style as $key =>$style)
		<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>{{$style->ten_tk}}</label>
		@endforeach
		</div>
		</div>
		<h4>Màu Sắc</h4>
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
		
		<h4 class="m_9" text-align="center" >Sản Phẩm Đã Xem</h4>
         <ul id="row_viewed" ></ul>
		</section>
		
	<!-- 	danh mục lọc -->
	   </div>
	<div class="cont span_2_of_3">
	 <div class="mens-toolbar">
       		<div class="sort">
        		<div class="sort-by">
	            <form>
	            	@csrf
	            <select name="sort" id="sort">
	                   <option value="{{Request::url()}}?sort_by=none">Sắp xếp theo</option>
	                   <option value="{{Request::url()}}?sort_by=tang_dan">Giá : Tăng đân</option>
	                   <option value="{{Request::url()}}?sort_by=giam_dan">Giá : Giảm dần</option>
	                   <option value="{{Request::url()}}?sort_by=kytu_az">Lọc theo tên A đến Z</option>
                       <option value="{{Request::url()}}?sort_by=kytu_za">Lọc theo tên Z đến A</option>
	            </select>
        		</form>
        		</div>
			</div>
	        <div class="pager styling-pager">   
	           <div class="limiter visible-desktop">
	            <label>Show</label>
	           	 <select>
				 <option value="" selected="selected">9</option>
			        <option value="">15</option>
			        <option value="">30</option>
		    	</select> per page        
	            </div>
	        <ul class="styling-pager" >
	        	{{$all_product->links()}}
	        </ul>
	        	
	        	
		   <div class="clear"></div>

	       	
	    	 </div>
	    		<div class="clear"></div>
       </div>
	<div class="box1">
	<?php foreach ($all_product as $key => $value_pro): ?>
		
	   <div class="col_1_of_single1 span_1_of_single1 show-pro"><a href="{{URL::to('/product-details/'.$value_pro->ma_sp)}}">
		     	<div class="view1 view-fifth1">
		  	  	<div class="top_box">
				  	<h3 class="m_1">{{$value_pro->ma_sp}}</h3>
				  	<p class="m_2">{{$value_pro->ten_sp}}</p>
			         	<div class="grid_img">
					   <div class="css3"><img src="public/uploads/product/{{$value_pro->hinhanh}}" width="250px" height="300px" alt=""/></div>
				          <div class="mask1">
		         		<div class="info">Chi tiết</div>
		                  	</div>
		      			</div>
		  			 <div class="price"><strike>{{$value_pro->gia_goc}}</strike>&emsp;{{$value_pro->gia_sale}}VND</div>
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
				  
					  <li><form action="{{URL::to('/save-cart')}}" method="POST">
                                       @csrf    
                                       <input type="hidden" name="masp_hidden" min="1" value="{{$value_pro->ma_sp}}">
                                       <input type="hidden" name="mau_hidden" min="1" value="{{$value_pro->ten_mau}}">
                                       <input type="hidden" name="size_hidden" min="1" value="{{$value_pro->ma_size}}">
                            <button style="height: 32px;
                                        width: 100%;
                                        font-size: 20px;
                                        background: black;
                                        color: #FFF;">Mua Ngay</button>
                            </form>
					  </li>
					
				 </ul>
		    	    <div class="clear"></div>
		    	</a>
	    </div>
	 <?php endforeach ?>
	  <div class="clear"></div>
	  <ul>{{$all_product->links()}}</ul>
  	</div>
	</div>

	<div class="clear"></div>
	</div>
	<script type="text/javascript">
        $(document).ready(function(){

           $( "#slider-range" ).slider({
                orientation: "horizontal",
              range: true,

              min:{{$min_price_range}},
              max:{{$max_price_range}},

              steps:10000,
              values: [ {{$min_price}}, {{$max_price}} ],
              slide: function( event, ui ) {
                $( "#amount" ).val( "đ" + ui.values[ 0 ] + " - đ" + ui.values[ 1 ] );


                $( "#start_price" ).val(ui.values[ 0 ]);
                $( "#end_price" ).val(ui.values[ 1 ]);
              }
            });
            $( "#amount" ).val( "đ" + $( "#slider-range" ).slider( "values", 0 ) +
              " - đ" + $( "#slider-range" ).slider( "values", 1 ) );

        }); 
</script>
</div>

		
			  
	    
@endsection