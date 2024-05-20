@extends('layouts.app')
@section('content')

<section class="w-full h-full dark:bg-gray-800 rounded-[16px]">

<div class="py-10 px-5 mx-auto flex flex-col justify-center items-center  w-[100%] shadow-[0px_0px_17px_-1px_rgba(120,120,120,1)] border border-gray-300  space-y-2">
    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Appointment Data Entry  </h2>

<div  class="flex flex-col h-full w-full justify-between items-center gap-2">
<div class="flex w-[100%] h-full items-center justify-center gap-1">
<a href="#"  data-modal-target="add-transmittal-modal" data-modal-toggle="add-transmittal-modal" class="w-full h-full flex justify-end items-center"> <button type="button"  class="h-full w-full text-white bg-green-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-nowrap">
            <i class="fas fa-pencil"></i> <i class="fas fa-plus"></i>  Add Data on Entry Form</button></a>
            
            <a href="#"  data-modal-target="trash-transmittal-modal" data-modal-toggle="trash-transmittal-modal" class="w-full h-full flex justify-end items-center"> <button type="button" class="h-full w-full text-white bg-slate-950 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-nowrap">
            <i class="fas fa-times"></i> <i class="fas fa-trash"></i> Trash</button></a>
            {{-- @auth
            @if (auth()->user()->hasRole('admin'))
            <a href="#"  data-modal-target=#-modal" data-modal-toggle="#-modal" class="w-full h-full flex justify-end items-center"> <button type="button" class="h-full w-full text-white bg-slate-950 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-nowrap"><i class="fas fa-plus"></i> Export all Data as CSV</button></button></a>
            @endif @endauth --}}
            </div>
            </div>
    
<div class="w-full overflow-x-auto">
{{-- @livewire('fetch-data') --}}
 @livewire('search-appointments')

</section>

<!-- Table Modal -->
<div id="add-transmittal-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden  w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full">
    <div class="relative w-full max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white w-full h-full rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                Appointment Data Entry Form
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-transmittal-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4 ">
             
<!-- <section class="bg-white w-full h-full dark:bg-gray-900">
  <div class="py-10 px-5 mx-auto  w-[100%] shadow-[0px_0px_17px_-1px_rgba(120,120,120,1)] border border-gray-300 rounded-[16px]"> -->
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Fill up this form carefully</h2>
      <form  class="mx-auto w-full" method="POST" action="{{ route('submit.appointment') }}">
      @csrf
      <!-- Group -->
      <div  class="grid md:grid-cols-2 md:gap-6">
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="lname" id="floating_lname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_lname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last Name</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="fname" id="floating_fname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_fname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First Name</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="mname" id="floating_mname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_mname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Middle Name</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="extname" id="floating_extname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
          <label for="floating_extname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Extension Name</label>
      </div>
      
      <div class="relative z-0 w-full mb-5 group ">
          <input id="cForm" type="text" name="postitle" id="floating_postitle" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_postitle" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position Title</label>
      </div>
      <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
        <input id="cForm" type="text" name="frompos" id="floating_frompos" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
        <label for="floating_frompos" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"> Position From</label>
    </div>
      <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
        <input id="cForm" type="text" name="topos" id="floating_topos" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
        <label for="floating_topos" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position To</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
    <select id="cForm" type="text" name="salary_rate" id="floating_salary" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
        <option disabled selected>Select Salary Grade</option>
          <option value="1"> 1 </option>
          <option value="2"> 2 </option>
          <option value="3"> 3 </option> 
          <option value="4"> 4 </option>
          <option value="5"> 5 </option>
          <option value="6"> 6 </option>
          <option value="7"> 7 </option> 
          <option value="8"> 8 </option>
          <option value="9"> 9 </option>
          <option value="10"> 10 </option>
          <option value="11"> 11 </option> 
          <option value="12"> 12 </option>
          <option value="13"> 13 </option>
          <option value="14"> 14 </option>
          <option value="15"> 15 </option> 
          <option value="16"> 16 </option>
          <option value="17"> 17 </option>
          <option value="18"> 18 </option>
          <option value="19"> 19 </option> 
          <option value="20"> 20 </option>
          <option value="21"> 21 </option> 
          <option value="22"> 22 </option>
          <option value="23"> 23 </option>
          <option value="24"> 24 </option>
          <option value="25"> 25 </option> 
          <option value="26"> 26 </option>
          <option value="27"> 27 </option>
          <option value="28"> 28 </option>
          <option value="29"> 29 </option> 
          <option value="30"> 30 </option>
        </select>
        <label for="floating_salary" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Salary/Job/Pay Grade</label>
</div>
<div class="relative z-0 w-full mb-5 group">
    <select id="cForm" type="text" name="salary_increment" id="floating_salary_increment" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
        <option disabled selected>Select Salary Grade Increment</option>
          <option value="1"> 1 </option>
          <option value="2"> 2 </option>
          <option value="3"> 3 </option> 
          <option value="4"> 4 </option>
          <option value="5"> 5 </option>
          <option value="6"> 6 </option>
          <option value="7"> 7 </option> 
          <option value="8"> 8 </option>
        </select>
        <label for="floating_salary_increment" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Salary/Job/Pay Grade Increment</label>
</div>
<div class="relative z-0 w-full mb-5 group ">
          <input id="cForm" type="text" name="salary_monthly" id="floating_salary_monthly" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_salary_monthly" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Monthly Salary</label>
      </div>
<div class="relative z-0 w-full mb-5 group">
        <select id="cForm" type="text" name="appointment_status" id="floating_appointment_status" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
        <option disabled selected>Select Employment Status</option>
        <option value="Permanent">Permanent</option>
        <option value="Casual">Casual</option> 
        <option value="Temporary">Temporary</option> 
        <option value="Coterminous">Coterminous</option>
        <option value="Fixed Term">Fixed Term</option>
        <option value="Contractual">Contractual</option> 
        <option value="Substitute">Substitute</option> 
        <option value="Provisional">Provisional</option>
        </select>
        <label for="floating_appointment_status" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Employee Status</label>
    </div>
    <div class="relative z-0 w-full mb-5 group ">
          <input id="cForm" type="text" name="office_department_unit" id="floating_office" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_office" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Office/ Department/ Unit</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="compensation_rate_words" id="floating_compensation_rate_words" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_compensation_rate_words" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Compensation Rate per month (in words ₱)</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="number" name="compensation_rate_num" id="floating_compensation_rate_num" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_compensation_rate_num" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Compensation Rate per month(in numbers ₱)</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
        <select id="cForm" type="text" name="appointment_nature" id="floating_appointment_nature" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required>
        <option disabled selected>Select Nature Of Appointment</option>
        <option value="Original">Original</option>
        <option value="Promotional">Promotional</option> 
        <option value="Reemployment">Reemployment</option> 
        <option value="Reappointment">Reappointment</option>
        <option value="Reinstatement">Reinstatement</option>
        <option value="Reclassification">Reclassification</option> 
        <option value="Demotion">Demotion</option>
        </select>
        <label for="floating_appointment_nature" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nature of Appointment</label>
    </div>
      <div class="relative z-0 w-full mb-5 group">
        <select id="cForm" type="text" name="reason_title" id="floating_reason_title" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
        <option selected disabled>Select title</option>
          <option value="Transferred">Transferred</option>
          <option value="Retired">Retired</option>
          <option value="ETC">ETC</option>
          </select>
        <label for="floating_reason_title" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Reason Title</label>
    </div>
   
    <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="plantilla_item_number" id="floating_plantilla_item_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
          
          <label for="cForm"  id="floating_plantilla_item_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Plantilla Item Number</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="number" name="plantilla_page_number" id="floating_plantilla_page_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_plantilla_page_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Plantilla Page Number</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
        <select id="cForm" type="text" name="sector" id="floating_Sector" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
        <option disabled selected>Select Sector</option>
          <option value="LGU - MUNICIPALITY"> LGU - MUNICIPALITY </option>
          <option value="LGU - CITY"> LGU - CITY </option>
          <option value="LGU - PROVINCE"> LGU - PROVINCE </option> 
          <option value="EXECUTIVE - NGA"> EXECUTIVE - NGA </option>
          <option value="EXECUTIVE - LWD"> EXECUTIVE - LWD </option>
          <option value="EXECUTIVE ATTACHED"> EXECUTIVE ATTACHED </option>
          <option value="SUC"> SUC </option>
