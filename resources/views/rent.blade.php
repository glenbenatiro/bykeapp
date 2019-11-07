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

<!-- payment div -->
<!-- <div id="paymaya" class="flex fixed inset-0 z-50 bg-black opacity-90 justify-center items-center hidden">

</div> -->

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

    <div class="flex fixed inset-x-0 top-0 z-40 py-12 justify-center">
        <p class="text-white text-3xl font-light">Choose your duration of rent</p>
    </div>

    <div class="flex fixed inset-0 z-40 items-center">
        <div class="flex flex-col w-1/2 items-center">
            <button class="text-white text-splash outline-none" onclick="updateDuration(1)">▲</button>
            <p class="text-white text-splash font-light"><span id="durationVal">1</span> hr</p>
            <button class="text-white text-splash" onclick="updateDuration(-1)">▼</button>
        </div>
        <div class="flex flex-col w-1/2 justify-center">
            <p class="text-xl text-white text-center">Rate:</p>
            <p class="text-splash font-light text-white text-center">₱<span id="amountDisp">30</span></p>
        </div>
        <div class="flex fixed inset-x-0 bottom-0 py-12 justify-center">
            <button
                class="mr-12 text-center text-md bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full"
                onclick="closeDiv('durationDiv')">Back</button>

            <form method="post" action="/run">
                @csrf

                <input type="hidden" id="bikeStation" name="bikeStation">
                <input type="hidden" id="duration" name="duration">
                <button type="submit"
                    class="text-center text-md bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                    Rent
                </button>
            </form>
        </div>
    </div>
</div>

<!-- map display -->
<div id="map" style="position:fixed;top:0;bottom:0;width:100%;">
</div>

<!-- buttons -->
<div class="flex fixed inset-x-0 bottom-0 z-10 p-12 justify-center">
    <button
        class="text-center text-md bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full hidden"
        id="rentButton" onclick="getDuration()">Select Bike Station <span id="selectedBikeStationId">0</span>
    </button>
</div>

<script type="text/javascript">
    // global variables
    var selectedStation = 0;
    var price = 30;

    // init
    document.getElementById('duration').value = 1;

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
            // 1. Fly to the point
            flyToStore(marker);
            // 2. Close all other popups and display popup for clicked store
            createPopUp(marker);
            /// 3. updated rent button
            document.getElementById("selectedBikeStationId").innerHTML = marker.properties.id;
            document.getElementById("rentButton").style.display = 'flex';
            document.getElementById('bikeStation').value = marker.properties.id;

        });

    });

    function flyToStore(currentFeature) {
        map.flyTo({
            center: currentFeature.geometry.coordinates,
            zoom: 15
        });
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

    // update duration of hour and rate displays as user clicks on up or down arrow
    function updateDuration(update) {
        var newDuration = parseInt(document.getElementById('durationVal').innerHTML) + update;

        if (newDuration >= 1 && newDuration <= 12) {
            document.getElementById('duration').value = document.getElementById('durationVal').innerHTML = newDuration;
            document.getElementById('amountDisp').innerHTML = newDuration * price;
        }
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

    // PAYMAYA
    var options = {
        style: {
            "#name": {
                "background-color": "#f7f7f7",
                "height": "44px",
                "border-radius": "30px",
                "width": "100%"
            },
            "label.name": {
                "display": "none"
            },
            "#creditCard": {
                "background-color": "#f7f7f7",
                "height": "44px",
                "border-radius": "30px",
                "width": "100%"
            },
            "label.credit_card": {
                "display": "none"
            },
            "#cvv": {
                "background-color": "#f7f7f7",
                "height": "44px",
                "border-radius": "30px",
                "width": "100%"
            },
            "label.cvv": {
                "display": "none"
            },
            "#expMonth": {
                "background-color": "#f7f7f7",
                "height": "44px",
                "border-radius": "30px",
                "width": "47%",
                "display": "inline-block"
            },
            "#expYear": {
                "background-color": "#f7f7f7",
                "height": "44px",
                "border-radius": "30px",
                "width": "47%",
                "display": "inline-block"
            },
            "label.exp_date": {
                "display": "none"
            },
            "label": {},
            "input": {
                "border": "0 none transparent"
            },
            "button": {
                "background-color": "rgb(255, 83, 23)",
                "border-color": "rgb(255, 81, 20)",
                "border-radius": "30px",
                "border-style": "solid",
                "border-width": "2px",
                "color": "rgb(255, 253, 252)",
                "cursor": "pointer",
                "display": "block",
                "font-family": "'Open Sans', sans-serif",
                "font-size": "16px",
                "font-weight": "600",
                "height": "54px",
                "position": "relative",
                "text-align": "center",
                "text-shadow": "none",
                "user-select": "none",
                "-webkit-appearance": "none",
                "width": "100%",
                "maxWidth": "320px",
                "top": "10px",
                "margin": "auto"
            },
            "iframe": {
                "width": "90%",
                "margin": "auto",
                "position": "relative",
                "display": "block",
                "height": "55px",
                "border": 0,
                "maxWidth": "320px",
                "display": " block",
                "overflow": "hidden"
            }
        }
    };
    // options.pk = 'pk-eIqpvc93DtBNzTUQTmFdQMor9DgbQWK6XKyHMdqhVcX'; // test-env, working
    options.pk = 'pk-eo4sL393CWU5KmveJUaW8V730TTei2zY8zE4dHJDxkF'; // demo-env, working
    options.handler = handleError;
    paymaya.createForm(options);

    // test payment card
    //   PAN: 5123 4567 8901 2346
    // Expiry: 12 / 2025
    // Card Security Code: 111

    function handleError(response) {
        if (response.data.id === "handler") {
            console.log("BACKFROMIFRAME", response.data);
        } else {

        }
    }

</script>
@endsection
