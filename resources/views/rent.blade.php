@extends('layouts.map')

@section('add-head')


@endsection

    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.1.0/build/ol.js"></script>

@section('content')

<!-- get user location on page load -->
<body onload="getLocation()">

<div class="flex px-24 py-5 bg-white fixed inset-x-0 top-0 z-30">
    <div class="flex w-1/12 justify-center">
        <a href="/">
            <img src="{{ asset('img/byke-green.png') }}" style="max-width:50%;">
        </a>
    </div>

    <ul class="flex w-10/12 justify-center items-center">
        <li class="mr-12">
            <a class="text-glen-gray " href="/rent">Rent</a>
        </li>
        <li class="mr-12">
            <a class="text-glen-gray " href="/what-is-byke">What is Byke</a>
        </li>
        <li class="mr-12">
            <a class="text-glen-gray " href="/partner-with-us">Partner With Us</a>
        </li>
        <li class="mr-12">
            <a class="text-glen-gray " href="/about-us">About Us</a>
        </li>
        <li class="mr-12">
            <a class="text-glen-gray " href="/help-center">Help Center</a>
        </li>
    </ul>

    <div class="flex w-1/12 justify-center items-center">
        <a class="text-glen-gray pr-4 mr-4 border-r-2 border-color-glen-gray" href="/login">Login</a>
        <a class="text-glen-gray" href="/register">Register</a>
    </div>
</div>

    
    <!-- error display -->
    <div id="error" class="hidden">
        <div class="fixed inset-0 z-20 bg-black opacity-75">
            </div>

        <div class="flex flex-col items-center justify-center fixed inset-0 z-30">
            <p class="text-6xl font-thin text-white">Oh no!</p>
            <p class="text-white">Please reload and enable location access.</p>   
            <a href="/rent" class="mt-6 px-4 py-2 rounded-full bg-green-900 text-white text-center">Reload</a> 
        </div>
    </div>

    <!-- map display -->
    <div id="map" class="fixed inset-0 z-0">
    </div>

    <div class="flex py-12 fixed inset-x-0 bottom-0 z-10 justify-center">
    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-4 px-6 rounded-full">
            Rent a Bike
          </button>
    </div>


    <script type="text/javascript">
      var map = new ol.Map({
        target: 'map',
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          })
        ],
        view: new ol.View({
          center: ol.proj.fromLonLat([123.9060, 10.3305]),
          zoom: 16
        })
      });


    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition)
        } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
            document.getElementById("error").style.display = "block";
        }
    }

    function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
    alert("hello");
}
    </script>



@endsection