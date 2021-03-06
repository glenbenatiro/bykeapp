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
<!-- emergency button -->
<div class="flex fixed m-12 px-3 py-2 rounded-lg left-0 top-0 z-40 bg-white opacity-75 flex-col">
    <img src="{{ asset('img/byke-green.png') }}" class="w-24 mb-2">
    <p>Duration:</p>
    <p><span id="duration">{{$instance->duration}}</span> hr</p>
    <p>Time Remaining:</p>
    <div id="time"></div>
    <p>Fare: ₱{{$instance->totalFare}}</p>
    <p>Distance Travelled:</p>
    <p><span id="distance">0</span> KM</p>
</div>

<!-- map display -->
<div id="map" style="position:fixed;top:0;bottom:0;width:100%;">
</div>

<!-- buttons -->
<div class="flex fixed inset-x-0 bottom-0 z-50 p-12 justify-between">
    <form method="post" action="/end">
        @csrf

        <input type="hidden" id="formDistance" name="formDistance">

        <button type="submit"
            class="text-center text-md bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
            End Session
        </button>
    </form>

    <a href="/rent" class="text-center text-md bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
        EMERGENCY
    </a>

</div>

<script>
    var currPos;
    var lastPos;
    var distanceTravelled = 0;

    // initial url
    var url = {
        "geometry": {
            "type": "Point",
            "coordinates": [123.885437, 10.315699]
        },
        "type": "Feature",
        "properties": {}
    };

    mapboxgl.accessToken =
        'pk.eyJ1IjoiamFyaS1tZXNpbmEiLCJhIjoiY2syZzF6bjdxMGczdzNjbzFqN200OXV5MiJ9.bwOLa4uAkF4mNzmobFHrnQ';

    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/light-v10',
        center: [123.9043, 10.3315],
        zoom: 12
    });

    var geojson = @json($final_data, JSON_NUMERIC_CHECK);
    var geojson2 = JSON.parse(geojson);

    map.on('load', function (e) {
        // populate map with bike station location coordinates
        console.log('populate map with bike station locations');
        map.addSource('places', {
            type: 'geojson',
            data: geojson2
        });

        //DEBUG
        console.log('get initial lastpos');
        navigator.geolocation.getCurrentPosition(function (pos) {
            lastPos = pos;
            console.log('hello');
            console.log('lastPos LatLong: ' + lastPos.coords.latitude + ', ' + lastPos.coords
                .longitude);
        }, errorPos, {
            enableHighAccuracy: true,
        });

        window.setInterval(function () {
            map.getSource('bike').setData(url);
            console.log('update');
        }, 1000);

        map.addSource('bike', {
            type: 'geojson',
            data: url
        });
        map.addLayer({
            "id": "bike",
            "type": "symbol",
            "source": "bike",
            "layout": {
                "icon-image": "rocket-15"
            }
        });
    });

    function errorPos(err) {
        if (err.code)
            console.log('PERMISSION_DENIED');
        else if (err.code == 2)
            console.log('POSITION_UNAVAILABLE');
        else if (err.code == 3)
            console.log('TIMEOUT');
    }
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



    // Set the date we're counting down to
    var countDownDate = new Date().getTime() + (parseInt({{$instance->duration}}) * 3600 * 1000);

    // Update the count down every 1 second
    var x = setInterval(function () {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;
        console.log('distance: ' + distance);

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
        // set new url object with updated coords
        console.log('url update');
        url = {
            "geometry": {
                "type": "Point",
                "coordinates": [position.coords.longitude, position.coords.latitude]
            },
            "type": "Feature",
            "properties": {}
        }

        // calculate distance then add to total distance travelled
        distanceTravelled += calculateDistance(lastPos.coords.latitude, lastPos.coords.longitude,
            position.coords.latitude, position.coords.longitude);

        // update distance hidden input
        document.getElementById('formDistance').value = distanceTravelled;
        
        // set lastpos to current position
        lastPos = position;

        // update total distance display
        document.getElementById('distance').innerHTML = distanceTravelled.toFixed(3);
    }, errorPos, {
        enableHighAccuracy: true,
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
