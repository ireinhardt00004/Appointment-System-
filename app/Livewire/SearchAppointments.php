<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use App\Models\CheckData;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class SearchAppointments extends Component
{
    use WithPagination;
    
    public $query = '';
    public $selectedFormIds = [];
    public $perPage = 10;
    public $search = '';
    public $sortBy = 'created_at';
    public $sortDir = 'DESC';
    public $page = 1;
    

   
    public function mount()
    {
        $checkData = CheckData::where('user_id', auth()->user()->id)->get();
        $this->selectedFormIds = $checkData->pluck('appointment_id')->toArray();
    }
    
    public function nextPage()
    {
    $this->page++;
    $this->refreshComponent();
    }

    public function previousPage()
    {
        $this->page--;
        $this->refreshComponent();
    }
    public function selectAll()
        {
            
            $allFormIds = Appointment::pluck('id')->toArray();

            $this->selectedFormIds = array_unique(array_merge($this->selectedFormIds, $allFormIds));

            foreach ($allFormIds as $formId) {
                CheckData::updateOrCreate(
                    ['appointment_id' => $formId, 'user_id' => Auth::id()]
                );
            }
        // $this->refreshComponent();
    }

    public function deselectAll()
    {
    $this->selectedFormIds = []; 
    CheckData::where('user_id', auth()->id())->delete(); // Clear the selection in the database

    session(['selectedFormIds' => []]); 
    $this->refreshComponent();
    }

            
    // public function selectData($formId)
    // {
    //     $existingRecord = CheckData::where('appointment_id', $formId)
    //         ->where('user_id', auth()->id())
    //         ->first();

    //     if ($existingRecord) {
    //         $existingRecord->delete(); // Delete the existing record
    //     } else {
    //         CheckData::create([
    //             'appointment_id' => $formId,
    //             'user_id' => auth()->id()
    //         ]);
    //     }

    //     $this->refreshComponent();
    // }
        public function selectData($formId)
    {
        if (in_array($formId, $this->selectedFormIds)) {
            // Remove the ID if it exists in the selectedFormIds array
            $this->selectedFormIds = array_diff($this->selectedFormIds, [$formId]);
        } else {
            // Add the ID if it doesn't exist
            $this->selectedFormIds[] = $formId;
        }

        // Update CheckData entries if necessary
        if (CheckData::where('appointment_id', $formId)->where('user_id', auth()->id())->exists()) {
            CheckData::where('appointment_id', $formId)->where('user_id', auth()->id())->delete();
        } else {
            CheckData::create([
                'appointment_id' => $formId,
                'user_id' => auth()->id()
            ]);
        }
    }
    public function updatedQuery()
    {
        $this->resetPage(); 
        $this->selectedFormIds = []; 
    }

    public function updatedPage()
    {
        $this->reset('selectedFormIds'); 
    }
    public function setSortBy ($sortByField) {
        if ($this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir == 'ASC') ? 'DESC' : "ASC";
        }
        $this->sortBy = $sortByField;
    }
    public function search()
    {
        $this->resetPage();
    }
    public function render()
    {
        // Fetch forms data with pagination
        $forms = Appointment::search($this->search)
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);
    
        // Fetch CheckData for the authenticated user
        $checkData = CheckData::where('user_id', auth()->id())->get();
        $selectedFormIds = $checkData->pluck('appointment_id')->toArray();
    
        // Pass forms and selectedFormIds to the Livewire view
        return view('livewire.search-appointments', [
            'forms' => $forms,
            'selectedFormIds' => $selectedFormIds,
        ]);
    }
    
     private function refreshComponent()
     {
         $this->dispatch('refreshComponent');
     }
}
