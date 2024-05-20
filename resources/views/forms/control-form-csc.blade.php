@extends('layouts.app')
@section('content')



<section class="bg-white w-full h-full dark:bg-gray-900">

  <div class="py-10 px-5 mx-auto flex flex-col space-y-3 justify-center items-center w-[100%] shadow-[0px_0px_17px_-1px_rgba(120,120,120,1)] border border-gray-300 rounded-[16px]">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Control Form (CSC FO Cavite) (Blank)</h2>
  
<div class="flex flex-col w-full h-full justify-between items-center gap-3">
<form class="w-[100%] h-full flex" action="{{ route('csc-table.search')}}" method="GET">
    @csrf  
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative w-full h-full grow">
        <div class="absolute inset-y-0 start-0 w-full flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" name="query" id="default-search" class="block w-full h-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" title="Search Name of Appointee..."placeholder="@if($query){{ $query }}@else Search Name of Appointee, Salary Grade, Employment Status, Type of Eligiblity use....@endif" />
        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
</form>

  
  <div class="flex w-[100%] h-full items-center justify-center gap-3">
     <div  class="w-full h-full flex justify-end items-center bg-blue-800 rounded-lg">
          <button data-modal-target="extralarge-modal" data-modal-toggle="extralarge-modal"  class=" flex  items-center justify-center gap-2 h-full w-full text-white bg-blue--800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-nowrap" type="button"><div class="flex "><i class="fas fa-pencil"></i> <i class="fas fa-plus"></i> </div>
            <p>Add form</p> 
      </button>
      </div>
      <a href="{{ route('preview-csc-control') }}" class="w-full h-full flex justify-end items-center"> <button type="button"  class="h-full gap-2 flex justify-center items-center  w-full space-x-1 text-white bg-green-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <i class="fas fa-eye"></i>Preview</button></a>
      <a href="{{ route('download.control-csc-form') }}" class="w-full h-full flex justify-end items-center"><button type="button"  class="h-full w-full flex gap-2 justify-center items-center text-white bg-gray-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> <i class="fa-solid fa-file-export"></i> Export(CSV)</button></a> 
  
  <a href="{{ route('download.file', ['filename' => 'Control (CSC FO Cavite)_Blank.xlsx']) }}" class="w-full h-full flex justify-end items-center"> <button type="button"  class="h-full w-full text-white bg-gray-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-nowrap">
    <i class="fas fa-download"></i>  Download Control CSC FO Cavite (Blank)</button></a>
    <a href="#"  data-modal-target="trash-transmittal-modal" data-modal-toggle="trash-transmittal-modal" class="w-full h-full flex justify-end items-center"> <button type="button"   class="h-full w-full text-white bg-slate-950 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <i class="fas fa-times"></i> <i class="fas fa-trash"></i> Trash</button></a>
    </div>
</div>
      
