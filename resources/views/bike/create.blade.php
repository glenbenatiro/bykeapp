@extends('layouts.map')

@section('head-add')
<script type="text/javascript" src="https://cdn.paymaya.com/PayMayav2/sandbox/paymaya.v2-0-6.min.js"></script>

<style>
    .marker {
        background-image: url('/img/bike.png');
        background-size: cover;
        width: 70px;
        height: 70px;
        cursor: pointer;
    }

    button:focus {
        outline: 0;
    }

    #info {
        display: block;
        position: relative;
        margin: 0px auto;
        width: 50%;
        padding: 10px;
        border: none;
        border-radius: 3px;
        font-size: 12px;
        text-align: center;
        color: #222;
        background: #fff;
    }

    .coordinates {
    background: rgba(0,0,0,0.5);
    color: #fff;
    position: absolute;
    bottom: 40px;
    left: 10px;
    padding:5px 10px;
    margin: 0;
    font-size: 11px;
    line-height: 18px;
    border-radius: 3px;
    display: none;
    }

</style>
@endsection

@section('content')
<!-- navbar -->
<div class="flex fixed m-12 left-0 top-0 z-10 flex-col">
    <a href="/" class="text-center text-md bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
        Back to Website
    </a>

    <div class="flex flex-col mt-6 px-3 py-2  rounded-lg bg-white opacity-75">
        <img src="{{ asset('img/byke-green.png') }}" class="w-24 mb-2">

        <!-- Step 1 -->
        <div class="flex">
            <p>Select a bike station.</p>
        </div>
    </div>
</div>

<div class="flex fixed inset-x-0 bottom-0 py-12 justify-center">
    <form method="post" action="/bike/store">
        @csrf
        <button type="submit" class="text-center text-md bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
            Invest in a Bike
        </button>
    </form>
</div>

<script type="text/javascript">

</script>
@endsection
