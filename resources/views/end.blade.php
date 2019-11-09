@extends('layouts.app')

@section('content')

      <div class="flex flex-col">
      <p class="text-3xl font-thin text-green-600 text-center">Receipt</p>
      <p class="text-center"> Thank you for renting, {{$instance->user->username}}!<br /> You have prevented emitting {{$instance->duration * 404}} grams of Carbon Dioxide.</p>
      </div>
      <div class="flex flex-col mt-6 p-6 shadow">
        <p>Instance ID: {{$instance->id}}</p>
        <p>Username: {{$instance->user->username}}</p>
        <p>Bike ID: {{$instance->bike_id}}</p>
        <p>Start: {{$instance->created_at}}</p>
        <p>End: {{$instance->ended_at}}</p>
        <p>Total Distance Travelled: {{ number_format((float)$instance->total_distance, 3, '.', '') }}</p>
        <p>Fare: ₱{{$instance->totalFare}}</p>
        <br>
        <p>You have earned <span class="font-bold text-green-600">{{number_format((float)$instance->pointsEarned, 2, '.', '')}}</span> points</p>
      </div>
      
      <a href="/rent" class="mt-6 py-2 px-4 text-white bg-green-600 rounded-full">Back to Rent</a>

    <!-- <div class="flex flex-col w-1/2 items-center">
        <img src="{{ asset('img/bike.jpg') }}" class="py-6" style="max-width:70%;">
    </div> -->


@endsection