<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="x/icon" url="https://bitesizebio.com/wp-content/uploads/2021/07/Google-chrome-logo-in-flat-design-on-transparent-PNG-2.png">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="x-icon" href="{{asset('assets/images/DepEd-Logo.svg')}}"/>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Scripts -->
        @vite(['resources/js/app.js'])
        @vite('resources/css/app.css') 
    </head>
    <body class="font-sans text-gray-900 antialiased">
    @include('preloader')
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <a href="/">
                    
                    <img class="w-150px] h-[150px] fill-current text-gray-500" src="{{asset('assets/images/DepEd-Logo.png')}}" alt="Deped logo" title="Return to Home" >
                </a>
                <h5 class="text-2xl font-bold dark:text-white">HRMO Offline System</h5>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