<div class="w-full h-full overflow-auto">
    <table class="text-sm w-full h-full text-center text-gray-500 dark:text-gray-400">
        <thead class="text-xs w-full text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            {{-- @if($query) 
            <tr>
                <th colspan="" class="px-6 py-3 text-3lg">
                   <td> <h2 class="font-bold text-gray ">Searched: {{ $query }}</h2><td>
                </th>
            </tr>
            @endif --}}
            @if ($hasResults)
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Transaction Number</th>
                <th scope="col" class="px-6 py-3">Sector</th>
                <th scope="col" class="px-6 py-3">Name of Agency</th>
                <th scope="col" class="px-6 py-3">Name of Appointee</th>
                <th scope="col" class="px-6 py-3">Salary Grade</th>
                <th scope="col" class="px-6 py-3">Position Title</th>
                <th scope="col" class="px-6 py-3">Position Level</th>
                <th scope="col" class="px-6 py-3">Employee Status</th>
                <th scope="col" class="px-6 py-3">Nature of Appointment</th>
                <th scope="col" class="px-6 py-3">Inclusive Date of Casual or Contractual Appointment From</th>
                <th scope="col" class="px-6 py-3">Inclusive Date of Casual or Contractual Appointment To</th>
                <th scope="col" class="px-6 py-3">Name of Appointing Authority</th>
                <th scope="col" class="px-6 py-3">Date of Issuance of Appointment</th>
                <th scope="col" class="px-6 py-3">Date of Birth</th>
                <th scope="col" class="px-6 py-3">Sex</th>
                <th scope="col" class="px-6 py-3">PWD?</th>
                <th scope="col" class="px-6 py-3">Type of Disability</th>
                <th scope="col" class="px-6 py-3">Member of IP Group</th>
                <th scope="col" class="px-6 py-3">Ethinicity</th>
                <th scope="col" class="px-6 py-3">Type of Eligibility Use</th>
                <th scope="col" class="px-6 py-3">Date of Effectivity of Eligibility</th>
                <th scope="col" class="px-6 py-3">First time used of Eligibility</th>
                <th scope="col" colspan="2">Actions</th>
            </tr>
            @else
            <tr>
                <th colspan="22" class="px-6 py-3">
                    <p class="font-bold text-gray">No result found.</p>
                </th>
            </tr>
            @endif
        </thead>
        <tbody>
            @if($forms->isEmpty())
            <tr>
                <br>
            <td colspan="9"class="px-6 py-4 font-bold">No  data available.</td>
            </tr>
             @else
            @php
                $startIndex = ($forms->currentPage() - 1) * $forms->perPage() + 1;
            @endphp
            @foreach ($forms as $index => $form)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td class="px-6 py-4">{{ $startIndex + $index }}</td>
                <td class="px-6 py-4">{{ $form->transaction_number }}</td>
                <td class="px-6 py-4">{{ $form->sector }}</td>
                <td class="px-6 py-4">{{ $form->agency_name }}</td>
                <td class="px-6 py-4">{{ $form->appointee_name }}</td>
                <td class="px-6 py-4">{{ $form->salary_grade }}</td>
                <td class="px-6 py-4">{{ $form->position_title }}</td>
                <td class="px-6 py-4">{{ $form->position_level }}</td>
                <td class="px-6 py-4">{{ $form->employment_status }}</td>
                <td class="px-6 py-4">{{ $form->appointment_nature }}</td>
                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($form->casual_appointment_date_from)->format('F j, Y') }}</td>
                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($form->casual_appointment_date_to)->format('F j, Y') }}</td>
                <td class="px-6 py-4">{{ $form->appointment_authority_name }}</td>
                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($form->appointment_issuance_date)->format('F j, Y') }}</td>  
                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($form->date_of_birth)->format('F j, Y') }}</td>                
                <td class="px-6 py-4">{{ $form->sex }}</td>
                <td class="px-6 py-4">{{ $form->is_PWD }}</td>
                <td class="px-6 py-4">{{ $form->disability_type }}</td>
                <td class="px-6 py-4">{{ $form->ip_group_member }}</td>
                <td class="px-6 py-4">{{ $form->ethnicity }}</td>
                <td class="px-6 py-4">{{ $form->eligbility_use_type }}</td>
                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($form->eligibility_effectivity_date)->format('F j, Y') }}</td>
                <td class="px-6 py-4">{{ $form->is_First_used_eligiblity }}</td>
                <td class="px-3 py-3 flex gap-2">
                  
                    <a href="#" class="font-sm text-blue-600 dark:text-blue-500 hover:underline">
                        <button type="button" data-modal-target="deletepopup-modal" data-form-id="{{ $form->id }}" data-modal-toggle="deletepopup-modal" class="text-white bg-red-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2 sm:w-auto px-2 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    {{ $forms->links() }}
</div>

</section>




<!-- Table Modal -->
<div id="extralarge-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full">
    <div class="relative w-full max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white w-full h-full rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    CSC Control Form Fillup Table
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="extralarge-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
             
<section class="bg-white w-full h-full dark:bg-gray-900">
  <div class="py-10 px-5 mx-auto  w-[100%] shadow-[0px_0px_17px_-1px_rgba(120,120,120,1)] border border-gray-300 rounded-[16px]">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Control Form (CSC FO Cavite) (Blank)</h2>
