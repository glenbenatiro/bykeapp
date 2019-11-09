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

<div class="flex flex-col items-center mt-6">
    <p class="text-3xl mb-6 font-thin text-green-600">History</p>

    @if ($instances == null)
    <p class="text-center">No instances.</p>
    @else
    <table class="table-auto">
        <thead>
            <tr>
                <td class="border px-4 py-2">Session ID</td>
                <td class="border px-4 py-2">Started At</td>
                <td class="border px-4 py-2">Ended At</td>
                <td class="border px-4 py-2">Bike ID</td>
                <td class="border px-4 py-2">Station ID</td>
                <td class="border px-4 py-2">Total Fare</td>
                <td class="border px-4 py-2">Points Earned</td>
                <td class="border px-4 py-2">Distance</td>
            </tr>
        </thead>
        <tbody>
            @foreach($instances as $instance)
            <tr>
                <td class="border px-4 py-2">{{$instance->id}}</td>
                <td class="border px-4 py-2">{{$instance->created_at}}</td>
                <td class="border px-4 py-2">{{$instance->ended_at}}</td>
                <td class="border px-4 py-2">{{$instance->bike_id}}</td>
                <td class="border px-4 py-2">{{$instance->station_id}}</td>
                <td class="border px-4 py-2">{{$instance->totalFare}}</td>
                <td class="border px-4 py-2">{{$instance->pointsEarned}}</td>
                <td class="border px-4 py-2">{{$instance->total_distance}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
