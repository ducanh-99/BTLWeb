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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
//Đăng nhập
Route::get('/login','LoginController@login');
Route::get('/login-check','LoginController@login_check');
Route::get('/login-successful','LoginController@loginSuccessful');
Route::get('/login-failed','LoginController@loginFailed');

//Đăng ký
Route::get('/signup','SignupController@signup');
Route::get('/signup-check','SignupController@signup_check');
Route::get('/signup-successful','SignupController@signupSuccessful');
Route::get('/signup-failed','SignupController@signupFailed');

//Tìm kiếm
Route::get('/search','SearchController@search');
Route::get('/search-result','SearchController@searchResult');
Route::get('/detail/{id_product}','SearchController@showDetail');

//chọn category brach/main
Route::get('/main-result','CategorySearchController@mainSearch');
Route::get('/branch-result/{id_main}','CategorySearchController@branchSearch');
Route::get('/product-result/{id_branch}','CategorySearchController@productSearch');

//cart
Route::get('/save-cart','CartController@addToCart');
Route::get('/show-cart','CartController@showCart');
Route::get('/update-cart-quantity','CartController@updateCart');
Route::get('/delete-from-cart/{rowID}','CartController@deleteFromCart');

//pay
Route::get('/pay','PayController@noteDetail');
Route::get('/save-customer-payment','PayController@saveCustomerPayment');

//user personal information
Route::get('/change-information','UserInformationController@changeUserInformation');
Route::get('/alter-user-information','UserInformationController@alterUserInformation');
