<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//test
Route::get('github', 'PdfController@github');

//membership application
Route::get('apply','ApplicationsController@create');
Route::post('apply','ApplicationsController@store');

// Logging in and out
get('login', 'Auth\AuthController@getLogin');
get('auth/login', 'Auth\AuthController@getLogin');
post('auth/login', 'Auth\AuthController@postLogin');
get('auth/logout', 'Auth\AuthController@getLogout');

//regular
Route::group(['middleware' => 'auth'], function(){
    //Route::resource('todo', 'TodoController', ['only' => ['index']]);
    resource('account','RegularController');
    get('print/test','PrintController@test');
    get('print/{id}', 'PrintController@printLedger');
    get('print/account/tbpd', 'PrintController@accToBePastDue');
});


//admin
$router->group([
  'namespace' => 'admin',
  'middleware' => 'admin',
], function () {
  resource('admin/applicants', 'ApplicantController');
  resource('admin/applications', 'LoanApplicationController');
  resource('admin/members', 'MemberController');
  resource('admin/loans', 'LoanController');
  resource('admin/accounts', 'AccountController');
  resource('admin/ledger', 'LedgerController');
  get('admin',function(){
  	return view('admin.home');
  });
  //resource('admin/loans', 'LoanController');
  //resource('admin/tag', 'TagController');
  //get('admin/upload', 'UploadController@index');
});