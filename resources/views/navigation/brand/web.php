<?php

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

//get pag kukuha ng webpage
//post pag kukuha ka ng values from forms

Route::get('/', function () {
    return view('navigation/carousel');
});
Route::get('/bazaar', function () {
    return view('navigation/bazaar');
});
Route::get('/brands', function () {
    return view('navigation/brands');
});
Route::get('/signup', function () {
    return view('navigation/signup');
});
Route::get('/login', function () {
    return view('navigation/login');
});

//replaced by ReservationsController@index
/*
Route::get('brand/reservations', function () {
    return view('navigation/brand/reservations');
});
*/
Route::get('/brand/billing', function () {
    return view('navigation/brand/billing');
});
Route::get('/brand/bill', function () {
    return view('navigation/brand/bill');
});
Route::get('brand/update_payment', function () {
    return view('navigation/brand/update_payment');
});
//Route::post('contact/submit', 'MessagesController@submit');

Route::post('/brand/register','RegistrationsController@submit');
Route::post('/brand/login','RegistrationsController@login');



Route::get('/admin/dashboard', function () {
    return view('navigation/admin/dashboard');
});
/*
Route::get('/admin/accounts', function () {
    return view('navigation/admin/accounts');
});
*/
Route::get('/admin/billing', function () {
    return view('navigation/admin/billing');
});
Route::get('/admin/collection', 'PaymentsController@index');
Route::get('/admin/bill', function () {
    return view('navigation/admin/bill');
});



Route::get('/brand/discounts', function () {
return view('navigation/brand/discounts');      //  here
});
Route::get('/brand/settings', 'PagesController@brandsettings');
      //  here 08-03-2018 1AM
Route::get('/brand/stalls/viewbill','ReservationsController@viewBill');
Route::get('/brand/stalls/{id}','ReservationsController@showStalls');
Route::get('brand/reservations','ReservationsController@index');
Route::get('/brand/pdf', 'ReservationsController@downloadPDF');
Route::get('/test',function(){
  return view('test');
});
Route::post('/brand/stalls','ReservationsController@reserveStall');

Route::resource('/brand/payments','PaymentsController');
Route::resource('/brand/bazaars','BrandBazaarsController');
Route::resource('/brand/products','ProductsController');
Route::resource('/admin/bazaar','BazaarsController');
Route::resource('/admin/manage_stalls', 'StallsController');
Route::resource('/admin/calendar','CalendarController');
Route::resource('/brand/calendar','CalendarController');

Route::resource('/admin/accounts','AccountsController');
Route::post('/admin/accounts/search','AccountsController@search');
Route::post('/brand/changesettings','UpdateAccountSettings@updateBrand');
Route::resource('/admin/discounts','DiscountsController');
Route::resource('/admin/penalties','PenaltiesController');


Route::resource('/brands','WebsiteBrandsController');
Route::resource('/bazaar','WebsiteBazaarsController');
Route::resource('/','WebsiteCarouselController');