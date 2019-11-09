<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Session;
use App\Instance;
use App\Achievement;

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

        // check for distance travelled == null
        if($request->formDistance == null) {
            $instance->total_distance = 0;
        }

        // add instance details
        $instance->ended_at = date('Y-m-d H:i:s');
        $instance->pointsEarned = ($request->formDistance / 10);
        $instance->save();

        // update distance and total points
        $instance->user->distance_travelled += $request->formDistance;
        $instance->user->points += $instance->pointsEarned;
        $instance->user->save();
        
        // eager load user data linked to instance
        $instance->with('user')->get();


        // --- achievements ---
        // 1. first 10km
        if (Achievement::where('user_id', Auth::id())->where('code', 1)->doesntExist()) {
            $ach = new Achievement;
            $ach->title = 'First 10 KM';
            $ach->description = "Congratulations on reaching your first 10 kilometers!";
            $ach->code = 1;
            $ach->user_id = Auth::id();
            $ach->save();
        }
    
        return view('end')->with(compact('instance'));
    }
}
