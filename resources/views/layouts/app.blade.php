<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.lineicons.com/1.0.1/LineIcons.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-blue-100 mb-16">
<div id="app" class="absolute inset-0">
    <div class="navbar py-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="font-black text-3xl flex items-center">
                <i class="lni-money-protection mr-2"></i> OweThanks
            </a>

            @auth
                <div class="flex justify-between items-center">
                    <div>
                        <span class="mx-2 font-semibold">{{ auth()->user()->name }}</span>
                    </div>
                    <div>
                        <a class="mx-2 font-semibold text-red-600" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @endauth

            @guest
                <div>
                    <a href="{{ url('/login') }}" class="mx-2 font-semibold">Login</a>
                    <a href="{{ url('/register') }}" class="mx-2 font-semibold">Register</a>
                </div>
            @endguest
        </div>
    </div>
    @yield('content')
</div>
</body>
</html>
