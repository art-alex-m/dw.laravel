<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Junior News</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 py-4 sm:pt-0">

            <div class="fixed bg-gray-100 top-0 left-0 pt-5 pb-4 w-100">
                <div class="hidden fixed top-0 left-0 px-6 py-4 sm:block">
                    <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Index</a>

                    <a href="{{ url('news') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">News</a>

                    <a href="{{ url('gallery') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Gallery</a>

                    <a href="{{ url('contacts') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Contacts</a>
                </div>

                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 pt-5">
                <div class="content">
                    @yield('content')
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>

        <script src="//code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                crossorigin="anonymous"></script>

        @stack('body-bottom')
    </body>
</html>