</select>
<label for="floating_sector" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Sector</label> 
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <select id="cForm" type="text" name="name_agency" id="floating_agency" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <option disabled selected>Select Name of Agency</option>
          <option value="PGO - Cavite">PGO - Cavite </option>
          <option value="CGO - Bacoor">CGO - Bacoor </option>
          <option value="CGO - Dasmariñas">CGO - Dasmariñas </option> 
          <option value="CGO - Gen. Trias">CGO - Gen. Trias </option>
          <option value="CGO - Imus">CGO - Imus </option>
          <option value="CGO - Trece Martires">CGO - Trece Martires </option>
          <option value="CGO - Tagaytay">CGO - Tagaytay </option>
          <option value="MGO - Alfonso">MGO - Alfonso </option>
          <option value="MGO - Amadeo">MGO - Amadeo </option>
          <option value="MGO Carmon">MGO Carmona </option> 
          <option value="MGO - Gen. E. Aguinaldo">MGO - Gen. E. Aguinaldo </option>
          <option value="MGO - Gen. Mariano Alvarez">MGO - Gen. Mariano Alvarez </option>
          <option value="MGO - Indang">MGO - Indang </option>
          <option value="MGO - Kawit">MGO - Kawit </option>
          <option value="MGO - MAgallanes">MGO - MAgallanes </option>
          <option value="MGO - Maragondon">MGO - Maragondon </option>
          <option value="MGO - Mendez">MGO - Mendez </option> 
          <option value="MGO - Naic">MGO - Naic </option>
          <option value="MGO - Noveleta">MGO - Noveleta </option>
          <option value="MGO - Rosario">MGO - Rosario </option>
          <option value="MGO - Silang">MGO - Silang </option>
          <option value="MGO - Tanza">MGO - Tanza </option>
          <option value="MGO - Ternate">MGO - Ternate </option>
          <option value="Amadeo Water District">Amadeo Water District </option> 
          <option value="Carmona Water District">Carmona Water District </option>
          <option value="Dasmariñas Water District">Dasmariñas Water District </option>
          <option value="Gen. E. Aguinaldo Water Distric">Gen. E. Aguinaldo Water District </option>
          <option value="Gen. M. Alvarez Water District">Gen. M. Alvarez Water District </option>
          <option value="Indang Water District">Indang Water District </option>
          <option value="Maragondon Water District">Maragondon Water District </option>
          <option value="Mendez Water District">Mendez Water District </option> 
          <option value="Silang Water District">Silang Water District </option>
          <option value="Tagaytay Water District">Tagaytay Water District </option>
          <option value="Tanza Water District">Tanza Water District </option>
          <option value="TMC Water District">TMC Water District </option>
          <option value="CAVITE STATE UNIVERSITY - MAIN CAMPUS">CAVITE STATE UNIVERSITY - MAIN CAMPUS </option>
          <option value="CAVITE STATE UNIVERSITY - NAIC CAMPUS">CAVITE STATE UNIVERSITY - NAIC CAMPUS </option>
          <option value="CAVITE STATE UNIVERSITY - ROSARIO CAMPUS">CAVITE STATE UNIVERSITY - ROSARIO CAMPUS </option> 
          <option value="DO-Provicial of Cavite">DO-Provicial of Cavite </option>
          <option value="DO-DepEd Bacoor City">DO-DepEd Bacoor City </option>
          <option value="DO-DepEd Cavite City">DO-DepEd Cavite City </option>
          <option value="DO-DepEd Dasmariñas City">DO-DepEd Dasmariñas City </option>
          <option value="DO-DepEd Gen. Trias City">DO-DepEd Gen. Trias City</option>
          <option value="DO-DepEd Imus City">DO-DepEd Imus City </option>
          <option value="DOH Tagaytay">DOH Tagaytay </option> 
          <option value="DENR-4B">DENR-4B </option>
          <option value="National Irrigation Administration (NIA)">National Irrigation Administration (NIA) </option>
</select>
        <label for="floating_agency" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name of Agency</label>
    </div>
  
      <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" name="odc_number" type="text" maxlength="6" id="floating_oc_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required>
            <label for="floating_oc_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ODC Number</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="date_received_records_unit" id="floating_date_received_records_unit" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_date_received_records_unit" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE RECEIVED BY RECORDS UNIT</label>
        </div>
       
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="date_received_hr_unit" id="floating_date_received_hr_unit" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required /> 
    <label for="floating_date_received_hr_unit" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE RECEIVED BY HR UNIT</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" name="school_district" id="floating_school_district" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "required />
            <label for="floating_school_district" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">SCHOOL/DISTRICT</label>
        </div>
        <!-- <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
        <input id="cForm" type="number" maxlength="6" name="item_number" id="floating_item_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=""  />
        <label for="floating_item_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ITEM NUMBER </label>

    </div> -->
    <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" name="name_incumbent" id="floating_name_incumbent" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required/> 
    <label for="floating_name_incumbent" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NAME OF INCUMBENT</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <select id="cForm" type="text" name="sex" id="floating_sex" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" " required >
                <option selected disabled>Select Sex</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
                <option value="N/A">Prefer not to Say</option>
                
            </select>
            <label for="floating_sex" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">SEX</label>
        </div>
        <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
        <input id="cForm" type="date" name="date_of_birth" id="floating_date_of_birth" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required  />
        <label for="floating_date_of_birth" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF BIRTH</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" maxlength="12" name="tin_number" id="floating_tin_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required /> 
    <label for="floating_tin_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">TIN</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="date_original_appointment" id="floating_date_original_appointment" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >

            <label for="floating_date_original_appointment" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF ORIGINAL APPOINTMENT</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="date_last_promotion" id="floating_date_last_promotion" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required /> 
    <label for="floating_date_last_promotion" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF LAST PROMOTION</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
        <select type="text" name="eligibility" id="floating_eligibility" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
        <option disabled selected>Select Type of Eligibility Used</option>
        <option value="CS-PROF">CS-PROF</option>
        <option value="CS-SUBPROF">CS-SUBPROF</option>
        <option value="PBET">PBET</option> 
        <option value="PD907">PD907</option>
        <option value="CSEE/MATB">CSEE/MATB</option>
        <option value="POLICE OFFICER">POLICE OFFICER</option>
        <option value="POLICE OFFICER I">POLICE OFFICER I</option> 
        <option value="FIRE OFFICER">FIRE OFFICER</option>
        <option value="PENOLOGY OFFICER">PENOLOGY OFFICER</option>
        <option value="SME">SME</option> 
        <option value="BOE">BOE</option>
        <option value="BNS">BNS</option>
        <option value="BHW">BHW</option>
        <option value="EDP SPECIALIST">EDP SPECIALIST</option> 
        <option value="STS">STS</option>
        <option value="RA1080">RA1080</option>
        <option value="APPROPRIATE LICENSE (CAT III)">APPROPRIATE LICENSE (CAT III)</option>
        </select>
        <label for="floating_eligibility" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Type of Eligibity Used</label>
    </div>

        <div class="relative z-0 w-full mb-5 group">
                <input id="cForm" type="date" name="date_validity_eligibility" id="floating_date_validity_eligibility" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required  /> 
        <label for="floating_date_validity_eligibility" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF VALIDITY OF ELIGIBILITY</label> 
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <select id="cForm" name="first_time_use_eligibility" id="floating_first_time_use_eligibility" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" ">
                    <option value="No" selected>No</option>
                    <option value="Yes">Yes</option>
                </select>
                <label for="floating_first_time_use_eligibility" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">FIRST TIME USED OF ELIGIBILITY?</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
        <select id="cForm"  name="position_level" id="floating_position_level" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" " required >
            <option selected disabled>Select Position Level</option>
            <option value="1st">1st</option>
            <option value="2nd">2nd</option>
            <option value="3rd">3rd</option>
            </select>
        <label for="floating_position_level" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">POSITION LEVEL</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="status_of_appointment" id="floating_status_of_appointment" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_status_of_appointment" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">STATUS OF APPOINTMENT </label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
       <select id="cForm" name="pwd" id="floating_pwd" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" " >
        <option value="No"selected >No</option>
        <option value="Yes">Yes</option>
       </select>
<label for="floating_pwd" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">PWD</label> 
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="type_of_disability" id="floating_type_of_disability" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" >
        <label for="floating_type_of_disability" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">TYPE OF DISABILITIY</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
       <input id="cForm" type="text"   name="member_of_ip_group" id="floating_member_of_ip_group" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
<label for="floating_member_of_ip_group" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">MEMBER OF IP GROUP</label> 
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <select id="cForm"   name="ethnicity" id="floating_ethnicity" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" " required>
            <option disabled selected>ETHNICITY</option>
            <option value="Abaknon"> Abaknon </option>
            <option value="Aeta/Agta"> Aeta/Agta </option>
            <option value="Agutaynon"> Agutaynon </option> 
            <option value="Aklan"> Aklan </option>
            <option value="Ati"> Ati </option>
            <option value="B'laan"> B'laan </option>
            <option value="Badjao"> Badjao </option> 
            <option value="Bago"> Bago </option>
            <option value="Balangao"> Balangao </option>
            <option value="Banguingui"> Banguingui </option>
            <option value="Bantoanon"> Bantoanon </option> 
            <option value="Batak"> Batak </option>
            <option value="Bicolano"> Bicolano </option>
            <option value="Boholano"> Boholano </option>
            <option value="Bolinao"> Bolinao </option> 
            <option value="Bontoc"> Bontoc </option>
            <option value="Bukidnon"> Bukidnon </option>
            <option value="Butuanon"> Butuanon </option>
            <option value="Caluyanon"> Caluyanon </option> 
            <option value="Capiznon"> Capiznon </option>
            <option value="Caviteño"> Caviteño </option> 
            <option value="Cebuano"> Cebuano </option>
            <option value="Cotobateno"> Cotobateno </option>
            <option value="Cuyunon"> Cuyunon </option>
            <option value="Davaoeno"> Davaoeno </option> 
            <option value="Eskaya"> Eskaya </option>
            <option value="Ga'dang"> Ga'dang </option>
            <option value="Gaddang"> Gaddang </option>
            <option value="Giangan"> Giangan </option> 
            <option value="Higaonon"> Higaonon </option>
            <option value="Hiligaynon"> Hiligaynon </option>
            <option value="Ibaloy"> Ibaloy </option>
            <option value="Ibanag"> Ibanag </option> 
            <option value="Ifugao"> Ifugao </option>
            <option value="Ilocano"> Ilocano </option>
            <option value="Ilongot"> Ilongot </option>
            <option value="Inonhan"> Inonhan </option> 
            <option value="Iranun"> Iranun </option>
            <option value="Isnag"> Isnag </option>
            <option value="Itawis"> Itawis </option>
            <option value="Itneg"> Itneg </option> 
            <option value="Ivatan"> Ivatan </option>
            <option value="Iwak"> Iwak </option>
            <option value="Jama Mapun"> Jama Mapun </option>
            <option value="Kagayanen"> Kagayanen </option> 
            <option value="Kalagan"> Kalagan </option>
            <option value="Kalanguya"> Kalanguya </option>
            <option value="Kalinga"> Kalinga </option>
            <option value="Kamayo"> Kamayo </option> 
            <option value="Kamiguin"> Kamiguin </option>
            <option value="Kankanay"> Kankanay </option> 
            <option value="Kapampangan"> Kapampangan </option>
            <option value="Karao"> Karao </option>
            <option value="Karay-a"> Karay-a </option>
            <option value="Kasiguranin"> Kasiguranin </option> 
            <option value="Kolibugan Subanon"> Kolibugan Subanon </option>
            <option value="Magahat"> Magahat </option>
            <option value="Maguidanaon"> Maguidanaon </option>
            <option value="Malaweg"> Malaweg </option> 
            <option value="Mamanwa "> Mamanwa </option>
            <option value="Mandaya"> Mandaya </option>
            <option value="Manguwangan"> Manguwangan </option> 
            <option value="Mangya"> Mangyan </option>
            <option value="Manobo"> Manobo </option>
            <option value="Mansaka"> Mansaka </option>
            <option value="Maranao"> Maranao </option> 
            <option value="Masbateño"> Masbateño </option>
            <option value="Matigsalug"> Matigsalug </option>
            <option value="Molbog"> Molbog </option>
            <option value="Palanan"> Palanan </option> 
            <option value="Pangasinan"> Pangasinan </option>
            <option value="Porohanon"> Porohanon </option> 
            <option value="Romblomanon"> Romblomanon </option>
            <option value="Sama Dea"> Sama Dea </option>
            <option value="Sambal"> Sambal </option>
            <option value="Sangil"> Sangil </option> 
            <option value="Subanon"> Subanon </option>
            <option value="Sulodnon"> Sulodnon </option>
            <option value="Surigaonon"> Surigaonon </option>
            <option value="T'boli"> T'boli </option> 
            <option value="Taaw't Bato"> Taaw't Bato </option>
            <option value="Tagabawa"> Tagabawa </option>
            <option value="Tagakaulo"> Tagakaulo </option>
            <option value="Tagalog"> Tagalog </option> 
            <option value="Tagbanwa"> Tagbanwa </option>
            <option value="Talaandig"> Talaandig </option>
            <option value="Tasaday"> Tasaday </option>
            <option value="Tausug"> Tausug </option> 
            <option value="Tedura"> Teduray </option>
            <option value="Ternateño"> Ternateño </option> 
            <option value="Tigwahono"> Tigwahonon </option>
            <option value="Tinguian"> Tinguian </option>
            <option value="Umayamno"> Umayamnon </option>
            <option value="Waray"> Waray </option> 
            <option value="Yakan"> Yakan </option>
            <option value="Yogad"> Yogad </option>
            <option value="Zamboangueño"> Zamboangueño </option>
        </select>
        <label for="floating_ethnicity" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ETHNICITY</label>
    </div>
    
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text" name="name_previous_incumbent" id="floating_name_previous_incumbent" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_name_previous_incumbent" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name of Previous Incumbent</label>
    </div>
      </div>
