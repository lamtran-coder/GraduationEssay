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

	//san pham
Route::get('/add-product','Productcontroller@add_product');
Route::get('/all-product','Productcontroller@all_product');
Route::get('/edit-product/{ma_sp}','Productcontroller@edit_product');
Route::get('/delete-product/{ma_sp}','Productcontroller@delete_product');
Route::post('/save-product','Productcontroller@save_product');

	

	//hình ảnh sản phẩm
Route::get('/add-images-product','Productcontroller@add_images_product');
Route::get('/all-images-product','Productcontroller@all_images_product');
Route::post('/save-images-product','Productcontroller@save_images_product');



//đơn đặt hàng
Route::get('/all-order','Ordercontroller@all_order_product');

	//chi tiet sản phẩm
Route::get('/add-detail-product','Detail_productcontroller@add_detail_product');
Route::post('/save-detail-product','Detail_productcontroller@save_detail_product');
	//mau
Route::get('/add-color-product','Detail_productcontroller@add_color_product');
Route::post('/save-color-product','Detail_productcontroller@save_color_product');
	//size
Route::get('/add-size-product','Detail_productcontroller@add_size_product');
Route::post('/save-size-product','Detail_productcontroller@save_size_product');



	//khách hàng
Route::get('/all-customer','Customercontroller@all_customer');