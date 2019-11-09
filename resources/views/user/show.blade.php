@extends('layouts.app')

@section('content')

<div class="flex flex-col">
    <p class="mb-6 text-3xl font-thin text-green-600 text-center">{{$user->username}}</p>
    <p>Full Name: {{$user->first_name}} {{$user->last_name}}</p>
    <p>Email: {{$user->email}}</p>
    <p>Phone Number: {{$user->phone}}</p>
</div>

<div class="flex flex-col items-center mt-6">
    <p class="text-3xl font-thin text-green-600">Total Distance Travelled</p>
    <p class="text-6xl font-bold text-green-600">{{$user->distance_travelled}} KM</p>
</div>

<div class="flex flex-col items-center mt-6">
    <p class="text-3xl font-thin text-green-600">Points</p>
    <p class="text-6xl font-bold text-green-600">{{$user->points}}</p>
</div>


@endsection
