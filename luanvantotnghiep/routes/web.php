<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//-------------------------------forntend---------------------------------------------------
//Trang-Chu
Route::get('/', 'Homecontroller@index');
Route::get('/trang-chu','Homecontroller@index');
//Tìm kiếm
Route::get('/tim-kiem','Homecontroller@search');
//Chính Sách
Route::get('/chinh-sach','Homecontroller@policy');
//Giới Thiệu
Route::get('/gioi-thieu','Homecontroller@about');
//Trang Tìm Kiếm Theo Danh Mục
Route::get('/danh-muc-san-pham/{ma_tk}','Productcontroller@show_category_home');
Route::post('/search-cate-ad','Categorycontroller@search_cate_ad');
//user
//------Trang Đăng nhập
Route::get('/login-user','UserController@login_user');
//-------------Kiểm Trả Đăng Nhập
Route::post('/login-us','UserController@login_us');
//------Trang Đăng ký
Route::get('/sign-up','UserController@sign_up');
//-------------Đăng Ký Tai Khoản Mới
Route::post('/add-user','UserController@add_user');
//------Thêm Đăng Suất
Route::get('/logout-us','UserController@logout_us');
//------Trang Thông Tin Cá Nhân
Route::get('/thong-tin-ca-nhan','UserController@information_user');
//------------Sửa Thông Tin
Route::post('/update-ten-nv/{user_id}','UserController@update_user');
//------Trang Đổi Mật Khẩu
Route::get('/change-pass','UserController@change_pass');
//------------Đổi Mật Khẩu
Route::post('/update-pass/{user_id}','UserController@update_pass');



//---------Trang Cửa Hàng
Route::get('/ke-hang','Productcontroller@show_product');
//---------Trang chi tiet sản phẩm
Route::get('/product-details/{ma_sp}','Productcontroller@product_details');
//------------------Binh luan
Route::post('/load-comment','Productcontroller@load_comment');
Route::post('/send-comment','Productcontroller@send_comment');
Route::post('/allow-comment','Productcontroller@allow_comment');
Route::post('/reply-comment','Productcontroller@reply_comment');
Route::post('/insert-rating','Productcontroller@insert_rating');
Route::get('/comment','ProductController@list_comment');
//------------------Xóa Binh Luận
Route::get('/delete-comment/{ma_dm}','Productcontroller@delete_comment');




//Giỏ hàng
//-----------------Thêm Sản Phẩm vào Giỏ
Route::post('/save-cart','Cartcontroller@save_cart');
//---------Trang Sản Phẩm vào Giỏ
Route::get('/show-cart','Cartcontroller@show_cart');
//-----------------Xóa Sản Phẩm Trong Giỏ
Route::get('/delete-to-cart/{rowId}','Cartcontroller@delete_to_cart');
//-----------------Sửa Sản Phẩm Trong Giỏ
Route::post('/update-qty-cart','Cartcontroller@update_qty_cart');


//Trang Thông Tin Giao Hang
// Route::get('/show-checkout','UserController@all_customers_user');
Route::get('/show-checkout','Checkoutcontroller@show_checkout');
//-----------------Xóa Khách Hàng Nhận
Route::get('/delete-checkout-kh/{ma_kh}','Checkoutcontroller@delete_checkout_kh');
//----------------Lưu Khách Hàng Nhận Mới
Route::post('/save-checkout-kh','Checkoutcontroller@save_checkout_kh');
//Trang thanh toán
Route::get('/payment','Checkoutcontroller@payment');



Route::get('/new-order','Ordercontroller@new_order');
Route::post('/save-order','Ordercontroller@save_order');
Route::get('/show-order/{user_id}','Ordercontroller@show_order');


//bachend
Route::get('/admin','Admincontroller@index');
Route::get('/dashboard','Admincontroller@show_dashboard');
Route::get('/logout','Admincontroller@logout');
Route::get('/trang-ca-nhan','Admincontroller@personal_information');
Route::post('/update-ten-nv/{email}','Admincontroller@update_name');
Route::post('/update-sodt-nv/{email}','Admincontroller@update_phone');
Route::post('/update-diachi-nv/{email}','Admincontroller@update_address');
Route::post('/update-password/{email}','Admincontroller@update_password');

