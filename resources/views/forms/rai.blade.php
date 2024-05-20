@extends('layouts.app')
@section('content')

 <section class="bg-white w-full h-full dark:bg-gray-900">

<div class="py-10 px-5 mx-auto flex flex-col justify-center items-centerw-[100%] shadow-[0px_0px_17px_-1px_rgba(120,120,120,1)] border border-gray-300 rounded-[16px] ">
    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Report on Appointments Issued (RAI) </h2>

<div class="flex flex-col w-full justify-between items-center gap-2 ">
<form class="w-full h-full flex" action="{{ route('search.rai') }}" method="GET">
    @csrf  
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative w-full h-full grow">
        <div class="absolute inset-y-0 start-0 w-full flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" name="query" id="default-search" class="block w-full h-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" title="Search ..."placeholder="Search..." />
        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
</form>
<div class="flex w-[100%] h-full items-center justify-center gap-3">


<a href="{{ route('export.rai') }}" class="w-full h-full flex justify-end items-center"> <button type="button"  class="h-full w-full text-white bg-green-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
<i class="fa-solid fa-file-export"></i> Export Table as CSV</button></a>
<a href="{{ route('download.file', ['filename' => 'CSC Form_Report on Appointment Issued_Blank.xls']) }}" class="w-full h-full flex justify-end items-center"> <button type="button"  class="h-full w-full text-white bg-gray-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
    <i class="fas fa-download"></i>  Download R A I (Blank)</button></a>

        <a href="#"  data-modal-target="add-rai-modal" data-modal-toggle="add-rai-modal" class="w-full h-full flex justify-end items-center"> <button type="button"  class="h-full w-full text-white bg-blue-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
            <i class="fas fa-pencil"></i> <i class="fas fa-plus"></i>  Add Form</button></a>
        <a href="#"  data-modal-target="trash-transmittal-modal" data-modal-toggle="trash-transmittal-modal" class="w-full h-full flex justify-end items-center"> <button type="button"  class="h-full w-full text-white bg-slate-950 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
            <i class="fas fa-times"></i> <i class="fas fa-trash"></i> Trash</button></a>
</div>
</div>

