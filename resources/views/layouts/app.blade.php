<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
        @include('inc.navbar')

        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ route('post.index') }}">Post</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
