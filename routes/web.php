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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/what-is-byke', function () {
    return view('what');
});

Route::get('/how-it-works', function () {
    return view('how');
});

Route::get('/partner-with-us', function () {
    return view('partner');
});

Route::get('/about-us', function () {
    return view('about');
});

Route::get('/help-center', function () {
    return view('help');
});

Route::get('/rent', function () {
    return view('rent');
});


