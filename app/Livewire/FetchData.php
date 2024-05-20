<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CheckData; 
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class FetchData extends Component
{
    public $selectedFormIds = []; // Initialize the selectedFormIds array
    protected $listeners = ['selectAll', 'deselectAll', 'selectData', 'refreshComponent', 'formId'];
    
    public function mount()
    {
        $checkData = CheckData::where('user_id', auth()->user()->id)->get();
        $this->selectedFormIds = $checkData->pluck('appointment_id')->toArray();
    }
    

    
    public function render()
    {
        // Fetch additional data or perform other logic here if needed
        return view('livewire.fetch-data', [
            'selectedFormIds' => $this->selectedFormIds,
        ]);
    }
     private function refreshComponent()
    {
       // $this->dispatch('render');
       $this->refreshComponent();
       $this->resetPage();
    }
}
