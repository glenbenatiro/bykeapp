@extends('layouts.map')

@section('add-head')
<style>
    .marker {
        background-image: url('/img/Bicycle.png');
        background-size: cover;
        width: 50px;
        height: 50px;
        cursor: pointer;
    }

</style>
@endsection

@section('content')
<!-- get user location on page load -->
<!-- <body onload="getLocation()"> -->
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
        <p class="text-white text-center">You denied access for location request.<br />Please enable it again in
            your browser.</p>
    </div>
</div>

<!-- map display -->
<div id="map" style="position:fixed;top:0;bottom:0;width:100%;">
</div>

<form action="{{ url('/test')}}" method="post">
    @csrf
    <div class="flex py-12 fixed inset-x-0 bottom-0 z-10 justify-center">
        <!-- <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-4 px-6 rounded-full">
            Rent a Bike
        </button> -->
        <input type="hidden" id="stationNumber" name="stationNumber">
        <input type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-4 px-6 rounded-full"
            value="Rent a bike">
    </div>
</form>

<script type="text/javascript">
    mapboxgl.accessToken =
        'pk.eyJ1IjoiamFyaS1tZXNpbmEiLCJhIjoiY2syZzF6bjdxMGczdzNjbzFqN200OXV5MiJ9.bwOLa4uAkF4mNzmobFHrnQ';

    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/light-v10',
        center: [123.9043, 10.3315],
        zoom: 12
    });

    var geojson = @json($final_data, JSON_NUMERIC_CHECK);
    console.log(JSON.parse(geojson));
    var geojson2 = JSON.parse(geojson);
    console.log(geojson2);

    map.on('load', function (e) {
        // Add the data to your map as a layer
        console.log("Nayeon");
        // map.addLayer({
        //     "id": 'locations',
        //     "type": 'symbol',
        //     // Add a GeoJSON source containing place coordinates and information.
        //     "source": {
        //         "type": 'geojson',
        //         "data": geojson2
        //     },
        //     "layout": {
        //         'icon-image': "rocket-15",
        //         'icon-allow-overlap': true,
        //     }
        // });

        map.addSource('places', {
            type: 'geojson',
            data: geojson2
        });

        console.log("TZUYU");
    });

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
            // 3. Highlight listing in sidebar (and remove highlight for all other listings)
            e.stopPropagation();
            if (activeItem[0]) {
                activeItem[0].classList.remove('active');
            }
            var listing = document.getElementById('listing-' + i);
            console.log(listing);
            listing.classList.add('active');
        });

    });

    function flyToStore(currentFeature) {
        map.flyTo({
            center: currentFeature.geometry.coordinates,
            zoom: 15
        });
        document.getElementById("stationNumber").value = currentFeature.properties.id;
        // $("#stationNumber").val(currentFeature.geometry.id);
        console.log("JIHYO");
    }

    function createPopUp(currentFeature) {
        var popUps = document.getElementsByClassName('mapboxgl-popup');
        // Check if there is already a popup on the map and if so, remove it
        if (popUps[0]) popUps[0].remove();

        var popup = new mapboxgl.Popup({
                closeOnClick: false
            })
            .setLngLat(currentFeature.geometry.coordinates)
            .setHTML('<h3>Byke Station</h3>' + '<h3>' + currentFeature.properties.id + '</h3>' +
                '<h4>' + currentFeature.properties.title + '</h4>')
            .addTo(map);
    }

    map.on('click', function (e) {
        console.log("CHAEYOUNG");
        // Query all the rendered points in the view
        var features = map.queryRenderedFeatures(e.point, {
            layers: ['locations']
        });
        if (features.length) {
            var clickedPoint = features[0];
            // 1. Fly to the point
            flyToStore(clickedPoint);
            // 2. Close all other popups and display popup for clicked store
            createPopUp(clickedPoint);
            // 3. Highlight listing in sidebar (and remove highlight for all other listings)
            var activeItem = document.getElementsByClassName('active');
            if (activeItem[0]) {
                activeItem[0].classList.remove('active');
            }
            // Find the index of the store.features that corresponds to the clickedPoint that fired the event listener
            var selectedFeature = clickedPoint.properties.address;

            for (var i = 0; i < geojson2.features.length; i++) {
                if (geojson2.features[i].properties.address === selectedFeature) {
                    selectedFeatureIndex = i;
                }
            }
            // Select the correct list item using the found index and add the active class
            var listing = document.getElementById('listing-' + selectedFeatureIndex);
            listing.classList.add('active');
        }
    });

    // Change the cursor to a pointer when the mouse is over the places layer.
    map.on('mouseover', 'places', function () {
        console.log("MINA");
        map.getCanvas().style.cursor = 'pointer';
    });

    // Change it back to a pointer when it leaves.
    map.on('mouseleave', 'places', function () {
        console.log("SANA");
        map.getCanvas().style.cursor = '';
    });

</script>
@endsection
