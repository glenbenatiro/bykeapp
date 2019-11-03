@extends('layouts.app')

@section('content')

      <div class="flex w-1/2 flex-col">
          <p class="text-splash font-bold text-green-600">Bikes.</p>
          <p class="text-splash font-thin">Great for you.<br /> Great for the environment.</p>
          <a href="/rent" class="mt-6 w-splash text-center text-6xl bg-green-500 hover:bg-green-700 text-white font-bold py-4 px-6 rounded-full">
            Rent a Bike
          </a>
      </div>

    <div class="flex flex-col w-1/2 items-center">
        <img src="{{ asset('img/bike.jpg') }}" class="py-6" style="max-width:70%;">
    </div>


@endsection