<!-- FOR CONTROL PSIPOP -->
    
<div id="accordion-color" data-accordion="collapse" data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">
  <h2 id="accordion-color-heading-1">
    <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-1" aria-expanded="true" aria-controls="accordion-color-body-1">
      <span><h2 class="my-5 text-xl font-bold dark:text-white">For No.33-B AFA </h2></span>
      <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
      </svg>
    </button>
  </h2>
  <div id="accordion-color-body-1" class="hidden" aria-labelledby="accordion-color-heading-1">
    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
    <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" name="vice" id="floating_vice" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_vice" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Vice ( For no.33 AFA Form)</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="position_pub_from" id="floating_position_pub_from" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_position_pub_from" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position Published from</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="position_pub_to" id="floating_position_pub_to" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_position_pub_to" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position Published to</label>
        </div>
        <!-- <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="deliberation_held_on" id="floating_deliberation_held_on" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_deliberation_held_on" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Deliberation Held on</label>
        </div> -->
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" name="placement_committe_chair" id="floating_placement_committe_chair" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_placement_committe_chair" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Chairperson, HRMPSB/Placement Committee</label>
        </div>
</div>
    </div>
  </div>
  <!-- second accordion -->
  <h2 id="accordion-color-heading-2">
    <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-2" aria-expanded="false" aria-controls="accordion-color-body-2">
      <span><h2 class="my-5 text-xl font-bold dark:text-white">For Appointment Processing Checklist</h2></span>
      <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
      </svg>
    </button>
  </h2>
  <div id="accordion-color-body-2" class="hidden" aria-labelledby="accordion-color-heading-2">
    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
    <div id="inputs" class="grid md:grid-cols-2 md:gap-6">
        
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text"  name="education" id="floating_education" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_education" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Education</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text"  name="education_remarks" id="floating_education_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_education_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Education Remarks</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text"  name="daily_compensation" id="floating_daily_compensation" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_daily_compensation" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Daily Compensation Rate</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text"  name="experience" id="floating_experience" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_experience" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Experience</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text"  name="training" id="floating_training" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_training" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Training</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text"  name="eligibility_remarks" id="floating_eligibility_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_eligibility_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Eligibility Remarks</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text"  name="senior_high_remarks" id="floating_senior_high_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_senior_high_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Senior HS - Track/Strand Subjects (for DepEd appointments) Remarks</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text"  name="prov_appt_remarks" id="floating_prov_appt_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_prov_appt_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Provisional Appointment Notation for DepEd Remarks</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text"  name="nature_appt_remarks" id="floating_nature_appt_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_nature_appt_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nature of Appointment Remarks</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text"  name="date_signing_remarks" id="floating_date_signing_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_date_signing_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date of Signing Remarks</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" name="cert_vacabt_pos_remarks" id="floating_cert_vacabt_pos_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_cert_vacabt_pos_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Certification of Publication/Posting of VACANT Position Remarks</label>
        </div>
        <div class="relative z-0 w-full mb-5 group dark:text-white">
        <label for="floating_performace_rating_radio" >Performance Rating in the last period(Promotion or Transfer)</label>
            <input id="cForm" type="radio" checked  name="performace_rating_radio" id="floating_performace_rating_radio"  value="Yes" >
            Yes
            <input id="cForm" type="radio" checked  name="performace_rating_radio" id="floating_performace_rating_radio"  value="No" >
            No
            <div class="w-full flex justify-start items-center p-2 gap-2">    
        
          </div>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text"  name="performace_rating_remarks" id="floating_performace_rating_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_performace_rating_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Performance Rating in the last period(Promotion or Transfer) Remarks</label>
        </div>
        <div class="relative z-0 w-full mb-5 group dark:text-white">
        <label for="floating_justification_radio" >Justification(if the promotion is more than 3 SG)</label>
        <div class="w-full flex justify-start items-center p-2 gap-2">    
            <input id="cForm" type="radio" checked  name="justification_radio" id="floating_justification_radio"  value="Yes" >
            Yes
            <input id="cForm" type="radio" checked  name="justification_radio" id="floating_justification_radio"  value="No" >
            No
          </div>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text"  name="justification_remarks" id="floating_justification_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_justification_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Justification(if the promotion is more than 3 SG) Remarks</label>
        </div>  
        </div>
    </div>
</div>
<!-- third accordion -->
  <h2 id="accordion-color-heading-3">
    <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-3" aria-expanded="false" aria-controls="accordion-color-body-3">
      <span><h2 class="my-5 text-xl font-bold dark:text-white">For Control (For Encoding to PSIPOP)</h2></span>
      <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
      </svg>
    </button>
  </h2>
  <div id="accordion-color-body-3" class="hidden" aria-labelledby="accordion-color-heading-3">
    <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
    <div class="grid md:grid-cols-2 md:gap-6">
     <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="date" name="date_updating_psiop_online" id="floating_date_updating_psiop_online" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_date_updating_psiop_online" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF UPDATING TO PSIPOP ONLINE</label>
    </div>
    
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
      <input id="cForm" type="date" name="date_updating_psiop_offline" id="floating_date_updating_psiop_offline" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
      <label for="floating_date_updating_psiop_offline" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF UPDATING TO PSIPOP OFFLINE</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="date" name="date_process_ao" id="floating_date_process_ao" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_date_process_ao" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATA PROCESSED (For signature to AO V/SDS/ASDS)</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="date" name="date_posted_fb_mess" id="floating_date_posted-fb-mess" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_date_posted-fb-mess" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date Posted in messenger/fb group (For signature of appointee)</label>
    </div>
        
        
        <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="date" name="date_transmitted_to_csc" id="floating_DATE RECEIVED FROM CSC" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_DATE TRANSMITTED TO CSC" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE TRANSMITTED TO CSC</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="date" name="date_received_from_csc" id="floating_DATE RECEIVED FROM CSC" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_DATE RECEIVED FROM CSC" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE RECEIVED FROM CSC</label>
    </div>
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
    <select id="cForm" name="approved" id="floating_approved" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" >
        <option disabled selected>Select</option>
        <option value="Approved">Approved</option>
        <option value="Disapproved">Disapproved</option>
      </select>
      <label for="floating_approved" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">APPROVED / DISAPPROVED</label>
</div>
<div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="number" name="processing_days" id="floating_processing_days" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_processing_days" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">PROCESSING TIME(DAYS)</label>
    </div>
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
      <input id="cForm" name="status" id="floating_status" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" >
       
      <label for="floating_status" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">STATUS</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text" name="action_remarks" id="floating_action_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_action_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ACTION / REMARKS</label>
    </div>
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
      <input id="cForm" name="final_action" id="floating_final_action" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" >
       
      <label for="floating_final_action" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">FINAL ACTION (FOR DISAPPROVED APPOINTMENT ONLY)</label>
      </div>
    </div>
<!-- for No.33 -->
<h2 class="my-5 text-xl font-bold dark:text-white">For No.33-B AFA </h2>
<div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" name="vice" id="floating_vice" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_vice" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Vice ( For no.33 AFA Form)</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="position_pub_from" id="floating_position_pub_from" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_position_pub_from" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position Published from</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="position_pub_to" id="floating_position_pub_to" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_position_pub_to" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position Published to</label>
        </div>
        <!-- <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="deliberation_held_on" id="floating_deliberation_held_on" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_deliberation_held_on" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Deliberation Held on</label>
        </div> -->
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" name="placement_committe_chair" id="floating_placement_committe_chair" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_placement_committe_chair" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Chairperson, HRMPSB/Placement Committee</label>
        </div>
