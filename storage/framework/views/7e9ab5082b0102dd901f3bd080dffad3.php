

<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start rtl:justify-end">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>
        <a href="/" class="flex ms-2 md:me-24 " title="Return to Homepage">
          <img src="<?php echo e(asset('assets/images/DepEd-Logo.png')); ?>" class="h-8 me-3" alt="FlowBite Logo" />
          <span class="self-center flex flex-wrap text-sm font-semibold sm:text-2xl whitespace-wrap dark:text-white"><span class="text-yellow-500">De</span><span class="text-blue-500">p</span><span class="text-red-500">Ed </span> <span class="sm:block hidden ms-1">Cavite HRMO Offline System</span> <span class="sm:hidden block"> HRMO OS</span> </span>
          
        </a>
      </div>
     
      <div class="flex justify-end items-center space-x-4 place-self-end">
          <div id="KainTime" class="p-2 hidden">
            <div class="flex w-full justify-center items-center bg-gradient-to-r from-blue-300 to-red-300 bg-clip-text text-transparent">
                <h1 class="text-lg font-bold tracking-wider">Lunch Break!</h1>
            </div>
          </div>

         <div class="flex cursor-pointer border-2 border-slate-400 text-slate-700 p-2 space-x-1 text-lg rounded-lg dark:text-white">
            <p id="NavClock">PM</p>
         </div>

<label class="inline-flex items-center cursor-pointer">
  <input id="inCheck" type="checkbox" class="sr-only peer">
  <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
  <span id="Tmode" class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Dark mode</span>
</label>

      </div>
      <div class="flex items-center">
          <div class="flex items-center ms-3">
            <div>
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <?php if(Auth::user()->profile_pic): ?>
                <img class="w-8 h-8 rounded-full" src="<?php echo e(asset(Auth::user()->profile_pic)); ?>" alt="user photo">
                <?php else: ?>
                <img class="w-8 h-8 rounded-full" src="<?php echo e(asset('assets/images/DepEd-Logo.png')); ?>" alt="user photo">
               <?php endif; ?>
               </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900 dark:text-white" role="none">
                <?php echo e(Auth::user()->fname); ?> <?php echo e(Auth::user()->middlename); ?> <?php echo e(Auth::user()->lname); ?>    
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                <?php echo e(Auth::user()->email); ?>

                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                </li>
               
                <li>
                  <a href="<?php echo e(route('profile.edit')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>
                </li>
                <li>
                  <a href="<?php echo e(route('logs.index')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Activity Logs</a>
                </li>
                <li>
                  <?php if(auth()->guard()->check()): ?>
                  <?php if(auth()->user()->hasRole('admin')): ?>
                  <a  href="<?php echo e(route('clearCache')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                          Clear Cache
                  </a>
                  <?php endif; ?> <?php endif; ?>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                  <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit"><?php echo e(__('Log Out')); ?></button>
                        </form>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full flex flex-col px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800 justify-between">
      <ul class="space-y-2 font-medium">
      <li class="<?php echo e(Route::is('dashboard') ? 'active  !border-l-4 !border-green-500' : ''); ?>">
            <a href="<?php echo e(route('dashboard')); ?>" class="<?php echo e(Route::is('dashboard') ? 'active !text-green-500 !font-semibold' : ''); ?> flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <!-- <svg class="<?php echo e(Route::is('dashboard') ? 'active !text-green-500 !font-semibold' : ''); ?> w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
               </svg> -->
               <svg class="<?php echo e(Route::is('dashboard') ? 'active text-green-500 font-extrabold' : ''); ?> flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" clip-rule="evenodd"/>
               </svg>

               <span class="ms-3">Dashboard</span>
            </a>
         </li>
          <li class="<?php echo e(Route::is('appointment.index') ? 'active  !border-l-4 !border-green-500' : ''); ?>">
            <a href="<?php echo e(route('appointment.index')); ?>" class="<?php echo e(Route::is('appointment.index') ? 'active !text-green-500 !font-semibold' : ''); ?> flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="<?php echo e(Route::is('appointment.index') ? 'active text-green-500 font-extrabold' : ''); ?> w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6h8m-8 6h8m-8 6h8M4 16a2 2 0 1 1 3.321 1.5L4 20h5M4 5l2-1v6m-2 0h4"/>
