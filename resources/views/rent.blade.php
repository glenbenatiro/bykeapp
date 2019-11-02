@extends('layouts.map')

@section('add-head')


@endsection

    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.1.0/build/ol.js"></script>

@section('content')

<div class="flex px-24 py-6 fixed inset-x-0 top-0 z-10 bg-gray-800">
    <div class="flex w-1/12 justify-center">
        <a class="text-6xl text-white hover:text-gray-200" href="/">Byke</a>
    </div>

    <ul class="flex w-10/12 justify-center">
        <li class="mr-12">
            <a class="text-white hover:text-gray-200" href="/rent">Rent</a>
        </li>
        <li class="mr-12">
            <a class="text-white hover:text-gray-200" href="/what-is-byke">What is Byke</a>
        </li>
        <li class="mr-12">
            <a class="text-white hover:text-gray-200" href="/partner-with-us">Partner With Us</a>
        </li>
        <li class="mr-12">
            <a class="text-white hover:text-gray-200" href="/about-us">About Us</a>
        </li>
        <li class="mr-12">
            <a class="text-white hover:text-gray-200" href="/help-center">Help Center</a>
        </li>
    </ul>

    <div class="flex w-1/12">
        <a class="text-white hover:text-gray-200" href="#">Login</a>
    </div>
</div>


    
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
    </script>


@endsection