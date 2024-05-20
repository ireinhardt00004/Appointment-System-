

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
          <img src="{{asset('assets/images/DepEd-Logo.png')}}" class="h-8 me-3" alt="FlowBite Logo" />
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
                @if (Auth::user()->profile_pic)
                <img class="w-8 h-8 rounded-full" src="{{ asset(Auth::user()->profile_pic) }}" alt="user photo">
                @else
                <img class="w-8 h-8 rounded-full" src="{{asset('assets/images/DepEd-Logo.png')}}" alt="user photo">
               @endif
               </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900 dark:text-white" role="none">
                {{ Auth::user()->fname }} {{ Auth::user()->middlename }} {{ Auth::user()->lname }}    
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                {{ Auth::user()->email }}
                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                </li>
               
                <li>
                  <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>
                </li>
                <li>
                  <a href="{{ route('logs.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Activity Logs</a>
                </li>
                <li>
                  @auth
                  @if (auth()->user()->hasRole('admin'))
                  <a  href="{{ route('clearCache') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                          Clear Cache
                  </a>
                  @endauth @endif
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                  <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">{{ __('Log Out') }}</button>
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
      <li class="{{ Route::is('dashboard') ? 'active  !border-l-4 !border-green-500' : '' }}">
            <a href="{{ route('dashboard') }}" class="{{ Route::is('dashboard') ? 'active !text-green-500 !font-semibold' : '' }} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <!-- <svg class="{{ Route::is('dashboard') ? 'active !text-green-500 !font-semibold' : '' }} w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
               </svg> -->
               <svg class="{{ Route::is('dashboard') ? 'active text-green-500 font-extrabold' : '' }} flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" clip-rule="evenodd"/>
               </svg>

               <span class="ms-3">Dashboard</span>
            </a>
         </li>
          <li class="{{ Route::is('appointment.index') ? 'active  !border-l-4 !border-green-500' : '' }}">
            <a href="{{ route('appointment.index') }}" class="{{ Route::is('appointment.index') ? 'active !text-green-500 !font-semibold' : '' }} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="{{ Route::is('appointment.index') ? 'active text-green-500 font-extrabold' : '' }} w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6h8m-8 6h8m-8 6h8M4 16a2 2 0 1 1 3.321 1.5L4 20h5M4 5l2-1v6m-2 0h4"/>