</svg>


               <span class="ms-3">Appointment Data Entry</span>
            </a>
         </li> 
        
         <?php if(auth()->guard()->check()): ?>
         <?php if(auth()->user()->hasRole('admin')): ?>
         <li class="<?php echo e(Route::is('users.logs') ? 'active  !border-l-4 !border-green-500' : ''); ?>">
            <a href="<?php echo e(route('users.logs')); ?>" class="<?php echo e(Route::is('users.logs') ? 'active !text-green-500 !font-semibold' : ''); ?> flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <!-- <svg class="<?php echo e(Route::is('user.table') ? 'active text-green-500 font-extrabold' : ''); ?> w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
               </svg> -->
               <!-- <svg flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm2 8v-2h7v2H4Zm0 2v2h7v-2H4Zm9 2h7v-2h-7v2Zm7-4v-2h-7v2h7Z" clip-rule="evenodd"/>
               </svg> -->
               <svg class="<?php echo e(Route::is('users.logs') ? 'active text-green-500 font-extrabold' : ''); ?> w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M9 8h10M9 12h10M9 16h10M4.99 8H5m-.02 4h.01m0 4H5"/>
            </svg>
            <span class="ms-3">User Logs</span>
            </a>
         </li> <?php endif; ?>
         <?php endif; ?>
         <?php if(auth()->guard()->check()): ?>
         <?php if(auth()->user()->hasRole('admin')): ?>
         <li class="<?php echo e(Route::is('user.table') ? 'active  !border-l-4 !border-green-500' : ''); ?>">
            <a href="<?php echo e(route('user.table')); ?>" class="<?php echo e(Route::is('user.table') ? 'active !text-green-500 !font-semibold' : ''); ?> flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <!-- <svg class="<?php echo e(Route::is('user.table') ? 'active text-green-500 font-extrabold' : ''); ?> w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
               </svg> -->
               <svg class="<?php echo e(Route::is('user.table') ? 'active text-green-500 font-extrabold' : ''); ?> flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm2 8v-2h7v2H4Zm0 2v2h7v-2H4Zm9 2h7v-2h-7v2Zm7-4v-2h-7v2h7Z" clip-rule="evenodd"/>
               </svg>

               <span class="ms-3">User Account Table</span>
            </a>
         </li> <?php endif; ?>
         <?php endif; ?>
      </ul>
      
      
         
         <div class="h-[100%] w-full flex flex-col justify-between items-center my-4 gap-3 border-2 rounded-lg  bg-gray-200 ">
            <div class="flex justify-center gap-2 w-full  items-center">
            <h2 class="text-2xl p-5 font-bold tracking-wider">Notes</h2>
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button">
               <svg class="w-6 h-6 text-green-500 dark:text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
   <path fill-rule="evenodd" d="M14 4.182A4.136 4.136 0 0 1 16.9 3c1.087 0 2.13.425 2.899 1.182A4.01 4.01 0 0 1 21 7.037c0 1.068-.43 2.092-1.194 2.849L18.5 11.214l-5.8-5.71 1.287-1.31.012-.012Zm-2.717 2.763L6.186 12.13l2.175 2.141 5.063-5.218-2.141-2.108Zm-6.25 6.886-1.98 5.849a.992.992 0 0 0 .245 1.026 1.03 1.03 0 0 0 1.043.242L10.282 19l-5.25-5.168Zm6.954 4.01 5.096-5.186-2.218-2.183-5.063 5.218 2.185 2.15Z" clip-rule="evenodd"/>
   </svg>
            </button>
           

            </div>
            

            <div class="h-full w-full flex flex-col justify-start items-center">
            <ul id="notes-list" class="w-[90%] h-auto space-y-1 p-2 bg-white list-none dark:text-gray-300 dark:bg-gray-800 rounded-lg cursor-pointer overflow-y-auto" title="Click  to view">
                    <!-- auto  -->

                    
