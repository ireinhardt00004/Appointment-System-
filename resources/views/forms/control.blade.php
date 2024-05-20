@extends('layouts.app')
@section('content')



<section class="bg-white w-full h-full dark:bg-gray-900">

  <div class="py-10 px-5 mx-auto flex flex-col justify-center items-center  w-[100%] shadow-[0px_0px_17px_-1px_rgba(120,120,120,1)] border border-gray-300 rounded-[16px] space-y-1">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Control (for encoding to PSIPOP)</h2>
  
<div c class="flex flex-col w-full justify-center h-full items-center gap-2">
    <div class="w-full">
        <form class="w-full h-full flex px-2.5 py-2" action="{{ route('search.control-psipop')}}" method="GET">
    @csrf  
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative w-full h-full grow">
        <div class="absolute inset-y-0 start-0 w-full flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" name="query" id="default-search" class="block w-full h-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" title="Search Name of Appointee..."placeholder="@if($query){{ $query }}@else Search Name of Appointee, Salary Grade, Employment Status, Type of Eligiblity use...@endif"
       />
        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
</form>
    </div>
    <div class="flex w-[100%] h-full items-center justify-center gap-3">
      
      <!-- Modal toggle -->

      


  <a href="{{ route('export.control-psipop') }}" class="w-full h-full flex justify-end items-center bg-blue-800 rounded-lg" ><button type="button" class=" w-full h-full text-white bg-green-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" ><i class="fas fa-download"></i> Export Table as CSV</button></a>

 <a href="{{ route('download.file', ['filename' => 'Control (for encoding to PSIPOP)_Blank.xlsx']) }}" class="w-full h-full flex justify-end items-center bg-blue-800 rounded-lg"> <button type="button"  class="text-white w-full bg-black hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  px-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-nowrap">
        <i class="fas fa-download"></i>  Download Control (for encoding to PSIPOP) (Blank)</button></a>
        <a target="_blank" href="{{route('view.psipop') }}" class="w-full h-full justify-center items-center"> <button type="button" class="h-full w-full text-white bg-green-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
        <i class="fas fa-eye"></i> View </button></a>
        <div class="w-full h-full justify-center items-center">
            <button data-modal-target="extralarge-modal" data-modal-toggle="extralarge-modal" class=" w-full h-full items-center py-2 px-2.5 bg-blue-600 text-white dark:bg-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300" type="button">
            <i class="fas fa-plus"></i>Add data
            </button>
        </div>
        
        <a href="#"  data-modal-target="trash-transmittal-modal" data-modal-toggle="trash-transmittal-modal" class="w-full h-full justify-center items-center" > <button type="button"  class="h-full w-full text-white bg-slate-950 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
            <i class="fas fa-times"></i> <i class="fas fa-trash"></i> Trash</button></a>
</div>
    </div>
 
      
