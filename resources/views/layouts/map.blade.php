<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Bike Renting Service: Byke Philippines</title>

    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.js'></script>
    <link href="/css/app.css" rel="stylesheet">
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.css' rel='stylesheet' />

    @yield('head-add')
</head>

<body>
    <!-- upper-left info -->
    <div class="flex flex-col m-12 px-3 py-2 rounded-lg fixed left-0 top-0 z-30 bg-white opacity-75">
    </div>
    <!-- body -->
    @yield('content')
</body>

</html>
