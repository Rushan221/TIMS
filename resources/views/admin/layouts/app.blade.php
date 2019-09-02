<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>    
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('css/custom.min.css') }}">

    {{-- icons --}}
    <script src="https://kit.fontawesome.com/51b78c2475.js"></script>


    <style>
        /* The side navigation menu */
        body {
        padding-top: 55px;
        margin: 0;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #888;
        text-align: left;
        background-color: #fff;
        }
        
        .sidebar {
        margin: 0;
        padding: 0;
        width: 200px;
        background-color: #f1f1f1;
        position: fixed;
        z-index: 1;
        height: 100%;
        overflow: auto;
        }

        /* Sidebar links */
        .sidebar a {
        display: block;
        color: black;
        padding: 16px;
        text-decoration: none;
        }

        /* Active/current link */
        .sidebar a.active {
        background-color: #367698;
        color: white;
        }

        /* Links on mouse-over */
        .sidebar a:hover:not(.active) {
        background-color: #555;
        color: white;
        }

        /* Page content. The value of the margin-left property should match the value of the sidebar's width property */
        div.content {
        margin-left: 200px;
        padding: 1px 16px;
        height: 100%;
        }

        /* On screens that are less than 700px wide, make the sidebar into a topbar */
        @media screen and (max-width: 800px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }
        .sidebar a {float: left;}
        div.content {margin-left: 0;}
        }

    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
            <div class="container">

                <a class="navbar-brand" href="{{ url('/') }}">TIMS</a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- The sidebar -->
        <div class="sidebar">                      
            <a href="{{ url('admin/home') }}">Dashboard</a>
            <a href="{{ route('admin.departments.index') }}">Departments</a>
            <a href="{{ route('admin.subjects.index') }}">Subjects</a>
            <a href="{{ route('admin.teachers.index') }}">Teachers</a>
        </div>
      
      
        <div class="content">            
            <main class="py-4 container">
                @include('admin.partials.alerts')
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#alert-message').delay(3000).fadeOut('slow');
        });
    </script>

</body>
</html>
