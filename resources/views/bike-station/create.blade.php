@extends('layouts.map')

@section('content')
<!-- map -->
<div id='map' style="position: absolute;top: 0;bottom: 0;width: 100%;"></div>

<!-- content -->
<div class="fixed inset-0 z-10">
Hello World.
</div>

<script>
    mapboxgl.accessToken =
        'pk.eyJ1IjoiZ2xlbmJlbmF0aXJvIiwiYSI6ImNrMmtsZ29wOTIzczYzbHQ4eGE3bW53NWQifQ.GmnVrN9U_c1Rj0lKINEPMQ';

    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [123.906463, 10.330600],
        zoom: 15,
    });
</script>
@endsection
