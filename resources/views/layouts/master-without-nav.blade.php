<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Atourin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Atourin" name="description" />
    <meta content="UpiBiy" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico') }}">

    <!-- include head css -->
    @include('layouts.head-css')
</head>

<body>
    
    @yield('content')

    <!-- vendor-scripts -->
    @include('layouts.vendor-scripts')

</body>

</html>
