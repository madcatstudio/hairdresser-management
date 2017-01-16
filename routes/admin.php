<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::get('/admin', function () {
    return view('dashboard');
});

// Clients Routes
Route::get('/clients', 'ClientsController@index');
Route::get('/clients/create', 'ClientsController@create');
Route::post('/clients/create', 'ClientsController@store');
Route::post('/clients/delete', 'ClientsController@delete');
Route::get('/clients/{id}', 'ClientsController@show')->name('profile');
Route::post('/clients/{id}/edit', 'ClientsController@update');
Route::get('/clients/{id}/create/treatment', 'ClientsController@createTreatment');
Route::get('/clients/{id}/create/purchase', 'ClientsController@createPurchase');

// Companies Routes
Route::get('/companies', 'CompaniesController@index');
Route::get('/companies/create', 'CompaniesController@create');
Route::post('/companies/create', 'CompaniesController@store');
Route::post('/companies/{id}/edit', 'CompaniesController@update');
Route::get('/companies/{id}/delete', 'CompaniesController@delete');
Route::get('/companies/{id}', 'CompaniesController@show');

// Services Routes
Route::get('/services', 'ServicesController@index');
Route::get('/services/create', 'ServicesController@create');
Route::post('/services/create', 'ServicesController@store');
Route::post('/services/{id}/edit', 'ServicesController@update');
Route::get('/services/{id}/delete', 'ServicesController@delete');
Route::get('/services/{id}', 'ServicesController@show');

// Products Routes
Route::get('/products', 'ProductsController@index');
Route::get('/products/create', 'ProductsController@create');
Route::post('/products/create', 'ProductsController@store');
Route::post('/products/{id}/edit', 'ProductsController@update');
Route::get('/products/{id}/delete', 'ProductsController@delete');
Route::get('/products/{id}', 'ProductsController@show');

// Treatments Routes
Route::post('/treatment/edit', 'TreatmentsController@edit');
Route::patch('/treatment/edit', 'TreatmentsController@update');
Route::post('/treatment/store', 'TreatmentsController@store');
Route::post('/treatment/delete', 'TreatmentsController@delete');

// Purchases Routes
Route::post('/purchase/edit', 'PurchasesController@edit');
Route::patch('/purchase/edit', 'PurchasesController@update');
Route::post('/purchase/store', 'PurchasesController@store');
Route::post('/purchase/delete', 'PurchasesController@delete');