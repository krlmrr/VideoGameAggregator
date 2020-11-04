<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">
        <title>@yield('title') | {{ env('APP_NAME') }}</title>
    </head>

    <body class="bg-gray-900 text-white">
        <header class="border-b border-gray-800">
            <nav class="container mx-auto flex items-center justify-between px-4 py-6">
                <div class="flex items-center">
                    <a href="/">
                        <p class="w-32"> {{ env('APP_NAME')}}</p>
                        {{-- <img src="" alt="{{ env('APP_NAME')}}" class="w-32 flex-none"> --}}
                    </a>
                    <ul class="flex items-center ml-16 space-x-8">
                        <li><a class="hover:text-gray-400" href="#">Games</a></li>
                        <li><a class="hover:text-gray-400" href="#">Review </a></li>
                        <li><a class="hover:text-gray-400" href="#">Coming Soon</a></li>
                    </ul>
                </div>
                <div class="flex items-center">
                    <div class="relative">
                        <input type="text" class="bg-gray-800 text-sm rounded-full px-4 py-1 w-64 pl-8 focus:outline-none focus:shadow-outline" placeholder="Search..." name="" id="">
                        <div class="absolute top-0 flex items-center ml-2 mt-1">
                            <svg class="fill-current text-gray-400 w-4" xmlns="http://www.w3.org/2000/svg"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                        </div>
                    </div>
                    <div class="ml-6">
                        <img class="rounded-full w-8" src="/assets/profile/missing-profile.jpg" alt="missing profile avatar">
                    </div>
                </div>
            </nav>
        </header>

        {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-900 text-white sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endif
                </div>
            @endif
        </div> --}}

        <main class="py-8">
            @yield('content')
        </main>

        <footer class="border-t border-gray-800">
            <div class="container mx-auto px-4 py-6 flex items-center justify-between">
                <p>
                    Powered by <a class="underline hover:text-gray-400" href="">IGDB</a>
                </p>
                <p>
                    {{ env('APP_NAME') }} was orginally started as a course from 
                    <a href="https://laracasts.com/series/build-a-video-game-aggregator">
                        <img class="w-32 pt-2 flex-none" src="/assets/laracasts-logo.svg" alt="">
                    </a>
                </p>
            </div>
        </footer>
    </body>
</html>