<!-- @extends('layouts.app')

@section('content')


<div class="flex flex-col w-1/2">
        <img src="{{ asset('img/bike.jpg') }}" class="py-6" style="max-width:70%;">
     </div>


      <div class="flex w-1/2 flex-col">
          <p class="text-center text-splash font-thin">Partner With Us</p>
          <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum lobortis, dui a iaculis dignissim, massa diam cursus enim, ac cursus arcu tellus id odio. Vivamus leo augue, fringilla vitae congue et, pretium non metus. Mauris sed lorem feugiat nulla ultrices hendrerit ac nec felis. Fusce a mi eu elit hendrerit eleifend. Morbi egestas, purus quis facilisis placerat, augue odio ullamcorper dolor, sit amet scelerisque augue elit eget massa. Aenean faucibus mattis nisl, quis rhoncus ipsum lacinia non. 
          </p>
      </div>



@endsection -->

<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.1.0/css/ol.css" type="text/css">
    <style>
      .map {
        height: 400px;
        width: 100%;
      }
    </style>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.1.0/build/ol.js"></script>
    <title>OpenLayers example</title>
  </head>
  <body>
    <h2>My Map</h2>
    <div id="map" class="map"></div>
    <script type="text/javascript">
      var map = new ol.Map({
        target: 'map',
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          })
        ],
        view: new ol.View({
          center: ol.proj.fromLonLat([37.41, 8.82]),
          zoom: 4
        })
      });
    </script>
  </body>
</html>