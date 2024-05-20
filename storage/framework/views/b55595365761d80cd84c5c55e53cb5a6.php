<!--[if BLOCK]><![endif]--><?php if($paginator->hasPages()): ?>
<nav aria-label="Page navigation example">
    <ul class="flex items-center -space-x-px h-8 text-sm">
        <!--[if BLOCK]><![endif]--><?php if($paginator->onFirstPage()): ?>
      <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
        <span class="page-link flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" rel="prev" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
          <span class="sr-only">Previous</span>
          <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
          </svg>
        </span>
      </li>
      <?php else: ?>
      <li class="page-item">
        <a href="<?php echo e($paginator->previousPageUrl()); ?>" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" rel="prev" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
          <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
          </svg>
          <span class="font-bold m-1" title="Previous page">Previous</span>
         
        </a>
      </li>
      <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <!--[if BLOCK]><![endif]--><?php if(is_string($element)): ?>
            <li class="page-item disabled" aria-disabled="true"><span class="page-link"><?php echo e($element); ?></span></li>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
         
         <!--[if BLOCK]><![endif]--><?php if(is_array($element)): ?>
         <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <!--[if BLOCK]><![endif]--><?php if($page == $paginator->currentPage()): ?>
                 <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white active" aria-current="page"><?php echo e($page); ?></a>
                  </li>
             <?php else: ?>
             <li class="page-item">
              <a href="<?php echo e($url); ?>" id="page-link-<?php echo e($page); ?>" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white gap-2 m-2">
                  <?php echo e($page); ?>

              </a>
          </li>
          
          
             <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
     <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
      
      <!--[if BLOCK]><![endif]--><?php if($paginator->hasMorePages()): ?>
      <li>
        <a href="<?php echo e($paginator->nextPageUrl()); ?>" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" rel="next" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
          <span class="font-bold m-1" title="Next page">Next </span>
          <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
        </a>
      </li>
      <?php else: ?>
      <li>
        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" rel="next" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
          <span class="sr-only">Next</span>
          <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
        </a>
      </li>
      <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </ul>
  </nav>
  <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
  
<?php /**PATH C:\Project\A A FOR DEBUGGING AND TEST\app-depedsys\resources\views/custom-pagination-links.blade.php ENDPATH**/ ?>