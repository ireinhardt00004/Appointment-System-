@extends('layouts.app')
@section('content')

<section class="bg-white w-full h-full dark:bg-gray-900">

    <div class="py-10 px-5 mx-auto flex flex-col justify-center items-center  w-[100%] shadow-[0px_0px_17px_-1px_rgba(120,120,120,1)] border border-gray-300 rounded-[16px] space-y-4">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Monitoring Report</h2>
    
  <div class="flex w-full justify-end items-center gap-2">
  <form class="w-full h-full flex" action="{{-- route('csc-table.search')--}}" method="GET">
      @csrf  
      <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
      <div class="relative w-full h-full grow">
          <div class="absolute inset-y-0 start-0 w-full flex items-center ps-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
              </svg>
          </div>
          <input type="search" name="query" id="default-search" class="block w-full h-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" title="Search Name of Appointee..."placeholder="Search Name of Appointee, Salary Grade, Employment Status, Type of Eligiblity use..." />
          <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
      </div>
  </form>
    <div class="flex space-y-4 h-full justify-center items-center md:flex md:space-x-4 ">
        <!-- Modal toggle -->
        
        <button data-modal-target="extralarge-modal" data-modal-toggle="extralarge-modal" class="block w-full text-white bg-blue-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        <i class="fas fa-plus"></i> <i class="fas fa-pencil"></i> Appointment Form
        </button>
    </div>
    <div class="flex justify-end h-full items-center">
    <a href="{{ route('download.control-csc-form') }}"><button type="button"  class="text-white bg-gray-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-download"></i> Download Table</button></a>
    
    </div>
  </div>
        
      <div class="w-full overflow-x-auto">
          {{-- @if ($hasResults) --}}
        <table class="text-sm text-center text-gray-500 dark:text-gray-400">
          <thead class="text-xs w-full text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                  <th scope="col" class="px-6 py-3">#</th>
                  <th scope="col" class="px-6 py-3">Sector</th>
                  <th scope="col" class="px-6 py-3">Transaction Number</th>
                  <th scope="col" class="px-6 py-3">Name of Appointee</th>
                  <th scope="col" class="px-6 py-3">Salary Grade</th>
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
                  <th  scope="col" colspan="2">Actions</th>
              </tr>
          </thead>
          <tbody>
                        {{-- @php
                          $startIndex = ($forms->currentPage() - 1) * $forms->perPage() + 1;
                      @endphp
                      @foreach ($forms as $index => $form) --}}
              <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                  <!-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      Apple MacBook Pro 17"
                  </th> -->
                  <td class="px-6 py-4">
                  {{-- {{ $startIndex + $index }} --}}
                  </td>
                  <td class="px-6 py-4">
                   {{-- {{ $form->sector}} --}}
                  </td>
                  <td class="px-6 py-4">
                   {{-- {{ $form->agency_name}} --}}
                  </td>
                  <td class="px-6 py-4">
                   {{-- {{ $form->appointee_name }} --}}
                  </td>
                  <td class="px-6 py-4">
                   {{-- {{ $form->salary_grade }} --}}
                  </td>
                  <td class="px-6 py-4">
                   {{-- {{ $form->position_level }} --}}
                  </td>
                  <td class="px-6 py-4">
                   {{-- {{ $form->employment_status }} --}}
                  </td>
                  <td class="px-6 py-4">
                   {{-- {{ $form->appointment_nature }} --}}
                  </td>
                  <td class="px-6 py-4">
                   {{-- {{ $form->casual_appointment_date_from }} --}}
                  </td>
                  <td class="px-6 py-4">
                   {{-- {{ $form->casual_appointment_date_to }} --}}
                  </td>
                  <td class="px-6 py-4">
                   {{-- {{ $form->appointment_authority_name }} --}}
                  </td>
                  <td class="px-6 py-4">
                   {{-- {{ $form->appointment_issuance_date }} --}}
                  </td>
                  <td class="px-6 py-4">
                   {{-- {{ $form->date_of_birth }} --}}
                  </td>
                  <td class="px-6 py-4">
                   {{-- {{ $form->sex }} --}}
                  </td>
                  <td class="px-6 py-4">
                   {{-- {{ $form->is_PWD }} --}}
                  </td>
                  <td class="px-6 py-4">
                   {{-- {{ $form->disability_type }} --}}
                  </td>
                  <td class="px-6 py-4">
                   {{-- $form->ip_group_member --}}
                  </td>
                  <td class="px-6 py-4">
                   {{-- $form->ethnicity --}}
                  </td>
                  <td class="px-6 py-4">
                   {{-- $form->eligbility_use_type --}}
                  </td>
                  <td class="px-6 py-4">
                   {{-- $form->eligibility_effectivity_date --}}
                  </td>
                  <td class="px-6 py-4">
                   {{-- $form->is_First_used_eligiblity --}}
                  </td>
                   <td class="px-3 py-3 flex gap-2">
                   <a href="#" class="font-sm text-blue-600 dark:text-blue-500 hover:underline">
                        <button type="button"  class="text-white bg-sky-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-edit"></i>Edit</button>
                      </a>
                      <a href="#" class="font-sm text-blue-600 dark:text-blue-500 hover:underline">
                        <button type="button"  class="text-white bg-red-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-2 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-trash"></i> Delete</button>
                      </a>
                  </td>
              {{-- @endforeach --}}
          </tbody>
      </table>
      {{-- $forms->links() --}}
    </div>
    {{-- @else  --}}
    <div>
      <p  class="px-6 py-3 text-gray-900 dark:text-white">No result found.</p>
    </div>
    {{-- @endif --}}
  </section>
  
{{--<div class="relative overflow-x-auto rounded-lg shadow-[0px_0px_17px_-1px_rgba(120,120,120,1)] ">
    


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Color
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-100 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Microsoft Surface Pro
                </th>
                <td class="px-6 py-4">
                    White
                </td>
                <td class="px-6 py-4">
                    Laptop PC
                </td>
                <td class="px-6 py-4">
                    $1999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-100 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Magic Mouse 2
                </th>
                <td class="px-6 py-4">
                    Black
                </td>
                <td class="px-6 py-4">
                    Accessories
                </td>
                <td class="px-6 py-4">
                    $99
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-100 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Google Pixel Phone
                </th>
                <td class="px-6 py-4">
                    Gray
                </td>
                <td class="px-6 py-4">
                    Phone
                </td>
                <td class="px-6 py-4">
                    $799
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple Watch 5
                </th>
                <td class="px-6 py-4">
                    Red
                </td>
                <td class="px-6 py-4">
                    Wearables
                </td>
                <td class="px-6 py-4">
                    $999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>


</div>
 --}}

@endsection
@section('title', 'Monitoring Table')