<div class="w-full overflow-x-auto">
    <table class="text-sm text-center text-gray-500 dark:text-gray-400">
        <thead class="text-xs w-full text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            @if ($hasResults)
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Transaction Number</th>
                <th scope="col" class="px-6 py-3">ODC No.</th>
                <th scope="col" class="px-6 py-3">DATE RECEIVED BY RECORDS UNIT</th>
                <th scope="col" class="px-6 py-3">DATE RECEIVED BY HR UNIT</th>
                <th scope="col" class="px-6 py-3">SCHOOL/DISTRICT</th>
                <th scope="col" class="px-6 py-3">ITEM NUMBER</th>
                <th scope="col" class="px-6 py-3">POSITION FROM</th>
                <th scope="col" class="px-6 py-3">POSITION TO</th>
                <th scope="col" class="px-6 py-3">NAME OF INCUMBENT</th>
                <th scope="col" class="px-6 py-3">SEX</th>
                <th scope="col" class="px-6 py-3">DATE OF BIRTH</th>
                <th scope="col" class="px-6 py-3">TIN</th>
                <th scope="col" class="px-6 py-3">DATE OF ORIGINAL APPOINTMENT</th>
                <th scope="col" class="px-6 py-3">DATE OF LAST PROMOTION</th>
                <th scope="col" class="px-6 py-3">ELIGIBILITY</th>
                <th scope="col" class="px-6 py-3">DATE OF VALIDITY OF ELIGIBILITY</th>
                <th scope="col" class="px-6 py-3">FIRST TIME USED OF ELIGIBILITY?</th>
                <th scope="col" class="px-6 py-3">SALARY GRADE AND STEP</th>
                <th scope="col" class="px-6 py-3">POSITION LEVEL</th> 
                <th scope="col" class="px-6 py-3">NATURE OF APPOINTMENT</th>
                <th scope="col" class="px-6 py-3">STATUS OF APPOINTMENT</th>
                <th scope="col" class="px-6 py-3">PWD</th>
                <th scope="col" class="px-6 py-3">TYPE OF DISABILITIY</th>
                <th scope="col" class="px-6 py-3">MEMBER OF IP GROUP</th>
                <th scope="col" class="px-6 py-3">ETHNICITY</th>
                <th scope="col" class="px-6 py-3">NAME OF PREVIOUS INCUMBENT</th>
                <th scope="col" class="px-6 py-3">REASON OF VACANCY</th>
                {{--  --}}
                <th scope="col" class="px-6 py-3">DATE OF UPDATING TO PSIPOP ONLINE</th>
                <th scope="col" class="px-6 py-3">DATE OF UPDATING TO PSIPOP OFFLINE</th>
                <th scope="col" class="px-6 py-3">DATE PROCESSED (FOR SIGNATURE TO AOV/SDS/ASDS)</th>
                <th scope="col" class="px-6 py-3">DATE POSTED IN MESSENGER/FB GROUP (FOR SIGNATURE OF APPOINTEE)</th>
                <th scope="col" class="px-6 py-3">DATE TRANSMITTED TO CSC</th>
                <th scope="col" class="px-6 py-3">DATE RECEIVED FROM CSC</th>
                <th scope="col" class="px-6 py-3">APPROVED / DISAPPROVED</th>
                <th scope="col" class="px-6 py-3">PROCESSING TIME(DAYS)</th>
                <th scope="col" class="px-6 py-3">STATUS</th>
                <th scope="col" class="px-6 py-3">ACTION / REMARKS</th>
                <th scope="col" class="px-6 py-3">FINAL ACTION (FOR DISAPPROVED APPOINTMENT ONLY)</th>
                <th scope="col" class="px-6 py-3">DATE POSTED</th>
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
            @php
                $startIndex = ($forms->currentPage() - 1) * $forms->perPage() + 1;
            @endphp
             @if($forms->isEmpty())
             <tr>
                 <br>
             <td colspan="9"class="px-6 py-4 font-bold">No data available.</td>
             </tr>
              @else
            @foreach ($forms as $index => $form)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td class="px-6 py-4">{{ $startIndex + $index }}</td>
                <td class="px-6 py-4">{{ $form->transaction_number }}</td>
            <td class="px-6 py-4">{{ $form->odc_number }}</td>
            <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($form->date_received_records_unit);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
            <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($form->date_received_hr_unit);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
                <td class="px-6 py-4">{{ $form->school_district}}</td>
                <td class="px-6 py-4">{{ $form->item_number }}</td>
                <td class="px-6 py-4">
                    @php
                        $dateIssued = new DateTime($form->position_from);
                    @endphp
                    {{ $dateIssued->format('m/d/Y') }}
                </td>  <td class="px-6 py-4">
                    @php
                        $dateIssued = new DateTime($form->position_to);
                    @endphp
                    {{ $dateIssued->format('m/d/Y') }}
                </td>
                <td class="px-6 py-4">{{ $form->name_incumbentr }}</td>
                <td class="px-6 py-4">{{ $form->sex }}</td>
            </td>  
            <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($form->date_of_birth);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
            <td class="px-6 py-4">{{ $form->tin_number }}</td>
            <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($form->date_original_appointment);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
            <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($form->date_last_promotion);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
            <td class="px-6 py-4">{{ $form->eligibility }}</td>
            <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($form->date_validity_eligibility);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
            <td class="px-6 py-4">{{ $form->first_time_use_eligibility }}</td>
            <td class="px-6 py-4">{{ $form->salary_grade_step }}</td>
            <td class="px-6 py-4">{{ $form->position_level }}</td>
            <td class="px-6 py-4">{{ $form->nature_of_appointment }}</td>
            <td class="px-6 py-4">{{ $form->status_of_appointment }}</td>
            <td class="px-6 py-4">{{ $form->pwd }}</td>
            <td class="px-6 py-4">{{ $form->type_of_disability}}</td>
            <td class="px-6 py-4">{{ $form->member_of_ip_group}}</td>
            <td class="px-6 py-4">{{ $form->ethnicity}}</td>
            <td class="px-6 py-4">{{ $form->name_previous_incumbent}}</td>
            <td class="px-6 py-4">{{ $form->reason_of_vacancy}}</td>
            <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($form->date_updating_psiop_online);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
            <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($form->date_updating_psiop_offline);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
            <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($form->date_processed_signature_ao);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
            <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($form->date_posted_fb);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
            <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($form->date_transmitted_to_csc);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
            <td class="px-6 py-4">
                @php
                    $dateIssued = new DateTime($form->date_received_from_csc);
                @endphp
                {{ $dateIssued->format('m/d/Y') }}
            </td>
            <td class="px-6 py-4">{{ $form->approved}}</td>
            <td class="px-6 py-4">{{ $form->processing_days}}</td>
            <td class="px-6 py-4">{{ $form->status}}</td>
            <td class="px-6 py-4">{{ $form->action_remarks}}</td>
            <td class="px-6 py-4">{{ $form->final_action}}</td>
                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($form->created_at)->format('F j, Y') }} ({{$form->created_at->diffForHumans()}})</td>
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
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white"> Control (for encoding to PSIPOP)</h2>
<form  class="mx-auto w-full" method="POST" action="{{ route('store.control-psiop') }}">
    @csrf
    <!-- Group 1 -->
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" name="odc_number" type="number" maxlength="6" id="floating_oc_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_oc_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ODC Number</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="date_received_records_unit" id="floating_date_received_records_unit" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_date_received_records_unit" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE RECEIVED BY RECORDS UNIT</label>
        </div>
      </div>
     <!-- Group 2 -->
     <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="date_received_hr_unit" id="floating_date_received_hr_unit" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /> 
    <label for="floating_date_received_hr_unit" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE RECEIVED BY HR UNIT</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" name="school_district" id="floating_school_district" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_school_district" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">SCHOOL/DISTRICT</label>
        </div>
      </div>
    
      
  <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
    <input id="cForm" type="number" maxlength="6" name="item_number" id="floating_item_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=""  />
    <label for="floating_item_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ITEM NUMBER </label>

