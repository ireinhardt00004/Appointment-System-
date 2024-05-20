<div class="w-full h-full">
    <div class="w-full">
    @if (!empty($selectedFormIds))
    @php
        $uniqueSelectedIds = array_unique($selectedFormIds); // Remove duplicates
    @endphp

    <div id="downloadable-popup-modal" data-selected-ids="{{ json_encode($uniqueSelectedIds) }}" class="flex w-full grow justify-center items-center gap-1 py-2 w-full">
        {{-- <span>{{ implode(', ', $uniqueSelectedIds) }}</span> --}}
    {{-- <div>
        <h3 class="font-bold text-2lg">Export As: <i class="fas fa-arrow-down"></i></h3>
    </div> --}}
        <a id="exportPsipopButton" href="#" class="w-full h-full flex justify-end items-center" onclick="showExportMessage()"> 
       
            <form id="exportPsipopForm" action="{{ route('export.psipop') }}" method="POST" class="w-full h-full flex justify-end items-center">
            @csrf
            <input type="hidden" name="selectedIds" value="{{ implode(',', $uniqueSelectedIds) }}">
            <button type="submit"  class="h-full w-full text-white bg-amber-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-nowrap">
                <i class="fa-solid fa-file-export"></i> Control (For Encoding to PSIPOP)
            </button>
        </form>
        </a>
        <a id="exportRaiButton" href="#" class="w-full grow h-full flex justify-end items-center" onclick="showExportMessage()"> 
            <form id="exportForm" action="{{ route('export-excel.rai') }}" method="POST" class="w-full h-full flex justify-end items-center">
                @csrf
                <input  type="hidden" name="selectedIds" value="{{ implode(',', $uniqueSelectedIds) }}">
                <button class="h-full w-full  text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-nowrap" type="submit">
                <i class="fa-solid fa-file-export"></i> RAI Form</button>
            </form>
        </a>
        <a id="exportTransmittalButton" href="#" class="w-full h-full flex justify-end items-center" onclick="showExportMessage()"> 
            <form id="exportForm" class="w-full" action="{{ route('export.transmittal') }}" method="POST">
                @csrf
                <input type="hidden" name="selectedIds" value="{{ implode(',', $uniqueSelectedIds) }}">
                <button type="submit" class="h-full w-full text-white bg-red-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-nowrap">
                    <i class="fas fa-file-export"></i> Transmittal of Appointee
                </button>
            </form> 
        </a> 
        <a id="exportControlCscButton" href="#" class="w-full h-full flex justify-end items-center" onclick="showExportMessage()">
            <form id="exportForm" class="w-full" action="{{ route('export.control-csc') }}" method="POST">
                @csrf
                <input type="hidden" name="selectedIds" value="{{ implode(',', $uniqueSelectedIds) }}">
                <button  type="submit" class="h-full w-full text-white bg-orange-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-nowrap">
                    <i class="fas fa-file-export"></i> Control Form (CSC FO Cavite)
                </button>
            </form> 
            </a>
               
<div type="button" class="relative flex w-full justify-center gap-1 items-center p-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 animate-pulse" title="You selected  {{ count($uniqueSelectedIds) }} Rows!">
    <i class="fa-solid fa-check"></i> 
    <h3 class="text-nowrap font-bold" >
        {{ count($uniqueSelectedIds) }}  Selected Rows 
    
    </h3>
      <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -start-2 dark:border-gray-900">{{ count($uniqueSelectedIds) }}</div>
    </div>
    </div>
    
