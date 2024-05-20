<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\TransmittalofAppointee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log; 
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Response;
use Rap2hpoutre\FastExcel\FastExcel;

class TransmittalController extends Controller
{   
    public function exportTrans()
    {
        $data = TransmittalofAppointee::latest()->select('level', 'school', 'name_of_appointee', 'remark', 'signature_of_appointee', 'date_and_time')->get();
        //dd($data);

        // Map column names to custom names
        $customColumnNames = [
            'level' => 'Level',
            'school' => 'School',
            'name_of_appointee' => 'Name of Appointee',
            'remark' => 'Remarks',
            'signature_of_appointee' => 'Signature of Appointee',
            'date_and_time' => 'Date and Time',
        ];
    
        // Rename columns
        $data = $data->map(function ($item) use ($customColumnNames) {
            return collect($item)->mapWithKeys(function ($value, $key) use ($customColumnNames) {
                return [$customColumnNames[$key] ?? $key => $value];
            });
        });
    
        // Initialize FastExcel
        $fastexcel = new FastExcel($data);
        
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity' => 'Exported the Transmittal of Appointee data .',
        ]);
    
        // Export to 'file.xlsx' and automatically download
        return $fastexcel->download('file.xlsx');
    }
    

    public function submit(Request $request) {
        try {
            $user = auth()->user();
            $userID = $user->id;
            $validatedData = $request->validate([
                'level' => 'required|string',
                'school' => 'required|string',
                'remark' => 'nullable|string',
                'name_of_appointee' => 'required|string',
                'signature_of_appointee' => 'nullable|string',
                'date_and_time' => 'nullable',
                //required|date_format:Y-m-d H:i:s|after_or_equal:' . date(DATE_ATOM),
            ]);
            // Generate unique transaction number
            $transactionNumber = 'TRANSMITTAL-' . strtoupper(date('Y-F')) . '-' . uniqid();
            // Create a new checklist instance
        
           $forms = new TransmittalofAppointee;
           $forms->transaction_number = $transactionNumber;
           $forms->level = $validatedData['level'];
           $forms->school = $validatedData['school'];
           $forms->remark = $validatedData['remark'];
           $forms->name_of_appointee = $validatedData['name_of_appointee'];
           //$forms->signature_of_appointee = $validatedData['signature_of_appointee'];
          // $forms->date_and_time = $validatedData['date_and_time'];
           
           $forms->user_id = $userID;
            // Save the checklist
           $forms->save();
            
            ActivityLog::create([
                'user_id' => $userID,
                'activity' => 'Submitted a Transmitaal of Appointee Form.'
            ]);
            return redirect()->back()->with('success','Form submitted Successfully.');
        } catch (QueryException $e) {
            Log::error('Error in fetching the page'.$e->getMessage());
            return redirect()->back()->with('error','Error in submitting the form. Please contact the Administrator.');
        }
    }

    public function delete(Request $request, $id) {
        try {

            $form = TransmittalofAppointee::find($id);
    
            if(!$form) {
                return redirect()->back()->with('error', 'Row not found');
            }
        
            $form->delete();
            return redirect()->back()->with('success', 'Row soft deleted successfully');
        } catch (QueryException $e) {
            Log::error('Error occured:'.$e->getMessage());
            return redirect()->back()->with('error', 'An error occured while deleting this row. Please contact the Administrator.');
        }
        }
    //restore
    public function restoreTransmittal($id) {
            try {
                // Find the trashed transmittal by ID
                $transmittal = TransmittalofAppointee::withTrashed()->findOrFail($id);
        
                // Restore the trashed transmittal
                $transmittal->restore();
        
                // Redirect back with success message
                return redirect()->back()->with('success', 'Transmittal restored successfully.');
            } catch (Exception $e) {
                // Log error and redirect back with error message
                Log::error('Error restoring transmittal: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Failed to restore transmittal. Please try again.');
            }
        }
    //delete permanently
    public function deletePermanently($id) {
            try {
                // Find the trashed transmittal by ID
                $transmittal = TransmittalofAppointee::withTrashed()->findOrFail($id);
        
                // Permanently delete the trashed transmittal
                $transmittal->forceDelete();
        
                // Redirect back with success message
                return redirect()->back()->with('success', 'Transmittal permanently deleted.');
            } catch (Exception $e) {
                // Log error and redirect back with error message
                Log::error('Error deleting transmittal permanently: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Failed to delete transmittal permanently. Please try again.');
            }
    }
    
    public function search(Request $request)
    {
        $query = $request->input('query');
        $transmittals = TransmittalofAppointee::where('remark', 'like', '%' . $query . '%')
                               ->orWhere('level', 'like', '%' . $query . '%')
                               ->orWhere('transaction_number', 'like', '%' . $query . '%')
                               ->orWhere('school', 'like', '%' . $query . '%')
                               ->orWhere('name_of_appointee', 'like', '%' . $query . '%')
                               ->paginate(10);
    
        $hasResults = $transmittals->count() > 0; // Check if there are any results
    
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity' => 'Searched Transmittal table with a query: ' . $query,
        ]);
    
        return view('forms.transmittal', compact('transmittals', 'hasResults', 'query'));
    }
    public function downloadTransmittal()
    {
    
    // $activityLogs = ActivityLog::orderBy('created_at', 'desc')->get();
    $forms = TransmittalofAppointee::all(); // testing palang
    // Define the CSV file name and headers
    $fileName = 'Transmittal_of_Appointee.csv';
    $headers = array(
        'Content-Type' => 'text/csv',
        'Content-Disposition' => "attachment; filename=$fileName",
    );

    // Create a CSV file
    $handle = fopen('php://temp', 'r+');
    // Add space (empty row) at the topmost row
    fputcsv($handle, []);

    // Add header title
    fputcsv($handle, ['Transmittal of Appointee']);

    // Add space (empty row) after the header title
    fputcsv($handle, []);

    // Add column headers
    fputcsv($handle, ['Level', 'School', 'Name of Appointee', 'Remarks', 'Signature of Appointee','Date & Time']); // Update headers

    foreach ($forms as $form) {
        fputcsv($handle, [$form->level,$form->school,$form->name_of_appointee,$form->remark,$form->signature_of_appointee,
        $form->date_and_time]);
    }

    rewind($handle);

    // Create a response with the CSV file
    $csv = stream_get_contents($handle);
    fclose($handle);

    ActivityLog::create([
        'user_id' => auth()->user()->id,
        'activity' => 'Downloaded the Transmittal of Appointee .',
    ]);

    return Response::make($csv, 200, $headers);
}
//     public function trash() {
//     try {
//         $user = auth()->user();
//         $userID = $user->id;
//         $trasheds = TransmittalofAppointee::onlyTrashed()
//             ->where('user_id', $userID)
//             ->latest()
//             ->paginate(10);
          
//         ActivityLog::create([
//             'user_id' => $userID,
//             'activity' => 'Visited Transmittal of Appointee page.'
//         ]);
//         return view('forms.transmittal', compact('trasheds'));
//     } catch (QueryException $e) {
//         Log::error('Error in fetching the page: ' . $e->getMessage());
//         return redirect()->back()->with('error', 'Error in Fetching the page. Please contact the Administrator.');
//     }
// }

}
