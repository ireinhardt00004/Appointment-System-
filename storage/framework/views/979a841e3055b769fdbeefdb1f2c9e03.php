<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <link rel="icon" type="x/icon" url="https://bitesizebio.com/wp-content/uploads/2021/07/Google-chrome-logo-in-flat-design-on-transparent-PNG-2.png">
        <title><?php echo e(config('app.name', 'Laravel')); ?></title>
        <link rel="icon" type="x-icon" href="<?php echo e(asset('assets/images/DepEd-Logo.svg')); ?>"/>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
        <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?> 
    </head>
    <body class="font-sans text-gray-900 antialiased">
    <?php echo $__env->make('preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <a href="/">
                    
                    <img class="w-150px] h-[150px] fill-current text-gray-500" src="<?php echo e(asset('assets/images/DepEd-Logo.png')); ?>" alt="Deped logo" title="Return to Home" >
                </a>
                <h5 class="text-2xl font-bold dark:text-white">HRMO Offline System</h5>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <?php echo e($slot); ?>

            </div>
        </div>
    </body>
</html>
<?php /**PATH C:\Project\A A FOR DEBUGGING AND TEST\app-depedsys\resources\views/layouts/guest.blade.php ENDPATH**/ ?>