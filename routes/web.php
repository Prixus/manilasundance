<?php
use App\Http\Middleware\checkrole;
use App\Http\Middleware\checkroleAdmin;
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
})->middleware(checkrole::class);
Route::get('/brand/bill', function () {
    return view('navigation/brand/bill');
})->middleware(checkrole::class);
Route::get('brand/update_payment', function () {
    return view('navigation/brand/update_payment');
})->middleware(checkrole::class);
//Route::post('contact/submit', 'MessagesController@submit');

Route::post('/brand/register','RegistrationsController@submit');
Route::post('/brand/login','RegistrationsController@login');



Route::get('/admin/dashboard', function () {
    return view('navigation/admin/dashboard');
})->middleware(checkrole::class);
/*
Route::get('/admin/accounts', function () {
    return view('navigation/admin/accounts');
});
*/
Route::get('/admin/billing', function () {
    return view('navigation/admin/billing');
})->middleware(checkroleAdmin::class);
Route::get('/admin/collection', 'PaymentsController@index')->middleware(checkroleAdmin::class);
Route::get('/admin/bill', function () {
    return view('navigation/admin/bill');
})->middleware(checkroleAdmin::class);



Route::get('/brand/discounts', function () {
return view('navigation/brand/discounts');      //  here
})->middleware(checkrole::class);
Route::get('/brand/settings', 'PagesController@brandsettings')->middleware(checkrole::class);
      //  here 08-03-2018 1AM
Route::get('/brand/stalls/viewbill','ReservationsController@viewBill')->middleware(checkrole::class);
Route::get('/brand/stalls/{id}','ReservationsController@showStalls')->middleware(checkrole::class);
Route::get('brand/reservations','ReservationsController@index')->middleware(checkrole::class);
Route::get('/brand/pdf', 'ReservationsController@downloadPDF');
Route::get('/test',function(){
  return view('test');
});
Route::post('/brand/stalls','ReservationsController@reserveStall');

Route::resource('/brand/payments','PaymentsController')->middleware(checkrole::class);
Route::resource('/brand/bazaars','BrandBazaarsController')->middleware(checkrole::class);
Route::resource('/brand/products','ProductsController')->middleware(checkrole::class);
Route::resource('/admin/bazaar','BazaarsController')->middleware(checkroleAdmin::class);
Route::resource('/admin/manage_stalls', 'StallsController')->middleware(checkroleAdmin::class);
Route::resource('/admin/calendar','CalendarController')->middleware(checkroleAdmin::class);
Route::resource('/brand/calendar','CalendarController')->middleware(checkrole::class);

Route::resource('/admin/accounts','AccountsController')->middleware(checkroleAdmin::class);
Route::post('/admin/accounts/search','AccountsController@search');
Route::post('/brand/changesettings','UpdateAccountSettings@updateBrand')->middleware(checkrole::class);
Route::resource('/admin/discounts','DiscountsController')->middleware(checkroleAdmin::class);
Route::resource('/admin/penalties','PenaltiesController')->middleware(checkroleAdmin::class);


Route::resource('/brands','WebsiteBrandsController')->middleware(checkrole::class);
Route::resource('/bazaar','WebsiteBazaarsController')->middleware(checkrole::class);
Route::resource('/','WebsiteCarouselController')->middleware(checkrole::class);

Route::put('/admin/accounts/approve/{id}','AccountsController@approveAccount');