</div>
    </div>
  </div>
</div>

    <h2 class="my-5 text-xl font-bold dark:text-white">For Control (For Encoding to PSIPOP)</h2>
    <div class="grid md:grid-cols-2 md:gap-6">
     <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="date" name="date_updating_psiop_online" id="floating_date_updating_psiop_online" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_date_updating_psiop_online" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF UPDATING TO PSIPOP ONLINE</label>
    </div>
    
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
      <input id="cForm" type="date" name="date_updating_psiop_offline" id="floating_date_updating_psiop_offline" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
      <label for="floating_date_updating_psiop_offline" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF UPDATING TO PSIPOP OFFLINE</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="date" name="date_process_ao" id="floating_date_process_ao" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_date_process_ao" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATA PROCESSED (For signature to AO V/SDS/ASDS)</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="date" name="date_posted_fb_mess" id="floating_date_posted-fb-mess" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_date_posted-fb-mess" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date Posted in messenger/fb group (For signature of appointee)</label>
    </div>
        
        
        <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="date" name="date_transmitted_to_csc" id="floating_DATE RECEIVED FROM CSC" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_DATE TRANSMITTED TO CSC" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE TRANSMITTED TO CSC</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="date" name="date_received_from_csc" id="floating_DATE RECEIVED FROM CSC" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_DATE RECEIVED FROM CSC" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE RECEIVED FROM CSC</label>
    </div>
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
    <select id="cForm" name="approved" id="floating_approved" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" >
        <option disabled selected>Select</option>
        <option value="Approved">Approved</option>
        <option value="Disapproved">Disapproved</option>
      </select>
      <label for="floating_approved" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">APPROVED / DISAPPROVED</label>
</div>
<div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="number" name="processing_days" id="floating_processing_days" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_processing_days" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">PROCESSING TIME(DAYS)</label>
    </div>
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
      <input id="cForm" name="status" id="floating_status" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" >
       
      <label for="floating_status" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">STATUS</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text" name="action_remarks" id="floating_action_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_action_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ACTION / REMARKS</label>
    </div>
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
      <input id="cForm" name="final_action" id="floating_final_action" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" >
       
      <label for="floating_final_action" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">FINAL ACTION (FOR DISAPPROVED APPOINTMENT ONLY)</label>
      </div>
    </div>
<!-- for No.33 -->
<h2 class="my-5 text-xl font-bold dark:text-white">For No.33-B AFA </h2>
<div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" name="vice" id="floating_vice" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_vice" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Vice ( For no.33 AFA Form)</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="position_pub_from" id="floating_position_pub_from" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_position_pub_from" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position Published from</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="position_pub_to" id="floating_position_pub_to" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_position_pub_to" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position Published to</label>
        </div>
        <!-- <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="deliberation_held_on" id="floating_deliberation_held_on" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_deliberation_held_on" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Deliberation Held on</label>
        </div> -->
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" name="placement_committe_chair" id="floating_placement_committe_chair" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_placement_committe_chair" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Chairperson, HRMPSB/Placement Committee</label>
        </div>
   
   
    
   
</div>


  <!-- for checklist -->
 
  <h2 class="my-5 text-xl font-bold dark:text-white">For Appointment Processing Checklist</h2>
    <div id="inputs" class="grid md:grid-cols-2 md:gap-6">
        
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="education" id="floating_education" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_education" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Education</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="education_remarks" id="floating_education_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_education_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Education Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="daily_compensation" id="floating_daily_compensation" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_daily_compensation" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Daily Compensation Rate</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="experience" id="floating_experience" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_experience" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Experience</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="training" id="floating_training" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_training" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Training</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="eligibility_remarks" id="floating_eligibility_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_eligibility_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Eligibility Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="senior_high_remarks" id="floating_senior_high_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_senior_high_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Senior HS - Track/Strand Subjects (for DepEd appointments) Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="prov_appt_remarks" id="floating_prov_appt_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_prov_appt_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Provisional Appointment Notation for DepEd Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="nature_appt_remarks" id="floating_nature_appt_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_nature_appt_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nature of Appointment Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="date_signing_remarks" id="floating_date_signing_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_date_signing_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date of Signing Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text" name="cert_vacabt_pos_remarks" id="floating_cert_vacabt_pos_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_cert_vacabt_pos_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Certification of Publication/Posting of VACANT Position Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group dark:text-white">
    <label for="floating_performace_rating_radio" >Performance Rating in the last period(Promotion or Transfer)</label>
        <input id="cForm" type="radio" checked  name="performace_rating_radio" id="floating_performace_rating_radio"  value="Yes" >
        Yes
        <input id="cForm" type="radio" checked  name="performace_rating_radio" id="floating_performace_rating_radio"  value="No" >
        No
        <div class="w-full flex justify-start items-center p-2 gap-2">    
    
      </div>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="performace_rating_remarks" id="floating_performace_rating_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_performace_rating_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Performance Rating in the last period(Promotion or Transfer) Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group dark:text-white">
    <label for="floating_justification_radio" >Justification(if the promotion is more than 3 SG)</label>
    <div class="w-full flex justify-start items-center p-2 gap-2">    
        <input id="cForm" type="radio" checked  name="justification_radio" id="floating_justification_radio"  value="Yes" >
        Yes
        <input id="cForm" type="radio" checked  name="justification_radio" id="floating_justification_radio"  value="No" >
        No
      </div>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="justification_remarks" id="floating_justification_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_justification_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Justification(if the promotion is more than 3 SG) Remarks</label>
    </div>
   
    
    </div>
    
    <div class="w-full items-center flex flex-wrap sm:justify-end justify-center gap-3 ">
     <button type="button" data-modal-hide="add-transmittal-modal" class="text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-times"></i> Cancel</button>
    <button type="submit"  class="text-white bg-green-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-check"></i> Submit Appointment</button>
     </div>
  </form>
  </div>
</section>

{{-- Trash --}}

<div id="trash-transmittal-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full">
    <div class="relative w-full max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white w-full h-full rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Trashed Appointment Data Entry
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-transmittal-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white"></h2>
                <div class="w-full overflow-x-auto">
                    <table class="text-sm text-center text-gray-500 dark:text-gray-400 w-full">
                        <thead class="text-xs w-full text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                            <th scope="col" class="px-6 py-3">#</th>
                            <th class="scope" >Transaction Number</th>
                            <th class="scope">Full Name</th>
                            <th class="scope">School / District</th>
                            <th class="scope">Salary Grade</th>
                            <th class="scope">Nature of Appointment</th>
                            <th class="scope">Appointment Status</th>
                            <th class="scope">Date of Original Appointment</th>
                            <th class="scope">Eligibility</th>
                            <th class="scope">Encoding Personnel</th>
                                <th class="scope">Date of Delete</th>
                                <th class="scope">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $startIndex = 1;
                            @endphp
                            @if(isset($trasheds))
                            @if($trasheds->isEmpty())
                            <tr>
                                <br>
                            <td colspan="9"class="px-6 py-4 font-bold">Trash is empty.</td>
                            </tr>
                             @else
                                @php
                                    $startIndex = ($trasheds->currentPage() - 1) * $trasheds->perPage() + 1;
                                @endphp
                                @foreach ($trasheds as $index => $trash)
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 py-4">{{ $startIndex + $index }}</td>
                                        <td class="px-6 py-4">{{ $trash->transaction_number }}</td>
                                            <td class="px-6 py-4">{{ $trash->fname}} {{ $trash->mname}}  {{ $trash->lname}}  {{ $trash->extname}}</td>
                                            <td class="px-6 py-4">{{ $trash->school_district }}</td>
                                            <td class="px-6 py-4">{{ $trash->salary_grade }} - {{ $trash->salary_increment }}</td>
                                            <td class="px-6 py-4">{{ $trash->appointment_nature }}</td>
                                            <td class="px-6 py-4">{{ $trash->appointment_status }}</td>
                                            <td class="px-6 py-4">{{$trash->date_original_appointment }}</td>
                                            <td class="px-6 py-4">{{$trash->eligibility }}</td>
                                            <td class="px-6 py-4">{{$trash->users->fname }} {{$trash->users->middlename }} {{$trash->users->lname }}</td>
                                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($trash->deleted_at)->format('F d, Y H:i:s') }} ({{ \Carbon\Carbon::parse($trash->deleted_at)->diffForHumans() }})</td>
               
                                        <td class="px-3 py-3 justify-center items-center flex w-full h-full gap-2">
                                            <a href="#" class="font-sm text-blue-600 dark:text-blue-500 hover:underline w-full h-full">
                                                <button type="button" class="text-white bg-sky-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full -full px-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-modal-target="restore-modal" data-form-id="{{  $trash->id }}" data-modal-toggle="restore-modal" >
                                                <i class="fa-solid fa-arrow-rotate-left"></i>  Restore
                                                </button>
                                            </a>
                                            <a href="#"  class="font-sm text-blue-600 dark:text-blue-500 hover:underline w-full h-full">
                                                <button type="button" data-modal-target="deleteperma-modal" data-form-id="{{  $trash->id }}" data-modal-toggle="deleteperma-modal" class="text-white bg-sky-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 w-full h-full text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                        </tbody>
                    </table>                    
                    {{ $trasheds->links() }}
                    @endif
                </div>
                <div class="w-full items-center flex flex-wrap justify-end gap-3 ">
                <button type="button" id="dButton" data-modal-hide="trash-transmittal-modal" class="text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-times"></i>Close</button>
            </div>
            </div>
           
        </div>
    </div>
</div>


{{-- restore --}}
@if(isset($trash))
<div id="restore-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="restore-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <form action="{{route('appointment.restore', ['id' => $trash->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to restore this row?</h3>
                    <button data-modal-hide="restore-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                
                    <button  type="submit" class="text-white bg-green-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif


