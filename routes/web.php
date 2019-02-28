<?php
use App\Http\Middleware\checkrole;
use App\Http\Middleware\checkroleAdmin;
use App\Http\Middleware\hasAccountBalance;
use App\Http\Middleware\checkPaymentDeadLine;
use App\Http\Middleware\checkBillDueDate;
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
})->middleware(checkPaymentDeadLine::class);

//replaced by ReservationsController@index
/*
Route::get('brand/reservations', function () {
    return view('navigation/brand/reservations');
});
*/

Route::get('brand/update_payment', function () {
    return view('navigation/brand/update_payment');
})->middleware(checkrole::class);
//Route::post('contact/submit', 'MessagesController@submit');

Route::post('/brand/register','RegistrationsController@submit');
Route::post('/brand/login','RegistrationsController@login');




/*
Route::get('/admin/accounts', function () {
    return view('navigation/admin/accounts');
});
*/

Route::get('/admin/collection', 'PaymentsController@index')->middleware(checkroleAdmin::class);




Route::get('/brand/discounts', function () {
return view('navigation/brand/discounts');      //  here
})->middleware(checkrole::class);
Route::get('/brand/settings', 'PagesController@brandsettings')->middleware(checkrole::class);
      //  here 08-03-2018 1AM
Route::get('/brand/stalls/viewbill','ReservationsController@viewBill')->middleware(checkrole::class);
Route::get('/brand/stalls/{id}','ReservationsController@showStalls')->middleware(hasAccountBalance::class);
Route::get('brand/reservations','ReservationsController@index')->middleware(checkrole::class);
Route::get('/brand/pdf', 'ReservationsController@downloadPDF');
Route::get('/test',function(){
  return view('test');
});
Route::post('/brand/stalls','ReservationsController@reserveStall');

Route::resource('/brand/payments','PaymentsController')->middleware(checkrole::class);
Route::put('/brand/payments/confirm/{id}','PaymentsController@confirmPayment');
Route::resource('/brand/bazaars','BrandBazaarsController')->middleware(checkBillDueDate::class);
Route::resource('/brand/products','ProductsController')->middleware(checkrole::class);
Route::resource('/admin/bazaar','BazaarsController')->middleware(checkroleAdmin::class);
Route::resource('/admin/manage_stalls', 'StallsController')->middleware(checkroleAdmin::class);
Route::resource('/admin/calendar','CalendarController')->middleware(checkroleAdmin::class);
Route::get('/brand/calendar','BrandCalendarController@index')->middleware(checkrole::class);

Route::resource('/admin/accounts','AccountsController')->middleware(checkroleAdmin::class);
Route::post('/admin/accounts/search','AccountsController@search');
Route::put('/admin/accounts/updateStatus/{id}','AccountsController@updateStatus');
Route::put('/admin/accounts/updateStatusRestore/{id}','AccountsController@updateStatusRestore');
Route::post('/brand/changesettings','UpdateAccountSettings@updateBrand')->middleware(checkrole::class);
Route::resource('/admin/discounts','DiscountsController')->middleware(checkroleAdmin::class);
Route::resource('/admin/penalties','PenaltiesController')->middleware(checkroleAdmin::class);


Route::resource('/brands','WebsiteBrandsController');
Route::resource('/bazaar','WebsiteBazaarsController');
Route::resource('/','WebsiteCarouselController');

Route::put('/admin/accounts/approve/{id}','AccountsController@approveAccount');
Route::get('/admin/dashboard', 'adminDasboardController@index')->middleware(checkroleAdmin::class);

Route::get('/brand/billing', 'BrandBillsController@index')->middleware(checkrole::class);
Route::get('/brand/bill/{id}', 'BrandBillsController@showBill')->middleware(checkrole::class);
Route::get('/brand/seepdf/{id}', 'BrandBillsController@printBills')->middleware(checkrole::class);
Route::get('/admin/billing', 'AdminBillsController@index')->middleware(checkroleAdmin::class);
Route::get('/admin/bill/{id}', 'AdminBillsController@showBill')->middleware(checkroleAdmin::class);
Route::get('/admin/seepdf/{id}', 'AdminBillsController@printBills')->middleware(checkroleAdmin::class);


Route::get('/admin/reportform', 'adminReportController@form')->middleware(checkroleAdmin::class);
Route::get('/admin/viewreport', 'adminReportController@view')->middleware(checkroleAdmin::class);

Route::get('/admin/detailedrevenue', 'adminReportController@detailedrevenue')->middleware(checkroleAdmin::class);
Route::get('/admin/detailedregistrations', 'adminReportController@detailedregistrations')->middleware(checkroleAdmin::class);
Route::get('/admin/detailedreservations', 'adminReportController@detailedreservations')->middleware(checkroleAdmin::class);

