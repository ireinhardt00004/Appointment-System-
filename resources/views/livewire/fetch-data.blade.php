<div class="w-full h-full">
    @if (!empty($selectedFormIds))
    @php
        $uniqueSelectedIds = array_unique($selectedFormIds); // Remove duplicates
    @endphp

    <div id="downloadable-popup-modal" data-selected-ids="{{ json_encode($uniqueSelectedIds) }}" class="flex w-full grow justify-center items-center gap-1 py-2">
        <!-- <h3 class="font-semibold p-2 text-xl text-nowrap bg-gray-300 rounded-lg"> ({{ count($uniqueSelectedIds) }}) Selected Rows </h3> -->
        
<div type="button" class="relative flex w-full justify-center gap-1 items-center p-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 animate-pulse">
<i class="fa-solid fa-check"></i> 
<h3 class="text-nowrap font-bold" >
    Selected Rows

</h3>
  <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">{{ count($uniqueSelectedIds) }}</div>
</div>

        {{-- <span>{{ implode(', ', $uniqueSelectedIds) }}</span> --}}
        <a id="exportPsipopButton" href="#" class="w-full h-full flex justify-end items-center" onclick="showExportMessage()"> 
            <form id="exportPsipopForm" action="{{ route('export.psipop') }}" method="POST" class="w-full h-full flex justify-end items-center">
            @csrf
            <input type="hidden" name="selectedIds" value="{{ implode(',', $uniqueSelectedIds) }}">
            <button type="submit"  class="h-full w-full text-white bg-amber-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-nowrap">
                <i class="fa-solid fa-file-export"></i> Control (For Encoding to PSIPOP)
            </button>
        </form>
        </a>
        <a id="exportRaiButton" href="#" class="w-full h-full flex justify-end items-center" onclick="showExportMessage()"> 
            <form id="exportForm" action="{{ route('export-excel.rai') }}" method="POST" class="w-full h-full flex justify-end items-center">
                @csrf
                <input  type="hidden" name="selectedIds" value="{{ implode(',', $uniqueSelectedIds) }}">
                <button class="h-full w-full  text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-nowrap" type="submit">
                <i class="fa-solid fa-file-export"></i> RAI Form</button>
            </form>
        </a>
        <a id="exportTransmittalButton" href="#" class="w-full h-full flex justify-end items-center" onclick="showExportMessage()"> 
            <form id="exportForm" action="{{ route('export.transmittal') }}" method="POST">
                @csrf
                <input type="hidden" name="selectedIds" value="{{ implode(',', $uniqueSelectedIds) }}">
                <button type="submit" class="h-full w-full text-white bg-red-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-nowrap">
                    <i class="fas fa-file-export"></i> Transmittal of Appointee
                </button>
            </form> 
        </a> 
        <a id="exportControlCscButton" href="#" class="w-full h-full flex justify-end items-center" onclick="showExportMessage()">
            <form id="exportForm" action="{{ route('export.control-csc') }}" method="POST">
                @csrf
                <input type="hidden" name="selectedIds" value="{{ implode(',', $uniqueSelectedIds) }}">
                <button  type="submit" class="h-full w-full text-white bg-orange-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-nowrap">
                    <i class="fas fa-file-export"></i> Control Form (CSC FO Cavite)
                </button>
            </form> 
            </a>
    </div>
@endif

@script
{{-- <script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('refreshComponent', () => {
            Livewire.dispatch('refreshLivewireComponent');
            console.log('Livewire refresh emitted');
        });
    });
</script> --}}



@endscript
</div>