</div>

      <!-- Group 3 -->
     <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="position_from" id="floating_position_from" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  /> 
    <label for="floating_position_from" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">POSITION FROM</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="position_to" id="floating_position_to" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_position_to" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">POSITION TO</label>
        </div>
      </div>
     <!-- Group 4 -->
     <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" name="name_incumbent" id="floating_name_incumbent" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /> 
    <label for="floating_name_incumbent" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NAME OF INCUMBENT</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <select id="cForm" type="text" name="sex" id="floating_sex" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" " >
                <option selected disabled>Select Sex</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
                <option value="N/A">Prefer not to Say</option>
            </select>
            <label for="floating_sex" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">SEX</label>
        </div>
      </div>

      <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
        <input id="cForm" type="date" name="date_of_birth" id="floating_date_of_birth" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=""  />
        <label for="floating_date_of_birth" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF BIRTH</label>
    </div>
      <!-- Group 5 -->
     <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" maxlength="12" name="tin_number" id="floating_tin_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  /> 
    <label for="floating_tin_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">TIN</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="date_original_appointment" id="floating_date_original_appointment" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >

            <label for="floating_date_original_appointment" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF ORIGINAL APPOINTMENT</label>
        </div>
      </div>

      <!-- Group 6 -->
      <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="date_last_promotion" id="floating_date_last_promotion" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  /> 
    <label for="floating_date_last_promotion" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF LAST PROMOTION</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" name="eligibility" id="floating_eligibility" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >

            <label for="floating_eligibility" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ELIGIBILITY</label>
        </div>
      </div>

        <!-- Group 7 -->
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input id="cForm" type="date" name="date_validity_eligibility" id="floating_date_validity_eligibility" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  /> 
        <label for="floating_date_validity_eligibility" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF VALIDITY OF ELIGIBILITY</label> 
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <select id="cForm" name="first_time_use_eligibility" id="floating_first_time_use_eligibility" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" ">
                    <option disabled selected>Select</option>
                    <option value="No">No</option>
                    <option value="Yes">Yes</option>
                </select>
                <label for="floating_first_time_use_eligibility" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">FIRST TIME USED OF ELIGIBILITY?</label>
            </div>
          </div>
  <!-- Group 8 -->
  <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
       <select id="cForm"  name="salary_grade_step" id="floating_salary_grade_step" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" "  >
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
<label for="floating_salary_grade_step" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">SALARY GRADE AND STEP</label> 
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <select id="cForm"  name="position_level" id="floating_position_level" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" " >
            <option selected disabled>Select Position Level</option>
            <option value="1st">1st</option>
            <option value="2nd">2nd</option>
            <option value="3rd">3rd</option>
            </select>
        <label for="floating_position_level" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">POSITION LEVEL</label>
    </div>
  </div>

  <!-- Group 9 -->
  <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
       <select id="cForm" name="nature_of_appointment" id="floating_nature_of_appointment" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" " required >
        <option disabled selected>Select Nature Of Appointment</option>
        <option value="Original">Original</option>
        <option value="Promotional">Promotional</option> 
        <option value="Reemployment">Reemployment</option> 
        <option value="Reappointment">Reappointment</option>
        <option value="Reinstatement">Reinstatement</option>
        <option value="Reclassification">Reclassification</option> 
        <option value="Demotion">Demotion</option>   
    </select>
