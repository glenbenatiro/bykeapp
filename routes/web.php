<?php

use App\BikeStations;

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

    $bikestations = BikeStations::all();
    // dd($bikestations);
    $original_json_string = $bikestations;
    $original_data = json_decode($original_json_string, true);
    // $coordinates = array();
    $features = array();
    $features2 = array();

    foreach($original_data as $key => $value) {
        $coordinates = array('0' => $value['long'], '1' => $value['lat']);
        // dump($coordinates);
        $features[] = array(
            'type' => 'Feature',
            'geometry' => array('type' => 'Point', 'coordinates' => $coordinates),
            'properties' => array('title' => 'IT Park','id'=>$value['id']),
        );

        // $features2->push($features);

    }

    $new_data = array(
        'type' => 'FeatureCollection',
        'features' => $features,
    );

    // $new_data = array(
    //     'type' => 'FeatureCollection',
    //     'features' => array(
    //         'type' => 'Feature',
    //         'geometry' => array('type' => 'Point', 'coordinates' => $coordinates),
    //         'properties' => array('name' => 'value'),
    //     ),
    // );
    
    $final_data = json_encode($new_data, JSON_PRETTY_PRINT);
    return view('rent')->with(compact('final_data'));

    
    // print_r($final_data);
    // return $final_data;
});

Route::post('/run', function () {
    return view('run');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/run', 'HomeController@index');
Route::resource('/test', 'test');