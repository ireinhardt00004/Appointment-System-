<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="scroll-smooth no-scrollbar">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title class="animate-pulse">Deped Cavite HRMO Offline System</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="icon" type="x-icon" href="<?php echo e(asset('assets/images/DepEd-Logo.png')); ?>"/>
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
            
        <script src="https://cdn.tailwindcss.com"></script>
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

      
    </head>
    <body class="w-full h-screen flex flex-col justify-center bg-gradient-to-r from-yellow-300 via-red-500 to-blue-500 grayscale-100 no-scrollbar">
        <?php echo $__env->make('preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        

<nav class="bg-white dark:bg-gray-900 sticky w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="<?php echo e(asset('assets/images/DepEd-Logo.png')); ?>" class="h-8" alt="Flowbite-Logo">
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"><span class="text-yellow-500">De</span><span class="text-blue-500">p</span><span class="text-red-500">Ed</span> Cavite HRMO Offline System</span></span>
  </a>
  <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <!-- <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get started</button> -->
      <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
  </div>
  
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
      <li>
        <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
      </li>
      <li>
        <a id="soon" href="#section2" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
      </li>
      <li>
        <a id="soon" href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
      </li>
      <li>
        <a id="soon" href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
      </li>
      <?php if(auth()->guard()->guest()): ?>
        
      <li>
        <a href="<?php echo e(route('login')); ?>" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Login</a>
      </li>  
      <?php endif; ?>
      <?php if(Route::has('login')): ?>
         <?php if(auth()->guard()->check()): ?>
        
      <li>
        <a href="<?php echo e(url('/dashboard')); ?>" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Dashboard</a>
      </li>
    <?php endif; ?>
    <?php endif; ?>
     
    </ul>
  </div>
<div class="flex justify-center items-center">
    <label class="inline-flex items-center cursor-pointer">
  <input id="inCheck" type="checkbox" class="sr-only peer">
  <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
  <span id="Tmode" class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Dark Mode</span>
</label>
  </div>
  </div>
  
</nav>
        <main class="w-full h-screen flex flex-col justify-center items-center space-y-5 ">
        <!--Hero Section  -->
<section id="Effect" class="sm:w-[85%] bg-[url('<?php echo e(asset('assets/images/COVER-PHOTO-2024-Deped-1.jpg')); ?>')] bg-contain bg-center bg-no-repeat opacity-0 h-screen flex place-items-center py-5 px-2.5 mt-[2050px] w-full backdrop-blur-xl shadow-lg bg-white/50 dark:bg-gray-900 rounded-[5px] transition-all duration-500">
    <div class="py-8 px-4 mx-auto max-w-screen-xl  text-center lg:py-16 w-full h-full">
        <h1 class="mb-4 text-4xl font-extrabold opacity-0 tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Lorem ipsum dolor sit, amet consectetur adipisicing elit. quaerat inventore provident doloribus modi</h1>
        <p class="mb-8 text-lg font-normal opacity-0 text-gray-700 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam soluta, non dolorum minus explicabo, sint saepe pariatur odio quae at quo aspernatur? Eligendi similique dolorem minus repellat nostrum voluptas laudantium.</p>
        <img src="" alt="">
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 opacity-0">
        
        <?php if(auth()->guard()->guest()): ?> 
           
        <a href="<?php echo e(route('login')); ?>" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                Login
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
            <?php endif; ?>
            <a href="#" class="py-3 px-5 sm:ms-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-70">
               Lorem
            </a>  
        </div>
    </div>
</section>

<!-- Carousel -->

<section id="Effect" class="w-[85%] opacity-0 flex place-items-center py-5 px-2.5  backdrop-blur-xl bg-white/50 dark:bg-gray-900 rounded-[5px] transition-all duration-500">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 w-full h-full">
    <h3 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Organization</h3>
      
<div  id="animation-carousel" class="relative w-full" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
            <img src="<?php echo e(asset('assets/images/pic1.jpg')); ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover h-full "  alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="<?php echo e(asset('assets/images/pi2.jpg')); ?>" class="absolute object-contain  w-full" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="<?php echo e(asset('assets/images/pic3.jpg')); ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-contain" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="<?php echo e(asset('assets/images/pic4.jpg')); ?>" class="absolute  block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-contain" alt="...">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="<?php echo e(asset('assets/images/pic5.jpg')); ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-contain" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="<?php echo e(asset('assets/images/pic6.jpg')); ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-contain" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="<?php echo e(asset('assets/images/pic7.jpg')); ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-contain" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="<?php echo e(asset('assets/images/pic8.jpg')); ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-contain" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="<?php echo e(asset('assets/images/pic9.jpg')); ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-contain" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="<?php echo e(asset('assets/images/pic10.jpg')); ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-contain" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="<?php echo e(asset('assets/images/pic11.jpg')); ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-contain" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="<?php echo e(asset('assets/images/pic12.jpg')); ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-contain" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="<?php echo e(asset('assets/images/pic13.jpg')); ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-contain object-bottom" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="<?php echo e(asset('assets/images/pic14.jpg')); ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-contain" alt="...">
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
</div>
</section>
<!-- Vision -->
<section id="Effect" class="w-[85%] opacity-0 flex place-items-center py-5 px-2.5 backdrop-blur-xl bg-white/50 dark:bg-gray-900 rounded-[5px] transition-all duration-500">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 w-full h-full">
        <h3 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Vision</h3>
        <p class="mb-8 text-2xl font-normal text-gray-700 tracking-wider lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400 leading-loose">We dream of Filipinos
                        who passionately love their country
                        and whose values and competencies
                        enable them to realize their full potential
                        and contribute meaningfully to build the nation.
                        As a learner-centered public institution
                        the Department of Education
                        continuously improves itself
                        to better serve its stakeholders.</p>
       
    </div>
</section>
<!-- Mission -->
<section id="Effect" class="w-[85%] opacity-0 flex place-items-center py-5 px-2.5  backdrop-blur-xl bg-white/50 dark:bg-gray-900 rounded-[5px] transition-all duration-500">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 w-full h-full">
        <h3 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Mission</h3>
        <p class="mb-8 text-lg font-normal text-gray-700 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
        To protect and promote the right of every Filipino to
                quality, equitable, culture-based and complete basic
                education where:
                <ul class="list-disc list-inside">
                <li class="mb-8 text-lg font-normal text-gray-700 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Students learn in a child-friendly, gender-sensitive, safe, and motivating environment.</li>
                <li class="mb-8 text-lg font-normal text-gray-700 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Teachers facilitate learning and constantly nurture every learner.</li>
                <li class="mb-8 text-lg font-normal text-gray-700 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Administrators and staff, as stewards of the
                institution, ensure an enabling and supportive
                environment for effective learning to happen.</li>
                <li class="mb-8 text-lg font-normal text-gray-700 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Family, community and other stakeholders are actively engaged and share responsibility for developing life-long learners.</li></p>
                </ul>
        </p>
       
    </div> 
</section>


    
<!-- Footer -->
<footer class="bg-white dark:bg-gray-900 w-full">
    <div class="mx-auto w-full max-w-screen-xl">
      <div class="grid grid-cols-2 gap-8 px-4 py-6 lg:py-8 md:grid-cols-4">
        <div>
            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Home</h2>
            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                <li class="mb-4">
                    <a id="soon" href="#" class=" hover:underline">About</a>
                </li>
                <li  class="mb-4">
                    <a id="soon" href="#" class="hover:underline">Service</a>
                </li>
                <li class="mb-4">
                    <a id="soon" href="#" class="hover:underline">Contact</a>
                </li>
                <!-- <li class="mb-4">
                    <a href="#" class="hover:underline">Blog</a>
                </li> -->
            </ul>
        </div>
        <div>
            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Lorem Ipsum</h2>
            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                <li class="mb-4">
                    <a id="soon" href="#" class="hover:underline">Lorem</a>
                </li>
                <li class="mb-4">
                    <a id="soon" href="#" class="hover:underline">Lorem Ipsum</a>
                </li>
                <li  class="mb-4">
                    <a id="soon" href="#" class="hover:underline">Lorem Ipsum</a>
                </li>
                <li class="mb-4">
                    <a id="soon" href="#" class="hover:underline">Contact Us</a>
                </li>
            </ul>
        </div>
        <div>
            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Lorem Ipsum</h2>
            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                <li class="mb-4">
                    <a id="soon" href="#" class="hover:underline">Privacy Policy</a>
                </li>
                <li class="mb-4">
                    <a id="soon" href="#" class="hover:underline">Lorem Ipsum</a>
                </li>
                <li class="mb-4">
                    <a id="soon" href="#" class="hover:underline">Terms &amp; Conditions</a>
                </li>
            </ul>
        </div>
        <div>
            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Lorem</h2>
            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                <li class="mb-4">
                    <a id="soon" href="#" class="hover:underline">Lorem Ipsum</a>
                </li>
                <li class="mb-4">
                    <a id="soon" href="#" class="hover:underline">Lorem Ipsum</a>
                </li>
                <li class="mb-4">
                    <a id="soon" href="#" class="hover:underline">Lorem Ipsum</a>
                </li>
                <li class="mb-4">
                    <a id="soon" href="#" class="hover:underline">Lorem Ipsum</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="px-4 py-6 bg-gray-100 dark:bg-gray-700 md:flex md:items-center md:justify-between">
        <span class="text-sm text-gray-500 dark:text-gray-300 sm:text-center">© 2024 <a href="/">Deped Cavite HRMO Offline System</a>. All Rights Reserved.
        </span>
        <div class="flex mt-4 sm:justify-center md:mt-0 space-x-5 rtl:space-x-reverse">
            <a id="soon" href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                        <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                    </svg>
                  <span class="sr-only">Lorem ipsum</span>
              </a>
              <!-- <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                        <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z"/>
                    </svg>
                  <span class="sr-only">Lorem Ipsum</span>
              </a> -->
              <a id="soon" href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
                    <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd"/>
                </svg>
                  <span class="sr-only">Lorem</span>
              </a>
              <!-- <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
                  </svg>
                  <span class="sr-only">Lorem</span>
              </a>
              <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd"/>
                </svg>
                  <span class="sr-only">Lorem </span>
              </a> -->
        </div>
      </div>
    </div>
</footer>

        </main>
        
        <script type="module" src="<?php echo e(asset('js/Carouseller.js')); ?>"></script>
        <script>
            const soon = document.querySelectorAll('#soon')
            soon.forEach(t=>{
                t.addEventListener('click', ()=>{
                    alert('This feature is not available right now')
                })
            })
        </script>
          <script>
              const Pindot = document.querySelector("#inCheck")
   const Katawan = document.getElementsByTagName('body')[0]
   const Tmode = document.querySelector('#Tmode')
   const token = localStorage.theme
   const Synth = window.speechSynthesis
   const boses = speechSynthesis.getVoices()
   

   const Boses = (salita)=>{
    let speech = new SpeechSynthesisUtterance(salita)
    
    Synth.speak(speech)
   }



  
    Pindot.addEventListener('change',()=>{
      let Bariyabol = Pindot.checked

     
      if(Bariyabol ){
       
         localStorage.setItem('theme', 'dark')
         Tmode.innerHTML="Light mode"
         Katawan.classList.add('dark')
      }else if(!Bariyabol){
        
         
         localStorage.setItem('theme', 'light')
         Tmode.innerHTML="Dark mode"
         Katawan.classList.remove('dark')
        
      }
       Boses(localStorage.theme + "mode")
      
    })
    if(token === 'dark'){
        Pindot.checked = true
        Katawan.classList.add('dark')
        localStorage.setItem('theme', 'dark')
        Tmode.innerHTML ="Light mode"
       
    }else if(token ==='light'){
        Pindot.checked = false
        Katawan.classList.remove('dark')
        localStorage.setItem('theme', 'light')
        Tmode.innerHTML ="Dark mode"
     
    }
        </script>
        

    </body>
</html>
<?php /**PATH C:\Project\A A FOR DEBUGGING AND TEST\app-depedsys\resources\views/welcome.blade.php ENDPATH**/ ?>