<?php

namespace App\Http\Controllers;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 
use Illuminate\Database\QueryException;
use App\Models\TransmittalofAppointee;
use App\Models\CSCControlForm;
use App\Models\No33BAFA;
use App\Models\ControlPSIPOP;
use App\Models\Rai;
use App\Models\ApplicationChecklist;

class FormController extends Controller
{    
    public function formOne() {
    try {
    $user = auth()->user();
    $userID = $user->id;
    
    // Retrieve active transmittals
    $forms = No33BAFA::where('user_id', $userID)
        ->latest()
        ->paginate(10);

    // Retrieve trashed transmittals if requested
     $trasheds = No33BAFA::onlyTrashed()
            ->where('user_id', $userID)
            ->latest()
            ->paginate(10);
     // Pass an empty string as the query since there's no search
     $query = '';
    
     // Assuming there are always results initially
     $hasResults = true;

            ActivityLog::create([
                'user_id' => $userID,
                'activity' => 'Visited No.33-B AFA page.'
            ]);
    
    return view('forms.no33', compact('forms', 'trasheds','hasResults','query'));
} catch (QueryException $e) {
    Log::error('Error in fetching the page: ' . $e->getMessage());
    return redirect()->back()->with('error', 'Error in Fetching the page. Please contact the Administrator.');
}
}
    public function ControlPSIPOP() {
        try {
            $user = auth()->user();
            $userID = $user->id;
            // Retrieve active transmittals
            $forms = ControlPSIPOP::where('user_id', $userID)
                ->latest()
                ->paginate(10);
    
            // Retrieve trashed transmittals if requested
             $trasheds = ControlPSIPOP::onlyTrashed()
                    ->where('user_id', $userID)
                    ->latest()
                    ->paginate(10);
           $query = '';
    
            // Assuming there are always results initially
            $hasResults = true;
        ActivityLog::create([
            'user_id' => $userID,
            'activity' => 'Visited Control (For Encoding to PSIPOP) page.'
        ]);
        return view('forms.control', compact('forms','query','hasResults','trasheds'));
    } catch (QueryException $e) {
        Log::error('Error in fetching the page'.$e->getMessage());
        return redirect()->back()->with('error','Error in Fetching the page. Please contact the Administrator.');
    }
    }

    public function checkList() {
        try {
        $user = auth()->user();
        $userID = $user->id;
        // Retrieve active transmittals
        $forms =  ApplicationChecklist::where('user_id', $userID)
        ->latest()
        ->paginate(10);

    // Retrieve trashed transmittals if requested
     $trasheds = ControlPSIPOP::onlyTrashed()
            ->where('user_id', $userID)
            ->latest()
            ->paginate(10);
   $query = '';

    // Assuming there are always results initially
    $hasResults = true;
        
        ActivityLog::create([
            'user_id' => $userID,
            'activity' => 'Visited Checklist page.'
        ]);
        return view('forms.checklist', compact('forms','query','hasResults'));
    } catch (QueryException $e) {
        Log::error('Error in fetching the page'.$e->getMessage());
        return redirect()->back()->with('error','Error in Fetching the page. Please contact the Administrator.');
    }
    }

    public function rai() {
        try {
            $user = auth()->user();
            $userID = $user->id;
            
            // Retrieve active transmittals
            $rais = Rai::where('user_id', $userID)
                ->latest()
                ->paginate(10);
        
            // Retrieve trashed transmittals if requested
             $trasheds = Rai::onlyTrashed()
                    ->where('user_id', $userID)
                    ->latest()
                    ->paginate(10);
             // Pass an empty string as the query since there's no search
             $query = '';
            
             // Assuming there are always results initially
             $hasResults = true;
        
                    ActivityLog::create([
                        'user_id' => $userID,
                        'activity' => 'Visited RAI page.'
                    ]);
            
            return view('forms.rai', compact('rais', 'trasheds','hasResults','query'));
        } catch (QueryException $e) {
            Log::error('Error in fetching the page: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error in Fetching the page. Please contact the Administrator.');
        }
        }
    public function transmittal(Request $request) {
        try {
            $user = auth()->user();
            $userID = $user->id;
            
            // Retrieve active transmittals
            $transmittals = TransmittalofAppointee::where('user_id', $userID)
                ->latest()
                ->paginate(10);
    
            // Retrieve trashed transmittals if requested
             $trasheds = TransmittalofAppointee::onlyTrashed()
                    ->where('user_id', $userID)
                    ->latest()
                    ->paginate(10);
           $query = '';
    
            // Assuming there are always results initially
            $hasResults = true;

            ActivityLog::create([
                'user_id' => $userID,
                'activity' => 'Visited Transmittal of Appointee page.'
            ]);
            
            return view('forms.transmittal', compact('transmittals', 'trasheds','query','hasResults'));
        } catch (QueryException $e) {
            Log::error('Error in fetching the page: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error in Fetching the page. Please contact the Administrator.');
        }
    }
    

    public function controlFormCSC()
    {
        try {
            $user = auth()->user();
            $userID = $user->id;
            
            // Retrieve active transmittals
            $forms = CSCControlForm::where('user_id', $userID)
                ->latest()
                ->paginate(10);
    
            // Retrieve trashed transmittals if requested
             $trasheds = CSCControlForm::onlyTrashed()
                    ->where('user_id', $userID)
                    ->latest()
                    ->paginate(10);
           $query = '';
    
            // Assuming there are always results initially
            $hasResults = true;

            ActivityLog::create([
                'user_id' => $userID,
                'activity' => 'Visited Control Form (CSC FO Cavite) (Blank) page.'
            ]);
            
            return view('forms.control-form-csc', compact('forms', 'trasheds','query','hasResults'));
        } catch (QueryException $e) {
            Log::error('Error in fetching the page: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error in Fetching the page. Please contact the Administrator.');
        }
    }
    
    public function search(Request $request)
    {
        $query = $request->input('query');
        $forms = CSCControlForm::where('appointee_name', 'like', '%' . $query . '%')
                               ->orWhere('salary_grade', 'like', '%' . $query . '%')
                               ->orWhere('position_title', 'like', '%' . $query . '%')
                               ->orWhere('employment_status', 'like', '%' . $query . '%')
                               ->orWhere('sex', 'like', '%' . $query . '%')
                               ->orWhere('eligbility_use_type', 'like', '%' . $query . '%')
                               ->paginate(10);
    
        $hasResults = $forms->count() > 0; // Check if there are any results
    
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity' => 'Searched CSC Control Form table with a query: ' . $query,
        ]);
    
        return view('forms.control-form-csc', compact('forms', 'hasResults', 'query'));
    }
    
public function deleteCSC(Request $request, $id) {
    $form = CSCControlForm::find($id);
    
    if(!$form) {
        return redirect()->back()->with('error', 'Row not found');
    }

    $form->delete();
    return redirect()->back()->with('success', 'Row soft deleted successfully');
}

/*sample restoration 

public function deleteCSC(Request $request, $id) {
    $form = CSCControlForm::withTrashed()->find($id);
    
    if(!$form) {
        return redirect()->back()->with('error', 'Row not found');
    }

    // Check if the row is soft-deleted
    if ($form->trashed()) {
        $form->restore();
        return redirect()->back()->with('success', 'Row recovered successfully');
    } else {
        // Perform regular delete operation
        $form->delete();
        return redirect()->back()->with('success', 'Row soft deleted successfully');
    }
}*/



}
