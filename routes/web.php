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

Route::get('/','HomeController@index')->name('home');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//Auth::routes();


// Client route
Route::get('/clients','ClientController@index')->name('clients');
Route::get('/client/new','ClientController@new')->name('client.new');
Route::post('/client/create', 'ClientController@create')->name('client.create');
Route::get('/client/{id}', 'ClientController@edit')->name('client.edit');
Route::post('/client/editPost', 'ClientController@editPost')->name('client.postedit');
Route::get('/client/getinformations/{id}', 'ClientController@getInformations')->name('client.getInformations');

// Billing route
Route::get('/billing/new','BillingController@new')->name('billing.new');
Route::get('/billing/{id}', 'BillingController@edit')->name('billing.edit');
Route::get('/billing/newitem/{idFacture}','BillingController@newitem')->name('billing.newitem');
Route::post('/billing/createnewitem', 'BillingController@createnewitem')->name('billing.createnewitem');
Route::post('/billing/create', 'BillingController@create')->name('billing.create');

// Spending route
Route::get('/spendings', 'SpendingController@index')->name('spending');
Route::get('/spending/new', 'SpendingController@new')->name('spending.new');
Route::post('/spending/create', 'SpendingController@create')->name('spending.create');
Route::get('/spending/delete/{idSpent}', 'SpendingController@delete')->name('spending.delete');

// Statistique
Route::get('/statistique', 'statistiqueController@index')->name('statistique');