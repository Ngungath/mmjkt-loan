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
Route::get('/groups', function () {
    return view('groups.create');
});

Route::get('getRequest', function(){
	if (Request::ajax()) {
		return "Request has loaded complytely .";
	}
});

Route::post('/register',function(){
	if (Request::ajax()) {
		return Response::json(Request::all());
	}

});

Route::get('/ajaxRequest', [
'uses'=>'HomeController@ajaxRequest',
'as'=>'ajaxRequest'
]);

Route::post('/ajaxRequest', [

'uses'=>'HomeController@ajaxRequestPost',
'as'=>'ajaxRequest',
]);

Route::post('/postCreate',[
	'uses'=>'HomeController@store',
	'as'=>'postCreate',
]);

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');


Auth::routes();

//Route::get('/home', 'HomeController@index')->middleware('auth');
//Users Controller
Route::get('users',[
 'uses'=>'UsersController@index',
 'as'=>'users'
]);

Route::get('user/create',[
'uses'=>'UsersController@create',
'as'=>'user.create'
]);

Route::post('user/store',[
'uses'=>'UsersController@store',
'as'=>'user.store'
]);

Route::get('/user/edit/{id}',[
'uses'=>'UsersController@edit',
'as'=>'user.edit'
]);
Route::get('/user/destroy/{id}',[
'uses'=>'UsersController@destroy',
'as'=>'user.destroy'
]);

