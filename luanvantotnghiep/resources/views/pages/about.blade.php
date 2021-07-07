@extends('layout')
@section('index_content')			
<div class=" wrapper about-shop">
		<h1 class="title" >Giới thiệu về Tiến Lên Nào</h1>
		<h2>&emsp;Thương hiệu thời trang Tiến Lên Nào có nhu cầu tiến hành xây dựng website phân phối sỉ và lẻ thời trang nam giúp khách hàng và đối tác kinh doanh tiếp cận có thể tiếp cận nhiều sản phẩm quần áo từ chất lượng cao đến chất lượng tầm trung với mức giá hợp lý.</h2>
		<h2>&emsp;Nhắm vào đối tượng là các khách hàng nam độ tuổi 15-35 để xây dụng danh mục các loại sản phẩm từ quần, áo, phụ kiện, giày dép.</h2>
		<br>
		<h2>--</h2>
		<br>	
		<h2>&emsp;Streetwear của giới trẻ Việt đang phát triển không ngừng và ngày càng khó tính hơn, kiểu cách hơn...</h2>
		<h2>&emsp;Theo xu hướng, TienLenNao đang có những bước chuyển mình đầy táo bạo...</h2><br>
		<u><b><h2>1. Những sản phẩm thiết kế thời thượng bắt trend thế giới cực nhanh</h2></b></u><br>
		<h4>&emsp;TienLenNao đã và đang ra mắt những BST thời thượng hơn, “chuẩn chất chơi” hơn để góp một phần vào xu hướng thời trang của giới trẻ đương thời! Bắt nhanh và kịp thời những trend mới nhất của thế giới mang về Việt nam...</h4><br>	
		<img src="{{asset('public/frontend/images/15.jpg')}}"><h4></h4><br><img src="{{asset('public/frontend/images/18.jpg')}}"><h4></h4><br>
		<img src="{{asset('public/frontend/images/16.jpg')}}"><h4></h4><br><img src="{{asset('public/frontend/images/19.jpg')}}"><h4></h4><br>
		<img src="{{asset('public/frontend/images/17.jpg')}}"><h4></h4><br>
		<u><b><h2>2. Những sản phẩm có ý nghĩa và giá trị hơn cả những gì bạn thấy được  </h2></b></u><br>
		<img src="{{asset('public/frontend/images/20.jpg')}}"><img src="{{asset('public/frontend/images/9.jpg')}}"><br>
		<h4>&emsp;Từ logo mang ý nghĩ ẩn giấu đầy thú vị...</h4><br>
		<img src="{{asset('public/frontend/images/10.jpg')}}"><h4></h4><br>
		<u><b><h2>3. TienLenNao.vn - Vẫn giữ những giá trị vốn có</h2></b></u><br>
		<h4>&emsp;Không mãi chạy theo xu hướng, đánh mất mình. TienLenNao vẫn luôn giữ những giá trị đã xây đựng và phát triền bao lâu nay, những điểm nổi bật đã mang khách hàng đến với TienLenNao trong suốt thời gian qua: </h4>
		<h4>&emsp;Bên cạnh những sản phẩm đầu tư và “chất chơi” kén người mặt, TienLenNao vẫn ra mắt đều đặn những thiết kế casual với mức giá tuyệt vời dành cho sinh viên </h4><br>
		<img src="{{asset('public/frontend/images/8.jpg')}}"><h4></h4><br>
		<h4>&emsp;Chất liệu và chất lượng là điều mà TienLenNao luôn luôn cập nhật và phát triển mỗi ngày để mang đến những sản phẩm tốt nhất, hoàn hảo nhất ở mức giá hiện tại.</h4><br>
		<img src="{{asset('public/frontend/images/7.jpg')}}"><h4></h4><br>
		<h4>&emsp;Hãy theo dõi và chờ đón hình ảnh mới của TienLenNao.vn, tiếp tục yêu thương mọi người nhé!</h4><br>
		<img src="{{asset('public/frontend/images/6.jpg')}}"><h4></h4><br>
		<h4>&emsp;Nếu cần áo thun bạn cứ thử một lần bước chân đến TienLenNao.vn và thoải mái lựa chọn trong hơn 1200 mẫu tại nơi đây.</h4>
		<u><h2>Thời trang đa dạng</h2></u><br>
		<h4>&emsp;Không chỉ với áo thun, TienLenNao có tất cả các item thời trang cần thiết. Chỉ cần lượn nhẹ một vòng bạn sẽ trang bị đủ từ đầu đến chân, từ trong ra ngoài, cho đến phụ kiện đi kèm phù hợp với mọi nhu cầu: tiệc tùng, lễ hội, du lịch, đến trường hoặc đi làm..v.v.</h4><br>
		<img src="{{asset('public/frontend/images/3.jpg')}}"><h4></h4><br>
		<h4>&emsp;Sự và thuận tiện trong mua sắm cho các bạn trẻ là mối quan tâm hàng đầu mà TienLenNao đặt ra, với lối trưng bày theo phong cách "factory" mạnh mẽ, lôi cuốn và gần gũi, TienLenNao mang lại một không gian trải nghiệm tuyệt vời cho các bạn trẻ.</h4><br>
		<img src="{{asset('public/frontend/images/2.jpg')}}">
		<h4></h4><br>
		<img src="{{asset('public/frontend/images/1.jpg')}}"><h4></h4><br>
		<h4>&emsp;Địa chỉ dễ dàng tìm kiếm và thuận tiện</h4><br>
		<div id="gmap" class="contact-map">
                        <iframe width="1150px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.726512256121!2d106.72569841386729!3d10.755548292335689!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752588a274486d%3A0x827ef7af424cca79!2zODcsIDEwIEzGsHUgVHLhu41uZyBMxrAsIFTDom4gVGh14bqtbiDEkMO0bmcsIFF14bqtbiA3LCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1575211406130!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>

		<ul class="colorlib-bubbles">
			
		</ul>
	</div>
@endsection