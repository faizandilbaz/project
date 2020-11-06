<?php

use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Types\Resource_;

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

Route::get('/', function () {
    return view('Layout.dashboard');
});




Route::get('/dashboard', function () {
    return view('layout.dashboard');
})->name('dashboard');


Route::get('/testAnypage', function () {
    return view('payment.card_testview');
})->name('testAnypage');


Route::get('/pay', function () {
    return view('layout.pay');
})->name('pay');


Route::get('addsale', function () {
    return view('sales.addsales');
})->name('addsale');












///resource controller
Route::resource('category', 'AddCategoryController');
Route::resource('product', 'AddProductController');
Route::resource('sale', 'saleController');

Route::resource('transaction', 'TransactionController');



Route::get('printslip/{id}', 'saleController@print')->name('printslip');
Route::post('datefilter', 'saleController@datefilter')->name('datefilter');
Route::post('general_datefilter', 'TransactionController@general_datefilter')->name('general_datefilter');



Route::post('fetchProductByCategory', 'saleController@fetchProductByCategory')->name('fetchProductByCategory');
Route::post('fetchProduct', 'saleController@fetchProduct')->name('fetchProduct');
Route::get('payment', 'TransactionController@payview')->name('payment');
Route::get('receive', 'TransactionController@receiveview')->name('receive');
Route::post('showcredit', 'TransactionController@showcredit')->name('showcredit');
Route::post('showdebit', 'TransactionController@showdebit')->name('showdebit');

Route::post('monthly_sale', 'ChartController@monthly_sale')->name('monthly_sale');
Route::post('monthly_payment', 'ChartController@monthly_payment')->name('monthly_payment');
Route::post('monthly_receive', 'ChartController@monthly_receive')->name('monthly_receive');

Route::post('yearly_sale', 'ChartController@yearly_sale')->name('yearly_sale');
Route::post('yearly_payment', 'ChartController@yearly_payment')->name('yearly_payment');
Route::post('yearly_receive', 'ChartController@yearly_receive')->name('yearly_receive');


Route::get('paymentProcess/{id}', 'PaymentController@stripe')->name('paymentProcess');
Route::post('paying', 'PaymentController@paymentProcess')->name('stripe.post');


// Route::get('paymentProcess/{id}', 'PaymentController@stripe')->name('paymentProcess');

