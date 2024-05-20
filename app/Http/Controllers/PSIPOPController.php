<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log; 
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ControlPSIPOP;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Appointment;


class PSIPOPController extends Controller
{
    //
    public function downloadPSIPOPExcelFile(Request $request)
{
    try {
        // Retrieve the selected IDs from the request
        $selectedIds = $request->input('selectedIds');

        // Check if $selectedIds is already an array
        if (is_array($selectedIds)) {
            // Convert the array to a comma-separated string
            $selectedIds = implode(',', $selectedIds);
        }

        // Convert the comma-separated IDs string to an array
        $selectedFormIds = explode(',', $selectedIds);

        // Validate for duplicate IDs
        $uniqueFormIds = array_unique($selectedFormIds);
        if (count($selectedFormIds) !== count($uniqueFormIds)) {
            throw new \Exception('Duplicate IDs found.');
        }

        // Retrieve data from the database for the selected IDs
        $data = Appointment::whereIn('id', $selectedFormIds)
            ->select('odc_number', 'date_received_records_unit','date_received_hr_unit','school_district','item_number','frompos','topos','name_incumbent','sex','date_of_birth','tin_number','date_original_appointment','date_last_promotion','eligibility','date_validity_eligibility','first_time_use_eligibility','salary_grade','position_level','appointment_nature','status_of_appointment','pwd','type_of_disability','member_of_ip_group','ethnicity','name_previous_incumbent','reason_title','date_updating_psiop_online','date_updating_psiop_offline','date_process_ao','date_posted_fb_mess','date_transmitted_to_csc','date_received_from_csc','approved','processing_days','status','action_remarks','final_action',)
            ->get()
            ->toArray();

        // Load the existing Excel file
        $existingExcelFilePath = public_path('downloadable-forms/Control_PSIPOP_Blank.xlsx');
        if (!file_exists($existingExcelFilePath)) {
            Log::error("Existing Excel file not found: $existingExcelFilePath");
            return response()->json(['error' => 'Existing Excel file not found']);
        }

        // Load the existing Excel file as a PhpSpreadsheet object
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($existingExcelFilePath);

        // Get the active sheet
        $sheet = $spreadsheet->getActiveSheet();

        // Define the header row index (assuming the header row is at index 1)
        $headerRow = 5;

        // Define the starting column index (assuming the data starts from column A)
        $startColumnIndex = 1;

        // Iterate over each row of data
        foreach ($data as $index => $rowData) {
            // Calculate the row index based on the header row and the current index
            $rowIndex = $headerRow + $index + 1;

            foreach ($rowData as $columnName => $value) {
                // Map the database column name to the corresponding template column name
                $templateColumnName = $this->getColumnMapValue($columnName);

                // Check if the mapping exists
                if (!$templateColumnName) {
                    Log::error("No mapping found for column '$columnName'");
                    continue;
                }

                // Calculate the column index based on the start column and the template column name
                $columnIndex = array_search($templateColumnName, array_values($this->getColumnMap())) + 1;

                // Calculate the cell coordinate
                $cellCoordinate = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + $columnIndex - 1) . $rowIndex;

                // Prepend an apostrophe before setting the value if it's salary_grade or plantilla_item_number
                if ($columnName === 'salary_grade' || $columnName === 'plantilla_item_number' || $columnName === 'odc_number') {
                    $value = "" . $value;
                } elseif (Str::startsWith($columnName, 'date_')) {
                    // Format dates as 'mm/dd/yyyy'
                    $value = $value ? date('m/d/Y', strtotime($value)) : '';
                }

                // Set the value in the spreadsheet
                $sheet->setCellValue($cellCoordinate, $value);
            }
        }

        // Save the modified spreadsheet to a file
        $excelWriter = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $excelFileName = 'Control_PSIPOP_file.xlsx';
        $excelFilePath = public_path('export_forms/' . $excelFileName);
        $excelWriter->save($excelFilePath);

        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity' => 'Exported the Control Form for PSIPOP data.'
        ]);

        // Download the generated Excel file
        return response()->download($excelFilePath);
    } catch (\Throwable $e) {
        Log::error('Error importing Excel file:', ['exception' => $e]);
        return response()->json(['error' => 'An error occurred while importing the Excel file'], 500);
    }
}


