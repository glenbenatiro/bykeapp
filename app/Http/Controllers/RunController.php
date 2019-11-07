<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Bike;
use App\Instance;
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
        
        return view('run.run', compact("instance"));
    }
}
