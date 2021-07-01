@extends('layout')
@section('index_content')
<div class="single">
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
			                <h4>Thiết kế</h4>
			      <div class="row row1 scroll-pane">
			        <div class="col col-4">
			        @foreach ($all_style as $key =>$style)
			        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>{{$style->ten_tk}}</label>
			         @endforeach
			      </div>
			      </div>
			    <h4>Màu sắc</h4>
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
			    <div><h4 class="m_9" text-align="center" >Sản Phẩm Đã Xem</h4></div>
         			<ul id="row_viewed" >

				</ul>
				<div><h4 class="m_9" text-align="center" >Sản Phẩm Yêu Thích</h4></div>
         			<ul id="row_wishlist" >                     
				</ul>
			    </section>
			    <div class="clear"></div>
			  <!--  danh mục lọc -->
			     </div>

<?php foreach ($details_product as $key => $value_det): ?>
	<!-- them sản phẩm đã xem -->
		<input type="hidden" id="product_viewed_id" value="{{$value_det->ma_sp}}" name="">
		<input type="hidden" id="viewed_productname{{$value_det->ma_sp}}" value="{{$value_det->ten_sp}}" name="">
		<input type="hidden" id="viewed_producturl{{$value_det->ma_sp}}" value="{{URL::to('/product-details/'.$value_det->ma_sp)}}" name="">
		<?php foreach ($all_img as $key => $value_img): ?>
			<?php if ($value_det->ma_sp==$value_img->ma_sp): ?>
				<input type="hidden" id="viewed_productimage{{$value_det->ma_sp}}" value="{{URL::to('public/uploads/product/'.$value_img->hinhanh)}}" name="">
			<?php endif ?>		
		<?php endforeach ?>
		<input type="hidden" id="viewed_productprice{{$value_det->ma_sp}}" value="{{number_format($value_det->gia_goc)}} " name="">
	<!-- them sản phẩm đã xem -->
	<!-- them sản phẩm yêu thích -->

		<input type="hidden" id="wishlist_productname{{$value_det->ma_sp}}"
		 value="{{$value_det->ten_sp}}" >
		<input type="hidden" id="wishlist_producturl{{$value_det->ma_sp}}" 
		value="{{URL::to('/product-details/'.$value_det->ma_sp)}}">
		<input type="hidden" id="wishlist_productprice{{$value_det->ma_sp}}" value="{{number_format($value_det->gia_goc)}} " name="">

		<?php foreach ($all_img as $key => $value_img): ?>
		<?php if ($value_det->ma_sp==$value_img->ma_sp): ?>
		<input type="hidden" id="wishlist_productimage{{$value_det->ma_sp}}" value="{{URL::to('public/uploads/product/'.$value_img->hinhanh)}}" name="">
		<?php endif ?>		
		<?php endforeach ?>
	<!-- them sản phẩm yêu thích -->
	
	<div class="cont span_2_of_3">
		<div class="labout span_1_of_a1">
			<!-- start product_slider -->
	     <ul id="etalage">
							
				<a href="optionallink.html">		
				
					<img class="etalage_thumb_image" src="{{asset('public/frontend/images/hinh140x175.jpg')}}"  width="250px" height="300px" />
					
					<img class="etalage_source_image" src="{{asset('public/frontend/images/hinh140x175.jpg')}}" width="250px" height="300px" />
				</a>	
					<?php foreach ($all_img as $key => $value_img): ?>
						<?php if ($value_det->ma_sp==$value_img->ma_sp): ?>
				<li>
					<img class="etalage_thumb_image" src="{{URL::to('public/uploads/product/'.$value_img->hinhanh)}}" alt="">
					<img class="etalage_source_image" src="{{URL::to('public/uploads/product/'.$value_img->hinhanh)}}" alt="">
				</li>
						<?php endif ?>		
					<?php endforeach ?>
			</ul>	
			<!-- end product_slider -->
		</div>

		<div class="cont1 span_2_of_a1 ">
			<h3 class="m_3">{{$value_det->ma_sp}}</h3>
			
			<div class="price_single">
						  <span class="reducedfrom">
						  	<?php echo number_format($value_det->gia_goc);  ?>
						  </span>
						  <span class="actual">
						  	<?php echo number_format($value_det->gia_sale).' VND';  ?>	
						  </span>
						</div>
			<ul class="options">
				<h4 class="m_9">CHỌN KÍCH CỠ</h4>
	
					<table>
						<tbody>
							@foreach ($all_detail as $key => $value_detail)
								@if ($value_detail->ma_sp==$value_det->ma_sp)
							<tr style="height: 30px">
								<td style="width: 150px">{{$value_detail->ma_size}}-{{$value_detail->ten_mau}}</td>
								<td style="width: 60px">{{$value_detail->so_lg}}SP</td>
								<td style="width: 60px">
									<form action="{{URL::to('/save-cart')}}" method="POST">
									   @csrf	
									   <input type="hidden" name="masp_hidden" min="1" value="{{$value_det->ma_sp}}">
									   <input type="hidden" name="mau_hidden" min="1" value="{{$value_detail->ten_mau}}">
									   <input type="hidden" name="size_hidden" min="1" value="{{$value_detail->ma_size}}">
										<button class="button-mua">Mua</button>	
									</form>
								</td>
							</tr>
								@endif
							@endforeach 	
						</tbody>
					</table>
				<div class="clear"></div>
			</ul>
			<ul>
				
			</ul>
			<ul class="add-to-links">
			 <li type="hidden" id="{{$value_det->ma_sp}}" onclick="add_wistlist(this.id)"><img src="{{asset('public/frontend/images/wish.png')}}" alt=""/><a href="#">Thêm vào danh sách yêu thích</a>
			</li>
			</ul>
			
            <div class="social_single">	
			   <ul>	
				  <li class="fb"><a href="#"><span> </span></a></li>
				  <li class="tw"><a href="#"><span> </span></a></li>
				  <li class="g_plus"><a href="#"><span> </span></a></li>
				  <li class="rss"><a href="#"><span> </span></a></li>		
			   </ul>
		    </div>
			<p class="m_desc">{{$value_det->mo_ta}}</p>
		</div>
		<div class="clear"></div>
     
     	<h2>Sản Phẩm Tượng Tự</h2>
         <ul id="flexiselDemo3">
			@foreach($related_product as $key => $related)
     	 	<?php if (($ma_dm = '$related->ma_dm')&&($related->goc_nhin==0)): ?>	
     	 	<li><a href="{{URL::to('/product-details/'.$related->ma_sp)}}">
     	 			<img src="{{URL::to('public/uploads/product/'.$related->hinhanh)}}" width="125px" height="150px" />
     	 			<div class="grid-flex">
     	 				<a href="{{URL::to('/product-details/'.$related->ma_sp)}}">{{$related->ten_sp}}</a>
     	 				<p><?php echo number_format($related->gia_goc).' VND'; ?></p>
     	 			</div>
     	 		</a>	
     	 	</li>
			 <?php endif ?>
			 @endforeach	
		 </ul>

	    <script type="text/javascript">
		 $(window).load(function() {
			$("#flexiselDemo1").flexisel();
			$("#flexiselDemo2").flexisel({
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		
			$("#flexiselDemo3").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    		responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
			
		    
		});
	</script>
	<script type="text/javascript" src="{{asset('public/frontend/js/jquery.flexisel.js')}}"></script>
     	<div class="comment-card">
     	<h3>Bình Luận<i class="fa fa-comment"></i></h3>
     	<div class="comment-content">
     		<form>
     			@csrf				
     			<input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$value_det->ma_sp}}">

     				<div id="comment_show"></div>
	     	</form>    	

     	</div>
     	<?php $username=Session::get('username');?>
     	<?php if ($username!=null): ?>
     		
		<form action="#">
			@csrf
     	<div class="comment-new">
     		<div>
     			<label><?php echo ucwords($username); ?></label>
     			<input style="color:black" type="hidden"   class="comment_name" value="<?php echo $username; ?>" >
     			
     			<!-- đánh giá -->
     			<ul class="list-inline" style="display: -webkit-box;" title="Average Raiting">
     				<?php 
					for ($count=1; $count<=5; $count++) { 
						if($count<=$rating){
	                             $color = 'color:#ffcc00;';
	                         }
	                         else {
	                             $color = 'color:#ccc;';
	                         }
					?>	
     				<li title="Đánh giá sao" 
     				id="{{$value_det->ma_sp}}-{{$count}}"
     				data-index="{{$count}}"
     				data-ma_sp="{{$value_det->ma_sp}}"
     				data-rating="{{$rating}}"
     				class="raiting"
     				style="cursor: pointer; <?php echo $color;  ?> font-size: 30px;" 
     				>&#9733;	
     				</li>
     				<?php }?>
     			</ul>
     			<!-- đánh giá --> 
     			<textarea class="style_comment comment_content"></textarea>
     			
     		</div>
     		<button><i class="fa fa-upload send-comment"></i></button>
     		<div id="notify_comment"></div>
     	</div>
     	</form>
     	<?php else: ?>
     		<div  class="comment-new"><a href="{{}}">Đăng Nhập Để Bình Luận</a></div>
     	<?php endif ?>
     </div>				
     </div>
     
<?php endforeach ?>
     <div class="clear"></div>
	 </div>
     </div>
	  
@endsection  