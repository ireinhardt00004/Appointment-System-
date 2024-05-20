<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth overflow-y-auto">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
        <title>@yield('title')</title>
        <!-- Fonts -->
        <link rel="preconnect" h{{--  --}}>
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
        @livewire('wire-elements-modal')
    </head>
    
    <body class="font-sans antialiased ">
    @include('preloader')
    
        <main>
                <!-- Page Content -->
                <section class="w-full h-screen flex flex-col">
                @include('layouts.navz')
                
                       
                        <div class="p-4 sm:ml-64">
   <div class="p-4 w-full h-full flex flex-col justify-start items-center rounded-lg dark:border-gray-700 mt-14">
      <div class="grid grid-cols-1 gap-4 mb-4 w-full h-full dark:bg-gray-800 rounded-lg">
         
            <div class="h-full w-full flex flex-col justify-start items-center rounded-lg dark:bg-gray-800 ">
            @yield('content')
            </div>
         
         </div>
     
      </div>
   </div>
  
</div>   
 </section>
</div>
<div id="backToTopBtn" class="fixed bottom-5 end-5 z-50">
    <a href="#" class="block text-white bg-blue-500 hover:bg-blue-600 py-2 px-4 rounded-md shadow-md transition duration-300" title="Back to Top">
       <i class="fas fa-arrow-up"></i>
    </a>
</div>

</main>
<script>

   const Pindot = document.querySelector("#inCheck")
   const Katawan = document.getElementsByTagName('body')[0]
   const Tmode = document.querySelector('#Tmode')
   const token = localStorage.theme
   const Synth = window.speechSynthesis
   const boses = speechSynthesis.getVoices()
   const ehtiemlel = document.documentElement
   

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
         ehtiemlel.classList.add('dark')
      }else if(!Bariyabol){
        
         
         localStorage.setItem('theme', 'light')
         Tmode.innerHTML="Dark mode"
         Katawan.classList.remove('dark')
        
      }
       Boses(localStorage.theme + "mode")
      
    })
    if(token == 'dark'){
        Pindot.checked = true
        Katawan.classList.add('dark')
        localStorage.setItem('theme', 'dark')
        Tmode.innerHTML ="Light mode"
       
    }else if(token =='light'){
        Pindot.checked = false
        Katawan.classList.remove('dark')
        localStorage.setItem('theme', 'light')
        Tmode.innerHTML ="Dark mode"
     
    }
    
    const backToTopBtn = document.querySelector('#backToTopBtn');

    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>


        
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

    function showExportMessage() {
    toastr.info('Please wait... Inserting the data to the Excel', '', {
        timeOut: 2000,
        progressBar: true,
        positionClass: 'toast-top-right', 
        closeButton: true, 
        preventDuplicates: true, 
    });
}
</script>

<script>
    Livewire.on('refreshComponent', () => {
        window.location.reload(); 
    });
    document.addEventListener('livewire:load', function () {
        // Get the Select All and Deselect All buttons
        const selectAllButton = document.querySelector('[wire\:click="selectAll"]');
        const deselectAllButton = document.querySelector('[wire\:click="deselectAll"]');

        // Get all checkboxes in the table
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');

        // Add click event listener to Select All button
        selectAllButton.addEventListener('click', function () {
            checkboxes.forEach(checkbox => {
                checkbox.checked = true;
            });
        });

        // Add click event listener to Deselect All button
        deselectAllButton.addEventListener('click', function () {
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('#delete-button');
        const deleteForm = document.getElementById('delete-form');
        const deleteAppointmentIdInput = document.getElementById('delete-appointment-id');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const formId = button.getAttribute('data-form-id');
                deleteAppointmentIdInput.value = formId;
            });
        });
    });
</script>

<script>
    const tit = ()=>{
        document.title = "DepEd Offline System"
    }
    window.addEventListener('blur', ()=>{
      
            tit()
        
    })
    window.addEventListener('focus', ()=>{
        const yurl =  window.location.pathname
        let yourname =  yurl.substr(1)

        if(yourname == "dashboard"){
            document.title = "Dashboard"
        }else if(yourname == "appointment-form"){
            document.title = "Appoimtment Data Entry"
        }else if(yourname == "users-logs"){
            document.title = "Users logs"
        }else if(yourname == "user-table"){
            document.title = "User Account Table"
        }
      
       
    })
    
   
</script>
<script>
    
    const dilit = document.getElementById("dilit-app")

    dilit.addEventListener('click', ()=>{
        const dilit = document.getElementById("dilit-app")
        const dilitApp = document.getElementById('delete-appointment-id')
        

        dilitApp.value = blablabla
        console.log(dilit.value)
        
    })
</script>
    </body>
</html>
