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


<!-- map display -->
<div id="map" style="position:fixed;top:0;bottom:0;width:100%;">
</div>
<!-- <pre id='coordinates' class='coordinates'></pre> -->

<div class="flex fixed inset-x-0 bottom-0 py-12 justify-center">
    <form method="post" action="/bikeStation/store">
        @csrf

        <input type="hidden" id="long" name="long">
        <input type="hidden" id="lat" name="lat">
        <input type="text" id="name" name="name" placeholder="Station Name">
        <button type="submit" class="text-center text-md bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
            Create Bike Station
        </button>
    </form>
</div>

<script type="text/javascript">

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
        // getLocation();

        // populate map with bike station location coordinates
        map.addSource('places', {
            type: 'geojson',
            data: geojson2
        });
    });

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

    // map.on('mousemove', function (e) {
    //     document.getElementById('info').innerHTML =
    //     // e.point is the x, y coordinates of the mousemove event relative
    //     // to the top-left corner of the map
    //     JSON.stringify(e.point) + '<br />' +
    //     // e.lngLat is the longitude, latitude geographical position of the event
    //     JSON.stringify(e.lngLat.wrap());
    // });

    // map.on('click', addMarker);

    // function addMarker(e){
    //     console.log("NAYEON");
    //     if (typeof circleMarker !== "undefined" ){ 
    //         map.removeLayer(circleMarker);         
    //     }
    // //add marker
    // // circleMarker = new  L.circle(e.latlng, 200, {
    // //                 color: 'red',
    // //                 fillColor: '#f03',
    // //                 fillOpacity: 0.5
    // //             }).addTo(map);

    //     var el = document.createElement('div');
    //     el.className = 'marker';
    //     el.style.backgroundImage = 'url(/img/bike.png)';
    //     // el.style.width = marker.properties.iconSize[0] + 'px';
    //     // el.style.height = marker.properties.iconSize[1] + 'px';
        
    //     // // el.addEventListener('click', function() {
    //     // // window.alert(marker.properties.message);
    //     // // });

    //     // new mapboxgl.Marker(el)
    //     //     .setLngLat(marker.geometry.coordinates)
    //     //     .addTo(map);

        
    //     var marker = new mapboxgl.Marker()
    //             .setLngLat([e.lngLat.lng, e.lngLat.lat])
    //             .addTo(map);
    // }


    var marker = new mapboxgl.Marker({
        draggable: true
    }).setLngLat([123.8854,10.3157]).addTo(map);

    function onDragEnd() {
        var lngLat = marker.getLngLat();
        // console.log(lngLat.lng);
        long.value = lngLat.lng;
        lat.value =  lngLat.lat;
    }

    marker.on('dragend', onDragEnd);

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

</script>
@endsection
