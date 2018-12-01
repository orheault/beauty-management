<?php

Route::get('/','HomeController@index')->name('home');


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//Auth::routes();

// Client route
Route::get('/clients','ClientController@index')->name('clients');
Route::get('/client/new','ClientController@new')->name('client.new');
Route::get('/client/{id}', 'ClientController@edit')->name('client.edit');
Route::get('/client/getinformations/{id}', 'ClientController@getInformations')->name('client.getInformations');
Route::get('/client/searchclientsbyname/{id}', 'ClientController@searchClientsByName')->name('client.searchClientsByName');
Route::post('/client/create', 'ClientController@create')->name('client.create');
Route::post('/client/editPost', 'ClientController@editPost')->name('client.postedit');

// Billing route
Route::get('/billing/new','BillingController@new')->name('billing.new');
Route::get('/billing/{id}', 'BillingController@edit')->name('billing.edit');
Route::get('/billing/newitem/{id}', 'BillingController@newitem')->name('billing.newitem');
Route::post('/billing/create', 'BillingController@create')->name('billing.create');
Route::post('/billing/createnewitem', 'BillingController@createnewitem')->name('billing.createnewitem');
Route::get('/billing/delete/item/{id}', 'BillingController@deleteitem')->name('billing.deleteitem');

// Spending route
Route::get('/spendings', 'SpendingController@index')->name('spending');
Route::get('/spending/new', 'SpendingController@new')->name('spending.new');
Route::post('/spending/create', 'SpendingController@create')->name('spending.create');
Route::get('/spending/delete/{id}', 'SpendingController@delete')->name('spending.delete');

// Statistique
Route::get('/statistique', 'statistiqueController@index')->name('statistique');

// Setting
Route::get('/settings', 'SettingController@index')->name('settings');
Route::get('/setting/newproductcategory', 'SettingController@newProductCategory')->name('setting.newproductcategory');
Route::get('/setting/newproduct', 'SettingController@newProduct')->name('setting.newproduct');
Route::get('/setting/editproductcategory/{id}', 'SettingController@editProductCategory')->name('setting.editproductcategory');
Route::Post('/setting/createeditproductcategory', 'SettingController@createEditProductCategory')->name('setting.createeditproductcategory');
Route::get('/setting/editproduct/{id}', 'SettingController@editProduct')->name('setting.editproduct');
Route::Post('/setting/createeditproduct', 'SettingController@createEditProduct')->name('setting.createeditproduct');
Route::Post('/setting/createnewcategory', 'SettingController@createNewProductCategory')->name('setting.createnewproductcategory');
Route::Post('/setting/createnewitem', 'SettingController@createNewProduct')->name('setting.createnewproduct');
