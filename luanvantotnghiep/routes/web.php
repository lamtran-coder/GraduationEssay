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
//forntend
Route::get('/', 'Homecontroller@index');
Route::get('/trang-chu','Homecontroller@index');
Route::get('/tim-kiem','Homecontroller@search');

Route::get('/login-user','UserController@login_user');
Route::get('/sign-up','UserController@sign_up');
Route::post('/add-user','UserController@add_user');
Route::post('/login-us','UserController@login_us');
Route::get('/logout-us','UserController@logout_us');


//danh muc san pham trang chu
Route::get('/danh-muc-san-pham/{ma_tk}','Productcontroller@show_category_home');

//show mac hang
Route::get('/ke-hang','Productcontroller@show_product');
//chi tiet sản phẩm
Route::get('/product-details/{ma_sp}','Productcontroller@product_details');

// binh luan
Route::post('/load-comment','Productcontroller@load_comment');
Route::post('/send-comment','Productcontroller@send_comment');
Route::post('/allow-comment','Productcontroller@allow_comment');
Route::post('/reply-comment','Productcontroller@reply_comment');
Route::post('/insert-rating','Productcontroller@insert_rating');
Route::get('/comment','ProductController@list_comment');
Route::get('/delete-comment/{ma_dm}','Productcontroller@delete_comment');
//giỏ hàng
Route::post('/save-cart','Cartcontroller@save_cart');
Route::get('/show-cart','Cartcontroller@show_cart');
Route::get('/delete-to-cart/{rowId}','Cartcontroller@delete_to_cart');
Route::post('/update-qty-cart','Cartcontroller@update_qty_cart');
//danh sách khách hàng nhận hàng
Route::get('/show-checkout','UserController@all_customers_user');
Route::get('/delete-checkout-kh/{ma_kh}','Checkoutcontroller@delete_checkout_kh');
//thanh toán
Route::get('/show-checkout','Checkoutcontroller@show_checkout');
Route::post('/save-checkout-kh','Checkoutcontroller@save_checkout_kh');
Route::get('/payment','Checkoutcontroller@payment');



Route::get('/new-order','Ordercontroller@new_order');
Route::post('/save-order','Ordercontroller@save_order');
Route::get('/show-order','Ordercontroller@show_order');


//bachend
Route::get('/admin','Admincontroller@index');
Route::get('/dashboard','Admincontroller@show_dashboard');
Route::get('/logout','Admincontroller@logout');
Route::get('/trang-ca-nhan','Admincontroller@personal_information');

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

Route::post('/search-cate-ad','Categorycontroller@search_cate_ad');
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
Route::get('/add-images-product','Productcontroller@add_images_product');
Route::get('/all-images-product','Productcontroller@all_images_product');
Route::post('/save-images-product','Productcontroller@save_images_product');



//đơn đặt hàng
Route::get('/all-order','Ordercontroller@all_order_product');
Route::post('/search-order','Ordercontroller@search_order');
Route::post('/update-order/{ma_ddh}','Ordercontroller@update_order');

Route::get('/order-details/{ma_ddh}','Ordercontroller@order_details');

//chi tiết đơn đặt hàng
Route::get('/order-detail-view/{ma_ddh}','Ordercontroller@order_detail_view');
Route::post('/update-status-od/{so_ct}','Ordercontroller@update_status_order_detail');
//Phiếu giao hàng
Route::post('/save-delivery-notes/{ma_ddh}','Deliverynotescontroller@save_delivery_notes');
Route::get('/all-delivery-notes','Deliverynotescontroller@all_delivery_notes');	
// chi tiết phiếu giao
Route::get('/deliverynotes-detail/{ma_pg}','Deliverynotescontroller@deliverynotes_detail');	


	//chi tiet sản phẩm
Route::get('/add-detail-product','Detail_productcontroller@add_detail_product');
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
Route::post('/search-customer','Customercontroller@search_customer');