@extends('layouts.app')

@section('content')

      <div class="flex w-1/2 flex-col">
        <p>Instance ID: {{$instance->id}}</p>
        <p>Username: {{$instance->user->username}}</p>
        <p>Bike ID: {{$instance->bike_id}}</p>
        <p>Start: {{$instance->time_started}}</p>
        <p>End: {{$instance->ended_at}}</p>
        <p>Total Distance Travelled: {{ number_format((float)$instance->total_distance, 3, '.', '') }}</p>
        <p>Fare: {{$instance->totalFare}}</p>
        <p>No overtime charge</p>
        <br>
        <p>You have earned {{$instance->pointsEarned}} points</p>
      </div>

    <!-- <div class="flex flex-col w-1/2 items-center">
        <img src="{{ asset('img/bike.jpg') }}" class="py-6" style="max-width:70%;">
    </div> -->


@endsection