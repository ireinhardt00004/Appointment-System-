<?php $__env->startSection('content'); ?>
    <script>
        // Make sure to check if user is logged in
        <?php if(auth()->guard()->check()): ?>
        window.onload = function() {
            toastr.success('Hello <?php echo e(Auth::user()->fname); ?> <?php echo e(Auth::user()->middlename); ?> <?php echo e(Auth::user()->lname); ?>!', '', {
                timeOut: 2000,
                progressBar: true,
                positionClass: 'toast-top-right',
                closeButton: true,
                preventDuplicates: true,
            });
        };
        <?php endif; ?>
    </script>

    <div class="w-full relative h-full flex flex-col justify-start items-center mb-10">
    <img src="<?php echo e(asset('assets/images/matatag.png')); ?>" alt="" class="w-full h-full object-fit" />
   
    </div>
 
    <?php if(auth()->guard()->check()): ?>
         <?php if(auth()->user()->hasRole('admin')): ?>
<!-- Counter -->
 
<div class="text-3xl font-bold flex w-full dark:text-white p-3">
<h3>Admin Dashboard</h3>    
</div>
<!-- component -->


<div class="flex flex-wrap mb-2 w-full">
<div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2">
        <div class="bg-blue-600 border rounded shadow p-2">
        <a href="<?php echo e(route('user.table')); ?>">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pl-1 pr-4"><i class="fas fa-users fa-2x fa-fw fa-inverse"></i></div>
                <div class="flex-1 text-right">
                    <h5 class="text-white">Total  Users Account</h5>
                    <h3 class="text-white text-3xl"><?php echo e($totalUsers); ?><span class="text-blue-400">
                        <!-- <i class="fas fa-caret-up"></i></span></h3> -->
                </div>
            </div>
        </a>
        </div>
    </div>
    
    
    
    <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2 xl:pr-3 xl:pl-1">
        <div class="bg-orange-600 border rounded shadow p-2">
            <a href="">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pl-1 pr-4"><i class="fas fa-file fa-2x fa-fw fa-inverse"></i></div>
                <div class="flex-1 text-right pr-1">
                    <h5 class="text-white">Total Appointment Today ( <?php echo e(\Carbon\Carbon::parse($currentDate)->format('F d')); ?>

                        )</h5>
                    <h3 class="text-white text-3xl"><?php echo e($appointmentsToday); ?><span class="text-orange-400">
                </div>
            </div>
            </a>
        </div>
    </div>
    
   <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2 xl:pl-2 xl:pr-3">
        <div class="bg-red-600 border rounded shadow p-2">
            <a href="<?php echo e(route('transmittal.index')); ?>">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pl-1 pr-4"><i class="fas fa-file fa-2x fa-fw fa-inverse"></i></div>
                <div class="flex-1 text-right">
                    <h5 class="text-white">Total Appointments for this <?php echo e($currentMonth); ?></h5>
                    <h3 class="text-white text-3xl"><?php echo e($appointmentsMonth); ?></h3>
                </div>
            </div>
            </a>
        </div>
    </div> 
 <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2 xl:pl-1">
        <div class="bg-pink-600 border rounded shadow p-2">
            <a href="<?php echo e(route('controlFormCSC.index')); ?>">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pl-1 pr-4"><i class="fas fa-inbox fa-2x fa-fw fa-inverse"></i></div>
                <div class="flex-1 text-right">
                    <h5 id="date" class="text-white">Server Uptime</h5>
                    <h3  id="time" class="text-white text-3xl">76 days</h3>   </div>
            </div>
                </a>
        </div>
    </div> 
    
      
</div>
<?php endif; ?> <?php endif; ?>
<!-- End of Admin side -->

<!-- js oras -->
<script>
    window.addEventListener('DOMContentLoaded',()=>{
        const time = document.querySelector('#time')
        const date = document.querySelector('#date')
        
        const dateInterval = ()=>{
            const Petsa = new Date()
            const ngayon = Petsa.toLocaleDateString()
            const oras = Petsa.toLocaleTimeString()
            date.innerHTML = ngayon
            time.innerHTML = oras
        }
        setInterval(dateInterval, 1000)
        
    })
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', 'Home'); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Project\A A FOR DEBUGGING AND TEST\app-depedsys\resources\views/dashboard.blade.php ENDPATH**/ ?>