@endif


    <div class="w-screen flex my-2" >
    <form class="w-full h-full grow" >{{--  wire:change="updatedQuery" --}}
        @csrf  
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative w-full h-full ">
            <div class="absolute inset-y-0 start-0 w-full flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
           <input wire:model.live.throttle.200ms="search"  type="search" name="query" id="default-search" class=" w-full h-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" title="Search by Transaction number, Name, School / district, Nature of appointment, Appointment status, Date of original appointment, Eligibility, Encoding personnel, Date encoded" placeholder="Search Here......"  {{--placeholder="@if($query){{ $query }}@else Search...@endif" --}}
            />
            {{-- <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button> --}}
        </div>
    </form>
    </div>

    {{-- per page --}}
    <div class="py-4 px-3 ">
        <div class="flex  ">
            <div class="flex space-x-4 items-center mb-3">
                <label class="w-32 text-sm font-medium text-gray-900 dark:text-white">Per Page</label>
                <select
                wire:model.live ="perPage"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
    </div>
</div>

    <table class="text-sm text-center text-gray-500 dark:text-gray-400 w-screen">
        <thead class="text-xs w-full text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <!-- <th class="scope text-center text-nowrap"><input type="checkbox" wire:model="selectAll" wire:change="toggleSelectAll($event.target.checked)" id="selectAllCheckbox"
    /           >Select All</th> -->
                    <div class="flex gap-1 text mb-2">
                    <button wire:click="selectAll"  class="bg-green-500 text-white p-2 rounded-lg dark:bg-blue-500">Select All</button>
                    <button wire:click="deselectAll" class="bg-black text-white  p-2 rounded-lg dark:bg-blue-500">Deselect All</button>
                    </div>
             <th class="scope"> </th>
                <th scope="col" class="px-6 py-3">#</th>
                <th class="scope" wire:click="setSortBy('transaction_number')" >
                    <button class="flex items-center uppercase">
                    Transaction Number
                    @if ($sortBy !== 'transaction_number')
                    <svg class="w-[17px] h-[17px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                      </svg>
                    @elseif ($sortDir === 'ASC')
                    <svg class="w-[22px] h-[22px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16 14-4-4-4 4"/>
                      </svg>
                                   
                    @else 
                    <svg class="w-[22px] h-[22px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 10 4 4 4-4"/>
                      </svg>
                      
                      
                    @endif
                   
                    </button>
                      </th>
                <th class="scope uppercase">Full Name</th>
                <th class="scope" wire:click="setSortBy('school_district')">
                    <button class="flex items-center uppercase">
                       School / District
                        @if ($sortBy !== 'school_district')
                        <svg class="w-[17px] h-[17px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                          </svg>
                        @elseif ($sortDir === 'ASC')
                        <svg class="w-[22px] h-[22px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16 14-4-4-4 4"/>
                          </svg>
                                       
                        @else 
                        <svg class="w-[22px] h-[22px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 10 4 4 4-4"/>
                          </svg>
                        @endif
                        </button>
                </th>
              {{--  <th class="scope" wire:click="setSortBy('salary_grade')">
                    <button class="flex items-center uppercase">
                      Salary Grade / Step
                        @if ($sortBy !== 'salary_grade')
                        <svg class="w-[17px] h-[17px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                          </svg>
                        @elseif ($sortDir === 'ASC')
                        <svg class="w-[22px] h-[22px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16 14-4-4-4 4"/>
                          </svg>
                                       
                        @else 
                        <svg class="w-[22px] h-[22px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 10 4 4 4-4"/>
                          </svg>
                        @endif
                        </button>
                </th> --}}
                <th class="scope" wire:click="setSortBy('appointment_nature')">
                    <button class="flex items-center uppercase">
                       Nature of Appointment
                          @if ($sortBy !== 'appointment_nature')
                          <svg class="w-[17px] h-[17px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                            </svg>
                          @elseif ($sortDir === 'ASC')
                          <svg class="w-[22px] h-[22px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16 14-4-4-4 4"/>
                            </svg>
                                         
                          @else 
                          <svg class="w-[22px] h-[22px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 10 4 4 4-4"/>
                            </svg>
                          @endif
                          </button>
                </th>
                <th class="scope" wire:click="setSortBy('appointment_status')">
                    <button class="flex items-center uppercase">
                       Status of Appointment
                          @if ($sortBy !== 'appointment_status')
                          <svg class="w-[17px] h-[17px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                            </svg>
                          @elseif ($sortDir === 'ASC')
                          <svg class="w-[22px] h-[22px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16 14-4-4-4 4"/>
                            </svg>
                                         
                          @else 
                          <svg class="w-[22px] h-[22px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 10 4 4 4-4"/>
                            </svg>
                          @endif
                          </button>
                        </th>
                <th class="scope" wire:click="setSortBy('date_original_appointment')">
                    <button class="flex items-center uppercase">
                       Date of Original Appoinment
                           @if ($sortBy !== 'date_original_appointment')
                           <svg class="w-[17px] h-[17px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                             </svg>
                           @elseif ($sortDir === 'ASC')
                           <svg class="w-[22px] h-[22px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16 14-4-4-4 4"/>
                             </svg>
                                          
                           @else 
                           <svg class="w-[22px] h-[22px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 10 4 4 4-4"/>
                             </svg>
                           @endif
                           </button>
                </th>
                <th class="scope " wire:click="setSortBy('eligibility')">
                    <button class="w-full flex justify-center items-center text-center uppercase">
                                 Eligibility
                         @if ($sortBy !== 'eligibility')
                           <svg class="w-[17px] h-[17px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                             </svg>
                           @elseif ($sortDir === 'ASC')
                           <svg class="w-[22px] h-[22px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16 14-4-4-4 4"/>
                             </svg>
                                          
                           @else 
                           <svg class="w-[22px] h-[22px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 10 4 4 4-4"/>
                             </svg>
                           @endif
                           </button>    
                </th>
                <th class="scope uppercase">Encoding Personnel</th>
                <th class="scope" wire:click="setSortBy('created_at')">
                    <button class="flex items-center uppercase">
                       Date Encoded
                           @if ($sortBy !== 'created_at')
                           <svg class="w-[17px] h-[17px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                             </svg>
                           @elseif ($sortDir === 'ASC')
                           <svg class="w-[22px] h-[22px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16 14-4-4-4 4"/>
                             </svg>
                                          
                           @else 
                           <svg class="w-[22px] h-[22px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 10 4 4 4-4"/>
                             </svg>
                           @endif
                           </button></th>
                <th class="scope">Action</th>
            </tr>
            {{-- @else
              <tr>
                  <th colspan="22" class="px-6 py-3">
                      <p class="font-bold text-gray">No result found.</p>
                  </th>
              </tr>
              @endif --}}
        </thead>
        <tbody id="tbody">
          @if($forms->isEmpty())
          <tr>
              <br>
          <td colspan="9"class="px-6 py-4 font-bold">No  data available</td>
          </tr>
           @else
        
           @php
            $startIndex = ($forms->currentPage() - 1) * $forms->perPage() + 1;
            $endIndex = $startIndex + $forms->count() - 1;
          @endphp

            @if ($forms->isEmpty())
                <tr>
                    <td colspan="9" class="px-6 py-4 font-bold">No data available</td>
                </tr>
            @else
                @foreach ($forms as $index => $form)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-700" wire:key="form-{{ $form->id }}">
                        <td class="px-6 py-4">
                            <input type="checkbox" 
                            {{ $form->isChecked() ? 'checked' : '' }} 
                            class="cursor-pointer" 
                            title="Select to fetch" 
                            wire:click="selectData({{ $form->id }})" 
                            value="{{ $form->id }}">
                            
                        </td>
            <td class="px-6 py-4">{{ $startIndex + $index }}</td>
                <td class="px-6 py-4">{{ $form->transaction_number }}</td>
               <td class="px-6 py-4">{{ $form->full_name}}</td>
               <td class="px-6 py-4">{{ $form->school_district }}</td>
               {{-- <td class="px-6 py-4">{{ $form->salary_grade }}</td>  --}}
               <td class="px-6 py-4">{{ $form->appointment_nature }}</td>
               <td class="px-6 py-4">{{ $form->appointment_status }}</td>
               <td class="px-6 py-4">{{$form->date_original_appointment }}</td>
              <td class="px-6 py-4">{{$form->eligibility }}</td>
              <td class="px-6 py-4">{{$form->users->fname }} {{$form->users->middlename }} {{$form->users->lname }}</td>
              <td class="px-6 py-4">
                  {{ $form->created_at->format('F d, Y') }} {{-- Month name dd, year --}}
                  <br>
                  {{ $form->created_at->format('h:i:s A') }} {{-- 12-hour format time --}}
              </td> 
              <td class="px-3 py-3 justify-center items-center w-full h-full flex gap-2">
                      <a href="{{route('view.no33pdf', ['id' => $form->id]) }}" target="_blank" class="font-sm h-full w-full text-blue-600 dark:text-blue-500 hover:underline">
                          <button type="button" class="text-white bg-green-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full h-full px-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-nowrap">
                              <i class="fas fa-file"></i> No.33-B AFA
                          </button>
                      </a>
                      <a href="{{route('export-excel.checklist', ['id' => $form->id]) }}" target="_blank" class="font-sm h-full w-full text-blue-600 dark:text-blue-500 hover:underline">
                          <button type="button" class="text-white bg-blue-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full  px-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-nowrap">
                              <i class="fas fa-list"></i> Checklist
                          </button>
                      </a>
                      @if ($form->user_id === auth()->user()->id)
                      {{--<a class="font-sm text-blue-600 dark:text-blue-500 h-full w-full hover:underline" title="Edit Row">
                          <button type="button" class="text-white bg-sky-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"  
                          wire:click="$dispatch('openModal', { component: 'edit-appointment', arguments: { user: {{ $form->id }} }})"  value="{{ $form->id }}">
                              <i class="fas fa-edit"></i>
                          </button>
                      </a>--}}
                      <a class="font-sm text-blue-600 dark:text-blue-500 h-full w-full hover:underline">
                          <button type="button" data-modal-target="editpopup-modal" data-form-id="{{ $form->id }}" data-modal-toggle="editpopup-modal"  class="text-white bg-sky-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-nowrap"   
                            value="{{ $form->id }}">
                              <i class="fas fa-edit"></i> Edit
                          </button>
                      </a>
                      <a href="#" class="font-sm text-blue-600 dark:text-blue-500 h-full w-full hover:underline" title="Delete Row">
                        <button id="delete-button" type="button" data-modal-target="deletepopup-modal" data-modal-toggle="deletepopup-modal" class="text-white bg-red-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-nowrap" data-form-id="{{  $form->id }}" value="{{  $form->id }}">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </a>
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
                <form id="delete-form" action="{{ route('delete.appointment') }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" id="delete-appointment-id" name="userID" value="">
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this row?</h3>
                    <button data-modal-hide="deletepopup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                
                    <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

                  @endif
  
                  </td>         
            </tr>
            @endforeach
            @endif
            @endif
        </tbody>
     </table>
    

     
 <!-- Pagination links -->
 <div class="w-screen grow flex  justify-start items-center gap-3 m-3" id="paginate-but">
    <div class="d-flex justify-content-between align-items-center">
        <div class="text-2lg font-bold m-2 dark:text-white">
            Showing {{ $forms->firstItem() }} to {{ $forms->lastItem() }} of {{ $forms->total() }} results
        </div>
        <ul class="pagination">
            {{-- Pagination links --}}
            {{ $forms->links('custom-pagination-links', ['paginator' => $forms]) }}
        </ul>
    </div>
 </div>


@include('forms.edit-appointment')

@script
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const selectAllCheckbox = document.getElementById('selectAllCheckbox');
    console.log(checkboxes)

    selectAllCheckbox.addEventListener('change', function () {
        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });
});
    document.addEventListener('livewire:load', function () {
        Livewire.on('refreshComponent', () => {
            Livewire.dispatch('refreshLivewireComponent');
            console.log('Livewire refresh emitted');
        });
    });
</script>

@endscript


</div>