</svg>


               <span class="ms-3">Appointment Data Entry</span>
            </a>
         </li> 
        {{--
         @auth
         @if (auth()->user()->hasRole('admin'))
          <li class="{{ Route::is('form.one') ? 'active  !border-l-4 !border-green-500' : '' }}">
            <a href="{{ route('form.one') }}" class="{{ Route::is('form.one') ? 'active !text-green-500 !font-semibold' : '' }} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="{{ Route::is('form.one') ? 'active text-green-500 font-extrabold' : '' }} flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                  <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
               </svg> 
               <span class="flex-1 ms-3 whitespace-nowrap">No.33-B AFA</span>
               <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300"></span>
            </a>
         </li> 
         <li class="{{ Route::is('control.psipop') ? 'active  !border-l-4 !border-green-500' : '' }}">
            <a href="{{ route('control.psipop') }}" class="{{ Route::is('control.psipop') ? 'active !text-green-500 !font-semibold' : '' }} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <!-- <svg class="{{ Route::is('control.psipop') ? 'active text-green-500 font-extrabold' : '' }} flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
               </svg> -->
               <svg class="{{ Route::is('control.psipop') ? 'active text-green-500 font-extrabold' : '' }} flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v6.41A7.5 7.5 0 1 0 10.5 22H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                  <path fill-rule="evenodd" d="M9 16a6 6 0 1 1 12 0 6 6 0 0 1-12 0Zm6-3a1 1 0 0 1 1 1v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 1 1 0-2h1v-1a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
               </svg>


               <span class="flex-1 ms-3 whitespace-wrap">Control (For Encoding to PSIPOP)</span>
               <!-- <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300"></span> -->
            </a>
         </li>
         <li class="{{ Route::is('checklist.index') ? 'active  !border-l-4 !border-green-500' : '' }}" >
            <a href="{{ route('checklist.index')}}" class=" {{ Route::is('checklist.index') ? 'active !text-green-500 !font-semibold' : '' }} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <!-- <svg class="{{ Route::is('checklist.index') ? 'active text-green-500 font-extrabold' : '' }} flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                  <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
               </svg> -->
               <svg class="{{ Route::is('checklist.index') ? 'active text-green-500 font-extrabold' : '' }} flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
               <path d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Z"/>
               <path fill-rule="evenodd" d="M11 7V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm4.707 5.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
               </svg>

               <span class="flex-1 ms-3 whitespace-nowrap">Checklist</span>
            </a>
         </li>
         <li class="{{ Route::is('rai.index') ? 'active  !border-l-4 !border-green-500' : '' }}">
            <a href="{{ route('rai.index')}}" class="{{ Route::is('rai.index') ? 'active !text-green-500 !font-semibold' : '' }} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <!-- <svg class="{{ Route::is('rai.index') ? 'active text-green-500 font-extrabold' : '' }} flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                  <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
               </svg> -->
               <svg class="{{ Route::is('rai.index') ? 'active text-green-500 font-extrabold' : '' }} flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
               <path fill-rule="evenodd" d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
               <path fill-rule="evenodd" d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z" clip-rule="evenodd"/>
               </svg>

               <span class="flex-1 ms-3 whitespace-nowrap">R A I Form</span>
            </a>
         </li>
         <li  class="{{ Route::is('transmittal.index') ? 'active  !border-l-4 !border-green-500' : '' }}">
            <a href="{{ route('transmittal.index') }}" class="{{ Route::is('transmittal.index') ? 'active !text-green-500 !font-semibold' : '' }} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="{{ Route::is('transmittal.index') ? 'active text-green-500 font-extrabold' : '' }} flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Transmittal of Appointee</span>
            </a>
         </li>
         <li  class="{{ Route::is('controlFormCSC.index') ? 'active  !border-l-4 !border-green-500' : '' }}">
            <a href="{{ route('controlFormCSC.index') }}" class="{{ Route::is('controlFormCSC.index') ? 'active !text-green-500 !font-semibold' : '' }} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <!-- <svg class="{{ Route::is('controlFormCSC.index') ? 'active text-green-500 font-extrabold' : '' }} flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                  <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                  <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
               </svg> -->
               <svg class="{{ Route::is('controlFormCSC.index') ? 'active text-green-500 font-extrabold' : '' }} flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
               <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2 2 2 0 0 0 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm1.018 8.828a2.34 2.34 0 0 0-2.373 2.13v.008a2.32 2.32 0 0 0 2.06 2.497l.535.059a.993.993 0 0 0 .136.006.272.272 0 0 1 .263.367l-.008.02a.377.377 0 0 1-.018.044.49.49 0 0 1-.078.02 1.689 1.689 0 0 1-.297.021h-1.13a1 1 0 1 0 0 2h1.13c.417 0 .892-.05 1.324-.279.47-.248.78-.648.953-1.134a2.272 2.272 0 0 0-2.115-3.06l-.478-.052a.32.32 0 0 1-.285-.341.34.34 0 0 1 .344-.306l.94.02a1 1 0 1 0 .043-2l-.943-.02h-.003Zm7.933 1.482a1 1 0 1 0-1.902-.62l-.57 1.747-.522-1.726a1 1 0 0 0-1.914.578l1.443 4.773a1 1 0 0 0 1.908.021l1.557-4.773Zm-13.762.88a.647.647 0 0 1 .458-.19h1.018a1 1 0 1 0 0-2H6.647A2.647 2.647 0 0 0 4 13.647v1.706A2.647 2.647 0 0 0 6.647 18h1.018a1 1 0 1 0 0-2H6.647A.647.647 0 0 1 6 15.353v-1.706c0-.172.068-.336.19-.457Z" clip-rule="evenodd"/>
               </svg>

               <span class="flex-1 ms-3 whitespace-wrap">Control Form (CSC FO Cavite) (Blank)</span>
            </a>
         </li>
         @endif
         @endauth --}}
         @auth
         @if (auth()->user()->hasRole('admin'))
         <li class="{{ Route::is('users.logs') ? 'active  !border-l-4 !border-green-500' : '' }}">
            <a href="{{ route('users.logs') }}" class="{{ Route::is('users.logs') ? 'active !text-green-500 !font-semibold' : '' }} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <!-- <svg class="{{ Route::is('user.table') ? 'active text-green-500 font-extrabold' : '' }} w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
               </svg> -->
               <!-- <svg flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm2 8v-2h7v2H4Zm0 2v2h7v-2H4Zm9 2h7v-2h-7v2Zm7-4v-2h-7v2h7Z" clip-rule="evenodd"/>
               </svg> -->
               <svg class="{{ Route::is('users.logs') ? 'active text-green-500 font-extrabold' : '' }} w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M9 8h10M9 12h10M9 16h10M4.99 8H5m-.02 4h.01m0 4H5"/>
            </svg>
            <span class="ms-3">User Logs</span>
            </a>
         </li> @endif
         @endauth
         @auth
         @if (auth()->user()->hasRole('admin'))
         <li class="{{ Route::is('user.table') ? 'active  !border-l-4 !border-green-500' : '' }}">
            <a href="{{ route('user.table') }}" class="{{ Route::is('user.table') ? 'active !text-green-500 !font-semibold' : '' }} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <!-- <svg class="{{ Route::is('user.table') ? 'active text-green-500 font-extrabold' : '' }} w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
               </svg> -->
               <svg class="{{ Route::is('user.table') ? 'active text-green-500 font-extrabold' : '' }} flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm2 8v-2h7v2H4Zm0 2v2h7v-2H4Zm9 2h7v-2h-7v2Zm7-4v-2h-7v2h7Z" clip-rule="evenodd"/>
               </svg>

               <span class="ms-3">User Account Table</span>
            </a>
         </li> @endif
         @endauth
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
                <form class="space-y-4" action="{{ route('note.store')}}" method="POST">
                  @csrf
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
                  @csrf
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
                <form method="POST" id="delete-note-form" action="{{ route('note.delete') }}">
                    @csrf
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
                form.action = `{{ route('note.update', ['note' => ':id']) }}`.replace(':id', noteId); 
                form.actionDelete = `{{ route('note.delete', ['note' => ':id']) }}`.replace(':id', noteId);
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
            
            const response = await fetch("{{ route('notes.ajax') }}", {headers: {
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

    // fetch("{{ route('notes.ajax') }}", {
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
    //             form.action = `{{ route('note.update', ['note' => ':id']) }}`.replace(':id', noteId); 
    //             form.actionDelete = `{{ route('note.delete', ['note' => ':id']) }}`.replace(':id', noteId);
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
        //         form.action = `{{ route('note.update', ['note' => ':id']) }}`.replace(':id', noteId); 
        //         form.actionDelete = `{{ route('note.delete', ['note' => ':id']) }}`.replace(':id', noteId);
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

