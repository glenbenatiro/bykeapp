@extends('layouts.app')

@section('content')

<div class="flex flex-col">
    <h1 class="text-3xl font-light text-green-600 text-center">Perks</h1>

    <div class="flex flex-wrap">
        @foreach($perks as $perk)
        <div class="flex flex-col w-1/2 p-6 m-6 shadow">
            <p class="font-bold mt-3">{{$perk->name}}</p>
            <p class="mt-3">{{$perk->description}}</p>
            <p class="mt-3"><span class="font-bold text-green-600">{{$perk->points}}</span> points</p>
            <button class="mt-3 px-4 py-2 bg-green-600 rounded-full text-white">Redeem</button>
        </div>
        @endforeach
    </div>
</div>
@endsection
