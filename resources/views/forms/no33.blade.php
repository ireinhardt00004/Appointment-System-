@extends('layouts.app')
@section('content')


<section class="bg-white w-full h-full dark:bg-gray-900">

<div class="py-10 px-5 mx-auto flex flex-col justify-center items-center  w-[100%] shadow-[0px_0px_17px_-1px_rgba(120,120,120,1)] border border-gray-300 rounded-[16px] space-y-1">
    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">No. 33B AFA </h2>

<div class="flex flex-col w-full justify-between items-center gap-2">
<form class="w-full" action="{{ route('no.33-table.search') }}" method="GET">
    @csrf  
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative w-full h-full grow">
        <div class="absolute inset-y-0 start-0 w-full flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" name="query" id="default-search" class="block w-full h-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" title="Search..."placeholder="@if($query){{ $query }}@else Search Full Name, Transaction Number, Salary Grade, Status...@endif"
        />
        
        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
</form>
<div class="flex w-[100%] h-full items-center justify-center gap-3">
        <a href="{{ route('download.transmittal-table') }}" class="w-full h-full flex justify-end items-center"> <button type="button" class="h-full w-full text-white bg-green-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
        <i class="fas fa-download"></i> Export Table(CSV)</button></a>
        <a href="{{ route('download.file', ['filename' => 'CS-Form-No.-33-B-Appointment-Form-Accredited_Blank.docx']) }}" class="w-full h-full flex justify-end items-center"> <button type="button" class="h-full w-full text-white bg-gray-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
          <i class="fas fa-download"></i> Download Form(blank)</button></a>
        <a href="#"  data-modal-target="add-transmittal-modal" data-modal-toggle="add-transmittal-modal" class="w-full h-full flex justify-end items-center"> <button type="button" class="h-full w-full text-white text-center bg-blue-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <i class="fas fa-pencil"></i> <i class="fas fa-plus"></i>  Add Form</button></a>
        <a href="#"  data-modal-target="trash-transmittal-modal" data-modal-toggle="trash-transmittal-modal" class="w-full h-full flex justify-end items-center"> <button type="button" class="text-white w-full h-full bg-slate-950 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
            <i class="fas fa-times"></i> <i class="fas fa-trash"></i> Trash</button></a>
</div>
</div>
    
<div class="w-full overflow-x-auto">
  <table class="text-sm text-center text-gray-500 dark:text-gray-400 w-full">
      <thead class="text-xs w-full text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
     @if($forms)
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
              <th colspan="2" class="scope">Transaction Number</th>
              <th class="scope">Full Name</th>
              <th class="scope">Position  Title</th>
              <th class="scope">Salary Grade</th>
              <th class="scope">Status</th>
              <th class="scope">Office/Department/Unit</th>
              <th colspan="2" class="scope">Compensation Rate Per Month</th>
              <th class="scope">Nature of Appointment</th>
              <th class="scope">Vice</th>
              <th class="scope">Plantilla Item Number</th>
              <th class="scope">Plantilla Page Number</th>
              <th class="scope">Selection</th>
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
              $startIndex = ($forms->currentPage() - 1) * $forms->perPage() + 1;
          @endphp
            @if($forms->isEmpty())
            <tr>
                <br>
            <td colspan="9"class="px-6 py-4 font-bold">No  data available.</td>
            </tr>
             @else
          @foreach ($forms as $index => $form)
          <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
            <td class="px-6 py-4">{{ $startIndex + $index }}</td>
            <td colspan="2" class="px-6 py-4">{{ $form->transaction_number }}</td>
             <td class="px-6 py-4">{{ $form->fullname }}</td>
             <td class="px-6 py-4">{{ $form->position_title }}</td>
             <td class="px-6 py-4">{{ $form->salary_grade }}</td>
             <td class="px-6 py-4">{{ $form->status }}</td>
             <td class="px-6 py-4">{{ $form->office_unit_dept}}</td>
              <td colspan="2" class="px-6 py-4">{{ $form->compensation_rate_words }} (₱ {{ number_format($form->compensation_rate_num, 2, '.', '') }}}</td>
              <td class="px-6 py-4">{{ $form->appointment_nature}}</td>
              <td class="px-6 py-4">{{ $form->vice}}</td>
              <td class="px-6 py-4">{{ $form->plantilla_item_number}}</td>
              <td class="px-6 py-4">{{ $form->plantilla_page_number}}</td>
              <td class="px-6 py-4">{{ $form->selection}}</td>
              <td class="px-6 py-4">{{ $form->created_at->format('F d, Y h:i:s A') }}</td>
              <td class="px-3 py-3 justify-center items-center w-full h-full flex gap-2">
                    <a href="{{route('view.no33pdf', ['id' => $form->id]) }}" target="_blank" class="font-sm h-full w-full text-blue-600 dark:text-blue-500 hover:underline">
                        <button type="button" class="text-white bg-green-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <i class="fas fa-eye"></i>View
                        </button>
                    </a>
                    <a href="#" class="font-sm text-blue-600 dark:text-blue-500 h-full w-full hover:underline">
                        <button type="button" data-modal-target="deletepopup-modal" data-form-id="{{ $form->id }}" data-modal-toggle="deletepopup-modal" class="text-white bg-red-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full  px-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </a>
                </td>
          </tr>
          @endforeach
          @endif
      </tbody>
      @else
        <tr>No data available.</tr>
      @endif
  </table>
  {{ $forms->links() }}