// Helper function to get the column map
private function getColumnMap()
{
    return [
        'odc_number'=> 'ODC NO.', 
        'date_received_records_unit'=> 'DATE RECEIVED BY RECORDS UNIT',
        'date_received_hr_unit'=> 'DATE RECEIVED BY HR UNIT',
        'school_district'=> 'SCHOOL/DISTRICT',
        'item_number'=> 'ITEM NUMBER',
        'frompos'=> 'FROM',
        'topos'=> 'TO',
        'name_incumbent'=> 'NAME OF INCUMBENT','sex'=> 'SEX','date_of_birth'=> 'DATE OF BIRTH','tin_number'=> 'TIN','date_original_appointment'=> 'DATE OF ORIGINAL APPOINTMENT','date_last_promotion'=> 'DATE OF LAST PROMOTION','eligibility'=> 'ELIGIBILITY','date_validity_eligibility'=> 'DATE OF VALIDITY OF ELIGIBILITY','first_time_use_eligibility'=> 'FIRST TIME USED OF ELIGIBILITY?',
        'salary_grade'=> 'SALARY GRADE AND STEP',
        'position_level'=> 'POSITION LEVEL','appointment_nature'=> 'NATURE OF APPOINTMENT','status_of_appointment'=> 'STATUS OF APPOINTMENT','pwd'=> 'PWD','type_of_disability'=> 'TYPE OF DISABILITY','member_of_ip_group'=> 'MEMBER OF IP GROUP','ethnicity'=> 'ETHNICITY','name_previous_incumbent'=>'NAME OF PREVIOUS INCUMBENT',
        'reason_title'=> 'REASON OF VACANCY','date_updating_psiop_online'=> 'DATE OF UPDATING TO PSIPOP - ONLINE','date_updating_psiop_offline'=> 'DATE OF UPDATING TO PSIPOP - OFFLINE','date_process_ao'=> 'Date Processed (For signature to AO V/SDS/ASDS)','date_posted_fb_mess'=> 'Date Posted in messenger/fb group (For signature of appointee)','date_transmitted_to_csc'=> 'Date transmitted to CSC','date_received_from_csc'=> 'Date received from CSC','approved'=>'Approved/ Disapproved','processing_days'=> 'Processing time (days)','status'=> 'Status','action_remarks'=> 'Action/Remarks','final_action'=> 'Final Action (For disapproved appointment only)',
    ];
}