Route::post('/admin-dashboard','Admincontroller@dashboard');
	//danh muc
Route::get('/add-Category','Categorycontroller@add_Category');
Route::get('/all-Category','Categorycontroller@all_Category');
Route::get('/unactive-category/{ma_dm}','Categorycontroller@unactive_category');
Route::get('/active-category/{ma_dm}','Categorycontroller@active_category');
Route::get('/edit-Category/{ma_dm}','Categorycontroller@edit_Category');
Route::get('/delete-Category/{ma_dm}','Categorycontroller@delete_Category');

Route::post('/update-Category/{ma_dm}','Categorycontroller@update_Category');
Route::post('/save-Category','Categorycontroller@save_Category');


	//thiết kế
Route::get('/add-design','Categorycontroller@add_design');
Route::post('/save-design','Categorycontroller@save_design');

	//chất liệu
Route::get('/add-material','Categorycontroller@add_material');
Route::post('/save-material','Categorycontroller@save_material');	



	//san pham
Route::get('/add-product','Productcontroller@add_product');
Route::get('/all-product','Productcontroller@all_product');
Route::get('/edit-product/{ma_sp}','Productcontroller@edit_product');
Route::get('/delete-product/{ma_sp}','Productcontroller@delete_product');
Route::post('/save-product','Productcontroller@save_product');
Route::post('/update-product/{ma_sp}','Productcontroller@update_product');
Route::post('/search-product-ad','Productcontroller@search_product_ad');


	

	//hình ảnh sản phẩm
Route::get('/add-images-product/{ma_sp}','Productcontroller@add_images_product');
Route::post('/save-images-product','Productcontroller@save_images_product');



//đơn đặt hàng
Route::get('/all-order','Ordercontroller@all_order_product');
Route::get('/order-details/{ma_ddh}','Ordercontroller@order_details');

//chi tiết đơn đặt hàng
Route::get('/order-detail-view/{ma_ddh}','Ordercontroller@order_detail_view');
Route::post('/update-status-od/{so_ct}','Ordercontroller@update_status_order_detail');
//Phiếu giao hàng
Route::post('/save-delivery-notes/{ma_ddh}','Deliverynotescontroller@save_delivery_notes');
Route::get('/all-delivery-notes','Deliverynotescontroller@all_delivery_notes');	
// chi tiết phiếu giao
Route::get('/deliverynotes-detail/{ma_pg}','Deliverynotescontroller@deliverynotes_detail');
Route::get('/unactive-delivery/{ma_pg}','Deliverynotescontroller@unactive_delivery');

// in chi tiet phieu giao
Route::get('/print-deliverynotes/{checkout_code}','Deliverynotescontroller@print_order');	


	//chi tiet sản phẩm
Route::get('/add-detail-product/{ma_sp}','Detail_productcontroller@add_detail_product');
Route::get('/all-detail-product','Detail_productcontroller@all_detail_product');
Route::post('/save-detail-product','Detail_productcontroller@save_detail_product');
Route::post('/update-amount/{ma_sp}','Detail_productcontroller@update_amount');
	//mau
Route::get('/add-color-product','Detail_productcontroller@add_color_product');
Route::post('/save-color-product','Detail_productcontroller@save_color_product');
	//size
Route::get('/add-size-product','Detail_productcontroller@add_size_product');
Route::post('/save-size-product','Detail_productcontroller@save_size_product');



	//khách hàng
Route::get('/all-customer','Customercontroller@all_customer');
Route::get('/dia-chi-nhan/{email}','Customercontroller@customer_address');
Route::post('/search-customer','Customercontroller@search_customer');

//banner
Route::get('/manage-slider','Slidercontroller@manage_slider');
Route::get('/add-slider','Slidercontroller@add_slider');
Route::get('/delete-slide/{slide_id}','Slidercontroller@delete_slide');
Route::post('/insert-slider','Slidercontroller@insert_slider');
Route::get('/unactive-slide/{slide_id}','Slidercontroller@unactive_slide');
Route::get('/active-slide/{slide_id}','Slidercontroller@active_slide');

