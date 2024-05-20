@extends('layouts.app')
@section('content')

<div class="w-full h-full flex flex-col">
    <section class="bg-white w-full h-full dark:bg-gray-900">

<div class="py-10 px-5 mx-auto flex flex-col justify-center items-center  w-[100%] shadow-[0px_0px_17px_-1px_rgba(120,120,120,1)] border border-gray-300 rounded-[16px] space-y-1">
    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Appointment Processing Checklist</h2>

<div class="flex flex-col w-full justify-center items-center gap-2">
    <div class="w-full">
        <form class="w-full h-full flex" action="{{--  --}}" method="GET">
        @csrf  
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative w-full h-full grow">
            <div class="absolute inset-y-0 start-0 w-full flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" name="query" id="default-search" class="block w-full h-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" title="Search ..." placeholder="@if($query){{ $query }}@else Search...@endif"
            />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>
    </div>
    
    <div class="flex w-[100%] h-full items-center justify-center gap-3">
    
    
    <a href="{{route('download.transmittal-table') }}" class="w-full h-full flex justify-end items-center"> <button type="button" class="h-full w-full text-white bg-green-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    <i class="fa-solid fa-file-export"></i> Export Table(CSV)</button></a>
    <a href="{{ route('download.file', ['filename' => 'APPOINTMENT PROCESSING CHECKLIST.xlsx']) }}" class="w-full h-full flex justify-end items-center"> <button type="button"  class="text-white w-full   bg-black hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <i class="fas fa-download"></i> Download CHECKLIST(Blank)</button></a>
            <a href="#"  data-modal-target="add-Checklist-modal" data-modal-toggle="add-Checklist-modal" class="w-[100%] h-full flex justify-end items-center"> <button type="button"  class="h-full w-full text-white bg-blue-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
                <i class="fas fa-pencil"></i> <i class="fas fa-plus"></i>  Add Form</button></a>
            <a href="#"  data-modal-target="trash-transmittal-modal" data-modal-toggle="trash-transmittal-modal" class="w-[60%] h-full flex justify-end items-center"> <button type="button" class="h-full w-full text-white bg-slate-950 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
                <i class="fas fa-times"></i> <i class="fas fa-trash"></i> Trash</button></a>
    </div>
    </div>
        
    
    
<div class="w-full overflow-x-auto">
  <table class="text-sm text-center text-gray-500 dark:text-gray-400 w-full">
      <thead class="text-xs w-full text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        @if ($hasResults)    
        <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" >Transaction Number</th>
                <th scope="col">#AAAAAAAAA</th>
                <th scope="col">#aaaAAA</th>
                <th scope="col">#AAAA</th>
                <th scope="col">#AAAAAAA</th>
                <th scope="col">#AAAA</th>
                <th scope="col">Date Created</th>
                <th scope="col">Action</th>
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
          <td colspan="9"class="px-6 py-4 font-bold">No  
               data</td>
          </tr>
           @else
            @php
                $startIndex = ($forms->currentPage() - 1) * $forms->perPage() + 1;
            @endphp
            @foreach ($forms as $index => $form)
          
          <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
              <td class="px-6 py-4">---------</td>
             <td class="px-6 py-4">---------</td>
             <td class="px-6 py-4">---------</td>
             <td class="px-6 py-4">---------</td>
             <td class="px-6 py-4">---------</td>
             <td class="px-6 py-4">----------</td>
              <td class="px-6 py-4">---------</td>
              <td class="px-6 py-4">---------</td>
              <td class="px-6 py-4">---------</td>
              <td class="px-6 py-4">---------</td>
              <td class="px-6 py-4">---------</td>
              <td class="px-3 py-3 flex gap-2">
                    <a href="#" class="font-sm text-blue-600 dark:text-blue-500 hover:underline">
                        <button type="button" data-modal-target="deletepopup-modal" data-form-id="" data-modal-toggle="deletepopup-modal" class="text-white bg-red-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2 sm:w-auto px-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </a>
                </td>
          </tr>
          @endforeach
          @endif
      </tbody>
  </table>
  
</div>

</section>


{{-- DELETE --}}

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
                <form action="" method="POST">
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


  


<!-- Table Modal -->
<div id="add-Checklist-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full">
    <div class="relative w-full max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white w-full h-full rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                Appointment Processing Checklist
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-Checklist-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4 dark:text-gray-400">
             