</div>
                    
         </ul>
               
            </div>
         </div>
        
   </div>
</aside>
<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Write
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="<?php echo e(route('note.store')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                    <div>
                        <!-- <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label> -->
                       <textarea name="notes" id="" cols="30" rows="10"  class="w-full resize-none text-2xl"></textarea>   
                     </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-submit"></i> Save</button>
                   
                </form>
            </div>
        </div>
    </div>
</div> 

<!-- view notemodal -->
<div id="viewnote-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    View
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="viewnote-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4"  method="POST">
                  <?php echo csrf_field(); ?>
                  <input type="hidden" name="_method" value="PUT">
                  <div class="w-full justify-end flex">
                       <button class="text-red-500 text-2xl"  data-modal-target="delete-note-modal" data-modal-toggle="delete-note-modal" type="button" title="Delete note"><i class="fas fa-trash "></i></button></div>
                    <div>
                        <!-- <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label> -->
                       <textarea name="notes" id="" cols="30" rows="10"  class="w-full resize-none text-2xl" value=""></textarea>   
                     </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-submit"></i> Save Changes</button>
                    <button type="button" data-modal-hide="viewnote-modal" class="w-full text-white bg-slate-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-times"></i> Cancel</button>
                   
                </form>
            </div>
        </div>
    </div>
</div> 

