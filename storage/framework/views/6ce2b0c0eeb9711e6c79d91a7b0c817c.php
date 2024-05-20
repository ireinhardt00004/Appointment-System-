
<?php $__env->startSection('content'); ?>



<section class="bg-white w-full h-full dark:bg-gray-900">

    <div class="py-10 px-5 mx-auto flex flex-col justify-center items-center  w-[100%] shadow-[0px_0px_17px_-1px_rgba(120,120,120,1)] border border-gray-300 rounded-[16px] space-y-4">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">User Account Table</h2>
    
  <div class="flex w-full justify-end items-center gap-2">
  <form class="w-full h-full flex" action="<?php echo e(route('users-table.search')); ?>" method="GET">
      <?php echo csrf_field(); ?>  
      <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
      <div class="relative w-full h-full grow">
          <div class="absolute inset-y-0 start-0 w-full flex items-center ps-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
              </svg>
          </div>
          <input type="search" name="query" id="default-search" class="block w-full h-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" title="Search"placeholder="Search First Name, Middle Name, Last Name, Email Address, Contact Num..." />
          <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
      </div>
  </form>
    <div class="flex space-y-4 h-full justify-center items-center md:flex md:space-x-4 ">
        <!-- Modal toggle -->
        
        <button data-modal-target="add-user-modal" data-modal-toggle="add-user-modal" class="block w-full text-white bg-blue-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        <i class="fas fa-plus"></i><i class="fas fa-user"></i> Register User
        </button>
    </div>
    <!-- <div class="flex justify-end h-full items-center">
    <a href=""><button type="button"  class="text-white bg-gray-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-download"></i> Download Table</button></a>
    
    </div> -->
  </div>
        
  <div class="w-full overflow-x-auto">
      <table class="text-sm text-center text-gray-500 dark:text-gray-400 w-full">
          <thead class="text-xs w-full text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              
          <?php if($hasResults): ?> 
              <tr>
                  <th scope="col" class="px-6 py-3">#</th>
                  <th scope="col" class="px-6 py-3">Last Name</th>
                  <th scope="col" class="px-6 py-3">Middle Name</th>
                  <th scope="col" class="px-6 py-3">First Name</th>
                  <th scope="col" class="px-6 py-3">Email Address</th>
                  <th scope="col" class="px-6 py-3">Contact Number</th>
                  <th scope="col" class="px-6 py-3">Last Login</th>
                  <th scope="col" class="px-6 py-3">Date of Registration</th>
                  <th scope="col" colspan="2">Actions</th>
              </tr>
             <?php else: ?>
              <tr>
                  <th colspan="22" class="px-6 py-3">
                      <p class="font-bold text-gray">No result found.</p>
                  </th>
              </tr>
              <?php endif; ?>
          </thead>
          <tbody>
            <?php if($users->isEmpty()): ?>
            <tr>
                <br>
            <td colspan="9"class="px-6 py-4 font-bold">No users data</td>
            </tr>
             <?php else: ?>
              <?php
                  $startIndex = ($users->currentPage() - 1) * $users->perPage() + 1;
              ?>
              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                  <td class="px-6 py-4"><?php echo e($startIndex + $index); ?></td>
                  <td class="px-6 py-4"><?php echo e($user->lname); ?></td>
                  <td class="px-6 py-4"><?php echo e($user->middlename); ?></td>
                  <td class="px-6 py-4"><?php echo e($user->fname); ?></td>
                  <td class="px-6 py-4"><?php echo e($user->email); ?></td>
                  <td class="px-6 py-4"><?php echo e($user->contact_num); ?></td>
                  <td class="px-6 py-4"><?php if(isset($user->visits) && $user->visits->isNotEmpty() && $lastVisit = $user->visits->last()): ?>
                        <?php if($lastVisit->logout): ?>
                            <?php echo e($lastVisit->logout->format('F d, Y H:i:s')); ?> 
                            <?php echo e($lastVisit->logout->diffForHumans()); ?>

                        <?php else: ?>
                            No logout timestamp available
                        <?php endif; ?>
                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </td>
                  <td class="px-6 py-4"><?php echo e(\Carbon\Carbon::parse($user->created_at)->format('F d, Y H:i:s')); ?> (<?php echo e(\Carbon\Carbon::parse($user->created_at)->diffForHumans()); ?>)</td>
                  <td class="px-3 py-3 flex gap-2">
                      <a href="#" class="font-sm text-blue-600 dark:text-blue-500 hover:underline" title="Edit User Credendtial">
                        <button onclick="openUpdateModal(this)" data-user-id="<?php echo e($user->id); ?>" type="button" class="text-white bg-sky-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2 sm:w-auto px-2 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-modal-target="update-pass-modal"  data-modal-toggle="update-pass-modal">
                        <i class="fas fa-key"></i> 
                    </button>

                      </a>
                      <a href="#" title="Delete Account Permanently" class="font-sm text-blue-600 dark:text-blue-500 hover:underline">
                      <button onclick="openDeleteModal(this)" data-user-id="<?php echo e($user->id); ?>" type="button" class="text-white bg-red-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2 sm:w-auto px-2 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"  data-modal-target="userdelete-popup-modal"  data-modal-toggle="userdelete-popup-modal">
                        <i class="fas fa-trash"></i>
                     </button>
                      </a>
                  </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>    
            </tr>
          </tbody>
      </table>
      <?php echo e($users->links()); ?>

  </div>
  </section>

