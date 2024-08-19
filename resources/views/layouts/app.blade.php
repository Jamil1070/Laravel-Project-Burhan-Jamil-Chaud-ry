<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        /* Dropdown Styles */
        .dropdown-menu {
            background-color: #ffffff;
            border: 1px solid #e1e1e1;
            border-radius: 0.375rem;
            padding: 0.5rem 0;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            min-width: 200px;
        }

        .dropdown-item {
            color: #333;
            padding: 0.5rem 1rem;
            text-decoration: none;
            display: block;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #007bff;
        }

        .dropdown-divider {
            border-top: 1px solid #e1e1e1;
            margin: 0.5rem 0;
        }

        .dropdown-toggle {
            display: flex;
            align-items: center;
            color: #dc3545;
            text-decoration: none;
        }

        .dropdown-toggle img {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav style="background-color: lightgreen;" class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="dropdown my-dropdown">
                        <a href="#" class="dropdown-toggle navbar-brand" data-bs-toggle="dropdown">
                            <h1 style="display: inline-block; color: red; font-family: Arial;"><strong>CarGeeks!</strong></h1>
                            <img src="{{ asset('photos/car6.png') }}" style="width: 70px; margin-left: 10px;">
                        </a>

                        <ul class="dropdown-menu text-small shadow">
                            <li><a class="dropdown-item" href="/">See Users Posts</a></li>
                            <li><a class="dropdown-item" href="{{ route('posts.create') }}">Write A Post</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('questions.index') }}">See Users Questions</a></li>
                            <li><a class="dropdown-item" href="{{ route('questions.create') }}">Write A Question</a></li>
                            <li><a class="dropdown-item" href="{{ route('questions.create') }}">Start A Discussion</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('f_a_q_categories.index') }}">Frequently Asked Questions</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/about">About Us</a></li>
                            <li><a class="dropdown-item" href="{{ route('contact') }}">Contact Us</a></li>

                            @auth
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('profile', Auth::user()->username) }}">My Profile</a></li>
                            <li><a class="dropdown-item" href="/home">Home Page</a></li>
                            @endauth
                        </ul>
                    </div>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @auth
                        <a href="{{ route('posts.create') }}" style="text-decoration:none; display: flex; flex-direction: column; align-items: center; text-align: center; margin-right:15px;">
                            <img src="{{ asset('photos/pencil.png') }}" style="height: 40px; margin-bottom: 2px;">
                            <div style="color:black; font-size: 10px;"><strong>New Post</strong></div>
                        </a>

                        <a href="{{ route('questions.create') }}" style="text-decoration:none; display: flex; flex-direction: column; align-items: center; text-align: center; margin-right:15px;">
                            <img src="{{ asset('photos/Discussion.png') }}" style="height: 40px; margin-bottom: 2px;">
                            <div style="color:black; font-size: 10px;"><strong>New Discussion</strong></div>
                        </a>
                        <a href="{{ route('questions.create') }}" style="text-decoration:none; display: flex; flex-direction: column; align-items: center; text-align: center; margin-right:15px;">
                            <img src="{{ asset('photos/Question.png') }}" style="height: 40px; margin-bottom: 2px;">
                            <div style="color:black; font-size: 10px;"><strong>New Question</strong></div>
                        </a>
                        <a href="{{ route('f_a_q_categories.index') }}" style="text-decoration:none; display: flex; flex-direction: column; align-items: center; text-align: center; margin-right:15px;">
                            <img src="{{ asset('photos/faq.png') }}" style="height: 40px; margin-bottom: 2px;">
                            <div style="color:black; font-size: 10px;"><strong>Freq Asked Q</strong></div>
                        </a>

                        <a href="/about" style="text-decoration:none; display: flex; flex-direction: column; align-items: center; text-align: center; margin-right:15px;">
                            <img src="{{ asset('photos/aboutus.png') }}" style="height: 40px; margin-bottom: 2px;">
                            <div style="color:black; font-size: 10px;"><strong>About Us</strong></div>
                        </a>

                        <a href="{{ route('profile', Auth::user()->username) }}" style="text-decoration:none; display: flex; flex-direction: column; align-items: center; text-align: center; margin-right:15px;">
                            <img src="{{ asset('photos/profile.png') }}" style="height: 40px; margin-bottom: 2px;">
                            <div style="color:black; font-size: 10px;"><strong>My Profile</strong></div>
                        </a>

                        <a href="/home" style="text-decoration:none; display: flex; flex-direction: column; align-items: center; text-align: center; margin-right:15px;">
                            <img src="{{ asset('photos/house.png') }}" style="height: 40px; margin-bottom: 2px;">
                            <div style="color:black; font-size: 10px;"><strong>HOME</strong></div>
                        </a>
                        @endauth

                        <!-- Authentication Links -->
                        @guest
                        <a href="{{ route('f_a_q_categories.index') }}" style="text-decoration:none; display: flex; flex-direction: column; align-items: center; text-align: center; margin-right:15px;">
                            <img src="{{ asset('photos/faq.png') }}" style="height: 40px; margin-bottom: 2px;">
                            <div style="color:black; font-size: 10px;"><strong>Freq Asked Q</strong></div>
                        </a>

                        <a href="/about" style="text-decoration:none; display: flex; flex-direction: column; align-items: center; text-align: center; margin-right:30px;">
                            <img src="{{ asset('photos/aboutus.png') }}" style="height: 40px; margin-bottom: 2px;">
                            <div style="color:black; font-size: 10px;"><strong>About Us</strong></div>
                        </a>

                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
