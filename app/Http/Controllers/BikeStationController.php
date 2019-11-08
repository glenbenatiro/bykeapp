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

        return view('bike-station.create')->with(compact('final_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->long);
        $request->validate([
            'lat' => 'bail|required|numeric',
            'long' => 'bail|required|numeric',
        ]);

        // shortcut for creating new model 
        // BikeStation::create($request->all());

        $bikeStation = new BikeStation;

        $bikeStation->name = $request->name;
        $bikeStation->lat = $request->lat;
        $bikeStation->long = $request->long;
        $bikeStation->save();

        dd("SUCCESS");
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