<!-- Delete user account -->
<?php if(isset($user)): ?>
<div id="userdelete-popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="userdelete-popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
            <form action="<?php echo e(route('delete-user-account')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" id="delete-user-id" name="user_id">

                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-white">Are you sure you want to delete this  user account? Please enter your password</h3>
                <div class="flex flex-col gap-3">
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                    </div>
                    <div class="mt-4">
                <button data-modal-hide="userdelete-popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                   Confirm
                </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<!-- UPDATE PASSWORD -->
<?php if(isset($user)): ?>
<div id="update-pass-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="update-pass-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
            <form action="<?php echo e(route('update-user-account')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z" clip-rule="evenodd"/>
                    </svg>

                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-white">Change User Password</h3>
                <div class="flex flex-col gap-3">
                        <input type="password" name="password" id="password" placeholder="Type user new Password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                    </div>
                    <input type="hidden" id="update-pass-input" name="user_id">
                <div class="flex flex-col gap-3 mt-2">
                <h4 class="mb-5 text-m font-normal text-gray-500 dark:text-white">To confirm, Please enter your Password</h4>
                        <input type="password" name="mypassword" id="password" placeholder="Type your password to confirm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                    </div>
                    <div class="mt-4">
                <button data-modal-hide="update-pass-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                   Confirm
                </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<!-- User registration -->
<div id="add-user-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full">
    <div class="relative w-full max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white w-full h-full rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
               Register User
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-user-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
             
<!-- <section class="bg-white w-full h-full dark:bg-gray-900">
  <div class="py-10 px-5 mx-auto  w-[100%] shadow-[0px_0px_17px_-1px_rgba(120,120,120,1)] border border-gray-300 rounded-[16px]"> -->
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white"></h2>
      <form  class="mx-auto w-full" method="POST" action="<?php echo e(route('user.register')); ?>">
      <?php echo csrf_field(); ?>
      <!-- Group -->
      <div class="grid md:grid-cols-2 md:gap-6">
      <!-- <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="" id="floating_employee_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_employee_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Employee Number</label>
      </div> -->
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="lname" id="floating_lname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_lname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last Name</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="middlename" id="floating_middlename" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
          <label for="floating_middlename" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Middle Name</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="fname" id="floating_fname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_fname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First Name</label>
      </div>
   
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"pattern="[0-9]{}-[0-9]{}-[0-9]{}" maxlength="11" name="contact_num" id="floating_appointing_authority_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required  />
        <label for="floating_appointing_authority_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Contact Number</label>
    </div>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="email" name="email" id="floating_appointing_authority_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=""  required />
        <label for="floating_appointing_authority_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email Address</label>
    </div>

    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="password" name="password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=""  />
        <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
        <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="password" name="password_confirmation" id="floating_confirmpassword" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=""  />
        <label for="floating_confirmpassword" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm Password</label>
    </div>
    
    <div class="w-full items-center flex flex-wrap sm:justify-end justify-center gap-3 ">
     <button type="button" id="dButton" class="text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-modal-hide="add-user-modal"><i class="fas fa-times"></i> Cancel</button>
    <button type="submit"  class="text-white bg-green-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-check"></i> Submit Form</button>
     </div>
  </form>
  </div>
  <script>
    function openUpdateModal(button) {
        var userId = button.getAttribute("data-user-id");
        document.getElementById("update-pass-input").value = userId;
        // Trigger modal opening code here
        console.log("Update modal opened for user ID: " + userId);
    }

    function openDeleteModal(button) {
        var userId = button.getAttribute("data-user-id");
        document.getElementById("delete-user-id").value = userId;
        // Trigger modal opening code here
        console.log("Delete modal opened for user ID: " + userId);
    }
</script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title','User Account Table'); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Project\A A FOR DEBUGGING AND TEST\app-depedsys\resources\views/admin/users-table.blade.php ENDPATH**/ ?>