<div id="delete-note-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-note-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <form method="POST" id="delete-note-form" action="<?php echo e(route('note.delete')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="delete-note-id" name="delete-id-note" value="" >
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this note?</h3>
                    <button data-modal-hide="delete-note-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                
                    <button data-action="delete" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">Yes, I'm sure</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {

    const kulay = ['text-purple-500', 'text-blue-500', 'text-yellow-500','text-orange-500']
    
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const notesList = document.getElementById('notes-list');

    let colors = ['bg-green-500','bg-blue-500','bg-yellow-500','bg-red-500','bg-purple-500','bg-violet-500',]
    let loader = false




    const loadering = ()=>{
            const div = document.createElement('li')
            const loader = '<div class="flex items-center justify-center w-full h-full border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"><div role="status"><svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg><span class="sr-only">Loading...</span></div></div>'
            div.innerHTML = loader

            notesList.appendChild(div);
            
    }

    const noteList = (note) =>{
    const li = document.createElement('li');
            // Get the first 5 words
            const words = note.notes.split(' ').slice(0, 5).join(' '); 
            // Calculate time difference
            const timeDiff = formatTimeDifference(note.created_at); 
            // Create anchor tag
            const a = document.createElement('a');
            a.textContent = words + " - " + timeDiff;
            // Pass note ID as a data attribute
            a.setAttribute('data-note-id', note.id);
            // Handle note click event
            a.addEventListener('click', function(event) {
                event.preventDefault();
                const modal = document.getElementById('viewnote-modal');
                const textarea = modal.querySelector('textarea');
                const form = modal.querySelector('form');
                const noteId = this.getAttribute('data-note-id'); // Get the note ID from data attribute
                textarea.value = note.notes;
                form.action = `<?php echo e(route('note.update', ['note' => ':id'])); ?>`.replace(':id', noteId); 
                form.actionDelete = `<?php echo e(route('note.delete', ['note' => ':id'])); ?>`.replace(':id', noteId);
                // Set the value of the hidden input field with the note ID
                document.getElementById('delete-note-id').value = noteId;
                modal.classList.remove('hidden');
            });
            let bubble = `<div class="flex w-full items-start gap-2.5 "> <div class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 rounded-e-xl rounded-es-xl dark:bg-gray-700 ${colors[Math.floor(Math.random()*6)]}" ><div class="flex items-center space-x-2 rtl:space-x-reverse"><span class="text-sm font-semibold text-gray-900 dark:text-white"></span><span class="text-sm font-normal text-white dark:text-gray-400" >${timeDiff}</span></div><p class="text-sm font-normal py-2.5 text-white dark:text-white">${words}</p></div>`
            a.innerHTML = bubble
            
            li.appendChild(a);
            notesList.appendChild(li);
}





    const fetchAsyc = async()=>{

        
        try {
            loader = true
            
            const response = await fetch("<?php echo e(route('notes.ajax')); ?>", {headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json',
                'Accept': 'application/json'}});
            const result = await response.json()
           
            result.map((note)=>{
                    if(!loader){
                        loadering()
                    }else{
                        noteList(note)
                    }
                    
             
                
            })
            
            
        } catch (error) {
            console.log(error.message)
        }finally{
            loader = true
            
        }
        
        // if(loader){
            
        //     console.log("tae")
        // }else{
            
        //     console.log("eat")
        //     noteList()
            
            
        // }
       
    }

    fetchAsyc()
    
    
        































    
    // console.log(loadering())

    // fetch("<?php echo e(route('notes.ajax')); ?>", {
    //     headers: {
    //         'X-CSRF-TOKEN': csrfToken,
    //         'Content-Type': 'application/json',
    //         'Accept': 'application/json'
    //     }
    // })
    // .then(response => response.json())
    // .then(notes => {

    //     let loading = true
    //     const notesList = document.getElementById('notes-list');
        

    //             const div = loadering()
    //         notesList.appendChild(div);
        
    //     // Update navigation bar with notes
       
    //     notes.forEach(note => {


    //         const li = document.createElement('li');
    //         // Get the first 5 words
    //         const words = note.notes.split(' ').slice(0, 5).join(' '); 
    //         // Calculate time difference
    //         const timeDiff = formatTimeDifference(note.created_at); 
    //         // Create anchor tag
    //         const a = document.createElement('a');
    //         a.textContent = words + " - " + timeDiff;
    //         // Pass note ID as a data attribute
    //         a.setAttribute('data-note-id', note.id);
    //         // Handle note click event
    //         a.addEventListener('click', function(event) {
    //             event.preventDefault();
    //             const modal = document.getElementById('viewnote-modal');
    //             const textarea = modal.querySelector('textarea');
    //             const form = modal.querySelector('form');
    //             const noteId = this.getAttribute('data-note-id'); // Get the note ID from data attribute
    //             textarea.value = note.notes;
    //             form.action = `<?php echo e(route('note.update', ['note' => ':id'])); ?>`.replace(':id', noteId); 
    //             form.actionDelete = `<?php echo e(route('note.delete', ['note' => ':id'])); ?>`.replace(':id', noteId);
    //             // Set the value of the hidden input field with the note ID
    //             document.getElementById('delete-note-id').value = noteId;
    //             modal.classList.remove('hidden');
    //         });
    //         let bubble = `<div class="flex w-full items-start gap-2.5"> <div class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700" ><div class="flex items-center space-x-2 rtl:space-x-reverse"><span class="text-sm font-semibold text-gray-900 dark:text-white"></span><span class="text-sm font-normal text-gray-500 dark:text-gray-400">${timeDiff}</span></div><p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">${words}</p></div>`
    //         a.innerHTML = bubble
            
    //         li.appendChild(a);


    //         notesList.appendChild(li);
            
           
        






        //      // Update navigation bar with notes
        // const notesList = document.getElementById('notes-list');
        // notes.forEach(note => {
        //     const li = document.createElement('li');
        //     // Get the first 5 words
        //     const words = note.notes.split(' ').slice(0, 5).join(' '); 
        //     // Calculate time difference
        //     const timeDiff = formatTimeDifference(note.created_at); 

        //     // Create anchor tag
        //     const a = document.createElement('a');
        //     a.classList.add(kulay[Math.floor(Math.random()*5)])
        //     a.textContent = words + " - " + timeDiff;
        //     // Pass note ID as a data attribute
        //     a.setAttribute('data-note-id', note.id);
        //     // Handle note click event
        //     a.addEventListener('click', function(event) {
        //         event.preventDefault();
        //         const modal = document.getElementById('viewnote-modal');
        //         const textarea = modal.querySelector('textarea');
        //         const form = modal.querySelector('form');
        //         const noteId = this.getAttribute('data-note-id'); // Get the note ID from data attribute
        //         textarea.value = note.notes;
        //         form.action = `<?php echo e(route('note.update', ['note' => ':id'])); ?>`.replace(':id', noteId); 
        //         form.actionDelete = `<?php echo e(route('note.delete', ['note' => ':id'])); ?>`.replace(':id', noteId);
        //         // Set the value of the hidden input field with the note ID
        //         document.getElementById('delete-note-id').value = noteId;
        //         modal.classList.remove('hidden');
        //     });

        //     li.appendChild(a);
        //     notesList.appendChild(li);



            
    //     });
    // })
    // .catch(error => console.error('Error fetching notes:', error));




    // Close modal functionality
    const closeButtons = document.querySelectorAll('[data-modal-hide]');
    closeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const modalId = this.getAttribute('data-modal-hide');
            const modal = document.getElementById(modalId);
            modal.classList.add('hidden');
        });
    });

    // Form submission for update and delete actions
    const modalForm = document.getElementById('viewnote-modal').querySelector('form');
    modalForm.addEventListener('submit', function(event) {
        const actionType = event.submitter.getAttribute('data-action');
        if (actionType === 'delete') {
            // Handle delete action
            // You can add your code to confirm deletion and perform the action here
            console.log('Delete action triggered');
        } else {
            // Handle update action
            // You can add your code to submit the update form here
            console.log('Update action triggered');
        }
    });
});

