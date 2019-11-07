<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Bike;
use App\Instance;
use App\BikeStation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RunController extends Controller
{
    public function run(Request $request)
    {

        // price per hour
        $price = 30;

        // find the first free bike in the station id
        $freeBike = Bike::all()->where('stations_id', $request->bikeStation)->where('isInUse', 0)->first();

        // update bike isinuse status
        $bike = Bike::find($freeBike->id);
        // $bike->isInUse = 1;
        // $bike->save();

        $instance = new Instance;
        $instance->user_id = Auth::id();
        $instance->bike_id = $bike->id;
        $instance->station_id = $request->bikeStation;
        $instance->duration = $request->duration;
        $instance->totalFare = $request->duration * $price; 
        $instance->isActive = 1;       
        $instance->save();
        
        // get bikestations json data

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
                'properties' => array('title' => 'IT Park','id'=>$value['id']),
            );
        }

        $new_data = array(
            'type' => 'FeatureCollection',
            'features' => $features,
        );

    
        $final_data = json_encode($new_data, JSON_PRETTY_PRINT);
        return view('run.run', compact("instance", "final_data"));
    }
}
