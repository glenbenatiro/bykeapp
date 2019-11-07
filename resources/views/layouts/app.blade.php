<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width,initial-scale=1, maximum-scale=1, user-scalable=no,shrink-to-fit=no">

    <link href="/css/app.css" rel="stylesheet">

    <title>Bike Renting Service: Byke Philippines</title>

    @yield('head-add')
</head>

<body>
    <!-- navbar -->
    @include('layouts.navbar')

    <!-- body -->
    <div class="flex flex-col w-full h-screen px-48 py-12 items-center">
    @yield('content')
    </div>

    <!-- footer -->
    @include('layouts.footer')
</body>

</html>