<label for="floating_nature_of_appointment" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NATURE OF APPOINTMENT</label> 
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="status_of_appointment" id="floating_status_of_appointment" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_status_of_appointment" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">STATUS OF APPOINTMENT </label>
    </div>
  </div>
 <!-- Group 10 -->
 <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
       <select id="cForm" name="pwd" id="floating_pwd" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" " >
        <option value="No"selected >No</option>
        <option value="Yes">Yes</option>
       </select>
<label for="floating_pwd" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">PWD</label> 
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="type_of_disability" id="floating_type_of_disability" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_type_of_disability" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">TYPE OF DISABILITIY</label>
    </div>
  </div>

  <!-- Group 11 -->
 <div class="grid md:grid-cols-2 md:gap-6">
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
  </div>

  <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
      <input id="cForm" type="text" name="name_previous_incumbent" id="floating_name_previous_incumbent" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=""  />
      <label for="floating_name_previous_incumbent" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NAME OF PREVIOUS INCUMBENT</label>
  </div>
  <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
    <input id="cForm" type="text" name="reason_of_vacancy" id="floating_reason_of_vacancy" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=""  />
    <label for="floating_reason_of_vacancy" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">REASON OF VACANCY</label>
</div>
   <!-- Group 12 -->
   <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="date" name="date_updating_psiop_online" id="floating_date_updating_psiop_online" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_date_updating_psiop_online" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF UPDATING TO PSIPOP ONLINE</label>
    </div>
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
      <input id="cForm" type="date" name="date_updating_psiop_offline" id="floating_date_updating_psiop_offline" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
      <label for="floating_date_updating_psiop_offline" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF UPDATING TO PSIPOP OFFLINE</label>
        </div>
  </div>

   <!-- Group 13 -->
   <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="date" name="date_processed_signature_ao" id="floating_date_processed_signature_ao" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_date_processed_signature_ao" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE PROCESSED (FOR SIGNATURE TO AOV/SDS/ASDS)</label>
    </div>
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
      <input id="cForm" type="date" name="date_posted_fb" id="floating_date_posted_fb" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
      <label for="floating_date_posted_fb" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE POSTED IN MESSENGER/FB GROUP (FOR SIGNATURE OF APPOINTEE)</label>
        </div>
  </div>
 <!-- Group 14 -->
 <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="date" name="date_transmitted_to_csc" id="floating_DATE RECEIVED FROM CSC" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_DATE TRANSMITTED TO CSC" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE TRANSMITTED TO CSC</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="date" name="date_received_from_csc" id="floating_DATE RECEIVED FROM CSC" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_DATE RECEIVED FROM CSC" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE RECEIVED FROM CSC</label>
    </div>
  </div>
  <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
    <select id="cForm" name="approved" id="floating_approved" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" >
        <option disabled selected>Select</option>
        <option value="Approved">Approved</option>
        <option value="Disapproved">Disapproved</option>
      </select>
      <label for="floating_approved" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">APPROVED / DISAPPROVED</label>