Route::post('/user/update/{id}',[
'uses'=>'UsersController@update',
'as'=>'user.update'
]);
//Authentication middleware
Route::middleware(['auth'])->group(function(){

//Admin Middleware group
//Route::middleware(['admin'])->group(function(){

// Borrowers conntroller
Route::get('/borrower/index',[
'uses'=>'BorrowersController@index',
'as'=>'borrower.index'

]);

Route::get('/borrower/create',[
'uses'=>'BorrowersController@create',
'as'=>'borrower.create'

]);

Route::post('/borrower/store',[
 'uses'=>'BorrowersController@store',
 'as'=>'borrower.store'
]);

Route::get('borrower/show/{id}',[
'uses'=>'BorrowersController@show',
'as'=>'borrower.show'

]);

Route::get('/borrower/suspended',[
	'uses'=>'BorrowersController@suspended_borrowers',
	'as'=>'suspended.borrowers'
	]);
Route::get('borrowers/destroy/{id}', [
	'uses'=>'BorrowersController@destroy',
	'as'=>'borrowers.destroy'
]);
Route::get('borrower/restore/{id}',[
'uses'=>'BorrowersController@restore',
'as'=>'borrowers.restore'
]);

Route::get('borrower/delete/{id}',[
'uses'=>'BorrowersController@delete',
'as'=>'borrower.delete'

]);

Route::get('borrower/edit/{id}',[
 'uses'=>'BorrowersController@edit',
 'as'=>'borrower.edit'
]);

Route::post('borrower/update/{id}',[
'uses'=>'BorrowersController@update',
'as'=>'borrower.update'


]);

//});

//Units Controller
Route::get('/units',[
 'uses'=>'UnitsController@index',
 'as'=>'units'
]);
Route::get('/units/create',[
 'uses'=>'UnitsController@create',
 'as'=>'units.create'
]);

Route::post('/units/store',[
 'uses'=>'UnitsController@store',
 'as'=>'units.store'

]);
Route::get('/units/edit/{id}',[
 'uses'=>'UnitsController@edit',
 'as'=>'unit.edit'
]);
Route::get('/units/delete/{id}',[
 'uses'=>'UnitsController@destroy',
 'as'=>'unit.delete'
]);
Route::post('/units/update/{id}',[
 'uses'=>'UnitsController@update',
 'as'=>'units.update'
]);
//Roles Routes
Route::get('roles',[
'uses'=>'RolesController@index',
'as'=>'roles'
]);

Route::post('/roles/store',[
'uses'=>'RolesController@store',
'as'=>'roles.store'
]);
Route::get('/roles/edit/{id}',[
'uses'=>'RolesController@edit',
'as'=>'roles.edit'
]);
Route::post('/roles/update/{id}',[
'uses'=>'RolesController@update',
'as'=>'roles.update'
]);
Route::get('/roles/destroy/{id}',[
'uses'=>'RolesController@destroy',
'as'=>'roles.delete'
]);

//Loans Routes
Route::get('/loans/create/{id}',[
'uses'=>'LoansController@create',
'as'=>'loans.create'
]);
Route::get('/loans/create/',[
'uses'=>'LoansController@create',
'as'=>'loan.create'
]);
Route::post('/loans/store',[
'uses'=>'LoansController@store',
'as'=>'loan.store',
]);

Route::get('/loans',[
'uses'=>'LoansController@index',
'as'=>'loans'
]);
Route::get('/loans/declined',[
'uses'=>'LoansController@declined_loans',
'as'=>'declined.loans'
]);
Route::get('/loans/pending',[
'uses'=>'LoansController@pending_loans',
'as'=>'pending.loans'
]);

Route::get('/loans/view_aprove/{id}',[
'uses'=>'LoansController@view_approve',
'as'=>'loan.wiew_approve'
]);

Route::post('/loans/approve/',[
'uses'=>'LoansController@loan_approve',
'as'=>'loan.approve'
]);
Route::get('/loans/suspended',[
	'uses'=>'LoansController@suspended_loans',
	'as'=>'suspended.loans'
	]);

Route::get('/loans/banch_payments',[
'uses'=>'LoansController@banch_payments',
'as'=>'loans.banch_payments'
]);
Route::post('/banch_payments_store',[
'uses'=>'LoansController@banch_payments_store',
'as'=>'banch_payments_store'
]);

Route::post('/get_loan_payable_amount/{loan_number}',[
'uses'=>'LoansController@get_loan_payable_amount',
'as'=>'get_loan_payable_amount'
]);
Route::get('loan/edit/{id}/{borrower_id}',[
'uses'=>'LoansController@edit',
'as'=>'loan.edit'
]);
Route::post('/loan/update/{id}',[
'uses'=>'LoansController@update',
'as'=>'loan.update'

]);

Route::get('loan/show/{id}',[
'uses'=>'LoansController@show',
'as'=>'loan.show'
]);
Route::get('/loan/delete/{id}',[
'uses'=>'LoansController@destroy',
'as'=>'loan.delete'
]);

//Repayments Routes
Route::get('/payment/create/{id}',[
 'uses'=>'PaymentsController@create',
 'as'=>'payment.create',
]);

Route::post('/payment/store/',[
 'uses'=>'PaymentsController@store',
 'as'=>'payment.store',
]);

Route::get('payment/single/{id}',[
  'uses'=>'PaymentsController@single_payment',
  'as'=>'loan_payment.single'
]);

Route::get('payment/show/{id}',[
'uses'=>'PaymentsController@show',
'as'=>'payment.show'
]);
Route::get('payment/edit/{id}/{borrower_id}',[
'uses'=>'PaymentsController@edit',
'as'=>'payment.edit'
]);
Route::get('payment/destroy/{id}',[
'uses'=>'PaymentsController@destroy',
'as'=>'payment.destroy'
]);

//Lender Controller
Route::get('/lender',[
'uses'=>'LenderController@index',
'as'=>'lender',
]);
Route::get('/lender/create','LenderController@create')->name('lender.create');
Route::post('/lender/store','LenderController@store')->name('lender.store');
Route::get('/lender/destroy/{id}',[
'uses'=>'LenderController@destroy',
'as'=>'lender.destroy'
]);
Route::get('/lender/edit/{id}','LenderController@edit')->name('lender.edit');
Route::post('/lender/update/{id}','LenderController@update')->name('lender.update');


//Reports Routes
Route::get('/borrower/report',[
 'uses'=>'RepoprtsController@view_borrower_report',
 'as'=>'borrower.report'

]);

Route::get('/borrower/report_pdf',[
 'uses'=>'RepoprtsController@borrower_report_pdf',
 'as'=>'borrowers_report.pdf'

]);

Route::post('/borrower/report_pdf',[
 'uses'=>'RepoprtsController@borrowers_report_find',
 'as'=>'borrowers_report.find'

]);

Route::post('/loan/report',[
 'uses'=>'RepoprtsController@loan_report_find',
 'as'=>'loan_report.find'

]);
Route::get('borrower_individual_report/pdf/{id}',[
'uses'=>'RepoprtsController@borrower_individual_report_pdf',
'as'=>'borrower_individual_report.pdf'

]);
Route::get('/loan_colection',[
 'uses'=>'RepoprtsController@loan_colection_report',
 'as'=>'loan_colection'

]);

//Settings Controller
Route::get('/system_settings',[
'uses'=>'SettingsController@system',
'as'=>'system_settings'
]);

Route::post('/system_setings/update',[
'uses'=>'SettingsController@system_setings',
'as'=>'system_setings.update'
]);

});
//End of Authentication middleware