<form  class="mx-auto w-full" method="POST" action="{{ route('store.control-csc-form') }}">
    @csrf
    <!-- Group -->
    <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
        <select id="cForm" type="text" name="sector" id="floating_Sector" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
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
  </div>

  <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
      <input id="cForm" type="text" name="name_appointee" id="floating_appointee" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
      <label for="floating_appointee" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name of Appointee </label>

      <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-700 transition-opacity duration-300 rounded-lg shadow-lg border border-gray-300 backdrop-blur-lg bg-white/30  tooltip dark:bg-gray-700 ">
  (Last Name, First Name, Ext Name, Middle Name )
    <div class="tooltip-arrow" data-popper-arrow></div>
</div>
  </div>
  <!-- <div class="relative z-0 w-full mb-5 group">
      <input type="text" name="floating_position-title" id="floating_position-title" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="floating_position-title" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Salary/Job/Pay Grade</label>
  </div> -->
   <!-- Group -->
   <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
        <select id="cForm" type="text" name="position_level" id="floating_position_level" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
            <option selected disabled>Select Position Level</option>
            <option value="1st">1st</option>
            <option value="2nd">2nd</option>
            <option value="3rd">3rd</option>
            </select>
            <label for="floating_position_level" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position Level</label>
    </div>
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
      <input id="cForm" type="text" name="position_title" id="floating_appointee" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
      <label for="floating_appointee" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position Title </label>
        </div>
  </div>

  <div class="relative z-0 w-full mb-5 group">
    <select id="cForm" type="text" name="salary_grade" id="floating_salary" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
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
     <!-- Group -->
   <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
        <select id="cForm" type="text" name="employment_status" id="floating_employee_status" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
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
        <label for="floating_employee_status" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Employee Status</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <select id="cForm" type="text" name="appointment_nature" id="floating_appointment_nature" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
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
  </div>
   <!-- Group -->
   <div class="relative z-0 w-full mb-5 group">
      <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-base text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Inclusive Date  of Casual or Contractual Appointment</label>
  </div>
   <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="date" name="inclusive_from" id="floating_inclusive_from" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_inclusive_from" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">From</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="date" name="inclusive_to" id="floating_inclusive_to" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_inclusive_to" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">To</label>
    </div>
  </div>

  <div class="relative z-0 w-full mb-5 group">
      <select id="cForm" type="text" name="appointing_authority_name" id="floating_appointing_authority_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
      <option selected disabled>Select Name of Appointing Authority</option>
      <option value="Lorem Ipsum">Lorem Ipsum</option>
      <option value="Lorem Ipsum">Lorem Ipsum</option>
      <option value="Lorem Ipsum">Lorem Ipsum</option>
      <option value="Lorem Ipsum">Lorem Ipsum</option>
     </select>
      <label for="floating_appointing_authority_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name of Appointing Authority</label>
  </div>
   <!-- Group -->
   <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="date" name="issuance_date" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="cForm" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date of Issuance of Appointment</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="date" name="dob" id="floating_dob" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_dob" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date of Birth</label>
    </div>
  </div>

  <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
        <select name="sex" id="cForm" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
          <option disabled selected>Select Sex</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Others">Others</option>
          <option value="N/A">Prefer not to Say</option>
        </select>
        <label for="floating_sex" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Sex</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <select name="isPWD" id="pwdform" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
          <option value="YES" >Yes</option>
          <option value="NO" selected>No</option>
        </select>
        <label for="pwdform" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">PWD?</label>
    </div>
  </div>
  <!-- IF PWD IS YES IT WILL SHOW -->
  <div id="pwdType" class="relative z-0 w-full mb-5 group hidden transition-all ease duration-700">
      <input type="text" name="disability-type" id="cForm" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
      <label for="floating_type_disability" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Type of Disability</label>
  </div>
   <!-- Group -->
   <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="ip_group" id="cForm" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
        <label for="floating_ip_group" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Member of IP Group</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <select type="text" name="ethnicity" id="cForm" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
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
        <label for="floating_ethnicity" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ethinicity</label>
    </div>
  </div>

  <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
        <select type="text" name="use_eligibility" id="cForm" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
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
        <label for="floating_eligibity_use" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Type of Eligibity Used</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input type="date" name="eligibility_effectivity_date" id="cForm" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_eligibility_effectivity_date" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date of Effectivity of Eligibility</label>
    </div>
  </div>
  <div class="relative z-0 w-full mb-5 group">
       <select name="eligibility_use_first" id="cForm"class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
          <option value="YES" >Yes</option>
          <option value="NO" selected>No</option>
        </select>
      <label for="floating_eligibility_use_first" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First Time used of Eligibility?</label>
  </div>
  <div class="w-full items-center flex flex-wrap sm:justify-end justify-center gap-3 ">
  <button type="button" data-modal-hide="extralarge-modal" class="text-white bg-black hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-times"></i> Close</button>
    <button type="button" id="dButton" class="text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-trash"></i> Reset All Fields</button>
  <button type="submit"  class="text-white bg-green-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-check"></i> Submit Form</button>
   </div>
