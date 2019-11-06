@extends('layouts.map')

@section('head-add')
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

        <!-- Step 2 -->
        <div class="flex">
            <p>Input how many </p>
        </div>
    </div>
</div>

<!-- error display -->
<div id="error" class="hidden">

    <div class="fixed inset-0 z-40 bg-black opacity-90">
    </div>

    <div class="flex flex-col fixed inset-0 z-50 justify-center">
        <p class="text-6xl text-center font-thin text-white">Oh no!</p>
        <p class="text-white text-center">You denied access for location request.<br />Please enable it again in
            your browser.</p>
    </div>
</div>

<!-- duration popup -->
<div id="durationDiv" class="hidden">
    <div class="fixed inset-0 z-30 bg-black opacity-90">
    </div>
    <div class="flex fixed inset-0 z-40 items-center">
        <div class="flex w-1/2 justify-center">
            <p class="text-6xl font-thin text-white">Rent duration</p>
        </div>
        <div class="flex flex-col w-1/2 items-center">
            <button class="text-white text-splash outline-none" onclick="updateDuration(1)">▲</button>
            <p class="text-white text-splash"><span id="durationVal">1</span> hr</p>
            <button class="text-white text-splash" onclick="updateDuration(-1)">▼</button>
        </div>
        <div class="flex fixed inset-x-0 bottom-0 py-12 justify-center">
            <button
                class="mr-12 text-center text-md bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full"
                onclick="closeDiv('durationDiv')">Back</button>
            <button
                class="text-center text-md bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                Proceed to Payment
            </button>
        </div>
    </div>
</div>

<!-- map display -->
<div id="map" style="position:fixed;top:0;bottom:0;width:100%;">
</div>

<!-- buttons -->
<div class="flex fixed inset-x-0 bottom-0 z-10 p-12 justify-center">
    <button class="text-center text-md bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full"
        id="rentButton" onclick="getDuration()">Select Bike Station <span id="selectedBikeStationId">0</span>
    </button>
</div>


<form action="{{ url('/test')}}" method="post" class="hidden">
    @csrf
    <div class="flex py-12 fixed inset-x-0 bottom-0 z-10 justify-center">
        <input type="hidden" id="stationNumber" name="stationNumber">
        <input type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-4 px-6 rounded-full"
            value="Rent a bike">
    </div>
</form>

<script type="text/javascript">
    // global variables
    var selectedStation = 0;

    mapboxgl.accessToken =
        'pk.eyJ1IjoiamFyaS1tZXNpbmEiLCJhIjoiY2syZzF6bjdxMGczdzNjbzFqN200OXV5MiJ9.bwOLa4uAkF4mNzmobFHrnQ';

    // draw map
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/light-v10',
        center: [123.9043, 10.3315],
        zoom: 12
    });

    var geojson = @json($final_data, JSON_NUMERIC_CHECK);
    var geojson2 = JSON.parse(geojson);

    map.on('load', function (e) {
        // get user location
        getLocation();

        // populate map with bike station location coordinates
        map.addSource('places', {
            type: 'geojson',
            data: geojson2
        });
    });

    // add map controls
    map.addControl(new mapboxgl.NavigationControl());
    map.addControl(new mapboxgl.GeolocateControl({
        positionOptions: {
            enableHighAccuracy: true
        },
        trackUserLocation: true
    }));

    // render bike icons and click functionality
    geojson2.features.forEach(function (marker) {
        // create a HTML element for each feature
        var el = document.createElement('div');
        el.className = 'marker';

        // make a marker for each feature and add to the map
        new mapboxgl.Marker(el)
            .setLngLat(marker.geometry.coordinates)
            .addTo(map);

        el.addEventListener('click', function (e) {
            var activeItem = document.getElementsByClassName('active');
            // 1. Fly to the point
            flyToStore(marker);
            // 2. Close all other popups and display popup for clicked store
            createPopUp(marker);
            /// 3. updated rent button
            document.getElementById("selectedBikeStationId").innerHTML = marker.properties.id;
            document.getElementById("rentButton").style.display = 'flex';
        });

    });

    function flyToStore(currentFeature) {
        map.flyTo({
            center: currentFeature.geometry.coordinates,
            zoom: 15
        });
        document.getElementById("stationNumber").value = currentFeature.properties.id;
    }

    function createPopUp(currentFeature) {
        var popUps = document.getElementsByClassName('mapboxgl-popup');
        // Check if there is already a popup on the map and if so, remove it
        if (popUps[0]) popUps[0].remove();

        var popup = new mapboxgl.Popup({
                closeOnClick: false,
            })
            .setLngLat(currentFeature.geometry.coordinates)
            .setHTML('<p class="text-xl">Byke Station</p>' + '<h3>' + currentFeature.properties.id + '</h3>' +
                '<h4>' + currentFeature.properties.title + '</h4>')
            .addTo(map);
    }

    // --- functions ---
    function getDuration() {
        document.getElementById('durationDiv').style.display = 'flex';
    }

    function updateDuration(update) {
        var val = parseInt(document.getElementById('durationVal').innerHTML);

        if (val + update >= 1 && val + update <= 12)
            document.getElementById('durationVal').innerHTML = val + update;

    }

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            //
        }
    }

    function showPosition(position) {}

    function closeDiv(el) {
        document.getElementById(el).style.display = 'none';
    }


    function test(el) {
        alert(el);
    }

</script>
@endsection
