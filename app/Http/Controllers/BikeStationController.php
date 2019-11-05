<?php

namespace App\Http\Controllers;

use App\BikeStation;
use Illuminate\Http\Request;

class BikeStationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = BikeStation::all();

        return view('bike-station.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bike-station.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'lat' => 'bail|required|numeric',
            'long' => 'bail|required|numeric',
        ]);

        // shortcut for creating new model 
        BikeStation::create($request->all());

        return redirect('/bike-stations')
            ->with('success', 'Bike station created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BikeStation  $bikeStation
     * @return \Illuminate\Http\Response
     */
    public function show(BikeStation $bikeStation)
    {
        return view('bike-station.show', $bikeStation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BikeStation  $bikeStation
     * @return \Illuminate\Http\Response
     */
    public function edit(BikeStation $bikeStation)
    {
        return view('bike-station.edit', $bikeStation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BikeStation  $bikeStation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BikeStation $bikeStation)
    {
        $request->validate([
            'lat' => 'required',
            'long' => 'required',
        ]);

        // shortcut for creating new model 
        BikeStation::where('id', $bikeStation.id)->update($update);

        return redirect('/bike-stations')
            ->with('success', 'Bike station created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BikeStation  $bikeStation
     * @return \Illuminate\Http\Response
     */
    public function destroy(BikeStation $bikeStation)
    {
        $bikeStation->delete();

        return redirect('/bike-stations')->with('success', 'Bike station deleted.');
    }
}
