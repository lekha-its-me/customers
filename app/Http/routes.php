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
    return view('main');
});

//Route::auth();
Route::get('/test', function (\App\Customer $customer) {
    $customers = $customer->paginate(3);

    return view('test')->withCustomer($customers);
});

Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

// Registration Routes...
//Route::get('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@showRegistrationForm']);
//Route::post('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@register']);

// Password Reset Routes...
Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);

Route::get('/home', 'HomeController@index');

//Customers routes
Route::get('customers', 'CustomerController@getAllCustomers')->name("customers.list");
Route::post('customers', 'CustomerController@addCustomer');
Route::get('customers/create', 'CustomerController@createCustomer');
Route::get('customers/{id}', 'CustomerController@viewCustomer');
Route::get('customers/edit/{id}', 'CustomerController@view2edit');
Route::post('customers/edit/{id}', 'CustomerController@editCustomer');
Route::get('customers/delete/{id}', 'CustomerController@removeCustomer');
Route::delete('customers/delete/{id}', 'CustomerController@deleteCustomer');

//Services routes
Route::get('services', 'ServiceController@getAllServices')->name("services.list");
Route::post('services', 'ServiceController@addService');
Route::get('services/create', 'ServiceController@createService');
Route::get('services/{id}', 'ServiceController@viewService');
Route::get('services/edit/{id}', 'ServiceController@view2edit');
Route::post('services/edit/{id}', 'ServiceController@editService');
Route::get('services/delete/{id}', 'ServiceController@removeService');
Route::delete('services/delete/{id}', 'ServiceController@deleteService');


Route::post('sell_with_customer/{id}', 'CustomerServiceController@sell_with_customer');
Route::get('sell', 'CustomerServiceController@sell');
Route::post('sell', 'CustomerServiceController@transaction');
Route::get('view', 'CustomerServiceController@totalServicePrice');
Route::post('view', 'CustomerServiceController@totalServicePriceByDate');
