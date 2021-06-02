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