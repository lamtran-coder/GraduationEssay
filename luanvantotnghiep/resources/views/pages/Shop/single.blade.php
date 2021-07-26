@extends('layout')
@section('index_content')
<div class="single">
         <div class="wrap">
     	    <div class="rsidebar span_1_of_left">
			  <!-- danh mục lọc -->
			    <section  class="sky-form">          
			    <div style="text-transform: capitalize;"><h4 class="m_9" text-align="center" >Sản Phẩm Đã Xem</h4></div>
         			<ul style="text-transform: capitalize;" id="row_viewed" >

				</ul>
				<div style="text-transform: capitalize;"><h4 class="m_9" text-align="center" >Sản Phẩm Yêu Thích</h4></div>
         			<ul style="text-transform: capitalize;" id="row_wishlist" >                     
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
			<h3 class="m_3">{{$value_det->ma_sp}}<hr>{{$value_det->ten_sp}}</h3>
			
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
				<form action="{{URL::to('/save-cart')}}" class="form_chon" method="POST">
				@csrf
				<div style="height:100px;">
					<ul>
						<?php foreach ($all_detail_color as $key_ => $value_d_color): ?>
							<?php foreach ($all_color as $key_1 => $value_color): ?>
								<?php if ($value_color->ma_mau==$value_d_color->ma_mau): ?>	
							<li><input class="radio-mau-size mau-key" name="mau_hidden" size="25" type="radio" value="{{$value_color->ten_mau}}" id="a{{$key_1}}"><label class="ladel-mau-size" for="a{{$key_1}}">{{$value_color->ten_mau}}</label></li>
								<?php endif ?>
							<?php endforeach ?>
						<?php endforeach ?>
					</ul>
				</div>
				<div style="height:90px;">
					<ul>
						<?php foreach ($all_detail_size as $key => $value_size): ?>
							<li><input class="radio-mau-size size-key" name="size_hidden"  type="radio"  value="{{$value_size->ma_size}}" id="b{{$key}}"><label for="b{{$key}}" class="ladel-mau-size">{{$value_size->ma_size}}</label></li>
						<?php endforeach ?>
					</ul>
				</div >
				<div class="number-product">
					<div class="prev">-</div>
					<div style="float: left; margin-left: 25px;">
						<input class="number-spinner" min="1" name="quantity_h" type="number" value="1" ></div>
					<div class="next">+</div>
					<div class="clear"></div>
				</div>
				<input type="hidden" class="key_product" name="masp_hidden" min="1" value="{{$value_det->ma_sp}}">
				<div id="solg_sp"></div>
				<button class="button-mua" style="margin-left: 40px;">CHỌN MUA</button>
				</form>
				<script type="text/javascript">
				//kiểm trả số lượng tồn của sản phẩm có sai mã khác nhau
					$(document).ready(function(){
						$('.form_chon').on('change',function(){
							var _token = $('input[name="_token"]').val();
							var radiocolor = $('.mau-key:checked').val();
							var radiosize = $('.size-key:checked').val();
							var key=$('.key_product').val();
							$.ajax({
							url:"{{url('/solg-sanpham')}}",
							method:"POST",
							data:{key:key,radiocolor:radiocolor, radiosize:radiosize,_token:_token},
							success:function(data){
								$('#solg_sp').html(data);
							}
							});
						});
					});
				</script>
				<div class="clear"></div>
				
			</ul>
			<ul>
				
			</ul>
			<ul class="add-to-links">
			 <li type="hidden" id="{{$value_det->ma_sp}}" onclick="add_wistlist(this.id)"><img src="{{asset('public/frontend/images/wish.png')}}" alt=""/><a href="#">Thêm vào danh sách yêu thích</a>
			</li>
			</ul>
		</div>
		<div class="clear"></div>
		<div class="mota">Mô Tả<p class="m_desc">{{$value_det->mo_ta}}</p></div>	
     <div style="text-transform: capitalize;">
     	<h2 style="padding: 15px; font-size: 25px; font-weight: bold;">Sản Phẩm Tượng Tự</h2>
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
	</div>
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
	<script type="text/javascript">
		
		$(document).ready(function(){

			$('.prev').on("click", function(){
				var prev=$(this).closest('.number-product').find('input').val();
				if (prev==1) {
					$(this).closest('.number-product').find('input').val("1");
				}else{
					var prevVal=prev-1;
					$(this).closest('.number-product').find('input').val(prevVal);
				}
			});
			$('.next').on("click", function(){
				
				var next=$(this).closest('.number-product').find('input').val();
				if (next==100) {
					$(this).closest('.number-product').find('input').val("100");
				}else {
					var nextVal=++next;
					$(this).closest('.number-product').find('input').val(nextVal);
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
     		<div >
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
     			<div>
     			<textarea class="style_comment comment_content"></textarea>
     			<button class="btn_comment"><i class="fa fa-upload send-comment"></i></button>
     			</div>
     		</div>
     		<div id="notify_comment"></div>
     	</div>
     	</form>
     	<?php else: ?>
     		<div  class="comment-new"><a href="{{URL::to('/login-user')}}">Đăng Nhập Để Bình Luận</a></div>
     	<?php endif ?>
     </div>				
     </div>
     
<?php endforeach ?>
     <div class="clear"></div>
	 </div>
     </div>
	  
@endsection  