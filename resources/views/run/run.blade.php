@extends('layouts.map')

@section('content')
@php
dd($data);
@endphp
<!-- emergency button -->
<div class="flex fixed m-12 px-3 py-2 rounded-lg left-0 top-0 z-40 bg-white opacity-75 flex-col">
    <img src="{{ asset('img/byke-green.png') }}" class="w-24 mb-2">
    <p class="">Distance Travelled:</p>
    <p id="distance">0</p>
    <p class="inline">km</p>
    <p>Time Remaining:</p>
    <div id="time"></div>
    <p>Fare: ₱30</p>
</div>

<!-- map -->
<div id="map" style="position:fixed;top:0;bottom:0;width:100%;"></div>

<!-- buttons -->
<div class="flex fixed inset-x-0 bottom-0 z-50 p-12 justify-between">
    <a href="/rent"
        class="text-center text-md bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
        End Session
    </a>

    <a href="/rent" class="text-center text-md bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
        EMERGENCY
    </a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', getLocation(), false);

    mapboxgl.accessToken =
        'pk.eyJ1IjoiZ2xlbmJlbmF0aXJvIiwiYSI6ImNrMmtsZ29wOTIzczYzbHQ4eGE3bW53NWQifQ.GmnVrN9U_c1Rj0lKINEPMQ';

    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [123.906740, 10.329340], // starting position [lng, lat]
        zoom: 15, // starting zoom
    });

    map.addControl(new mapboxgl.GeolocateControl({
        positionOptions: {
            enableHighAccuracy: true
        },
        trackUserLocation: true
    }));

    map.addControl(new mapboxgl.NavigationControl());

    function getLocation() {
        if (navigator.geolocation) {
            var startPos;

            navigator.geolocation.getCurrentPosition(function (position) {
                startPos = position;
            });
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        x.innerHTML = "Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;
    }

    // Set the date we're counting down to
    var countDownDate = new Date("Nov 5, 2019 20:00:00").getTime();

    // Update the count down every 1 second
    var x = setInterval(function () {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("time").innerHTML = hours + "h " +
            minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("time").innerHTML = "EXPIRED";
        }
    }, 1000);

    // calculate distance travelled
    navigator.geolocation.watchPosition(function (position) {
        // same as above
        document.getElementById('distance').innerHTML =
            calculateDistance(startPos.coords.latitude, startPos.coords.longitude,
                position.coords.latitude, position.coords.longitude);
    });

    function calculateDistance(lat1, lon1, lat2, lon2) {
        var R = 6371; // km
        var dLat = (lat2 - lat1).toRad();
        var dLon = (lon2 - lon1).toRad();
        var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(lat1.toRad()) * Math.cos(lat2.toRad()) *
            Math.sin(dLon / 2) * Math.sin(dLon / 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var d = R * c;
        return d;
    }
    Number.prototype.toRad = function () {
        return this * Math.PI / 180;
    }

</script>
@endsection