// Helper function to get the template column name for a given database column name
private function getColumnMapValue($columnName)
{
    $columnMap = $this->getColumnMap();
    return $columnMap[$columnName] ?? null;
}



    public function exportToPDF() {
        // Get the forms data
        $forms = ControlPSIPOP::latest()->get();

        // Pass the forms data to the Blade view
        $html = View::make('pdf.Control (for encoding to PSIPOP)', compact('forms'))->render();

        // Create Dompdf instance
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        // Load HTML content
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('legal', 'landscape');

        // Render PDF (optional: also save it to a file instead of outputting it directly)
        $dompdf->render();

        // Output the generated PDF to the browser
        return $dompdf->stream('exported_file.pdf', ['Attachment' => false]);
    }

    
    public function view() {
        $forms = ControlPSIPOP::latest()->get();
        return view('pdf.Control (for encoding to PSIPOP)',compact('forms'));
    }
    public function delete(Request $request, $id) {
        try {

            $form = ControlPSIPOP::find($id);
    
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
    public function restore($id) {
            try {
                // Find the trashed transmittal by ID
                $transmittal = ControlPSIPOP::withTrashed()->findOrFail($id);
        
                // Restore the trashed transmittal
                $transmittal->restore();
        
                // Redirect back with success message
                return redirect()->back()->with('success', 'Row restored successfully.');
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
                $transmittal = ControlPSIPOP::withTrashed()->findOrFail($id);
        
                // Permanently delete the trashed transmittal
                $transmittal->forceDelete();
        
                // Redirect back with success message
                return redirect()->back()->with('success', 'Row permanently deleted.');
            } catch (Exception $e) {
                // Log error and redirect back with error message
                Log::error('Error deleting transmittal permanently: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Failed to delete transmittal permanently. Please try again.');
            }
    }
    
    public function search(Request $request)
    {
        $query = $request->input('query');
        $forms = ControlPSIPOP::where('school_district', 'like', '%' . $query . '%')
                               ->orWhere('transaction_number', 'like', '%' . $query . '%')
                               ->orWhere('odc_number', 'like', '%' . $query . '%')
                               ->orWhere('nature_of_appointment', 'like', '%' . $query . '%')
                               ->orWhere('eligibility', 'like', '%' . $query . '%')
                               ->orWhere('sex', 'like', '%' . $query . '%')
                               ->orWhere('salary_grade_step', 'like', '%' . $query . '%')
                               ->orWhere('pwd', 'like', '%' . $query . '%')
                               ->orWhere('approved', 'like', '%' . $query . '%')
                               ->orWhere('status', 'like', '%' . $query . '%')
                               ->paginate(10);
    
        $hasResults = $forms->count() > 0; // Check if there are any results
    
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity' => 'Searched RAI table with a query: ' . $query,
        ]);
    
        return view('forms.control', compact('forms', 'hasResults', 'query'));
    }
    
    public function downloadPSIPOP()
    {
        $forms = ControlPSIPOP::all(); // testing palang
        // Define the CSV file name and headers
        $fileName = 'Control_for_encoding_to_PSIPOP.csv';
        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$fileName",
        );
    
        // Create a CSV file
        $handle = fopen('php://temp', 'r+');
        // Add space (empty row) at the topmost row
        fputcsv($handle, []);
    
        // Add header title
        fputcsv($handle, ['Control (for encoding to PSIPOP)']);
    
        // Add space (empty row) after the header title
        fputcsv($handle, []);
    
        // Add column headers with formatted date columns
        fputcsv($handle, [
            //'Transaction Number',
              'ODC No.',
              'DATE RECEIVED BY RECORDS UNIT',
              'DATE RECEIVED BY HR UNIT',
              'SCHOOL/DISTRICT',
              'ITEM NUMBER',
              'POSITION FROM',
              'POSITION TO',
              'NAME OF INCUMBENT',
              'SEX',
              'DATE OF BIRTH',
              'TIN',
              'DATE OF ORIGINAL APPOINTMENT',
              'DATE OF LAST PROMOTION',
              'ELIGIBILITY',
              'DATE OF VALIDITY OF ELIGIBILITY',
              'FIRST TIME USED OF ELIGIBILITY?',
              'SALARY GRADE AND STEP',
              'POSITION LEVEL', 
              'NATURE OF APPOINTMENT',
              'STATUS OF APPOINTMENT',
              'PWD',
              'TYPE OF DISABILITIY',
              'MEMBER OF IP GROUP',
              'ETHNICITY',
              'NAME OF PREVIOUS INCUMBENT',
              'REASON OF VACANCY', 
              'DATE OF UPDATING TO PSIPOP ONLINE',
              'DATE OF UPDATING TO PSIPOP OFFLINE',
              'DATE PROCESSED (FOR SIGNATURE TO AOV/SDS/ASDS)',
              'DATE POSTED IN MESSENGER/FB GROUP (FOR SIGNATURE OF APPOINTEE)',
              'DATE TRANSMITTED TO CSC',
              'DATE RECEIVED FROM CSC',
              'APPROVED / DISAPPROVED',
              'PROCESSING TIME(DAYS)',
              'STATUS',
              'ACTION / REMARKS',
              'FINAL ACTION (FOR DISAPPROVED APPOINTMENT ONLY)'
        ]); // Update headers
    
        foreach ($forms as $form) {
            $date_received_records_unit = $form->date_received_records_unit ? \Carbon\Carbon::parse($form->date_received_records_unit)->format('m/d/Y') : ''; // Format date
            $date_received_hr_unit = $form->date_received_hr_unit ? \Carbon\Carbon::parse($form->date_received_hr_unit)->format('m/d/Y') : ''; 
            $date_received_hr_unit = $form->date_received_hr_unit ? \Carbon\Carbon::parse($form->date_received_hr_unit)->format('m/d/Y') : ''; 
            $date_of_birth = $form->date_of_birth ? \Carbon\Carbon::parse($form->date_of_birth)->format('m/d/Y') : ''; 
            $date_original_appointment = $form->date_original_appointment ? \Carbon\Carbon::parse($form->date_original_appointment)->format('m/d/Y') : ''; 
            $date_last_promotion = $form->date_last_promotion ? \Carbon\Carbon::parse($form-> date_last_promotion)->format('m/d/Y') : ''; 
            $date_validity_eligibility = $form->date_validity_eligibility ? \Carbon\Carbon::parse($form->date_validity_eligibility)->format('m/d/Y') : ''; 
            $date_last_promotion = $form->date_last_promotion ? \Carbon\Carbon::parse($form-> date_last_promotion)->format('m/d/Y') : ''; 
            $date_updating_psiop_online = $form->date_updating_psiop_online ? \Carbon\Carbon::parse($form->date_updating_psiop_online)->format('m/d/Y') : ''; 
            $date_updating_psiop_offline = $form->date_updating_psiop_offline ? \Carbon\Carbon::parse($form->date_updating_psiop_offline)->format('m/d/Y') : ''; 
            $date_processed_signature_ao = $form->date_processed_signature_ao ? \Carbon\Carbon::parse($form->date_processed_signature_ao)->format('m/d/Y') : ''; 
            $date_posted_fb = $form->date_posted_fb ? \Carbon\Carbon::parse($form->date_posted_fb)->format('m/d/Y') : ''; 
            $date_transmitted_to_csc = $form->date_transmitted_to_csc ? \Carbon\Carbon::parse($form->date_transmitted_to_csc)->format('m/d/Y') : ''; 
            $position_from = $form->position_from ? \Carbon\Carbon::parse($form->position_from)->format('m/d/Y') : ''; 
            $position_to = $form->position_to ? \Carbon\Carbon::parse($form->position_to)->format('m/d/Y') : ''; 
            $date_received_from_csc = $form->date_received_from_csc ? \Carbon\Carbon::parse($form->date_date_received_from_csc)->format('m/d/Y') : ''; 
            fputcsv($handle, [
                $form->odc_number,
                $date_received_records_unit, 
                $date_received_hr_unit,
                $form->school_district,
                $form->item_number,
                $position_from,
                $position_to,
                $form->name_incumbent,
                $form->sex,
                $date_of_birth,
                $form->tin_number,
                $date_original_appointment,
                $date_last_promotion,
                $form->eligibility,
                $date_validity_eligibility,
                $form->first_time_use_eligibility,
                $form->salary_grade_step,
                $form->position_level,
                $form->nature_of_appointment,
                $form->status_of_appointment,
                $form->pwd,
                $form->type_of_disability,
                $form->member_of_ip_group,
                $form->ethnicity,
                $form->name_previous_incumbent,
                $form->reason_of_vacancy,
                $date_updating_psiop_online,
                $date_updating_psiop_offline,
                $date_processed_signature_ao,
                $date_posted_fb,
                $date_transmitted_to_csc,
                $date_received_from_csc,
                $form->approved,
                $form->processing_days,
                $form->status,
                $form->action_remarks,
                $form->final_action,
            ]);
        }
    
        rewind($handle);
    
        // Create a response with the CSV file
        $csv = stream_get_contents($handle);
        fclose($handle);
    
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity' => 'Exported the Control (for encoding to PSIPOP) table as CSV.',
        ]);
    
        return Response::make($csv, 200, $headers);
    }
    public function submit(Request $request) {
        try {
            $user = auth()->user();
            $userID = $user->id;
            $validatedData = $request->validate([
                'odc_number' => 'nullable|string',
                'date_received_records_unit' => 'nullable|string', 
                'date_received_hr_unit' => 'nullable|date',
                'school_district' => 'nullable|string',
                'item_number' => 'nullable|string',
                'position_from' => 'nullable|date',
                'position_to' => 'nullable|date',
                'name_incumbent' => 'nullable|string',
                'sex' => 'nullable|string'
                ,'date_of_birth' => 'nullable|date',
                'tin_number' => 'nullable|string',
                'date_original_appointment' => 'nullable|date',
                'date_last_promotion' => 'nullable|date',
                'eligibility' => 'nullable|string',
                'date_validity_eligibility' => 'nullable|date',
                'first_time_use_eligibility' => 'nullable|in:Yes,No',
                'salary_grade_step' => 'required|string',
                'position_level' => 'nullable|string',
                'nature_of_appointment' => 'nullable|string',
                'status_of_appointment' => 'nullable|string',
                'pwd' => 'nullable|string',
                'type_of_disability' => 'nullable|string',
                'member_of_ip_group' => 'nullable|string',
                'ethnicity' => 'nullable|string',
                'name_previous_incumbent' => 'nullable|string',
                'reason_of_vacancy' => 'nullable|string',
                'date_updating_psiop_online' => 'nullable|date',
                'date_updating_psiop_offline' => 'nullable|date',
                'date_processed_signature_ao' => 'nullable|date',
                'date_posted_fb' => 'nullable|date',
                'date_transmitted_to_csc' => 'nullable|date',
                'date_received_from_csc' => 'nullable|date',
                'approved' => 'nullable|string',
                'processing_days' => 'nullable|string',
                'status' => 'nullable|string',
                'action_remarks' => 'nullable|string',
                'final_action' => 'nullable|string',
                //required|date_format:Y-m-d H:i:s|after_or_equal:' . date(DATE_ATOM),
            ]);
            // Generate unique transaction number
            $transactionNumber = 'CONPSIPOP-' . strtoupper(date('Y-F')) . '-' . uniqid();
            // Create a new checklist instance
        
           $forms = new ControlPSIPOP;
           $forms->transaction_number =  $transactionNumber;
           $forms->odc_number = $validatedData['odc_number'];
           $forms->date_received_records_unit = $validatedData['date_received_records_unit'];
           $forms->date_received_hr_unit = $validatedData['date_received_hr_unit'];
           $forms->school_district= $validatedData['school_district'];
           $forms->item_number= $validatedData['item_number'];
           $forms->position_from= $validatedData['position_from'];
           $forms->position_to= $validatedData['position_to'];
           $forms->name_incumbent= $validatedData['name_incumbent'];
           $forms->sex = $validatedData['sex'];
           $forms->date_of_birth = $validatedData['date_of_birth'];
           $forms->tin_number = $validatedData['tin_number'];
           $forms->date_original_appointment = $validatedData['date_original_appointment'];
           $forms->date_last_promotion = $validatedData['date_last_promotion'];
           $forms->eligibility = $validatedData['eligibility'];
           $forms->date_validity_eligibility = $validatedData['date_validity_eligibility'];
           $forms->first_time_use_eligibility = $validatedData['first_time_use_eligibility'];
           $forms->position_level= $validatedData['position_level'];
           $forms->salary_grade_step = $validatedData['salary_grade_step'];
           $forms->nature_of_appointment= $validatedData['nature_of_appointment'];
           $forms->status_of_appointment= $validatedData['status_of_appointment'];
           $forms->pwd = $validatedData['pwd'];
           $forms->type_of_disability = $validatedData['type_of_disability'];
           $forms->member_of_ip_group = $validatedData['member_of_ip_group'];
           $forms->ethnicity = $validatedData['ethnicity'];
           $forms->name_previous_incumbent = $validatedData['name_previous_incumbent'];
           $forms->reason_of_vacancy = $validatedData['reason_of_vacancy'];
           $forms->date_updating_psiop_online = $validatedData['date_updating_psiop_online'];
           $forms->date_updating_psiop_offline = $validatedData['date_updating_psiop_offline'];
           $forms->date_processed_signature_ao = $validatedData['date_processed_signature_ao'];
           $forms->date_posted_fb = $validatedData['date_posted_fb'];
           $forms->date_transmitted_to_csc = $validatedData['date_transmitted_to_csc'];
           $forms->date_received_from_csc = $validatedData['date_received_from_csc'];
           $forms->approved = $validatedData['approved'];
           $forms->processing_days = $validatedData['processing_days'];
           $forms->status = $validatedData['status'];
           $forms->action_remarks = $validatedData['action_remarks'];
           $forms->final_action = $validatedData['final_action'];
           $forms->user_id = $userID;
            // Save the checklist
           $forms->save();
            
            ActivityLog::create([
                'user_id' => $userID,
                'activity' => 'Submitted a Control (for encoding to PSIPOP) Form.'
            ]);
            return redirect()->back()->with('success','Form submitted Successfully.');
        } catch (QueryException $e) {
            Log::error('Error in fetching the page'.$e->getMessage());
            return redirect()->back()->with('error','Error in submitting the form. Please contact the Administrator.');
        }
    }

    public function index() {
        
        try {
            $user = auth()->user();
            $userID = $user->id;
            $forms = ControlPSIPOP::where('user_id',$userID)->get();
           
            ActivityLog::create([
                'user_id' => $userID,
                'activity' => 'Visited Control Form (CSC FO Cavite) (Blank) page.'
            ]);
            
            // Pass an empty string as the query since there's no search
            $query = '';
    
            // Assuming there are always results initially
            $hasResults = true;
            
            return view('pdf.Control (CSC FO Cavite)', compact('forms', 'hasResults', 'query'));
        } catch (QueryException $e) {
            Log::error('Error in fetching the page'.$e->getMessage());
            return redirect()->back()->with('error','Error in Fetching the page. Please contact the Administrator.');
        }
    }
    public function export() {
        
        try {
            $user = auth()->user();
            $userID = $user->id;
            $forms = ControlPSIPOP::where('user_id', $userID)->get();
       
            ActivityLog::create([
                'user_id' => $userID,
                'activity' => 'Visited Control Form (CSC FO Cavite) (Blank) page.'
            ]);
            
            // Debugging step: Check the $forms variable
           // dd($forms);
    
            $pdf = Pdf::loadView('pdf.Control (CSC FO Cavite)', ['forms' => $forms])->setPaper('legal', 'landscape');
            return $pdf->download('csc-control-form.pdf');
            
        } catch (QueryException $e) {
            Log::error('Error in fetching the page'.$e->getMessage());
            return redirect()->back()->with('error','Error in Fetching the page. Please contact the Administrator.');
        }
    }
    
}