</div>
</section>



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
                <form action="{{route('delete.no-33', ['id' => $form->id]) }}" method="POST">
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
                No.33 B AFA Fill up Form
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
      <form  class="mx-auto w-full" method="POST" action="{{ route('store.no33-BAFA-form') }}">
      @csrf
      <!-- Group -->
      <div class="grid md:grid-cols-2 md:gap-6">
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="fullname" id="floating_fullname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_fullname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full Name</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="position_title" id="floating_position_title" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_position_title" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position Title</label>
      </div>
    </div>
  
    <div class="relative z-0 w-full mb-5 group">
    <select id="cForm" type="text" name="salary_grade" id="floating_salary" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer *:text-black" placeholder=" " required >
        <option disabled selected >Select Salary Grade</option>
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
          <select id="cForm" type="text" name="status" id="floating_status" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer *:text-black" placeholder=" " required >
            <option disabled selected>Select Status</option>
            <option value="Permanent">Permanent</option>
            <option value="Temporary">Temporary</option>
            <option value="ETC">ETC</option>
        </select>
          <label for="floating_status" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Status</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="office_unit_dept" id="floating_office_unit_dept" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_office_unit_dept" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Office/Department/Unit</label>
      </div>
    </div>
       <!-- Group -->
     <div class="grid md:grid-cols-2 md:gap-6">
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="compensation_rate_words" id="floating_compensation_rate_words" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_compensation_rate_words" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Compensation Rate per month (in words ₱)</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="number" name="compensation_rate_num" id="floating_compensation_rate_num" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_compensation_rate_num" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Compensation Rate per month(in numbers ₱)</label>
      </div>
    </div>
     <!-- Group -->
     <div class="grid md:grid-cols-2 md:gap-6">
     <div class="relative z-0 w-full mb-5 group">
        <select id="cForm" type="text" name="appointment_nature" id="floating_appointment_nature" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer *:text-black" placeholder=" " required >
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
          <input id="cForm" type="text" name="vice" id="floating_vice" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_vice" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Vice</label>
      </div>
    </div>
     <!-- Group -->
     <div class="grid md:grid-cols-2 md:gap-6">
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="number" name="plantilla_item_number" id="floating_plantilla_item_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
          
          <label for="cForm"  id="floating_plantilla_item_number" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Plantilla Item Number</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="number" name="plantilla_page_number" id="floating_plantilla_page_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_plantilla_page_number" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Plantilla Page Number</label>
      </div>
    </div>
    
    <div class="relative z-0 w-full mb-5 group">
         <select name="selection" id="cForm"class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer *:text-black" placeholder=" " required >
         <option selected disabled>Select Lorem</option>
          <option value="Transferred">Transferred</option>
          <option value="Retired">Retired</option>
          <option value="ETC">ETC</option>
          </select>
        <label for="floating_eligibility_use_first" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Selection</label>
    </div>
    <div class="w-full items-center flex flex-wrap sm:justify-end justify-center gap-3 ">
     <button  data-modal-hide="add-transmittal-modal" type="button" id="dButton" class="text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-times"></i> Cancel</button>
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
                    Trashed No.33 B AFA 
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="trash-transmittal-modal">
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
                            <th colspan="2" class="scope">Transaction Number</th>
                            <th class="scope">Full Name</th>
                            <th class="scope">Position  Title</th>
                            <th class="scope">Salary Grade</th>
                            <th class="scope">Status</th>
                            <th class="scope">Office/Department/Unit</th>
                            <th colspan="2" class="scope">Compensation Rate Per Month</th>
                            <th class="scope">Nature of Appointment</th>
                            <th class="scope">Vice</th>
                            <th class="scope">Plantilla Item Number</th>
                            <th class="scope">Plantilla Page Number</th>
                            <th class="scope">Selection</th>
                            <th class="scope">Date Deleted</th>
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
                                    <td colspan="2" class="px-6 py-4">{{ $trash->transaction_number }}</td>
                                    <td class="px-6 py-4">{{$trash->fullname }}</td>
                                    <td class="px-6 py-4">{{$trash->position_title }}</td>
                                    <td class="px-6 py-4">{{$trash->salary_grade }}</td>
                                    <td class="px-6 py-4">{{$trash->status }}</td>
                                    <td class="px-6 py-4">{{$trash->office_unit_dept}}</td>
                                      <td colspan="2" class="px-6 py-4">{{$trash->compensation_rate_words }} (₱ {{ number_format($trash->compensation_rate_num, 2, '.', '') }}}</td>
                                      <td class="px-6 py-4">{{$trash->appointment_nature}}</td>
                                      <td class="px-6 py-4">{{$trash->vice}}</td>
                                      <td class="px-6 py-4">{{$trash->plantilla_item_number}}</td>
                                      <td class="px-6 py-4">{{$trash->plantilla_page_number}}</td>
                                      <td class="px-6 py-4">{{$trash->selection}}</td>
                                      <td class="px-6 py-4">{{$trash->created_at->format('F d, Y h:i:s A') }}</td> 
                                        <td class="px-3 py-3 flex gap-2">
                                            <a href="#" class="font-sm text-blue-600 dark:text-blue-500 hover:underline">
                                                <button type="button" class="text-white bg-sky-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2 sm:w-auto px-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-modal-target="restore-modal" data-form-id="{{  $trash->id }}" data-modal-toggle="restore-modal" >
                                                    <i class="fas fa-return"></i>Restore
                                                </button>
                                            </a>
                                            <a href="#"  class="font-sm text-blue-600 dark:text-blue-500 hover:underline">
                                                <button type="button" data-modal-target="deleteperma-modal" data-form-id="{{  $trash->id }}" data-modal-toggle="deleteperma-modal" class="text-white bg-red-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2 sm:w-auto px-2 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
            </div>
            <!-- <div class="w-full items-center flex flex-wrap sm:justify-end justify-center gap-3 ">
                <button type="button" id="dButton" data-modal-hide="trash-transmittal-modal" class="text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-times"></i>Close</button>
            </div> -->
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
                <form action="{{route('no-33.restore', ['id' => $trash->id]) }}" method="POST">
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
                <form action="{{ route('no-33.delete-permanently', ['id' => $trash->id]) }}" method="POST">
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
@section('title', 'No.33-B AFA Form')

