<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
        <title>@yield('title')</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="boxicons.min.css">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="icon" type="x-icon" href="{{asset('assets/images/DepEd-Logo.png')}}"/>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!-- Toastr-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Scripts -->
        <script src="https://kit.fontawesome.com/a40c87ef86.js" crossorigin="anonymous"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    
    <body class="font-sans antialiased">
    @include('preloader')
    
        <main>
            <!-- <div>
            @include('layouts.aside')


            </div> -->
           
                <!-- Page Content -->
                <section class="w-full h-screen flex flex-col">
                @include('layouts.navigation')
                        <div  class=" bg-gray-100 dark:bg-gray-900">
                   
                        
                    

                        <!-- Page Heading
                        @if (isset($header))
                            <header class="bg-white dark:bg-gray-800 shadow">
                                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                    {{ $header }}
                                </div>
                            </header>
                        @endif -->

                        <div>
                        {{ $slot }}
                        
                        </div>
                       
                            
                </section>
                <footer class="bg-white rounded-lg shadow m-4 dark:bg-gray-800">
    <div class="w-full mx-auto mw-full p-4 md:flex md:items-center md:justify-between">
      <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="/" class="hover:underline">Deped Cavite HRMO Transactional Form</a>. All Rights Reserved.
    </span>
    <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
        <li>
            <a href="#" class="hover:underline me-4 md:me-6">About</a>
        </li>
        <li>
            <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
        </li>
        <li>
            <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
        </li>
        <li>
            <a href="#" class="hover:underline">Contact</a>
        </li>
    </ul>
    </div>
</footer> 
            </div>
          
        </main>
        
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script>
    // Check for the flash message and display it
    @if(session('success'))
        toastr.success('{{ session('success') }}', 'Success', { "timeOut": 5000, "extendedTimeOut": 1000, "positionClass": "toast-top-right", "closeButton": true, "progressBar": true });
    @endif

    @if(session('status'))
        toastr.success('{{ session('status') }}', 'Warning', { "timeOut": 5000, "extendedTimeOut": 1000, "positionClass": "toast-top-right", "closeButton": true, "progressBar": true });
    @endif

    @if(session('error'))
        toastr.error('{{ session('error') }}', 'Error', { "timeOut": 5000, "extendedTimeOut": 1000, "positionClass": "toast-top-right", "closeButton": true, "progressBar": true });
    @endif

    // Display validation errors
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}', 'Validation Error', { "timeOut": 5000, "extendedTimeOut": 1000, "positionClass": "toast-top-right", "closeButton": true, "progressBar": true });
        @endforeach
    @endif
</script>
    </body>
</html>
