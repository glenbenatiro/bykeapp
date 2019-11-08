<?php

namespace App\Http\Controllers;

use App\BikeStation;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index() 
    {
        $bikeStations = BikeStation::all();

        $original_json_string = $bikeStations;
        $original_data = json_decode($original_json_string, true);
        $features = array();
        $features2 = array();

        foreach($original_data as $key => $value) {
            $coordinates = array('0' => $value['long'], '1' => $value['lat']);
            $features[] = array(
                'type' => 'Feature',
                'geometry' => array('type' => 'Point', 'coordinates' => $coordinates),
                'properties' => array('title' => $value['name'],'id'=>$value['id']),
            );
        }

        $new_data = array(
            'type' => 'FeatureCollection',
            'features' => $features,
        );

    
        $final_data = json_encode($new_data, JSON_PRETTY_PRINT);
        return view('rent')->with(compact('final_data'));

    }
}
