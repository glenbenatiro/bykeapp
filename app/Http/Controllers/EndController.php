<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Session;
use App\Instance;

class EndController extends Controller
{
    public function store(Request $request)
    {    
        // change instance from active to inactive
        $instance = Instance::where('isActive', 1)->where('user_id', Auth::id())->first();
        $instance->isActive = 0;
        
       // change bike from isinuse = 1 to 0
        $instance->bike->isInUse = 0;
        $instance->bike->save();

        // add instance details
        $instance->ended_at = date('Y-m-d H:i:s');
        $instance->total_distance = $request->formDistance;
        $instance->pointsEarned = ($request->formDistance / 10);
        $instance->save();

        // update distance and total points
        $instance->user->distance_travelled += $request->formDistance;
        $instance->user->points += $instance->pointsEarned;
        $instance->user->save();
        
        // eager load user data linked to instance
        $instance->with('user')->get();
    
        return view('end')->with(compact('instance'));
    }
}
