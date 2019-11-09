<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Bike;
use App\BikeStation;
use Auth;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(Auth::id());
        $user->with('bike')->get();

        return view('bike.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find($request->user_id);
        $bikeStation = new BikeStation;
    
        if($user->isInvestor){
            dd("You are already an investor");
        }
        else{
            $bike = new Bike;
            $count = $bikeStation->count();
            $user->isInvestor = 1;
            $bike->owner_id = $user->id;
            $bike->stations_id =  rand(1,$count);
            $bike->last_maintenance_check = 0;
            $bike->isInUse = 0;
            $bike->contactNumber = "09233945232"; //testing
            $bike->save();
            $user->save();
            return redirect('/invest');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
