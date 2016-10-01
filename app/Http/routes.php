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

Route::auth();
Route::group(['prefix' => 'client','middleware' => ['auth', 'role:client,/admin/home']], function(){
  Route::get('home', 'HomeController@index');
  Route::get('settings', 'HomeController@settings');
  Route::get('stats', 'HomeController@stats');
  Route::put('settings/update/{id}', 'HomeController@update');
  Route::post('devices/map/', 'Client\DevicesController@showMap');
  Route::resource('devices', 'Client\DevicesController');
  Route::resource('drivers', 'Client\DriversController');

});


/*Admin section*/
Route::group(['prefix' => 'admin','middleware' => ['auth', 'role:admin,/client/home']], function(){
  Route::get('home', ['as' => 'home', function () {
      return view('admin.home');
  }]);
  Route::resource('devices', 'Admin\DevicesController');
  Route::resource('sales', 'Admin\SalesController');
  Route::resource('clients', 'Admin\ClientsController');
});

/*Route to insert a new location */
Route::get('/ub/{lat}/{lon}/{isAlert}/{mac}', 'Client\UbicationsController@newUb');