{{-- delete permanently --}}
@if(isset($trash))
<div id="deleteperma-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="deleteperma-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <form action="{{route('appointment.delete-permanently', ['id' => $trash->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete permanently this row?</h3>
                    <button data-modal-hide="deleteperma-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                
                    <button  type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

@if(isset($form))
<!-- EDIT  Modal -->
<div id="editpopup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden  w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full">
    <div class="relative w-full max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white w-full h-full rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                 Edit Appointment Data Entry Form
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editpopup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4 ">
             
<!-- <section class="bg-white w-full h-full dark:bg-gray-900">
  <div class="py-10 px-5 mx-auto  w-[100%] shadow-[0px_0px_17px_-1px_rgba(120,120,120,1)] border border-gray-300 rounded-[16px]"> -->
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Fill up this form carefully</h2>
      <form  class="mx-auto w-full" id="appointmentDataForm"  method="POST" action="{{ route('update.appointment', ['id' => $form->id]) }}">
      @csrf
      <!-- Group -->
      @method('PUT')
      <div class="grid md:grid-cols-2 md:gap-6">
      <div class="relative z-0 w-full mb-5 group">
          <input id="Input_lname" type="text" name="lname" id="floating_lname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_lname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last Name</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="input_fname" type="text" name="fname" id="floating_fname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_fname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First Name</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="input_mname" type="text" name="mname" id="floating_mname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_mname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Middle Name</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="input_extname" type="text" name="extname" id="floating_extname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
          <label for="floating_extname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Extension Name</label>
      </div>
      
      <div class="relative z-0 w-full mb-5 group ">
          <input id="input_postitle" type="text" name="postitle" id="floating_postitle" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_postitle" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position Title</label>
      </div>
      <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
        <input id="input_frompos" type="text" name="frompos" id="floating_frompos" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
        <label for="floating_frompos" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"> Position From</label>
    </div>
      <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
        <input id="input_topos" type="text" name="topos" id="floating_topos" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
        <label for="floating_topos" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position To</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
    <select id="select_salary_grade" type="text" name="salary_grade" id="floating_salary" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
        <option disabled selected>Select Salary Grade</option>
          <option value="1"> 1 </option>
          <option value="2"> 2 </option>
          <option value="3"> 3 </option> 
          <option value="4"> 4 </option>
          <option value="5"> 5 </option>
          <option value="6"> 6 </option>
          <option value="7"> 7 </option> 
          <option value="8"> 8 </option>
          <option value="9"> 9 </option>
          <option value="10"> 10 </option>
          <option value="11"> 11 </option> 
          <option value="12"> 12 </option>
          <option value="13"> 13 </option>
          <option value="14"> 14 </option>
          <option value="15"> 15 </option> 
          <option value="16"> 16 </option>
          <option value="17"> 17 </option>
          <option value="18"> 18 </option>
          <option value="19"> 19 </option> 
          <option value="20"> 20 </option>
          <option value="21"> 21 </option> 
          <option value="22"> 22 </option>
          <option value="23"> 23 </option>
          <option value="24"> 24 </option>
          <option value="25"> 25 </option> 
          <option value="26"> 26 </option>
          <option value="27"> 27 </option>
          <option value="28"> 28 </option>
          <option value="29"> 29 </option> 
          <option value="30"> 30 </option>
        </select>
        <label for="floating_salary" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Salary/Job/Pay Grade</label>
</div>
<div class="relative z-0 w-full mb-5 group">
    <select id="select_salary_increment" type="text" name="salary_increment" id="floating_salary_increment" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
        <option disabled selected>Select Salary Grade Increment</option>
          <option value="1"> 1 </option>
          <option value="2"> 2 </option>
          <option value="3"> 3 </option> 
          <option value="4"> 4 </option>
          <option value="5"> 5 </option>
          <option value="6"> 6 </option>
          <option value="7"> 7 </option> 
          <option value="8"> 8 </option>
        </select>
        <label for="floating_salary_increment" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Salary/Job/Pay Grade Increment</label>
</div>
<div class="relative z-0 w-full mb-5 group ">
          <input id="input_salary_monthly" type="text" name="salary_monthly" id="floating_salary_monthly" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_salary_monthly" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Monthly Salary</label>
      </div>
<div class="relative z-0 w-full mb-5 group">
        <select id="select_appointment_status" type="text" name="appointment_status" id="floating_appointment_status" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
        <option disabled selected>Select Employment Status</option>
        <option value="Permanent">Permanent</option>
        <option value="Casual">Casual</option> 
        <option value="Temporary">Temporary</option> 
        <option value="Coterminous">Coterminous</option>
        <option value="Fixed Term">Fixed Term</option>
        <option value="Contractual">Contractual</option> 
        <option value="Substitute">Substitute</option> 
        <option value="Provisional">Provisional</option>
        </select>
        <label for="floating_appointment_status" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Employee Status</label>
    </div>
    <div class="relative z-0 w-full mb-5 group ">
          <input id="input_office_department" type="text" name="office_department_unit" id="floating_office" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_office" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Office/ Department/ Unit</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="input_compensation_rate_words" type="text" name="compensation_rate_words" id="floating_compensation_rate_words" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_compensation_rate_words" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Compensation Rate per month (in words ₱)</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="input_compensation_rate_num" type="number" name="compensation_rate_num" id="floating_compensation_rate_num" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_compensation_rate_num" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Compensation Rate per month(in numbers ₱)</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
        <select id="select_appointment_nature" type="text" name="appointment_nature" id="floating_appointment_nature" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required>
        <option disabled selected>Select Nature Of Appointment</option>
        <option value="Original">Original</option>
        <option value="Promotional">Promotional</option> 
        <option value="Reemployment">Reemployment</option> 
        <option value="Reappointment">Reappointment</option>
        <option value="Reinstatement">Reinstatement</option>
        <option value="Reclassification">Reclassification</option> 
        <option value="Demotion">Demotion</option>
        </select>
        <label for="floating_appointment_nature" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nature of Appointment</label>
    </div>
      <div class="relative z-0 w-full mb-5 group">
        <select id="select_reason_title" type="text" name="reason_title" id="floating_reason_title" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
        <option selected disabled>Select title</option>
          <option value="Transferred">Transferred</option>
          <option value="Retired">Retired</option>
          <option value="ETC">ETC</option>
          </select>
        <label for="floating_reason_title" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Reason Title</label>
    </div>
   
    <div class="relative z-0 w-full mb-5 group">
          <input id="input_plantilla_item_number" type="text" name="plantilla_item_number" id="floating_plantilla_item_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
          
          <label for="cForm"  id="floating_plantilla_item_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Plantilla Item Number</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="input_plantilla_page_number" type="number" name="plantilla_page_number" id="floating_plantilla_page_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_plantilla_page_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Plantilla Page Number</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
        <select id="select_sector" type="text" name="sector" id="floating_Sector" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
        <option disabled selected>Select Sector</option>
          <option value="LGU - MUNICIPALITY"> LGU - MUNICIPALITY </option>
          <option value="LGU - CITY"> LGU - CITY </option>
          <option value="LGU - PROVINCE"> LGU - PROVINCE </option> 
          <option value="EXECUTIVE - NGA"> EXECUTIVE - NGA </option>
          <option value="EXECUTIVE - LWD"> EXECUTIVE - LWD </option>
          <option value="EXECUTIVE ATTACHED"> EXECUTIVE ATTACHED </option>
          <option value="SUC"> SUC </option>
</select>
<label for="floating_sector" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Sector</label> 
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <select id="select_name_agency" type="text" name="name_agency" id="floating_agency" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <option disabled selected>Select Name of Agency</option>
          <option value="PGO - Cavite">PGO - Cavite </option>
          <option value="CGO - Bacoor">CGO - Bacoor </option>
          <option value="CGO - Dasmariñas">CGO - Dasmariñas </option> 
          <option value="CGO - Gen. Trias">CGO - Gen. Trias </option>
          <option value="CGO - Imus">CGO - Imus </option>
          <option value="CGO - Trece Martires">CGO - Trece Martires </option>
          <option value="CGO - Tagaytay">CGO - Tagaytay </option>
          <option value="MGO - Alfonso">MGO - Alfonso </option>
          <option value="MGO - Amadeo">MGO - Amadeo </option>
          <option value="MGO Carmon">MGO Carmona </option> 
          <option value="MGO - Gen. E. Aguinaldo">MGO - Gen. E. Aguinaldo </option>
          <option value="MGO - Gen. Mariano Alvarez">MGO - Gen. Mariano Alvarez </option>
          <option value="MGO - Indang">MGO - Indang </option>
          <option value="MGO - Kawit">MGO - Kawit </option>
          <option value="MGO - MAgallanes">MGO - MAgallanes </option>
          <option value="MGO - Maragondon">MGO - Maragondon </option>
          <option value="MGO - Mendez">MGO - Mendez </option> 
          <option value="MGO - Naic">MGO - Naic </option>
          <option value="MGO - Noveleta">MGO - Noveleta </option>
          <option value="MGO - Rosario">MGO - Rosario </option>
          <option value="MGO - Silang">MGO - Silang </option>
          <option value="MGO - Tanza">MGO - Tanza </option>
          <option value="MGO - Ternate">MGO - Ternate </option>
          <option value="Amadeo Water District">Amadeo Water District </option> 
          <option value="Carmona Water District">Carmona Water District </option>
          <option value="Dasmariñas Water District">Dasmariñas Water District </option>
          <option value="Gen. E. Aguinaldo Water Distric">Gen. E. Aguinaldo Water District </option>
          <option value="Gen. M. Alvarez Water District">Gen. M. Alvarez Water District </option>
          <option value="Indang Water District">Indang Water District </option>
          <option value="Maragondon Water District">Maragondon Water District </option>
          <option value="Mendez Water District">Mendez Water District </option> 
          <option value="Silang Water District">Silang Water District </option>
          <option value="Tagaytay Water District">Tagaytay Water District </option>
          <option value="Tanza Water District">Tanza Water District </option>
          <option value="TMC Water District">TMC Water District </option>
          <option value="CAVITE STATE UNIVERSITY - MAIN CAMPUS">CAVITE STATE UNIVERSITY - MAIN CAMPUS </option>
          <option value="CAVITE STATE UNIVERSITY - NAIC CAMPUS">CAVITE STATE UNIVERSITY - NAIC CAMPUS </option>
          <option value="CAVITE STATE UNIVERSITY - ROSARIO CAMPUS">CAVITE STATE UNIVERSITY - ROSARIO CAMPUS </option> 
          <option value="DO-Provicial of Cavite">DO-Provicial of Cavite </option>
          <option value="DO-DepEd Bacoor City">DO-DepEd Bacoor City </option>
          <option value="DO-DepEd Cavite City">DO-DepEd Cavite City </option>
          <option value="DO-DepEd Dasmariñas City">DO-DepEd Dasmariñas City </option>
          <option value="DO-DepEd Gen. Trias City">DO-DepEd Gen. Trias City</option>
          <option value="DO-DepEd Imus City">DO-DepEd Imus City </option>
          <option value="DOH Tagaytay">DOH Tagaytay </option> 
          <option value="DENR-4B">DENR-4B </option>
          <option value="National Irrigation Administration (NIA)">National Irrigation Administration (NIA) </option>