</form>
  </div>
</section>

            </div>
        </div>
    </div>
</div>
{{-- DELETE --}}
@if(isset($form))
<div id="deletepopup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="deletepopup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <form action="{{ route('delete.csc-form', ['id' => $form->id])}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this row?</h3>
                    <button data-modal-hide="deletepopup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                
                    <button  type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif


{{-- DELETE --}}
@if(isset($transmittal))
<div id="deletepopup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="deletepopup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <form action="{{route('delete.transmittal', ['id' => $transmittal->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this row?</h3>
                    <button data-modal-hide="deletepopup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                
                    <button  type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

  


<!-- Table Modal -->
<div id="add-transmittal-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full">
    <div class="relative w-full max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white w-full h-full rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
               Control Form (CSC FO Cavite)
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
             
<!-- <section class="bg-white w-full h-full dark:bg-gray-900">
  <div class="py-10 px-5 mx-auto  w-[100%] shadow-[0px_0px_17px_-1px_rgba(120,120,120,1)] border border-gray-300 rounded-[16px]"> -->
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white"></h2>
      <form  class="mx-auto w-full" method="POST" action="{{ route('store.transmittal') }}">
      @csrf
      <!-- Group -->
      <div class="grid md:grid-cols-2 md:gap-6">
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="level" id="floating_sector" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_sector" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Level</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="school" id="floating_agency" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_agency" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">School</label>
      </div>
    </div>
  
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
        <input id="cForm" type="text" name="name_of_appointee" id="floating_appointee" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
        <label for="floating_appointee" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name of Appointee </label>
  
        <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-700 transition-opacity duration-300 rounded-lg shadow-lg border border-gray-300 backdrop-blur-lg bg-white/30  tooltip dark:bg-gray-700 ">
    (Last Name, First Name, Ext Name, Middle Name )
      <div class="tooltip-arrow" data-popper-arrow></div>
  </div>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text" name="remark" id="floating_appointing_authority_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=""  />
        <label for="floating_appointing_authority_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Remark</label>
    </div>
    <div class="w-full items-center flex flex-wrap sm:justify-end justify-center gap-3 ">
     <button type="button" id="dButton" class="text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-trash"></i> Reset All Fields</button>
    <button type="submit"  class="text-white bg-green-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-check"></i> Submit Form</button>
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
                    Trashed  Control Form (CSC FO Cavite)
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
                                  <th scope="col" class="px-6 py-3">Transaction Number</th>
                                <th scope="col" class="px-6 py-3">Sector</th>
                                <th scope="col" class="px-6 py-3">Name of Agency</th>
                                <th scope="col" class="px-6 py-3">Name of Appointee</th>
                                <th scope="col" class="px-6 py-3">Salary Grade</th>
                                <th scope="col" class="px-6 py-3">Position Title</th>
                                <th scope="col" class="px-6 py-3">Position Level</th>
                                <th scope="col" class="px-6 py-3">Employee Status</th>
                                <th scope="col" class="px-6 py-3">Nature of Appointment</th>
                                <th scope="col" class="px-6 py-3">Inclusive Date of Casual or Contractual Appointment From</th>
                                <th scope="col" class="px-6 py-3">Inclusive Date of Casual or Contractual Appointment To</th>
                                <th scope="col" class="px-6 py-3">Name of Appointing Authority</th>
                                <th scope="col" class="px-6 py-3">Date of Issuance of Appointment</th>
                                <th scope="col" class="px-6 py-3">Date of Birth</th>
                                <th scope="col" class="px-6 py-3">Sex</th>
                                <th scope="col" class="px-6 py-3">PWD?</th>
                                <th scope="col" class="px-6 py-3">Type of Disability</th>
                                <th scope="col" class="px-6 py-3">Member of IP Group</th>
                                <th scope="col" class="px-6 py-3">Ethinicity</th>
                                <th scope="col" class="px-6 py-3">Type of Eligibility Use</th>
                                <th scope="col" class="px-6 py-3">Date of Effectivity of Eligibility</th>
                                <th scope="col" class="px-6 py-3">First time used of Eligibility</th>
                                <th scope="col" class="px-6 py-3">Date of Delete</th>
                               
                                <th scope="col" colspan="2">Actions</th>
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
                                        <td class="px-6 py-4" >{{ $trash->transaction_number }}</td>
                <td class="px-6 py-4">{{ $trash->sector }}</td>
                <td class="px-6 py-4">{{ $trash->agency_name }}</td>
                <td class="px-6 py-4">{{ $trash->appointee_name }}</td>
                <td class="px-6 py-4">{{ $trash->salary_grade }}</td>
                <td class="px-6 py-4">{{ $trash->position_title }}</td>
                <td class="px-6 py-4">{{ $trash->position_level }}</td>
                <td class="px-6 py-4">{{ $trash->employment_status }}</td>
                <td class="px-6 py-4">{{ $trash->appointment_nature }}</td>
                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($trash->casual_appointment_date_from)->format('F j, Y') }}</td>
                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($trash->casual_appointment_date_to)->format('F j, Y') }}</td>
                <td class="px-6 py-4">{{ $trash->appointment_authority_name }}</td>
                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($trash->appointment_issuance_date)->format('F j, Y') }}</td>  
                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($trash->date_of_birth)->format('F j, Y') }}</td>                
                <td class="px-6 py-4">{{ $trash->sex }}</td>
                <td class="px-6 py-4">{{ $trash->is_PWD }}</td>
                <td class="px-6 py-4">{{ $trash->disability_type }}</td>
                <td class="px-6 py-4">{{ $trash->ip_group_member }}</td>
                <td class="px-6 py-4">{{ $trash->ethnicity }}</td>
                <td class="px-6 py-4">{{ $trash->eligbility_use_type }}</td>
                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($trash->eligibility_effectivity_date)->format('F j, Y') }}</td>
                <td class="px-6 py-4">{{ $trash->is_First_used_eligiblity }}</td>
                                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($trash->deleted_at)->format('F d, Y H:i:s') }} ({{ \Carbon\Carbon::parse($trash->deleted_at)->diffForHumans() }})</td>
               
                                        <td class="px-3 py-3 justify-center items-center flex w-full h-full gap-2">
                                            <a href="#" class="font-sm text-blue-600 dark:text-blue-500 hover:underline w-full h-full">
                                                <button type="button" class="text-white bg-sky-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full -full px-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-modal-target="restore-modal" data-form-id="{{  $trash->id }}" data-modal-toggle="restore-modal" >
                                                    <i class="fas fa-return"></i>Restore
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
                <form action="{{route('csc-control.restore', ['id' => $trash->id]) }}" method="POST">
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
                <form action="{{route('csc-control.delete-permanently', ['id' => $trash->id]) }}" method="POST">
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



<script type="module" src="{{asset('js/pwdForm.js')}}"></script>
@endsection
@section('title', 'Control Form (CSC FO Cavite) (Blank)')