Route::get('/admin/detailedreservations/print', 'adminReportController@printreservationreport')->middleware(checkroleAdmin::class);
Route::get('/admin/detailedreservations/print/monthly', 'adminReportController@printmonthlyreservationreport')->middleware(checkroleAdmin::class);
Route::get('/admin/detailedreservations/print/monthly/void', 'adminReportController@printmonthlyvoidreservationreport')->middleware(checkroleAdmin::class);
Route::get('/admin/detailedreservations/print/monthlyperbazaar', 'adminReportController@printmonthlyreservationperbazaarreport')->middleware(checkroleAdmin::class);
Route::get('/admin/detailedreservations/print/monthlyperbazaar/void', 'adminReportController@printmonthlyvoidreservationperbazaarreport')->middleware(checkroleAdmin::class);
Route::get('/admin/detailedreservations/print/monthlybazaarcount', 'adminReportController@printmonthlyBazaarReport')->middleware(checkroleAdmin::class);
Route::get('/admin/detailedreservations/print/semiannual', 'adminReportController@printsemiannualreservationReport')->middleware(checkroleAdmin::class);
Route::get('/admin/detailedreservations/print/quarterly', 'adminReportController@printquarterlyreservationReport')->middleware(checkroleAdmin::class);
Route::get('/admin/detailedreservations/print/semiannual/void', 'adminReportController@printsemiannualvoidreservationReport')->middleware(checkroleAdmin::class);
Route::get('/admin/detailedreservations/print/quarterly/void', 'adminReportController@printquarterlyvoidreservationReport')->middleware(checkroleAdmin::class);


Route::get('/admin/detailedrevenue/print', 'adminReportController@printrevenuereport')->middleware(checkroleAdmin::class);
Route::get('/admin/detailedrevenue/print/monthly', 'adminReportController@printmonthlyrevenuereport')->middleware(checkroleAdmin::class);
Route::get('/admin/detailedrevenue/print/monthlyperbazaar', 'adminReportController@printmonthlyrevenueperbazaarreport')->middleware(checkroleAdmin::class);
Route::get('/admin/detailedrevenue/print/quarterly', 'adminReportController@printquarterlyrevenuereport')->middleware(checkroleAdmin::class);
Route::get('/admin/detailedrevenue/print/SemiAnnual', 'adminReportController@printsemiannualrevenuereport')->middleware(checkroleAdmin::class);

Route::get('/admin/detailedregistrations/print', 'adminReportController@printregistrationreport')->middleware(checkroleAdmin::class);
Route::get('/admin/detailedregistrations/print/quarterly', 'adminReportController@printquarterlyregistrationreport')->middleware(checkroleAdmin::class);
Route::get('/admin/detailedregistrations/print/annually', 'adminReportController@printsemiannualregistrationreport')->middleware(checkroleAdmin::class);
Route::get('/admin/detailedregistrations/print/monthly', 'adminReportController@printmonthlyregistrationreport')->middleware(checkroleAdmin::class);

Route::get('/admin/customreport/print', 'adminReportController@printcustomreport');
Route::get('/admin/generalreport/print', 'adminDasboardController@printgeneralreport');


Route::get('/send', 'EmailsController@ship');
Route::post('/forgotpassword','RegistrationsController@forgotpassword');

Route::get('/markAsRead','AccountsController@markAsRead');


Route::resource('/brand/notifs','NotifsController')->middleware(checkrole::class);
Route::put('/admin/accounts/reject/{id}','AccountsController@rejectAccount'); // new added on september 07 10:45am
Route::put('/admin/bazaar/cancel/{id}','BazaarsController@cancelBazaar'); // new added on september 07 10:45am


// Route::get('/admin/brandprofile', 'AccountsController@brandprofile')->middleware(checkroleAdmin::class);

Route::get('/logout/{id}','RegistrationsController@logout');
Route::get('/brand/printReceipt/{id}', 'PaymentsController@printReceipt');



Route::get('/admin/brandprofile/{id}', 'BrandProfileController@brandprofile')->middleware(checkroleAdmin::class);
Route::get('/brand/paymenthistory', 'PaymentHistoryController@index')->middleware(checkrole::class);

Route::put('/brand/payments/reject/{id}','PaymentsController@reject');
Route::post('/brand/stalls/cancel','ReservationsController@cancelReserveStall');
Route::post('/brand/stalls/reservations/cancel', 'ReservationsController@cancelReservation')->middleware(checkrole::class);
