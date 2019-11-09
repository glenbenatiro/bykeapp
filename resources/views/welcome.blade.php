@extends('layouts.app')

@section('head-add')

<style>
    .custom {
        background-image: url('img/splash-bg.jpg');
        background-attachment: scroll;
    }

</style>

@endsection

@section('content')
<div class="mt-12 flex flex-col items-center">
    <p class="text-splash font-thin text-white text-center"><span class="font-bold text-green-300">Bikes.</span> Great for you.</p>
    <p class="text-splash font-thin text-white text-center">Great for the environment.</p>
    <a href="/rent"
        class="mt-6 w-1/2 text-center text-xl bg-green-500 hover:bg-green-700 text-white font-bold py-4 px-6 rounded-full">
        Rent a Bike
    </a>
</div>
@endsection
