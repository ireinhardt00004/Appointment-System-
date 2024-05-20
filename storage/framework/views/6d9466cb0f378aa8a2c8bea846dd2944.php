
<?php $__env->startSection('content'); ?>
<!-- Users Log table -->
<section class="bg-white w-full h-full dark:bg-gray-900">

    <div class="py-10 px-5 mx-auto flex flex-col justify-center items-center  w-[100%] shadow-[0px_0px_17px_-1px_rgba(120,120,120,1)] border border-gray-300 rounded-[16px] space-y-4">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Users Log Table</h2>
    
  <div class="flex w-full justify-end items-center gap-2">
 
    <div class="flex justify-end h-full items-center">
    <a href="<?php echo e(route('download.users-log')); ?>"><button type="button"  class="text-white bg-gray-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-download"></i> Export Table as CSV</button></a>
    
    </div>
  </div>
        
  <div class="w-full overflow-x-auto">
      <table class="text-sm text-center text-gray-500 dark:text-gray-400 w-full">
          <thead class="text-xs w-full text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                  <th scope="col" class="px-6 py-3">#</th>
                  <th scope="col" class="px-6 py-3">Activity</th>
                  <th scope="col" class="px-6 py-3">Timestamp</th>
              </tr>
          </thead>
          <tbody>
            <?php if($logs->isEmpty()): ?>
            <tr>
                <br>
            <td colspan="9"class="px-6 py-4 font-bold">No user logs data</td>
            </tr>
             <?php else: ?>
              <?php
                  $startIndex = ($logs->currentPage() - 1) * $logs->perPage() + 1;
              ?>
              <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                  <td class="px-6 py-4"><?php echo e($startIndex + $index); ?></td>
                  <td class="px-6 py-4"><?php echo e($log->users->fname); ?> <?php echo e($log->users->middlename); ?> <?php echo e($log->users->lname); ?> <?php echo e($log->activity); ?></td>
                  <td class="px-6 py-4"><?php echo e(\Carbon\Carbon::parse($log->created_at)->format('F d, Y H:i:s')); ?> (<?php echo e(\Carbon\Carbon::parse($log->created_at)->diffForHumans()); ?>)</td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
          </tbody>
      </table>
      <?php echo e($logs->links()); ?>

  </div>
  
  </section>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('title','Users Log'); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Project\A A FOR DEBUGGING AND TEST\app-depedsys\resources\views/logs/user-logs.blade.php ENDPATH**/ ?>