<!-- <section class="bg-white w-full h-full dark:bg-gray-900">
  <div class="py-10 px-5 mx-auto  w-[100%] shadow-[0px_0px_17px_-1px_rgba(120,120,120,1)] border border-gray-300 rounded-[16px]"> -->
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white"></h2>
      <form  class="mx-auto w-full" method="POST" action="">
      @csrf
      <!-- Group -->
      <div class="grid md:grid-cols-2 md:gap-6">
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="name" id="floating_sector" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_sector" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="positionTitle" id="floating_agency" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_agency" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position Title</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="SG_STEP" id="floating_agency" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_agency" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">SG/STEP</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="MonthlyCompensation" id="floating_agency" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_agency" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">MonthlyCompensation</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="cForm" type="text" name="Daily_Compensation_Casual" id="floating_agency" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_agency" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Daily Compensation (Casual)</label>
      </div>
      
    </div>
    
    <div class="w-full h-full dark:text-white">
        <table id="Checklist" class="w-full h-full text-center">
            <thead class="*:border-2 *:border-black">
                <th>Agency</th>
                <th>DepED - Cavite</th>
                <th colspan="2">Sector</th>
                <th>LGU GOCC NGA SUC</th>
                
            </thead>
            <tbody class="*:border-2 *:border-black">
                <tr class="*:border-2 *:border-black">
                    <td>Area</td>
                    <td>Criteria</td>
                    <td>Yes</td>
                    <td>No</td>
                    <td colspan="7">REMARKS(Provide specific details)</td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    <td rowspan="6" class="w-[350px] text-wrap p-3"> Qualification Standards Does the appointee meet the minimum qualification requirements of the position at the time of issuance of appointment?</td>
                    <td>1 Education: <input class="w-full text-black placeholder:text-slate-800" type="text" name="EduText" placeholder="Bachelor's degree majoring in the relevant strand/subject; or any Bachelors'degree with at least 15 units of specialization in relevant strand/subject text-black"> </td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="education" value="Yes"class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="education" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="education-remarks" class="h-[50px] w-[100%] text-black"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    <td>2 Experience: <input class="w-full text-black placeholder:text-slate-800" type="text" name="ExpText" placeholder="None required"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="experience" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="experience" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="experience-remarks" class="h-[50px] w-[100%] text-black"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    <td>3 Training: <input class="w-full text-black placeholder:text-slate-800" type="text" name="TrainText" placeholder="None required"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="training" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="training" value="No"class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="training_remarks" class="h-[50px] w-[100%] text-black"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    <td>4 Eligibility: <input class="w-full text-black placeholder:text-slate-800" type="text" name="eligibility_Text" placeholder="PBET/LET/Teacher/RA 1080 None required"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="eligibility" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="eligibility" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="eligibility_remarks"class="h-[50px] w-[100%] text-black"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    <td>5 Other Requirements (e.g. Age/Residency for LGU Dept. Heads; Term of Office for SUC President) </td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Other_Requirements" value="Yes" class="h-[40px] w-[40px] text-2xl text-center text-black"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Other_Requirements" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Other_Requirements_remarks" class="h-[50px] w-[100%] text-black"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    <td>Senior HS - Track/Strand Subjects (for DepEd appointments)</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Senior_HS" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Senior_HS" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Senior_HS_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    <td rowspan="19">Common Requirements for Regular Appointments Are the following requirements provided?</td>
                    <td>6 Original Copy/ies of Appointment (3 copies)</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Common_Requirements" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Common_Requirements" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Common_Requirements_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td>i. CS Form No. 33-A Revised 2018 Appointment Form (Regulated)</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="CS_form_no_33_a" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="CS_form_no_33_a" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="CS_form_no_33_a_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td>ii. CS Form No. 33-B Revised 2018 Appointment Form (Accredited)</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="CS_form_no_33_b" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="CS_form_no_33_b" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="CS_form_no_33_b_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td>iii. CS Form No. 34-A Plantilla of Casual Appointment (Regulated)</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="CS_form_no_34_a" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="CS_form_no_34_a" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="CS_form_no_34_a_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td> iv. CS Form No. 34-B Plantilla of Casual Appointment (Accredited)</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="CS_form_no_34_b" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="CS_form_no_34_b" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text"  name="CS_form_no_34_b_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td> v. CS Form No. 34-C Plantilla of Casual Appointment (LGU - Regulated)</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="CS_form_no_34_c" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="CS_form_no_34_c" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="CS_form_no_34_c_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td> vi. CS Form No. 34-D Plantilla of Casual Appointment (LGU - Accredited)</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="CS_form_no_34_d" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="CS_form_no_34_d" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="CS_form_no_34_d_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td> vii. CS Form No. 34-E Plantilla of Casual Appointment (NGA-GOCC-SUC)</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="CS_form_no_34_e" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="CS_form_no_34_e" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="CS_form_no_34_e_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    <td>viii. CS Form No. 34-F Plantilla of Casual Appointment (LGU)</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="CS_form_no_34_f" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="CS_form_no_34_f" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="CS_form_no_34_f_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    <td>7	Employment Status </td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Employment_Status" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Employment_Status" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Employment_Status_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    <td>i. Provisional Appointment notation for DepEd</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Provisional_Appointment" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Provisional_Appointment" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Provisional_Appointment_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    <td> ii. Is the appointee subject for Probation? A notation that the appointee is under probation for a specified period shall be indicated on the face of the appointment issued</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="appointee_subject" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="appointee_subject" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="appointee_subject_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    <td> 8	Nature of Appointment</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Nature_of
                        _Appointment" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Nature_of
                        _Appointment" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Nature_of
                        _Appointment_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    <td> 9	Signature of Appointing Authority</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Signature_of_Appointing" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Signature_of_Appointing" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Signature_of_Appointing_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    <td> 10	Date of Signing</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Date_of_Signing" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Date_of_Signing" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Date_of_Signing_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    <td> 11	Certification of Publication/Posting of VACANT Position                                                                                 (should be duly signed by the authorized HRMO)</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Certification_of_Publication" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Certification_of_Publication" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Certification_of_Publication_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    <td> 12	Certification by Chairperson of the HRMPSB or the Placement Committee                                         (at the back of appointment) </td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Certification_by_Chairperson" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Certification_by_Chairperson" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Certification_by_Chairperson_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    <td> 13	Acknowledgement Original/Photocopy of appointment received by the appointee? Date of receipt indicated?</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Acknowledgement_Original" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Acknowledgement_Original" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Acknowledgement_Original_remarks"class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    <td> 14	Properly filled-out Personal Data Sheet (CS Form 212, Revised 2017)	/ except for reappointment (renewal) to temporary, contractual, substitute and provisional appointments</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Personal_Data_Sheet" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Personal_Data_Sheet" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Personal_Data_Sheet_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    <td rowspan="2">Submission and Effectivity of Appointmen</td>
                    <td> 15	Is the agency accredited? /i.  If accredited, was RAI (CS Form No.  2, Revised 2018) with original copy of appointment (CSC copy) and supporting documents submitted to the CSC on or before the 30th day of the succeeding month?</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Is_the_agency_accredited" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Is_the_agency_accredited" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Is_the_agency_accredited_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td> ii.  If NOT accredited, was the appointment (3 copies) submitted to the CSC with supporting documents in the prescribed Appointment Transmittal Form (CS Form No. 1, Revised 2018) within 30 calendar days from the date of issuance?</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="If_NOT_accredited" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="If_NOT_accredited" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="If_NOT_accredited_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td rowspan="7"> Additional Requirements  in Specific Cases Are the following cases applicable?</td>
                    <td> 16	Erasures or alterations on the appointments *Certification of Erasures/Alteration on appointment Form(CS Form No. 3, s. 2017) signed by the Appointing Officer /Authority or Any Authorized Official</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Erasures_or_alterations" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Erasures_or_alterations" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Erasures_or_alterations_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                   
                    <td> 17	With decided administrative/criminal case
       * Certified true copy of decision issued by the office/court/tribunal</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="With_decided_administrative" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="With_decided_administrative" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="With_decided_administrative_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                   
                    <td> 18	Discrepancy in name, date/place of birth	 	 
 	      * Resolution/Order issued by the Commission / CSC Regional Office
         (CSCRO) concerned correcting the discrepancy</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Discrepancy_in_name" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Discrepancy_in_name" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Discrepancy_in_name_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                   
                    <td> 19	Change of Civil Status on account of:	 	 
 	        i. Marriage - Original Marriage Contract/ Certificate duly authenticated by
           the Philippine Statistics Authority or the Local Civil Registrar) of the
           municipality /city where the marriage was registered or recorded</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Change_of_Civil_Status" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Change_of_Civil_Status" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Change_of_Civil_Status_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                   
                    <td> ii. Annulment or Declaration of Nullity of the same - Authenticated copy of
           the Court Order and Marriage Certificate/Contract with annotation</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Annulment_or_Declaration" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Annulment_or_Declaration" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Annulment_or_Declaration_remarks" value="No" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                   
                    <td> 20	Appointments issued by the SUCs under National Budget Circular (NBC) No. 461  * Copy of DBM-approved NOSCA on the reclassification of position based on
          NBC NO. 461 and SUC Board Resolution approving the same</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Appointments_issued_by_the_SUCs" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Appointments_issued_by_the_SUCs" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" class="Appointments_issued_by_the_SUCs_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                   
                    <td> 21	Appointment issued for faculty positions/ranks in fields/courses/colleges in SUCs and LUCs where there is dearth of holders of Master's degree in specific fields
      * Certification issued by CHED that there is dearth of holders of
         Master's degree in specific fields</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Appointment_issued_for_faculty_positions" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Appointment_issued_for_faculty_positions" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Appointment_issued_for_faculty_positions_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
               
                <tr class="*:border-2 *:border-black">
                <td rowspan="13">Additional Requirements  in Specific Cases Are the following cases applicable</td>
                    <td> 22	Appointments Requiring Board Resolution such as Head of Agency appointment by the Board, SUC President, Local Water District (LWD) General Manager
       * Copy of Board Resolution </td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Appointments_Requiring_Board_Resolution" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Appointments_Requiring_Board_Resolution" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Appointments_Requiring_Board_Resolution_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                
                    <td> 23 Ban on Issuance of Appointment During Election Period
      * Resolution issued by the Commission on Elections (COMELEC) en banc, Chairman or Regional Election Director, granting exemption from the prohibition </td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Ban_on_Issuance" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Ban_on_Issuance" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Ban_on_Issuance_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td> 24	LGU Appointmen i. Certification issued by the appointing officer/authority that
         appointment is issued in accordance with the limitations provided
         for under Section 325, RA No. 7160; and    </td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Certification_issued_by_the_appointing_officer" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Certification_issued_by_the_appointing_officer" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap" rowspan="6"><input type="text" name="Certification_issued_by_the_appointing_officer_remarks" class="h-[100%] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td>   ii. Certification issued by the Provincial/City/Municipal Accountant
         that funds are available    </td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Certification_issued_by_the_Provincial" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Certification_issued_by_the_Provincial" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td>    iii. Appointment to head of department or office, such as Department
          Head, Administrator, Legal Officer, and Information Officer
          positions requiring concurrence by the Sanggunian</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Appointment_to_head_of_department" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Appointment_to_head_of_department" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td>  * Concurred / Acted by Sanggunian - Sanggunian Resolution
                     embodying the concurrence of the majority of all the
                     members of the Sanggunian</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" value="Yes" name="Concurred" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" value="No" name="Concurred" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td> * Not Concurred / Acted by Sanggunian - Certification issued
                     by the Sanggunian Secretary or HRMO confirming the non-
                     action by the Sanggunian </td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Not_Concurred" class="h-[40px] w-[40px] text-2xl text-center" value="Yes"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" value="No" name="Not_Concurred" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td>  iv. Creation and reclassification of positions and appropriation of funds
                  * Sangguniang Panlalawigan/Panlungsod/Bayan Ordinance</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Creation_and_reclassification" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Creation_and_reclassification" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td>  25  Appointment involving Demotion i.  Non-Disciplinary in Nature
                    </td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Non_Disciplinary_in_Nature" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Non_Disciplinary_in_Nature" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap" rowspan="3"><input type="text" name="Non_Disciplinary_in_Nature_remarks" class="h-[100%] w-[100%]"></td>
                    
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td>  *  Certification issued by the agency head that the demotion is not
                 the result of an administrative case; and
                    </td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Certification_issued_by_the_agency" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Certification_issued_by_the_agency" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td> *  Written consent by the employee that he/she interposes no objection to
                  his/her demotion
                    </td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Written_consent_by_the_employee" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Written_consent_by_the_employee" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td>26	Temporary and Provisional Appointment  * Certification issued by the      appointing officer/ authority vouching the
        absence of an applicant who meets all the qualification requirements of
        the position (CS Form No. 5, Revised 2018) 
                    </td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Temporary_and_Provisional_Appointment" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Temporary_and_Provisional_Appointment" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Temporary_and_Provisional_Appointment_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td>27	Reclassification
     * NOSCA approved by the DBM/Memo Order issued by Governance
        Commission  for GOCCs (GCG) 
                    </td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Reclassification" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Reclassification" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Reclassification_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    <td rowspan="8">Documents Submitted</td>
                    <td>28	ORIGINAL COPY OF AUTHENTICATED CERTIFICATE OF ELIGIBILITY/ RATING/ LICENSE - Except if the eligibility has been previously authenticated in 2004 or onward and recorded by the CSC</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="OR_COPY_AUT_CERT_OF_ELIG" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="OR_COPY_AUT_CERT_OF_ELIG" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="OR_COPY_AUT_CERT_OF_ELIG_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td>29	Position Description Form (DBM-CSC Form No. 1, Revised 2017)</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Position_Description_Form" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Position_Description_Form" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Position_Description_Form_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td>30	Oath of Office (CS Form No. 32, Revised 2018)</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Oath_of_Office" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Oath-of-Office" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Oath_of_Office_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td>31	Certification of Assumption to Duty  (CS Form No. 4, Revised 2018)</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Certification_of_Assumption_to_Duty" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Certification-of-Assumption-to-Duty" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Certification_of_Assumption_to_Duty_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td>32	Performance Rating in the last period (Promotion or Transfer)</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Performance_Rating"  value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Performance_Rating" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Performance_Rating_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td>33	Justification (if the promotion is more than 3 SG)</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Justification" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Justification"  value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Justification_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td>34	Electronic file stored in CD/flash drive or sent thru email + 2 printed copies of:
      i. Appointment Transmittal and Action Form (ATAF)
          (CS Form No. 1 rev. 2018) or
     ii. Reports on Appointment Issued (RAI)
         (CS Form No. 2 rev. 2018)</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Electronic_file_stored" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Electronic_file_stored" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text" name="Electronic_file_stored_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
                <tr class="*:border-2 *:border-black">
                    
                    <td>35	Others:</td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Others" value="Yes" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[100px] text-wrap p-3"><input type="radio" name="Others" value="No" class="h-[40px] w-[40px] text-2xl text-center"></td>
                    <td class="w-[350px] text-wrap p-3"><input type="text"  name="Others_remarks" class="h-[50px] w-[100%]"></td>
                </tr>
               
            </tbody>
        </table>
    </div>
    
  </div>
  <div>
  <button type="button" data-modal-hide="extralarge-modal" class="text-white bg-black hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-times"></i> Close</button>
    <button type="button" id="dButton" class="text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-trash"></i> Reset All Fields</button>
  <button type="submit"  class="text-white bg-green-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-check"></i> Submit Form</button>
  </div>
    </div>
    
  </form>
  </div>
