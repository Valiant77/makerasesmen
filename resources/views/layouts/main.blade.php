<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body class="app-body">
    
    @include('partials.sidebar')

    <div class="main-content">
        @include('partials.header')

        <div class="page-content">
            @yield('content')
        </div>
    </div>

</body>
</html>