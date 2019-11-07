<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Session;

class EndController extends Controller
{
    public function index()
    {
        // $data = BikeStation::all();
        $user = Auth::user();
        // dump($user->id);
        $session = DB::table('sessions')->where('user_id','=',$user->id)->where('isActive','=',0)->first();
        //$session = Session::where('user_id','=',$user->id)->where('isActive','=',1)->get();
        // dd($session);

        return view('end')->with(compact('user','session'));
    }
}