// Function to format time difference
function formatTimeDifference(timestamp) {
    const currentTime = new Date();
    const createdAt = new Date(timestamp);
    const diff = Math.abs(currentTime - createdAt);
    const minutes = Math.floor(diff / (1000 * 60));
    if (minutes < 60) {
        return minutes + " minutes ago";
    } else if (minutes < 1440) {
        return Math.floor(minutes / 60) + " hours ago";
    } else {
        return Math.floor(minutes / 1440) + " days ago";
    }
}

</script>


<script>
   window.addEventListener("DOMContentLoaded", ()=>{

       const NavClock = document.getElementById('NavClock')
    const KainTime = document.getElementById('KainTime')
  const Tunog = window.speechSynthesis
   localStorage.setItem('lunch', false)
   let Oras
   const NavOrasan = ()=>{
       const pitsa = new Date()
       NavClock.innerHTML = pitsa.toLocaleTimeString()
       Oras = pitsa.toLocaleTimeString()
      
      if (Oras == "11:30:00 AM") {
         const Utterance = new SpeechSynthesisUtterance(`Its ${Oras}, Lunch Time!`)
         Tunog.speak(Utterance) 
         KainTime.classList.remove('hidden')
         localStorage.setItem("lunch", true)
        
      }else if(Oras == "1:00:00 PM"){
         const Utterance = new SpeechSynthesisUtterance(`Its ${Oras}, Lunch Time is Over!`)
         Tunog.speak(Utterance) 
         KainTime.classList.add('hidden')
         localStorage.setItem("lunch", false) 
      }
       setTimeout(NavOrasan, 1000);
   }
   if(localStorage.getItem('lunch') === false){
       KainTime.classList.remove('hidden')
   }else{
       KainTime.classList.add('hidden')
   }
   NavClock.addEventListener('click',()=>{
       const Utterance = new SpeechSynthesisUtterance(`Its ${Oras}`)
         Tunog.speak(Utterance)
   }) 
   
   NavOrasan()
   })
  
</script>

<?php /**PATH C:\Project\A A FOR DEBUGGING AND TEST\app-depedsys\resources\views/layouts/navz.blade.php ENDPATH**/ ?>