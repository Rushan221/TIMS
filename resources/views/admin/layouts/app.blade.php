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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- icons --}}
    <script src="https://kit.fontawesome.com/51b78c2475.js"></script>

    <style>
        /* The side navigation menu */
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
        height: 1000px;
        }

        .alert{
        z-index: 99;
        top: 0px;
        right:18px;
        min-width:30%;
        position: fixed;
        }
        @keyframes slide {
            100% { top: 30px; }
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

        .alert{ /* center the alert on small screens */
        left: 10px;
        right: 10px; 
        }
    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
                <a class="navbar-brand" href="{{ url('/') }}">TIMS</a>
            <div class="container">
                
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
            <a class="active" href="{{ url('/home') }}">Dashboard</a>
            <a href="{{ route('admin.departments.index') }}">Departments</a>
            <a href="{{ route('admin.subjects.index') }}">Subjects</a>
            <a href="{{ route('admin.teachers.index') }}">Teachers</a>
        </div>
      
      
        <div class="content">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('status')}} {{-- <- Display the session value --}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <main class="py-4 container">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        //close the alert after 3 seconds.
        $(document).ready(function(){
            setTimeout(function() {
                $(".alert").alert('close');
            }, 3000);
        });
    </script>
</body>
</html>
