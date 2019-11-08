<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bike;
use DB;

class test extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('test');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $bikes = Bike::where('stations_id',"=",$request->stationNumber)->get();
        // $sessions = DB::table('sessions')->get();
        $bikes = Bike::where('isUsed','=','0')->where('stations_id','=',$request->stationNumber)->first();
        // $freeBike = Bike::where('isUsed','=','0')->first();
    dd($bikes);
        // dd($sessions);
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

    public function itexmo()
    {
        $ch = curl_init();
        $itexmo = array('1' => "09233945232", '2' => "hello world", '3' => "TR-LOUIL945232_JKEY");
        curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
        curl_setopt($ch, CURLOPT_POST, 1);
         curl_setopt($ch, CURLOPT_POSTFIELDS, 
                  http_build_query($itexmo));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $ret = curl_exec ($ch);
        curl_close ($ch);
        
        dd($ret);
        return view('/');
    }
}
