<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
        @include('inc.navbar')

        <div class="container py-4">
           <!-- @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if(session()->has('info'))
                <div class="alert alert-info">
                    {{ session()->get('info') }}
                </div>
            @endif-->
            @if(auth::check())
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('post.index') }}">Post</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('category.create') }}">Create Category</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('category.index') }}">All categories</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('tag.create') }}">Create Tag</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('tag.index') }}">All Tags</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('post.create') }}">New Post</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('post.trashed') }}">Trashed Post</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('users.index') }}">Users</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('users.create') }}">Add User</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('user.profile') }}">My Profile</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('setting.index') }}">Settings</a>
                        </li>
                    </ul>
                </div>
            @endif
                <div class="col-md-9">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!--scripts -->
    <script src="/js/app.js"></script>
    <script src="{{ asset('js/toastr.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

    <script>
        @if(Session::has('success'))
          toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
       
</body>
</html>