</select>
        <label for="floating_agency" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name of Agency</label>
    </div>
  
      <div class="relative z-0 w-full mb-5 group">
            <input id="input_odc_number" name="odc_number" type="text" maxlength="6" id="floating_oc_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required>
            <label for="floating_oc_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ODC Number</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="input_date_received_records_unit" type="date" name="date_received_records_unit" id="floating_date_received_records_unit" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_date_received_records_unit" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE RECEIVED BY RECORDS UNIT</label>
        </div>
       
        <div class="relative z-0 w-full mb-5 group">
            <input id="input_date_received_hr_unit" type="date" name="date_received_hr_unit" id="floating_date_received_hr_unit" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required /> 
    <label for="floating_date_received_hr_unit" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE RECEIVED BY HR UNIT</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="input_school_district" type="text" name="school_district" id="floating_school_district" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "required />
            <label for="floating_school_district" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">SCHOOL/DISTRICT</label>
        </div>
        <!-- <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
        <input id="cForm" type="number" maxlength="6" name="item_number" id="floating_item_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=""  />
        <label for="floating_item_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ITEM NUMBER </label>

    </div> -->
    <div class="relative z-0 w-full mb-5 group">
            <input id="input_name_incumbent" type="text" name="name_incumbent" id="floating_name_incumbent" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required/> 
    <label for="floating_name_incumbent" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NAME OF INCUMBENT</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <select id="select_floating_sex" type="text" name="sex" id="floating_sex" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" " required >
                <option selected disabled>Select Sex</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
                <option value="N/A">Prefer not to Say</option>
                
            </select>
            <label for="floating_sex" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">SEX</label>
        </div>
        <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
        <input id="input_date_of_birth" type="date" name="date_of_birth" id="floating_date_of_birth" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required  />
        <label for="floating_date_of_birth" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF BIRTH</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
            <input id="input_tin_number" type="text" maxlength="12" name="tin_number" id="floating_tin_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required /> 
    <label for="floating_tin_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">TIN</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="input_date_original_appointment" type="date" name="date_original_appointment" id="floating_date_original_appointment" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >

            <label for="floating_date_original_appointment" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF ORIGINAL APPOINTMENT</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="input_date_last_promotion" type="date" name="date_last_promotion" id="floating_date_last_promotion" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required /> 
    <label for="floating_date_last_promotion" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF LAST PROMOTION</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
        <select id="select_eligibility" type="text" name="eligibility" id="floating_eligibility" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
        <option disabled selected>Select Type of Eligibility Used</option>
        <option value="CS-PROF">CS-PROF</option>
        <option value="CS-SUBPROF">CS-SUBPROF</option>
        <option value="PBET">PBET</option> 
        <option value="PD907">PD907</option>
        <option value="CSEE/MATB">CSEE/MATB</option>
        <option value="POLICE OFFICER">POLICE OFFICER</option>
        <option value="POLICE OFFICER I">POLICE OFFICER I</option> 
        <option value="FIRE OFFICER">FIRE OFFICER</option>
        <option value="PENOLOGY OFFICER">PENOLOGY OFFICER</option>
        <option value="SME">SME</option> 
        <option value="BOE">BOE</option>
        <option value="BNS">BNS</option>
        <option value="BHW">BHW</option>
        <option value="EDP SPECIALIST">EDP SPECIALIST</option> 
        <option value="STS">STS</option>
        <option value="RA1080">RA1080</option>
        <option value="APPROPRIATE LICENSE (CAT III)">APPROPRIATE LICENSE (CAT III)</option>
        </select>
        <label for="floating_eligibility" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Type of Eligibity Used</label>
    </div>

        <div class="relative z-0 w-full mb-5 group">
                <input id="input_date_validity_eligibility" type="date" name="date_validity_eligibility" id="floating_date_validity_eligibility" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required  /> 
        <label for="floating_date_validity_eligibility" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF VALIDITY OF ELIGIBILITY</label> 
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <select id="select_first_time_use_eligibility" name="first_time_use_eligibility" id="floating_first_time_use_eligibility" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" ">
                    <option value="No" selected>No</option>
                    <option value="Yes">Yes</option>
                </select>
                <label for="floating_first_time_use_eligibility" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">FIRST TIME USED OF ELIGIBILITY?</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
        <select id="select_position_level"  name="position_level" id="floating_position_level" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" " required >
            <option selected disabled>Select Position Level</option>
            <option value="1st">1st</option>
            <option value="2nd">2nd</option>
            <option value="3rd">3rd</option>
            </select>
        <label for="floating_position_level" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">POSITION LEVEL</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_status_of_appointment" type="text"  name="status_of_appointment" id="floating_status_of_appointment" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_status_of_appointment" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">STATUS OF APPOINTMENT </label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
       <select id="select_pwd" name="pwd" id="floating_pwd" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" " >
        <option value="No"selected >No</option>
        <option value="Yes">Yes</option>
       </select>
<label for="floating_pwd" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">PWD</label> 
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_type_of_disability" type="text"  name="type_of_disability" id="floating_type_of_disability" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" >
        <label for="floating_type_of_disability" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">TYPE OF DISABILITIY</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
       <input id="input_member_of_ip_group" type="text"   name="member_of_ip_group" id="floating_member_of_ip_group" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
