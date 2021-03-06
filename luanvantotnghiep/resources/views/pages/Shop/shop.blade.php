@extends('layout')
@section('index_content')
 <div class="login">
        <div class="wrap shop">
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
	                    <button>Lọc</button>
	                    <br>
	                    <div class="clearfix"></div>
	                    <!-- <input type="submit" name="filter_price" value="Lọc giá"> -->
	             </form>
		</div>
  		<form action="">
  		<div style="padding: 10px;"><button style="width: 100%;">Tìm kiếm</button></div>
        <h4>Thiết Kế</h4>
		<div class="row row1 ">
		<div class="col col-4">
		@foreach ($all_style as $key =>$style)
		<label class="checkbox"><input type="checkbox" name="checkbox_des[]" value="{{$style->ma_tk}}" ><i></i>{{$style->ten_tk}}</label>
		@endforeach
		</div>
		</div>
		<h4>Màu Sắc</h4>
		<div class="row row1">
			<div class="col col-4">
				<?php $demspcolor=0; ?>
				@foreach ($all_color as $key =>$color)
				<label class="checkbox"><input type="checkbox" name="checkbox_col[]" value="{{$color->ma_mau}}" ><i></i>{{$color->ten_mau}}</label>
				@endforeach
			</div>
		</div>
		<h4>Chất lieu</h4>
		<div class="row row1">
			<div class="col col-4">
				@foreach ($all_material as $key =>$material)
				<label class="checkbox"><input type="checkbox" name="checkbox_mat[]" value="{{$material->ma_cl}}" ><i></i>{{$material->ten_cl}}</label>
				@endforeach
			</div>
		</div>
		</form>
		
		<h4 class="m_9" text-align="center" >Sản Phẩm Đã Xem</h4>
         <ul id="row_viewed" ></ul>
         <div style="text-transform: capitalize;">
         	<h4 class="m_9" text-align="center" >Sản Phẩm Yêu Thích</h4>
         </div>
         <ul style="text-transform: capitalize;" id="row_wishlist" ></ul>
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
	                   <option value="{{Request::url()}}?sort_by=tang_dan">Giá : Tăng dần</option>
	                   <option value="{{Request::url()}}?sort_by=giam_dan">Giá : Giảm dần</option>
	                   <option value="{{Request::url()}}?sort_by=kytu_az">Lọc theo tên A đến Z</option>
                       <option value="{{Request::url()}}?sort_by=kytu_za">Lọc theo tên Z đến A</option>
	            </select>
        		</form>
        		</div>
			</div>
			
	        <div class="pager styling-pager">   
	           <div class="limiter visible-desktop">
	                {{$all_product->appends(Request::all())->links() }}
	            </div>
	        <ul class="styling-pager" >
	        	<!-- //hiển thị tìm kiếm -->
	        	<?php 
	        		if (isset($_GET['sort_by'])){
	        			$sort_by=$_GET['sort_by'];
	        			if ($sort_by=="tang_dan") {
	        				echo 'Sản Phẩm Giá:<br> "Tăng Dần"';
	        			}elseif($sort_by=="giam_dan"){
	        				echo 'Sản Phẩm Giá:<br> "Giảm Dần"';
	        			}elseif($sort_by=="kytu_az"){
	        				echo 'Sản Phẩm Từ:<br> "A - Z"';
	        			}elseif($sort_by=="kytu_za"){
	        				echo 'Sản Phẩm Từ:<br> "Z - A"';
	        			}
	        		}elseif(isset($_GET['keywords_submit'])){
	        			$keywords_submit=$_GET['keywords_submit'];
	        			echo 'từ khóa tìm kiếm là: "'.$keywords_submit.'"';
	        		}elseif(isset($_GET['ma_tk_search'])){
	        			$ma_tk_search=$_GET['ma_tk_search'];
	        			foreach ($all_style as $key => $val_style) {
	        				if ($val_style->ma_tk==$ma_tk_search) {
	        					echo 'sản phẩm có thiết kế:<br>"'.$val_style->ten_tk.'"';
	        				}
	        			}
	        		}
	        	?>
	        	<!-- //hiển thị tìm kiếm -->
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
					   <div class="css3"><img src="public/uploads/product/{{$value_pro->hinhanh}}" width="100%" height="240em" alt=""/></div>
				          <div class="mask1">
		         		<div class="info">Chi tiết</div>
		                  	</div>
		      			</div>
		  			 <div class="price"><strike>{{$value_pro->gia_goc}}</strike>&emsp;{{$value_pro->gia_sale}}VND</div>
			   	</div>
			</div>
			<div style="background:#656363;">
			<span class="rating Raiting-shop" style="height: 21px;">
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
                            echo '<li style="cursor: pointer;'.$color.'font-size: 100%;margin-left: 5%;" >&#9733;</li>';
                            } 
                        }else{
                            for ($count=1; $count<=5; $count++) {     
                            if($count<=5){
                             $color = 'color:#ffcc00;';
                            }
                            else{
                             $color = 'color:#black;';}
                            echo '<li style="cursor: pointer;'.$color.'font-size: 100%;margin-left: 5%;" >&#9733;</li>';
                            }
                         }

                        ?>
                        </ul>
                            </a>

                    </span>
				 <form action="{{URL::to('/save-cart')}}" method="POST">
                    @csrf    
                    <input type="hidden" name="masp_hidden" min="1" value="{{$value_pro->ma_sp}}">
                    <input type="hidden" name="mau_hidden" min="1" value="{{$value_pro->ten_mau}}">
                    <input type="hidden" name="size_hidden" min="1" value="{{$value_pro->ma_size}}">
                    <input type="hidden" name="quantity_h" min="1" value="1">
                	<button class="btn_mua_nhanh_shop">Mua Ngay</button>
                  </form>
                  </div>
		    	    <div class="clear"></div>
		    	</a>
	    </div>
	 <?php endforeach ?>
	  <div class="clear"></div>
	  <ul>{{$all_product->appends(Request::all())->links() }}</ul>
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
                $( "#amount" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ]+" VND" );


                $( "#start_price" ).val(ui.values[ 0 ]);
                $( "#end_price" ).val(ui.values[ 1 ]);
              }
            });
            $( "#amount" ).val( $( "#slider-range" ).slider( "values", 0 ) +
              " - " + $( "#slider-range" ).slider( "values", 1 ) +" VND");

        }); 
</script>
</div>

		
			  
	    
@endsection