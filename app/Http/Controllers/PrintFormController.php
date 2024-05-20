<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CSCControlForm;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Log; 
use Illuminate\Database\QueryException;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;


class PrintFormController extends Controller
{
    //
    public function storeCSCControl(Request $request) {
        try {
            $user = auth()->user();
            $userID = $user->id;
            // Validate the incoming request data
            
            $validatedData = $request->validate([
                'sector' => 'required|string',
                'name_agency' => 'required|string',
                'name_appointee' => 'required|string',
                'salary_grade' => 'required|string',
                'position_title' => 'required|string',
                'position_level' => 'required|string',
                'employment_status' => 'required|string',
                'appointment_nature' => 'required|string',
                'inclusive_from' => 'required|date',
                'inclusive_to' => 'required|date',
                'appointing_authority_name' => 'required|string',
                'issuance_date' => 'required|date',
                'dob' => 'required|date',
                'sex' => 'required|string',
                'isPWD' => 'required',
                'disability-type' => 'nullable|string',
                'ip_group' => 'required|string',
                'ethnicity' => 'required|string',
                'use_eligibility' => 'required|string',
                'eligibility_effectivity_date' => 'required|date',
                'eligibility_use_first' => 'required|string',
            ]);
         
              // Generate unique transaction number
            $transactionNumber = 'CSCControl-' . strtoupper(date('Y-F')) . '-' . uniqid(); 
            // Create a new checklist instance
           $forms = new CSCControlForm;
           $forms->transaction_number = $transactionNumber;
           $forms->sector = $validatedData['sector'];
           $forms->agency_name = $validatedData['name_agency'];
           $forms->appointee_name = $validatedData['name_appointee'];
           $forms->salary_grade = $validatedData['salary_grade'];
           $forms->position_title = $validatedData['position_title'];
           $forms->position_level = $validatedData['position_level'];
           $forms->employment_status = $validatedData['employment_status'];
           $forms->appointment_nature = $validatedData['appointment_nature'];
           $forms->casual_appointment_date_from = $validatedData['inclusive_from'];
           $forms->casual_appointment_date_to = $validatedData['inclusive_to'];
           $forms->appointment_authority_name = $validatedData['appointing_authority_name'];
           $forms->appointment_issuance_date = $validatedData['issuance_date'];
           $forms->date_of_birth = $validatedData['dob'];
           $forms->sex = $validatedData['sex'];
           $forms->is_PWD = $validatedData['isPWD'];
           $forms->disability_type = $validatedData['disability-type'];
           $forms->ip_group_member = $validatedData['ip_group'];
           $forms->ethnicity = $validatedData['ethnicity'];
           $forms->eligbility_use_type = $validatedData['use_eligibility'];
           $forms->eligibility_effectivity_date = $validatedData['eligibility_effectivity_date'];
           $forms->is_First_used_eligiblity = $validatedData['eligibility_use_first'];
           $forms->user_id = $userID;
            // Save the checklist
           $forms->save();
            
            ActivityLog::create([
                'user_id' => $userID,
                'activity' => 'Submitted a CSC Control Form.'
            ]);
            return redirect()->back()->with('success','Control Form Submitted Successfully.');
        } catch (QueryException $e) {
            Log::error('Error occured:'.$e->getMessage());
            return redirect()->back()->with('error','An error occured while saving the form. Please contact the Administrator.');
        }
    }
    

    public function downloadAllCSC()
    {
    
    // $activityLogs = ActivityLog::orderBy('created_at', 'desc')->get();
    $forms = CSCControlForm::all(); // testing palang
    // Define the CSV file name and headers
    $fileName = 'Control (CSC FO Cavite).csv';
    $headers = array(
        'Content-Type' => 'text/csv',
        'Content-Disposition' => "attachment; filename=$fileName",
    );
// Create a CSV file
$handle = fopen('php://temp', 'r+');

// Add space (empty row) at the topmost row
fputcsv($handle, []);

// Add header title
fputcsv($handle, ['Control (CSC FO Cavite)']);

// Add space (empty row) after the header title
fputcsv($handle, []);

// Add column headers
fputcsv($handle, [
    'Sector',
    'Name of Agency',
    'Name of Appointee',
    'Salary Grade',
    'Position Level',
    'Employee Status',
    'Nature of Appointment',
    'Inclusive Date of Casual or Contractual Appointment From',
    'Inclusive Date of Casual or Contractual Appointment To',
    'Name of Appointing Authority',
    'Date of Issuance of Appointment',
    'Date of Birth',
    'Sex',
    'PWD?',
    'Member of IP Group',
    'Ethnicity',
    'Type of Eligibility Use',
    'Date of Effectivity of Eligibility',
    'First time used of Eligibility'
]);

// Add space (empty row) after the column names
fputcsv($handle, []);

// Iterate over the forms and add data to the CSV
foreach ($forms as $form) {
   // Format date fields in "Month Day, Year" format
   $casualAppointmentFromDate = Carbon::parse($form->casual_appointment_date_from)->format('F j, Y');
   $casualAppointmentToDate = Carbon::parse($form->casual_appointment_date_to)->format('F j, Y');
   $appointmentIssuanceDate = Carbon::parse($form->appointment_issuance_date)->format('F j, Y');
   $eligibilityEffectivityDate = Carbon::parse($form->eligibility_effectivity_date)->format('F j, Y');

   //dd($eligibilityEffectivityDate);
        // Add form data to the CSV
    fputcsv($handle, [
        $form->sector,
        $form->agency_name,
        $form->appointee_name,
        $form->salary_grade,
        $form->position_level,
        $form->employment_status,
        $form->appointment_nature,
        $casualAppointmentFromDate, // Updated date format
        $casualAppointmentToDate,   // Updated date format
        $form->appointment_authority_name,
        $appointmentIssuanceDate,   // Updated date format
        $form->date_of_birth,
        $form->sex,
        $form->is_PWD,
        $form->disability_type,
        $form->ip_group_member,
        $form->ethnicity,
        $form->eligbility_use_type,
        $eligibilityEffectivityDate, // Updated date format
        $form->is_First_used_eligiblity
    ]);
}

// Move the pointer to the beginning of the stream
rewind($handle);

// Create a response with the CSV file
$csv = stream_get_contents($handle);
fclose($handle);

// Log the activity
ActivityLog::create([
    'user_id' => auth()->user()->id,
    'activity' => 'Downloaded the CSC Control Form.',
]);

// Return the response with the CSV file
return response()->make($csv, 200, [
    'Content-Type' => 'text/csv',
    'Content-Disposition' => "attachment; filename=$fileName",
]);


}
}
