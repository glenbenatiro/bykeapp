@extends('layouts.app')

@section('content')

      <div class="flex w-1/2 flex-col">
        <p>Session ID: {{$user->id}}</p>
        <p>Username: {{$user->username}}</p>
        <p>Bike ID: {{$session->bike_id}}</p>
        <p>Start: {{$session->time_started}}</p>
        <p>End: {{$session->time_ended}}</p>
        <p>Total Distance Travelled: {{$session->total_distance_travelled}}</p>
        <p>Fare: {{$session->amount}}</p>
        <p>No overtime charge</p>
        <br>
        <p>You have earned +3 points</p>
      </div>

    <!-- <div class="flex flex-col w-1/2 items-center">
        <img src="{{ asset('img/bike.jpg') }}" class="py-6" style="max-width:70%;">
    </div> -->


@endsection