<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Bike;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RunController extends Controller
{
    public function run(Request $request)
    {
        // price per hour
        $price = 30;

        //DEBUG
        dd($request->all());

        // find the first free bike in the station id
        $freeBike = Bike::all()->where('stations_id', $request->bikeStation)->where('isInUse', 0)->first();

        // update bike isinuse status
        $bike = Bike::find($freeBike->id);
        // $bike->isInUse = 1;
        // $bike->save();

        // store in session
        DB::table('sessions')->insert([
            'user_id' => Auth::id(),
            'bike_id' => $freeBike->id,
            'amount' => $price * $request->duration,
            'isActive' => 1,
            'total_distance_travelled' => 0,
            'time_started' => Carbon::now(),
            'time_ended' => '',
        ]);
        
        return view('run.run', compact("data"));
    }
}
