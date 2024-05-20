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

    // Fetch data when the component is mounted
    public function mount()
    {
        // Retrieve selected IDs from CheckData model based on the current user
        $this->selectedFormIds = CheckData::where('user_id', Auth::id())
            ->pluck('appointment_id')
            ->toArray();
    }

    public function toggleSelection($formId)
{
    $isChecked = in_array($formId, $this->selectedFormIds);

    if ($isChecked) {
        // Remove the ID if it already exists
        $key = array_search($formId, $this->selectedFormIds);
        if ($key !== false) {
            array_splice($this->selectedFormIds, $key, 1);
        }
        // Delete CheckData entry for the deselected form
        CheckData::where('appointment_id', $formId)
            ->where('user_id', Auth::id())
            ->delete();
    } else {
        // Add the ID if it doesn't exist
        $this->selectedFormIds[] = $formId;
        // Create or update CheckData entry for the selected form
        CheckData::updateOrCreate(
            ['appointment_id' => $formId, 'user_id' => Auth::id()]
        );
    }

    // Refresh the component to reflect the changes
    $this->emitSelf('refreshComponent');
}



    public function fetchSelectedIds($formId)
    {
        if (in_array($formId, $this->selectedFormIds)) {
            // Remove the ID if it already exists
            $this->selectedFormIds = array_diff($this->selectedFormIds, [$formId]);
        } else {
            // Add the ID if it doesn't exist
            $this->selectedFormIds[] = $formId;
        }

        // Update CheckData entries accordingly
        CheckData::updateOrCreate(
            ['appointment_id' => $formId, 'user_id' => auth()->id()]
        );
    }

    public function selectAll()
    {
        // Fetch all appointment IDs
        $allFormIds = Appointment::pluck('id')->toArray();

        // Add all IDs to selectedFormIds
        $this->selectedFormIds = array_unique(array_merge($this->selectedFormIds, $allFormIds));

        // Update CheckData entries accordingly
        foreach ($allFormIds as $formId) {
            CheckData::updateOrCreate(
                ['appointment_id' => $formId, 'user_id' => Auth::id()]
            );
        }
    }

    public function deselectAll()
    {
        // Remove all selected IDs
        $this->selectedFormIds = [];

        // Delete all CheckData entries associated with the current user
        CheckData::where('user_id', Auth::id())->delete();

        // Clear the selected IDs from the session
        session(['selectedFormIds' => []]);
    }

    public function updatedQuery()
    {
        $this->resetPage(); // Reset pagination when the query is updated
        $this->selectedFormIds = []; // Clear selected IDs when the query is updated
    }

    public function updatedPage()
    {
        $this->reset('selectedFormIds'); // Clear selected IDs when the page changes
    }
    public function render()
    {
        $hasResults = Appointment::where('transaction_number', 'like', '%' . $this->query . '%')
            ->orWhere('fname', 'like', '%' . $this->query . '%')
            ->orWhere('mname', 'like', '%' . $this->query . '%')
            ->orWhere('lname', 'like', '%' . $this->query . '%')
            ->orWhere('school_district', 'like', '%' . $this->query . '%')
            ->orWhere('appointment_nature', 'like', '%' . $this->query . '%')
            ->orWhere('appointment_status', 'like', '%' . $this->query . '%')
            ->orWhere('date_original_appointment', 'like', '%' . $this->query . '%')
            ->orWhere('eligibility', 'like', '%' . $this->query . '%')
            ->orWhere('created_at', 'like', '%' . $this->query . '%')
            ->orWhereHas('users', function ($queryBuilder) {
                $queryBuilder->where('fname', 'like', '%' . $this->query . '%')
                    ->orWhere('lname', 'like', '%' . $this->query . '%');
            })
            ->orWhereDate('date_original_appointment', $this->query)
            ->orWhereDate('created_at', $this->query)
            ->latest()->paginate(3);

        return view('livewire.search-appointments', [
            'forms' => $hasResults,
        ]);
    }
}