</div>

  <!-- Group 15 -->
 <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="number" name="processing_days" id="floating_processing_days" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_processing_days" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">PROCESSING TIME(DAYS)</label>
    </div>
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
      <input id="cForm" name="status" id="floating_status" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" >
       
      <label for="floating_status" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">STATUS</label>
        </div>
  </div>

  
  <!-- Group 16 -->
 <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text" name="action_remarks" id="floating_action_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_action_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ACTION / REMARKS</label>
    </div>
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
      <input id="cForm" name="final_action" id="floating_final_action" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" >
       
      <label for="floating_final_action" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">FINAL ACTION (FOR DISAPPROVED APPOINTMENT ONLY)</label>
        </div>
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
                <form action="{{ route('delete.control-psipop', ['id' => $form->id])}}" method="POST">
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
                <th scope="col" class="px-6 py-3">Transaction Number</th>
                <th scope="col" class="px-6 py-3">ODC No.</th>
                <th scope="col" class="px-6 py-3">DATE RECEIVED BY RECORDS UNIT</th>
                <th scope="col" class="px-6 py-3">DATE RECEIVED BY HR UNIT</th>
                <th scope="col" class="px-6 py-3">SCHOOL/DISTRICT</th>
                <th scope="col" class="px-6 py-3">ITEM NUMBER</th>
                <th scope="col" class="px-6 py-3">POSITION FROM</th>
                <th scope="col" class="px-6 py-3">POSITION TO</th>
                <th scope="col" class="px-6 py-3">NAME OF INCUMBENT</th>
                <th scope="col" class="px-6 py-3">SEX</th>
                <th scope="col" class="px-6 py-3">DATE OF BIRTH</th>
                <th scope="col" class="px-6 py-3">TIN</th>
                <th scope="col" class="px-6 py-3">DATE OF ORIGINAL APPOINTMENT</th>
                <th scope="col" class="px-6 py-3">DATE OF LAST PROMOTION</th>
                <th scope="col" class="px-6 py-3">ELIGIBILITY</th>
                <th scope="col" class="px-6 py-3">DATE OF VALIDITY OF ELIGIBILITY</th>
                <th scope="col" class="px-6 py-3">FIRST TIME USED OF ELIGIBILITY?</th>
                <th scope="col" class="px-6 py-3">SALARY GRADE AND STEP</th>
                <th scope="col" class="px-6 py-3">POSITION LEVEL</th> 
                <th scope="col" class="px-6 py-3">NATURE OF APPOINTMENT</th>
                <th scope="col" class="px-6 py-3">STATUS OF APPOINTMENT</th>
                <th scope="col" class="px-6 py-3">PWD</th>
                <th scope="col" class="px-6 py-3">TYPE OF DISABILITIY</th>
                <th scope="col" class="px-6 py-3">MEMBER OF IP GROUP</th>
                <th scope="col" class="px-6 py-3">ETHNICITY</th>
                <th scope="col" class="px-6 py-3">NAME OF PREVIOUS INCUMBENT</th>
                <th scope="col" class="px-6 py-3">REASON OF VACANCY</th>
                {{--  --}}
                <th scope="col" class="px-6 py-3">DATE OF UPDATING TO PSIPOP ONLINE</th>
                <th scope="col" class="px-6 py-3">DATE OF UPDATING TO PSIPOP OFFLINE</th>
                <th scope="col" class="px-6 py-3">DATE PROCESSED (FOR SIGNATURE TO AOV/SDS/ASDS)</th>
                <th scope="col" class="px-6 py-3">DATE POSTED IN MESSENGER/FB GROUP (FOR SIGNATURE OF APPOINTEE)</th>
                <th scope="col" class="px-6 py-3">DATE TRANSMITTED TO CSC</th>
                <th scope="col" class="px-6 py-3">DATE RECEIVED FROM CSC</th>
                <th scope="col" class="px-6 py-3">APPROVED / DISAPPROVED</th>
                <th scope="col" class="px-6 py-3">PROCESSING TIME(DAYS)</th>
                <th scope="col" class="px-6 py-3">STATUS</th>
                <th scope="col" class="px-6 py-3">ACTION / REMARKS</th>
                <th scope="col" class="px-6 py-3">FINAL ACTION (FOR DISAPPROVED APPOINTMENT ONLY)</th>
                <th scope="col" class="px-6 py-3">DATE DELETED</th>
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
                                        <td class="px-6 py-4">{{ $trash->transaction_number }}</td>
                                    <td class="px-6 py-4">{{ $trash->odc_number }}</td>
                                    <td class="px-6 py-4">
                                        @php
                                            $dateIssued = new DateTime($trash->date_received_records_unit);
                                        @endphp
                                        {{ $dateIssued->format('m/d/Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $dateIssued = new DateTime($trash->date_received_hr_unit);
                                        @endphp
                                        {{ $dateIssued->format('m/d/Y') }}
                                    </td>
                                        <td class="px-6 py-4">{{ $trash->school_district}}</td>
                                        <td class="px-6 py-4">{{ $trash->item_number }}</td>
                                        <td class="px-6 py-4">
                                            @php
                                                $dateIssued = new DateTime($trash->position_from);
                                            @endphp
                                            {{ $dateIssued->format('m/d/Y') }}
                                        </td>  <td class="px-6 py-4">
                                            @php
                                                $dateIssued = new DateTime($trash->position_to);
                                            @endphp
                                            {{ $dateIssued->format('m/d/Y') }}
                                        </td>
                                        <td class="px-6 py-4">{{ $trash->name_incumbentr }}</td>
                                        <td class="px-6 py-4">{{ $trash->sex }}</td>
                                    </td>  
                                    <td class="px-6 py-4">
                                        @php
                                            $dateIssued = new DateTime($trash->date_of_birth);
                                        @endphp
                                        {{ $dateIssued->format('m/d/Y') }}
                                    </td>
                                    <td class="px-6 py-4">{{ $trash->tin_number }}</td>
                                    <td class="px-6 py-4">
                                        @php
                                            $dateIssued = new DateTime($trash->date_original_appointment);
                                        @endphp
                                        {{ $dateIssued->format('m/d/Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $dateIssued = new DateTime($trash->date_last_promotion);
                                        @endphp
                                        {{ $dateIssued->format('m/d/Y') }}
                                    </td>
                                    <td class="px-6 py-4">{{ $trash->eligibility }}</td>
                                    <td class="px-6 py-4">
                                        @php
                                            $dateIssued = new DateTime($trash->date_validity_eligibility);
                                        @endphp
                                        {{ $dateIssued->format('m/d/Y') }}
                                    </td>
                                    <td class="px-6 py-4">{{ $trash->first_time_use_eligibility }}</td>
                                    <td class="px-6 py-4">{{ $trash->salary_grade_step }}</td>
                                    <td class="px-6 py-4">{{ $trash->position_level }}</td>
                                    <td class="px-6 py-4">{{ $trash->nature_of_appointment }}</td>
                                    <td class="px-6 py-4">{{ $trash->status_of_appointment }}</td>
                                    <td class="px-6 py-4">{{ $trash->pwd }}</td>
                                    <td class="px-6 py-4">{{ $trash->type_of_disability}}</td>
                                    <td class="px-6 py-4">{{ $trash->member_of_ip_group}}</td>
                                    <td class="px-6 py-4">{{ $trash->ethnicity}}</td>
                                    <td class="px-6 py-4">{{ $trash->name_previous_incumbent}}</td>
                                    <td class="px-6 py-4">{{ $trash->reason_of_vacancy}}</td>
                                    <td class="px-6 py-4">
                                        @php
                                            $dateIssued = new DateTime($trash->date_updating_psiop_online);
                                        @endphp
                                        {{ $dateIssued->format('m/d/Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $dateIssued = new DateTime($trash->date_updating_psiop_offline);
                                        @endphp
                                        {{ $dateIssued->format('m/d/Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $dateIssued = new DateTime($trash->date_processed_signature_ao);
                                        @endphp
                                        {{ $dateIssued->format('m/d/Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $dateIssued = new DateTime($trash->date_posted_fb);
                                        @endphp
                                        {{ $dateIssued->format('m/d/Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $dateIssued = new DateTime($trash->date_transmitted_to_csc);
                                        @endphp
                                        {{ $dateIssued->format('m/d/Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $dateIssued = new DateTime($trash->date_date_received_from_csc);
                                        @endphp
                                        {{ $dateIssued->format('m/d/Y') }}
                                    </td>
                                    <td class="px-6 py-4">{{ $trash->approved}}</td>
                                    <td class="px-6 py-4">{{ $trash->processing_days}}</td>
                                    <td class="px-6 py-4">{{ $trash->status}}</td>
                                    <td class="px-6 py-4">{{ $trash->action_remarks}}</td>
                                    <td class="px-6 py-4">{{ $trash->final_action}}</td>
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
                <form action="{{route('control-psipop.restore', ['id' => $trash->id]) }}" method="POST">
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
                <form action="{{route('control-psipop.delete-permanently', ['id' => $trash->id]) }}" method="POST">
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
@section('title', 'Control (For Encoding to PSIPOP)')