<div class="w-full overflow-auto h-full">
  <table class="text-sm text-center text-gray-500 dark:text-gray-400 w-full">
      <thead class="text-xs w-full text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      @if($query) 
            <tr>
                <th colspan="" class="px-6 py-3 text-3lg">
                   <td> <h2 class="font-bold text-gray ">Searched: {{ $query }}</h2><td>
                </th>
            </tr>
            @endif
            @if ($hasResults)    
      <tr>
              <th scope="col" class="px-6 py-3">#</th>
              <th class="scope" >Transaction Number</th>
              <th class="scope">Date Issued/Effectivity(mm/dd/yyyy)</th>
              <th class="scope">Last Name</th>
              <th class="scope">First Name</th>
              <th class="scope">Name Extension(Jr./III)</th>
              <th class="scope">Middle Name</th>
              <th class="scope">Position Title</th>
              <th class="scope">Item Number</th>
              <th class="scope">Salary/Job/Pay Grade</th>
              <th class="scope">Salary Rate (Monthly)</th>
              <th class="scope">Employment Status</th>
              <th class="scope">PERIOD OF EMPLOYMENT (forTemporary, Casual/Contractual Appointments From</th>
              <th class="scope">PERIOD OF EMPLOYMENT (forTemporary, Casual/Contractual Appointments To</th>
              <th class="scope">Nature of Appointment</th>
              <th class="scope">Publication Date From</th>
              <th class="scope">Publication Date To</th>
              <th class="scope">Publication Mode</th>
              <th class="scope">CSC Action</th>
              <th class="scope">CSC Date of Action</th>
              <th class="scope">CSC Date of Release</th>
              <th class="scope">Agency Receiving Officer</th>
              <th class="scope">Date Created</th>
              <th class="scope">Action</th>
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
          @php
              $startIndex = ($rais->currentPage() - 1) * $rais->perPage() + 1;
          @endphp
          @if($rais->isEmpty())
          <tr>
              <br>
          <td colspan="9"class="px-6 py-4 font-bold">No RAI data available.</td>
          </tr>
           @else
          @foreach ($rais as $index => $rai)
          <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
              <td class="px-6 py-4">{{ $startIndex + $index }}</td>
              <td class="px-6 py-4">{{ $rai->transaction_number }}</td>
              <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($rai->date_issued);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
               <td class="px-6 py-4">{{ $rai->last_name }}</td>
             <td class="px-6 py-4">{{ $rai->first_name }}</td>
             <td class="px-6 py-4">{{ $rai->name_ex }}</td>
             <td class="px-6 py-4">{{ $rai->middle_name }}</td>
             <td class="px-6 py-4">{{ $rai->position_title }}</td>
             <td class="px-6 py-4">{{ $rai->item_number }}</td>
             <td class="px-6 py-4">{{ $rai->salary_grade }}</td>
             <td class="px-6 py-4">{{ $rai->salary_rate_monthly }}</td>
             <td class="px-6 py-4">{{ $rai->employee_status }}</td>
             <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($rai->period_employment_from);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
            <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($rai->period_employment_to);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
             <td class="px-6 py-4">{{ $rai->nature_of_appointment }}</td>
             <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($rai->publication_date_from);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
            <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($rai->publication_date_to);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
             <td class="px-6 py-4">{{ $rai->publication_mode }}</td>
             <td class="px-6 py-4">{{ $rai->is_validated }}</td>
             <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($rai->csc_date_action);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
            <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($rai->csc_date_release);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
             <td class="px-6 py-4">
                @if($rai->agency_receiving_officer)
                    {{ $rai->agency_receiving_officer }}
                @else
                   
                @endif
            </td>
            <td class="px-6 py-4">
                {{ $rai->created_at->format('F d, Y') }} {{-- Month name dd, year --}}
                <br>
                {{ $rai->created_at->format('h:i:s A') }} {{-- 12-hour format time --}}
            </td>            
              <td class="px-3 py-3 flex gap-2">
                    <a href="#" class="font-sm text-blue-600 dark:text-blue-500 hover:underline">
                        <button type="button" data-modal-target="deletepopup-modal" data-form-id="{{ $rai->id }}" data-modal-toggle="deletepopup-modal" class="text-white bg-red-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2 sm:w-auto px-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </a>
                </td>
          </tr>
          @endforeach
          @endif
      </tbody>
  </table>
  {{ $rais->links() }}
</div>
</section>


{{-- DELETE --}}
@if(isset($rai))
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
                <form action="{{route('delete.rai', ['id' => $rai->id]) }}" method="POST">
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
<div id="add-rai-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full">
    <div class="relative w-full max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white w-full h-full rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    REPORT ON APPOINTMENTS ISSUED (RAI) Form    
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-rai-modal">
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
      <form  class="mx-auto w-full" method="POST" action="{{ route('rai.store') }}">
      @csrf
      
      <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
        <input id="cForm" type="date" name="date_issued" id="floating_appointee" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
        <label for="floating_appointee" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE ISSUED/EFFECTIVITY</label>
  </div>
      <!-- Group -->
      <div class="grid md:grid-cols-2 md:gap-6">
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="last_name" id="floating_sector" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last Name</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First Name</label>
      </div>
    </div>
  
    <!-- Group -->
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" name="name_ex" id="floating_name_ex" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
            <label for="floating_name_ex" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NAME EXTENSION(JR./III)</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" name="middle_name" id="floating_middle_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_middle_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Middle Name</label>
        </div>
      </div>
    
       <!-- Group -->
       <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" name="position_title" id="floating_position_title" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_position_title" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position Title</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" name="item_number" id="floating_item_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_item_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Item Number</label>
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
            <input id="cForm" type="text" name="salary_rate_monthly" id="floating_salary_rate_monthly" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_salary_rate_monthly" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Salary Rate (Monthly)</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" name="employee_status" id="floating_employee_status" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_employee_status" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Employee Status</label>
        </div>
      </div>

       <!-- Group -->
     <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="period_employment_from" id="floating_period_employment_from" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_period_employment_from" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">PERIOD OF EMPLOYMENT (forTemporary, Casual/Contractual Appointments) FROM</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="period_employment_to" id="floating_period_employment_to" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_period_employment_to" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">PERIOD OF EMPLOYMENT (forTemporary, Casual/Contractual Appointments) TO</label>
        </div>
      </div>

    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
        <input id="cForm" type="text" name="nature_of_appointment" id="floating_nature_of_appointment" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
        <label for="floating_nature_of_appointment" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nature of Appoinment </label>
    </div>

      <!-- Group -->
      <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="publication_date_from" id="floating_publication_date_from" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_publication_date_from" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE Indicate period of Publication FROM</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="publication_date_to" id="floating_publication_date_to" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_publication_date_to" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE Indicate period of Publication TO</label>
        </div>
      </div>

    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text" name="publication_mode" id="floating_publication_mode" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=""  />
        <label for="floating_publication_mode" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">MODE(CSC Bulletin ofVacant Positions,Agency Website,Newspaper, etc)</label>
    </div>

    <!-- Group -->
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <select  name="is_validated" id="floating_is_validated" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                <option selected disabled>Select</option>
                <option value="V">V-Validated</option>
                <option value="INV">INV-Invalidate</option>
                <option value="N">N-Noted</option>
            </select>
            <label for="floating_is_validated" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">CSC ACTION (V-Validated INV-Invalidated N-Noted)</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="csc_date_action" id="floating_csc_date_action" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
            <label for="floating_csc_date_action" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">CSC Date of Action</label>
        </div>
      </div>

      <!-- Group -->
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date"  name="csc_date_release" id="floating_csc_date_release" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_csc_date_release" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">CSC Date of Release</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" name="agency_receiving_officer" id="floating_agency_receiving_officer" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
            <label for="floating_agency_receiving_officer" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Agency Receiving Officer</label>
        </div>
      </div>



    <div class="w-full items-center flex flex-wrap sm:justify-end justify-center gap-3 ">
     <button type="button" data-modal-hide="add-rai-modal"  class="text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-times"></i> Cancel</button>
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
                    Trashed RAI
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-rai-modal">
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
                                <th class="scope">Date Issued/Effectivity(mm/dd/yyyy)</th>
                                <th class="scope">Last Name</th>
                                <th class="scope">First Name</th>
                                <th class="scope">Name Extension(Jr./III)</th>
                                <th class="scope">Middle Name</th>
                                <th class="scope">Position Title</th>
                                <th class="scope">Item Number</th>
                                <th class="scope">Salary/Job/Pay Grade</th>
                                <th class="scope">Salary Rate (Monthly)</th>
                                <th class="scope">Employment Status</th>
                                <th class="scope">PERIOD OF EMPLOYMENT (forTemporary, Casual/Contractual Appointments From</th>
                                <th class="scope">PERIOD OF EMPLOYMENT (forTemporary, Casual/Contractual Appointments To</th>
                                <th class="scope">Nature of Appointment</th>
                                <th class="scope">Publication Date From</th>
                                <th class="scope">Publication Date To</th>
                                <th class="scope">Publication Mode</th>
                                <th class="scope">CSC Action</th>
                                <th class="scope">CSC Date of Action</th>
                                <th class="scope">CSC Date of Release</th>
                                <th class="scope">Agency Receiving Officer</th>
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
              <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($trash->date_issued);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
               <td class="px-6 py-4">{{ $trash->last_name }}</td>
             <td class="px-6 py-4">{{ $trash->first_name }}</td>
             <td class="px-6 py-4">{{ $trash->name_ex }}</td>
             <td class="px-6 py-4">{{ $trash->middle_name }}</td>
             <td class="px-6 py-4">{{ $trash->position_title }}</td>
             <td class="px-6 py-4">{{ $trash->item_number }}</td>
             <td class="px-6 py-4">{{ $trash->salary_grade }}</td>
             <td class="px-6 py-4">{{ $trash->salary_rate_monthly }}</td>
             <td class="px-6 py-4">{{ $trash->employee_status }}</td>
             <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($trash->period_employment_from);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
            <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($trash->period_employment_to);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
             <td class="px-6 py-4">{{ $trash->nature_of_appointment }}</td>
             <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($trash->publication_date_from);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
            <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($trash->publication_date_to);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
             <td class="px-6 py-4">{{ $trash->publication_mode }}</td>
             <td class="px-6 py-4">{{ $trash->is_validated }}</td>
             <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($trash->csc_date_action);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
            <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($trash->csc_date_release);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
             <td class="px-6 py-4">
                @if($trash->agency_receiving_officer)
                    {{ $trash->agency_receiving_officer }}
                @else
                   
                @endif
            </td>
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
                <form action="{{route('rai.restore', ['id' => $trash->id]) }}" method="POST">
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
                <form action="{{route('rai.delete-permanently', ['id' => $trash->id]) }}" method="POST">
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



@endsection
@section('title', 'RAI Form')