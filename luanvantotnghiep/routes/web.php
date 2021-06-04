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

	//đơn đặt hàng
Route::get('/all-order','Ordercontroller@all_order_product');