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
Route::post('bike/store', 'BikeController@store');
Route::get('partner-with-us', 'BikeController@create');

// Route::post('/bikeStation/edit/{bikeStationId}', 'BikeStationController@edit');
Route::post('/bikeStation/store', 'BikeStationController@store');
Route::get('/bikeStation/create', 'BikeStationController@create');

Route::get('/end', 'EndController@index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/what-is-byke', function () {
    return view('what');
});

Route::get('/how-it-works', function () {
    return view('how');
});

// Route::get('/partner-with-us', function () {
//     return view('partner');
// });

Route::get('/about-us', function () {
    return view('about');
});

Route::get('/help-center', function () {
    return view('help');
});


Route::get('/rent', 'RentController@index')->middleware('auth');
    

Route::get('/run', function () {
    return view('run');
});

Route::post('/run', 'RunController@run');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'test@itexmo');

// payment routes
Route::get('/payments', 'PaymentController@getUserDetails');
Route::post('/payments', 'PaymentController@storeUserDetails');


// logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});