<label for="floating_member_of_ip_group" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">MEMBER OF IP GROUP</label> 
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <select id="select_ethnicity"   name="ethnicity" id="floating_ethnicity" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" " required>
            <option disabled selected>ETHNICITY</option>
            <option value="Abaknon"> Abaknon </option>
            <option value="Aeta/Agta"> Aeta/Agta </option>
            <option value="Agutaynon"> Agutaynon </option> 
            <option value="Aklan"> Aklan </option>
            <option value="Ati"> Ati </option>
            <option value="B'laan"> B'laan </option>
            <option value="Badjao"> Badjao </option> 
            <option value="Bago"> Bago </option>
            <option value="Balangao"> Balangao </option>
            <option value="Banguingui"> Banguingui </option>
            <option value="Bantoanon"> Bantoanon </option> 
            <option value="Batak"> Batak </option>
            <option value="Bicolano"> Bicolano </option>
            <option value="Boholano"> Boholano </option>
            <option value="Bolinao"> Bolinao </option> 
            <option value="Bontoc"> Bontoc </option>
            <option value="Bukidnon"> Bukidnon </option>
            <option value="Butuanon"> Butuanon </option>
            <option value="Caluyanon"> Caluyanon </option> 
            <option value="Capiznon"> Capiznon </option>
            <option value="Caviteño"> Caviteño </option> 
            <option value="Cebuano"> Cebuano </option>
            <option value="Cotobateno"> Cotobateno </option>
            <option value="Cuyunon"> Cuyunon </option>
            <option value="Davaoeno"> Davaoeno </option> 
            <option value="Eskaya"> Eskaya </option>
            <option value="Ga'dang"> Ga'dang </option>
            <option value="Gaddang"> Gaddang </option>
            <option value="Giangan"> Giangan </option> 
            <option value="Higaonon"> Higaonon </option>
            <option value="Hiligaynon"> Hiligaynon </option>
            <option value="Ibaloy"> Ibaloy </option>
            <option value="Ibanag"> Ibanag </option> 
            <option value="Ifugao"> Ifugao </option>
            <option value="Ilocano"> Ilocano </option>
            <option value="Ilongot"> Ilongot </option>
            <option value="Inonhan"> Inonhan </option> 
            <option value="Iranun"> Iranun </option>
            <option value="Isnag"> Isnag </option>
            <option value="Itawis"> Itawis </option>
            <option value="Itneg"> Itneg </option> 
            <option value="Ivatan"> Ivatan </option>
            <option value="Iwak"> Iwak </option>
            <option value="Jama Mapun"> Jama Mapun </option>
            <option value="Kagayanen"> Kagayanen </option> 
            <option value="Kalagan"> Kalagan </option>
            <option value="Kalanguya"> Kalanguya </option>
            <option value="Kalinga"> Kalinga </option>
            <option value="Kamayo"> Kamayo </option> 
            <option value="Kamiguin"> Kamiguin </option>
            <option value="Kankanay"> Kankanay </option> 
            <option value="Kapampangan"> Kapampangan </option>
            <option value="Karao"> Karao </option>
            <option value="Karay-a"> Karay-a </option>
            <option value="Kasiguranin"> Kasiguranin </option> 
            <option value="Kolibugan Subanon"> Kolibugan Subanon </option>
            <option value="Magahat"> Magahat </option>
            <option value="Maguidanaon"> Maguidanaon </option>
            <option value="Malaweg"> Malaweg </option> 
            <option value="Mamanwa "> Mamanwa </option>
            <option value="Mandaya"> Mandaya </option>
            <option value="Manguwangan"> Manguwangan </option> 
            <option value="Mangya"> Mangyan </option>
            <option value="Manobo"> Manobo </option>
            <option value="Mansaka"> Mansaka </option>
            <option value="Maranao"> Maranao </option> 
            <option value="Masbateño"> Masbateño </option>
            <option value="Matigsalug"> Matigsalug </option>
            <option value="Molbog"> Molbog </option>
            <option value="Palanan"> Palanan </option> 
            <option value="Pangasinan"> Pangasinan </option>
            <option value="Porohanon"> Porohanon </option> 
            <option value="Romblomanon"> Romblomanon </option>
            <option value="Sama Dea"> Sama Dea </option>
            <option value="Sambal"> Sambal </option>
            <option value="Sangil"> Sangil </option> 
            <option value="Subanon"> Subanon </option>
            <option value="Sulodnon"> Sulodnon </option>
            <option value="Surigaonon"> Surigaonon </option>
            <option value="T'boli"> T'boli </option> 
            <option value="Taaw't Bato"> Taaw't Bato </option>
            <option value="Tagabawa"> Tagabawa </option>
            <option value="Tagakaulo"> Tagakaulo </option>
            <option value="Tagalog"> Tagalog </option> 
            <option value="Tagbanwa"> Tagbanwa </option>
            <option value="Talaandig"> Talaandig </option>
            <option value="Tasaday"> Tasaday </option>
            <option value="Tausug"> Tausug </option> 
            <option value="Tedura"> Teduray </option>
            <option value="Ternateño"> Ternateño </option> 
            <option value="Tigwahono"> Tigwahonon </option>
            <option value="Tinguian"> Tinguian </option>
            <option value="Umayamno"> Umayamnon </option>
            <option value="Waray"> Waray </option> 
            <option value="Yakan"> Yakan </option>
            <option value="Yogad"> Yogad </option>
            <option value="Zamboangueño"> Zamboangueño </option>
        </select>
        <label for="floating_ethnicity" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ETHNICITY</label>
    </div>
    
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_name_previous_incumbent" type="text" name="name_previous_incumbent" id="floating_name_previous_incumbent" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_name_previous_incumbent" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name of Previous Incumbent</label>
    </div>
      </div>

    <h2 class="my-5 text-xl font-bold">For Control (For Encoding to PSIPOP)</h2>
    <div id="appointmentDataForm2" class="grid md:grid-cols-2 md:gap-6">
     <div class="relative z-0 w-full mb-5 group">
        <input id="input_date_updating_psiop_online" type="date" name="date_updating_psiop_online" id="floating_date_updating_psiop_online" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_date_updating_psiop_online" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF UPDATING TO PSIPOP ONLINE</label>
    </div>
    
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
      <input id="input_date_updating_psiop_offline" type="date" name="date_updating_psiop_offline" id="floating_date_updating_psiop_offline" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
      <label for="floating_date_updating_psiop_offline" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF UPDATING TO PSIPOP OFFLINE</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
        <input id="input_date_process_ao" type="date" name="date_process_ao" id="floating_date_process_ao" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_date_process_ao" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATA PROCESSED (For signature to AO V/SDS/ASDS)</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_date_posted_fb_mess" type="date" name="date_posted_fb_mess" id="floating_date_posted-fb-mess" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_date_posted-fb-mess" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date Posted in messenger/fb group (For signature of appointee)</label>
    </div>
        
        
        <div class="relative z-0 w-full mb-5 group">
        <input id="input_date_transmitted_to_csc" type="date" name="date_transmitted_to_csc" id="floating_DATE RECEIVED FROM CSC" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_DATE TRANSMITTED TO CSC" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE TRANSMITTED TO CSC</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_date_received_from_csc" type="date" name="date_received_from_csc" id="floating_DATE RECEIVED FROM CSC" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_DATE RECEIVED FROM CSC" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE RECEIVED FROM CSC</label>
    </div>
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
    <select id="select_approved" name="approved" id="floating_approved" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" >
        <option disabled selected>Select</option>
        <option value="Approved">Approved</option>
        <option value="Disapproved">Disapproved</option>
      </select>
      <label for="floating_approved" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">APPROVED / DISAPPROVED</label>
</div>
<div class="relative z-0 w-full mb-5 group">
        <input id="input_processing_days" type="number" name="processing_days" id="floating_processing_days" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_processing_days" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">PROCESSING TIME(DAYS)</label>
    </div>
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
      <input id="input_status" name="status" id="floating_status" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" >
       
      <label for="floating_status" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">STATUS</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
        <input id="input_action_remarks" type="text" name="action_remarks" id="floating_action_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_action_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ACTION / REMARKS</label>
    </div>
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
      <input id="input_final_action" name="final_action" id="floating_final_action" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" >
       
      <label for="floating_final_action" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">FINAL ACTION (FOR DISAPPROVED APPOINTMENT ONLY)</label>
      </div>
    </div>
<!-- for No.33 -->
<h2 class="my-5 text-xl font-bold">For No.33-B AFA </h2>
<div awawawaw  class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" name="vice" id="floating_vice" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_vice" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Vice ( For no.33 AFA Form)</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="position_pub_from" id="floating_position_pub_from" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_position_pub_from" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position Published from</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="position_pub_to" id="floating_position_pub_to" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_position_pub_to" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position Published to</label>
        </div>
        <!-- <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="deliberation_held_on" id="floating_deliberation_held_on" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_deliberation_held_on" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Deliberation Held on</label>
        </div> -->
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" name="placement_committe_chair" id="floating_placement_committe_chair" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_placement_committe_chair" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Chairperson, HRMPSB/Placement Committee</label>
        </div>
   