</section>

{{-- Trash --}}
<div id="trash-Checklist-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full">
    <div class="relative w-full max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white w-full h-full rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Trashed Transmittal of Appointee
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-Checklist-modal">
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
                            <tr class="*:border-2 *:border-black">
                                <th scope="col" class="px-6 py-3">#</th>
                                <th class="scope">Level</th>
                                <th class="scope">School</th>
                                <th class="scope">Name of Appointee</th>
                                <th class="scope">Remark</th>
                                <th class="scope">Signature of Appointee</th>
                                <th class="scope">Date and Time</th>
                                <th class="scope">Date of Delete</th>
                                <th class="scope">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 py-4"></td>
                                        <td class="px-6 py-4"></td>
                                        <td class="px-6 py-4"></td>
                                        <td class="px-6 py-4"></td>
                                        <td class="px-6 py-4"></td>
                                        <td class="px-6 py-4">----------</td>
                                        <td class="px-6 py-4">---------</td>
                                        <td class="px-6 py-4"></td>
               
                                        <td class="px-3 py-3 flex gap-2">
                                            <a href="#" class="font-sm text-blue-600 dark:text-blue-500 hover:underline">
                                                <button type="button" class="text-white bg-sky-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2 sm:w-auto px-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-modal-target="restore-modal" data-form-id="" data-modal-toggle="restore-modal" >
                                                    <i class="fas fa-return"></i>Restore
                                                </button>
                                            </a>
                                            <a href="#"  class="font-sm text-blue-600 dark:text-blue-500 hover:underline">
                                                <button type="button" data-modal-target="deleteperma-modal" data-form-id="" data-modal-toggle="deleteperma-modal" class="text-white bg-red-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2 sm:w-auto px-2 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                
                          
                        </tbody>
                    </table>                    
                    
                    
                </div>
            </div>
            <div class="w-full items-center flex flex-wrap sm:justify-end justify-center gap-3 ">
                <button type="button" id="dButton" data-modal-hide="trash-Checklist-modal" class="text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-times"></i>Close</button>
            </div>
        </div>
    </div>
</div>


{{-- restore --}}

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
                <form action="" method="POST">
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



{{-- delete permanently --}}

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
                <form action="" method="POST">
                    
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


    
   
    <script type="module" src="{{asset('js/checklist.js')}}"></script>
@endsection
@section('title', 'Checklist')