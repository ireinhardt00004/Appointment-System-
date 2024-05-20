@extends('layouts.app')
@section('content')
    <div class="h-full w-full flex flex-col">
    <div class="w-full flex justify-between items-center">
        <h4 class="font-semibold text-lg flex justify-end items-center text-gray-800 dark:text-gray-200 leading-tight w-full p-3 me-3 gap-3">
        <a href="{{ route('download-activity-logs') }}">
            <button class="bg-blue-500 rounded-lg p-2 text-white"   title="Download Logs">
                <i class="fas fa-download"></i>  Export / Download CSV
            </button>
        </a>
        
        <button class="bg-red-500 rounded-lg p-2 text-white"  x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"  title="Clear all the Activity Logs">
            <i class="fas fa-trash"></i> Clear Activity Logs
        </button> 
        </h>
</div>
    <div class="h-full w-full flex flex-col justify-center text-center p-4">
        
<table class="border-collapse table-fixe border border-slate-400 h-full w-full text-center p-3 dark:bg-gray-500">
  <thead class="bg-[#004000] text-white gap-3">
    <tr class="text-[1.5rem]">
    <th>#</th>
    <th>Activity </th>
    <th>TimeStamp</th>
    <th>Action</th>
    </tr>
  </thead>
  {{-- Set the starting index for the next page --}}
    @php
        $startIndex = ($logs->currentPage() - 1) * $logs->perPage() + 1;
    @endphp
     @if($logs->isEmpty())
     <tr>
         <br>
     <td colspan="9"class="px-6 py-4 font-bold">No logs.</td>
     </tr>
      @else
@foreach ($logs as $index => $log)
<tbody class="even:bg-gray-50 odd:bg-white">
        <tr class="text-[1.2rem] ">   
            <td>{{ $startIndex + $index }}</td>
            <td>{{ $log->activity}}</td>
            <td>{{ $log->created_at->diffForHumans() }}</td>
            <td>
                <form action="{{ route('delete.log', ['id' => $log->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 p-1" title="Delete"><i class="fas fa-trash"></i> </button>
            </form>
            </td>
        </tr> 
  </tbody>
  @endforeach
  @endif
</table>
{{ $logs->links() }}
</div>   
     </div>
         </div>
            </div>
                </div>
               
    </div>
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('clear.logs') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your logs?') }}
            </h2>

            <p class="mt-1 text-base text-gray-600 dark:text-gray-400">
                {{ __('Once your logs is deleted, it cannot be undone.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <!-- <x-text-input 
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />-->
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Logs') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
    @endsection
    @section('title','Activity Logs')  


    