</div>
  <!-- for checklist -->

  <h2 class="my-5 text-xl font-bold">For Appointment Processing Checklist</h2>
    <div id="appointmentDataForm3" class="grid md:grid-cols-2 md:gap-6">
        
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="education" id="floating_education" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_education" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Education</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="education_remarks" id="floating_education_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_education_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Education Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="daily_compensation" id="floating_daily_compensation" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_daily_compensation" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Daily Compensation Rate</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="experience" id="floating_experience" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_experience" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Experience</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="training" id="floating_training" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_training" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Training</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="eligibility_remarks" id="floating_eligibility_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_eligibility_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Eligibility Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="senior_high_remarks" id="floating_senior_high_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_senior_high_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Senior HS - Track/Strand Subjects (for DepEd appointments) Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="prov_appt_remarks" id="floating_prov_appt_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_prov_appt_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Provisional Appointment Notation for DepEd Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="nature_appt_remarks" id="floating_nature_appt_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_nature_appt_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nature of Appointment Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="date_signing_remarks" id="floating_date_signing_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_date_signing_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date of Signing Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="cert_vacabt_pos_remarks" id="floating_cert_vacabt_pos_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_cert_vacabt_pos_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cetification of Publication/Posting of VACANT Position Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
    <label for="floating_performace_rating_radio" >Performance Rating in the last period(Promotion or Transfer)</label>
        <div class="w-full flex justify-start items-center p-2 gap-2">    
    <input id="cForm" type="radio" checked  name="performace_rating_radio" id="floating_performace_rating_radio"  value="Yes" >
        Yes
        <input id="cForm" type="radio" checked  name="performace_rating_radio" id="floating_performace_rating_radio"  value="No" >
        No
      </div>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="performace_rating_remarks" id="floating_performace_rating_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_performace_rating_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Performance Rating in the last period(Promotion or Transfer) Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
    <label for="floating_justification_radio" >Justification(if the promotion is more than 3 SG)</label>
    <div class="w-full flex justify-start items-center p-2 gap-2">    
        <input id="cForm" type="radio" checked  name="justification_radio" id="floating_justification_radio"  value="Yes" >
        Yes
        <input id="cForm" type="radio" checked  name="justification_radio" id="floating_justification_radio"  value="No" >
        No
      </div>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="justification_remarks" id="floating_justification_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_justification_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Justification(if the promotion is more than 3 SG) Remarks</label>
    </div>
    </div>
    
    <div class="w-full items-center flex flex-wrap sm:justify-end justify-center gap-3 ">
     <button type="button" data-modal-hide="editpopup-modal" class="text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-times"></i> Cancel</button>
    <button type="submit"  class="text-white bg-green-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-check"></i> Save Changes</button>
     </div>
  </form>
  </div>
  @endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to fetch appointment data
        function fetchAppointmentData(appointmentId) {
            $.ajax({
                url: '/get-appointment-data/' + appointmentId, 
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    
                    $('#appointmentDataForm #Input_lname').val(response.lname);
                    $('#appointmentDataForm #input_fname').val(response.fname);
                    $('#appointmentDataForm #input_mname').val(response.mname);
                    $('#appointmentDataForm #input_extname').val(response.extname);
                    $('#appointmentDataForm #input_postitle').val(response.postitle);
                    $('#appointmentDataForm #input_frompos').val(response.frompos);

                    $('#appointmentDataForm #input_topos').val(response.topos);
                    $('#appointmentDataForm #select_salary_rate').val(response.salary_rate);
                    $('#appointmentDataForm #select_salary_increment').val(response.salary_increment);
                    $('#appointmentDataForm #input_salary_monthly').val(response.salary_monthly);
                    $('#appointmentDataForm #select_appointment_status').val(response.appointment_status);
                    $('#appointmentDataForm #input_office_department').val(response.office_department_unit);

                    $('#appointmentDataForm #input_compensation_rate_words').val(response.compensation_rate_words);
                    $('#appointmentDataForm #input_compensation_rate_num').val(response.compensation_rate_num);
                    $('#appointmentDataForm #select_appointment_nature').val(response.appointment_nature);
                    $('#appointmentDataForm #select_reason_title').val(response.reason_title);
                    $('#appointmentDataForm #input_plantilla_item_number').val(response.plantilla_item_number);

                    $('#appointmentDataForm #input_plantilla_page_number').val(response.plantilla_page_number);
                    $('#appointmentDataForm #select_sector').val(response.sector);
                    $('#appointmentDataForm #select_name_agency').val(response.name_agency);
                    $('#appointmentDataForm #input_odc_number').val(response.odc_number);
                    $('#appointmentDataForm #input_date_received_records_unit').val(response.date_received_records_unit);
                    $('#appointmentDataForm #input_date_received_hr_unit').val(response.date_received_hr_unit);

                    $('#appointmentDataForm #input_school_district').val(response.school_district);
                    $('#appointmentDataForm #input_name_incumbent').val(response.name_incumbent);
                    $('#appointmentDataForm #select_floating_sex').val(response.sex);
                    $('#appointmentDataForm #input_date_of_birth').val(response.date_of_birth);
                    $('#appointmentDataForm #input_tin_number').val(response.tin_number);
                    $('#appointmentDataForm #input_date_original_appointment').val(response.date_original_appointment);

                    $('#appointmentDataForm #input_date_last_promotion').val(response.date_last_promotion);
                    $('#appointmentDataForm #input_date_original_appointment').val(response.date_original_appointment);
                    $('#appointmentDataForm #select_eligibility').val(response.eligibility);
                    $('#appointmentDataForm #input_date_validity_eligibility').val(response.date_validity_eligibility);
                    $('#appointmentDataForm #select_first_time_use_eligibility').val(response.first_time_use_eligibility);

                    $('#appointmentDataForm #select_position_level').val(response.position_level);
                    $('#appointmentDataForm #input_status_of_appointment').val(response.status_of_appointment);
                    $('#appointmentDataForm #select_pwd').val(response.pwd);
                    $('#appointmentDataForm #input_type_of_disability').val(response.type_of_disability);
                    $('#appointmentDataForm #input_member_of_ip_group').val(response.member_of_ip_group);
                    $('#appointmentDataForm #select_ethnicity').val(response.ethnicity);
                    $('#appointmentDataForm #input_name_previous_incumbent').val(response.name_previous_incumbent);

                    $('#appointmentDataForm #input_date_updating_psiop_online').val(response.date_updating_psiop_online);
                    $('#appointmentDataForm #input_date_updating_psiop_offline').val(response.date_updating_psiop_offline);
                    $('#appointmentDataForm #input_deliberation').val(response.deliberation_held_on);
                    $('#appointmentDataForm #input_date_process_ao').val(response.date_process_ao);
                    $('#appointmentDataForm #input_date_posted_fb_mess').val(response.date_posted_fb_mess);
                    $('#appointmentDataForm #input_date_transmitted_to_csc').val(response.date_transmitted_to_csc);
                    $('#appointmentDataForm #input_date_received_from_csc').val(response.date_received_from_csc);
                    $('#appointmentDataForm #select_approved').val(response.approved);
                    $('#appointmentDataForm #input_processing_days').val(response.processing_days);
                    $('#appointmentDataForm #input_status').val(response.status);
                    $('#appointmentDataForm #input_action_remarks').val(response.action_remarks);
                    $('#appointmentDataForm #input_final_action').val(response.final_action);


                    $('#appointmentDataForm #input_vice').val(response.vice);
                    $('#appointmentDataForm #input_position_pub_from').val(response.position_pub_from);
                    $('#appointmentDataForm #input_position_pub_to').val(response.position_pub_to);
                    $('#appointmentDataForm #input_deliberation').val(response.deliberation_held_on);
                    $('#appointmentDataForm #input_placement_committe_chair').val(response.placement_committe_chair);

                    $('#appointmentDataForm #input_education').val(response.education);
                    $('#appointmentDataForm #input_education_remarks').val(response.education_remarks);
                    $('#appointmentDataForm #input_daily_compensation').val(response.daily_compensation);
                    $('#appointmentDataForm #input_experience').val(response.experience);
                    $('#appointmentDataForm #input_training').val(response.training);
                    $('#appointmentDataForm #input_eligibility_remarks').val(response.eligibility_remarks);
                    $('#appointmentDataForm #input_prov_appt_remarks').val(response.prov_appt_remarks);
                    $('#appointmentDataForm #input_nature_appt_remarks').val(response.nature_appt_remarks);
                    $('#appointmentDataForm #input_date_signing_remarks').val(response.date_signing_remarks);
                    $('#appointmentDataForm #input_cert_vacabt_pos_remarks').val(response.cert_vacabt_pos_remarks);
                    $('#appointmentDataForm #input_performace_rating_remarks').val(response.performace_rating_remarks);
                    $('#appointmentDataForm #input_justification_remarks').val(response.justification_remarks);



                    if(response.performace_rating_radio === "Yes"){
                        $('#appointmentDataForm #check_performace_rating_radio_yes').val(response.performace_rating_radio);
                        console.log(response.performace_rating_radio)
                    }
                    
                    else if(response.performace_rating_radio === "No"){
                        $('#appointmentDataForm #check_performace_rating_radio_no').val(response.performace_rating_radio);
                        console.log(response.performace_rating_radio)
                    }



                    if(response.justification_radio === "Yes"){
                        $('#appointmentDataForm #check_justification_radio_yes').val(response.justification_radio);
                        console.log(response.justification_radio)
                    }
                    
                    else if(response.justification_radio === "No"){
                        $('#appointmentDataForm #check_justification_radio_no').val(response.justification_radio);
                        console.log(response.justification_radio)
                    }
                    

                    
                    
                    //                                         
                   
                    
                },
                
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Error fetching appointment data.');
                }
            });
        }
        
        // Event listener for clicking the edit button
        $('[data-modal-toggle="editpopup-modal"]').click(function() {
            var appointmentId = $(this).data('form-id');
            fetchAppointmentData(appointmentId);
        });
    });
</script>


<!-- <script>
    window.addEventListener('DOMContentLoaded', ()=>{


        






        const inputs = document.getElementById('input_odc_number')
        const inputs2 = document.getElementById('appointmentDataForm2')
        const inputs3 = document.getElementById('appointmentDataForm3')
      
      
        let arr =[]

        for (let index = 0; index < inputs.children.length; index++) {
           inputs.children[index].children[0].value =""

        }
        for (let index = 0; index < inputs2.children.length; index++) {
           arr.push(inputs2.children[index].children[0].name)
        }
        for (let index = 0; index < inputs3.children.length; index++) {
           arr.push(inputs3.children[index].children[0].name)
        }
        
        

        // const tbody = document.getElementById ('tbody')
       
       



        let newarr =[
     ];
        // $(document).ready(function() {
        // // Function to fetch appointment data
        // function fetchAppointmentData(appointmentId) {
        //     $.ajax({
        //         url: '/get-appointment-data/' + appointmentId, 
        //         type: 'GET',
        //         dataType: 'json',
        //         success: function(response) {
                 

        //             c
                   
        //                  for(let key in response){
        //                     newarr.push(key)
                            
        //                 }
                       

        //                 for (let index = 0; index < inputs.children.length; index++) {
        //                         inputs.children[index].children[0].value = response[newarr[i]]
        //                 }
        
        //         },
                
        //         error: function(xhr, status, error) {
        //             console.error(xhr.responseText);
        //             alert('Error fetching appointment data.');
        //         }
            // });
        // }
        
        // Event listener for clicking the edit button
    //     $('[data-modal-toggle="editpopup-modal"]').click(function() {
    //         var appointmentId = $(this).data('form-id');
    //         fetchAppointmentData(appointmentId);








    //         })
        
    // })
    })
 --></script>


<!-- AJAX TO FETCH THE DATA WHEN CHECK -->
{{-- <script>
$(document).ready(function() {
    // Disable the fetch button initially
    $('#fetchDataButton').prop('disabled', false);

    // Function to update links with selected form IDs
    function updateLinks(selectedFormIds) {
        // Update links with selected form IDs here
    }

    // Checkbox for selecting all items
    $('#selectAllForms').change(function() {
        $('.form-checkbox').prop('checked', $(this).prop('checked'));
        updateLinks(getSelectedFormIds());
        updateSelectedIdsInputs();
        // Enable or disable the fetch button based on checkbox state
        $('#fetchDataButton').prop('disabled', !$(this).prop('checked') && $('.form-checkbox:checked').length === 0);
    });

    // Checkbox change event
    $('.form-checkbox').change(function() {
        updateLinks(getSelectedFormIds());
        // Update selectedIds input value whenever checkbox changes
        updateSelectedIdsInputs();
        // Enable or disable the fetch button based on checkbox state
        $('#fetchDataButton').prop('disabled', $('.form-checkbox:checked').length === 0);
    });
    
    // Function to get selected form IDs
    function getSelectedFormIds() {
        var selectedFormIds = [];
        $('.form-checkbox:checked').each(function() {
            selectedFormIds.push($(this).val());
        });
        return selectedFormIds;
    }

    // Function to update the selectedIds input values
    function updateSelectedIdsInputs() {
        var selectedFormIds = getSelectedFormIds();
        $('.selectedIdsInput').val(selectedFormIds.join(','));
    }

    // Click event for fetching data
    $('#fetchDataButton').click(function() {
        var selectedFormIds = getSelectedFormIds();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/fetch-data-check',
            type: 'POST',
            data: {
                _token: csrfToken, 
                selectedFormIds: selectedFormIds
            },
            dataType: 'json',
            success: function(response) {
                // Update links with selected form IDs after successful fetch
                updateLinks(selectedFormIds);
                 // Update the count of fetched data
             $('#fetchCount').text(response.count + ' ROW DATA FETCHED!');
                // console.log(selectedFormIds)
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });

    // Call the updateSelectedIdsInputs function initially
    updateSelectedIdsInputs();
});
</script> --}}
@endsection
@section('title','Appointment Data Entry')