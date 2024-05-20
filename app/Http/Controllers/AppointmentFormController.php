<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Log; 
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Response;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Carbon\Carbon;

class AppointmentFormController extends Controller
{

    public function downloadTransmittalExcelFile(Request $request)
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
    
            // Retrieve data from the database based on the selected IDs
            $data = Appointment::whereIn('id', $selectedFormIds)
                ->latest()
                ->select('position_level', 'school_district', 'full_name')
                ->get()
                ->toArray();
    
            // Load the existing Excel file
            $existingExcelFilePath = public_path('downloadable-forms/Transmittal of Appointee_Blank.xlsx');
            if (!file_exists($existingExcelFilePath)) {
                Log::error("Existing Excel file not found: $existingExcelFilePath");
                return response()->json(['error' => 'Existing Excel file not found']);
            }
    
            // Load the existing Excel file as a PhpSpreadsheet object
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($existingExcelFilePath);
    
            // Get the active sheet
            $sheet = $spreadsheet->getActiveSheet();
    
            // Define the header row index (assuming the header row is at index 1)
            $headerRow = 4;
    
            // Define the starting column index (assuming the data starts from column A)
            $startColumnIndex = 1;
    
            // Iterate over each row of data
            foreach ($data as $index => $rowData) {
                // Calculate the row index based on the header row and the current index
                $rowIndex = $headerRow + $index + 1;
    
                // Iterate over each column of data
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
    
                    // Set the value in the spreadsheet
                    $sheet->setCellValue($cellCoordinate, $value);
                }
            }
    
            // Save the modified spreadsheet to a file
            $excelWriter = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
            $excelFileName = 'Transmittal_of_Appointee_file.xlsx';
            $excelFilePath = public_path('export_forms/' . $excelFileName);
            $excelWriter->save($excelFilePath);
    
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
        'position_level' => 'LEVEL',
        'school_district' => 'SCHOOL',
        'full_name' => 'NAME OF THE APPOINTEE',
        'remarks_transmittal' => 'REMARKS',
        'signature_of_appointee' => 'SIGNATURE OF THE APPOINTEE',
        'date_and_time' => 'DATE AND TIME'
    ];
}

// Helper function to get the template column name for a given database column name
private function getColumnMapValue($columnName)
{
    $columnMap = $this->getColumnMap();
    return $columnMap[$columnName] ?? null;
}

    public function exportTransmittal()
{
    $data = Appointment::latest()->select('position_level','school_district','fname','mname','lname')->get();

    // Map column names to custom names
    $customColumnNames = [
        'position_level' => 'LEVEL',   
        'school_district' => 'SCHOOL',  
        'fname' => 'NAME OF APPOINTEE',  
        'mname' => 'NAME OF APPOINTEE',  
        'lname' => 'NAME OF APPOINTEE',  
        '' => 'REMARKS',  
        '' => 'SIGNATURE OF APPOINTEE',  
        '' => 'DATE & TIME',
    ];

    // Rename columns
    $data = $data->map(function ($item) use ($customColumnNames) {
        $nameOfAppointee = $item['fname'] . ' ' . $item['mname'] . ' ' . $item['lname'];
        unset($item['fname'], $item['mname'], $item['lname']);
        $item['NAME OF APPOINTEE'] = $nameOfAppointee;
        // Setting remarks, signature, and date & time to blank
        $item['REMARKS'] = '';
        $item['SIGNATURE OF APPOINTEE'] = '';
        $item['DATE & TIME'] = '';
        
        return collect($item)->mapWithKeys(function ($value, $key) use ($customColumnNames) {
            return [$customColumnNames[$key] ?? $key => $value];
        });
    });

    // Initialize FastExcel
    $fastexcel = new FastExcel($data);
    
    ActivityLog::create([
        'user_id' => auth()->user()->id,
        'activity' => 'Exported the Transmittal of Appointee .',
    ]);

    // Export to 'file.xlsx' and automatically download
    return $fastexcel->download('Transmittal of Appointee.xlsx');
}

    public function exportPSIPOP()
    {
        $data = Appointment::latest()->select('odc_number', 'date_received_records_unit', 'date_received_hr_unit', 'school_district', 'item_number', 'frompos','topos','name_incumbent','sex','date_of_birth','tin_number','date_original_appointment','date_last_promotion','eligibility','date_validity_eligibility','first_time_use_eligibility','salary_grade','position_level','appointment_nature','status_of_appointment','pwd','type_of_disability','member_of_ip_group','ethnicity','name_incumbent','reason_title','date_updating_psiop_online','date_updating_psiop_offline','date_process_ao','date_posted_fb_mess','date_transmitted_to_csc','date_received_from_csc','approved','processing_days','status','action_remarks','final_action')->get();

        // Map column names to custom names
        $customColumnNames = [
            'odc_number' => 'ODC Number','date_received_records_unit' => 'DATE RECEIVED BY RECORDS UNIT','date_received_hr_unit' => 'DATE RECEIVED BY HR UNIT','school_district' => 'SCHOOL/DISTRICT','item_number' => 'ITEM NUMBER','frompos' => 'POSITION FROM','topos' => 'POSITION TO','name_incumbent' => 'NAME OF INCUMBENT','sex' => 'SEX','date_of_birth' => 'DATE OF BIRTH',
            'tin_number' => 'TIN','date_original_appointment' => 'DATE OF ORIGINAL APPOINTMENT','date_last_promotion' => 'DATE OF LAST PROMOTION','eligibility' => 'ELIGIBILITY','date_validity_eligibility' => 'DATE OF VALIDITY OF ELIGIBILITY',
            'first_time_use_eligibility' => 'FIRST TIME USED OF ELIGIBILITY?','salary_grade' => 'SALARY GRADE AND STEP', 'position_level' => 'POSITION LEVEL', 'appointment_nature' =>'NATURE OF APPOINTMENT','status_of_appointment' => 'STATUS OF APPOINTMENT','pwd'=>'PWD','type_of_disability'=>'TYPE OF DISABILITY','member_of_ip_group'=>'MEMBER OF IP GROUP','ethnicity'=>'ETHNICITY','name_incumbent'=>'NAME OF PREVIOUS INCUMBENT','reason_title'=>'REASON OF VACANCY','date_updating_psiop_online'=>'DATE OF UPDATING TO PSIPOP - ONLINE','date_updating_psiop_offline'=>'DATE OF UPDATING TO PSIPOP - OFFLINE','date_process_ao' => 'Date Processed (For signature to AO V/SDS/ASDS)','date_posted_fb_mess'=>'Date Posted in messenger/fb group (For signature of appointee)', 'date_transmitted_to_csc'=>'Date transmitted to CSC','date_received_from_csc'=>'Date received from CSC','approved' => 'Approved/ Disapproved', 'processing_days' => 'Processing time (days)','status' => 'Status' , 'action_remarks' => 'Action/Remarks', 'final_action' => 'Final Action (For disapproved appointment only)'
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
            'activity' => 'Exported the Control Form for PSIPOP .',
        ]);
    
        // Export to 'file.xlsx' and automatically download
        return $fastexcel->download('control-form-psipop.xlsx');
    }
    
    public function exportControlFormCSC()
{
    $data = Appointment::latest()
        ->select(
            'postitle',
            'date_of_birth',
            'fname',
            'mname',
            'lname',
            'extname',
            'salary_grade',
            'position_level',
            'appointment_nature',
            'sex',
            'pwd',
            'type_of_disability',
            'member_of_ip_group',
            'ethnicity',
            'first_time_use_eligibility'
        )->get();

    // Custom column arrangement
    $customColumns = [
        'DATE RECEIVED (mm/dd/yyyy) For FO only' => '',
        'Sector' => '',
        'Name of Agency' => 'DepEd',
        'Name of Appointee' => ['lname', 'fname', 'extname', 'mname'], // Multiple mappings for Name of Appointee
        'Salary Grade' => 'salary_grade',
        'Position Title' => 'postitle',
        'Position Level' => 'position_level',
        'Employee Status' => '',
        'Nature of Appointment' => 'appointment_nature',
        'Inclusive Date of Casual or Contractual Appointment From' => '',
        'Inclusive Date of Casual or Contractual Appointment To' => '',
        'Name of Appointing Authority' => '',
        'Date of Issuance of Appointment' => '',
        'Date of Birth' => 'date_of_birth',
        'Sex' => 'sex',
        'PWD?' => 'pwd',
        'Type of Disability' => 'type_of_disability',
        'Member of IP Group' => 'member_of_ip_group',
        'Ethnicity' => 'ethnicity',
        'Type of Eligibility Use' => '',
        'Date of Effectivity of Eligibility' => '',
        'First time used of Eligibility' => 'first_time_use_eligibility'
    ];

    // Map columns based on custom arrangement
    $mappedData = $data->map(function ($item) use ($customColumns) {
        $mappedItem = [];
        foreach ($customColumns as $columnName => $defaultValue) {
            // If the value is an array, concatenate multiple fields into one column
            if (is_array($defaultValue)) {
                $value = '';
                foreach ($defaultValue as $field) {
                    $value .= $item[$field] . ' ';
                }
                $mappedItem[$columnName] = trim($value);
            } else {
                $mappedItem[$columnName] = isset($item[$defaultValue]) ? $item[$defaultValue] : $defaultValue;
            }
        }
        return $mappedItem;
    });

    // Initialize FastExcel
    $fastexcel = new FastExcel($mappedData);

    // Log the activity
    ActivityLog::create([
        'user_id' => auth()->user()->id,
        'activity' => 'Exported the Control Form (CSC FO Cavite).',
    ]);

    // Export to 'file.xlsx' and automatically download
    return $fastexcel->download('Control Form (CSC FO Cavite).xlsx');
}

    public function submit(Request $request) {
        try {
            $user = auth()->user();
            $userID = $user->id;
            
            $validatedData = $request->validate([
                'lname' => 'required|string',
                'fname' => 'required|string',
                'mname' => 'nullable|string',
                'extname' => 'nullable|string',
                'postitle' => 'required|string',
                'frompos' => 'nullable|string',
                'topos' => 'nullable|string',
                'salary_rate' => 'required|string',
                'salary_increment' => 'required|string',
                'appointment_status' => 'required|string',
                'office_department_unit' => 'required|string',
                'compensation_rate_words' => 'required|string',
                'compensation_rate_num' => 'required|numeric',
                'appointment_nature' => 'required|string',
                'reason_title' => 'nullable|string',
                'plantilla_item_number' => 'nullable|string',
                'plantilla_page_number' => 'nullable|string',
                'odc_number' => 'nullable|string',
                'date_received_records_unit' => 'nullable|date',
                'date_received_hr_unit' => 'nullable|date',
                'school_district' => 'required|string',
                'date_posted_fb_mess' => 'nullable|date',
                'name_incumbent' => 'nullable|string',
                'sex' => 'required|string',
                'date_process_ao' => 'nullable|string',
                'vice' => 'nullable|string',
                'date_of_birth' => 'required|date',
                'tin_number' => 'required|string',
                'date_original_appointment' => 'nullable|date',
                'date_last_promotion' => 'nullable|date',
                'eligibility' => 'nullable|string',
                'date_validity_eligibility' => 'nullable|string',
                'first_time_use_eligibility' => 'required|string',
                'position_level' => 'nullable|string',
                'status_of_appointment' => 'nullable|string',
                'pwd' => 'required|string',
                'type_of_disability' => 'nullable|string',
                'member_of_ip_group' => 'required|string',
                'ethnicity' => 'required|string',
                 'date_updating_psiop_online' => 'nullable|date',
                 'date_updating_psiop_offline' => 'nullable|date',
                 'date_transmitted_to_csc' => 'nullable|date',
                 'date_received_from_csc' => 'nullable|date',
                 'approved' => 'nullable|string',
                 'processing_days' => 'nullable|string',
                 'status' => 'nullable|string',
                 'action_remarks' => 'nullable|string',
                 'final_action' => 'nullable|string',
                'education' => 'nullable|string',
                'education_remarks' => 'nullable|string',
                'experience' => 'nullable|string',
                'training' => 'nullable|string',
                'eligibility_remarks' => 'nullable|string',
                'senior_high_remarks' => 'nullable|string',
                'prov_appt_remarks' => 'nullable|string',
                'nature_appt_remarks' => 'nullable|string',
                'date_signing_remarks' => 'nullable|string',
                'cert_vacabt_pos_remarks' => 'nullable|string',
                'performace_rating_radio' => 'nullable|string',
                'performace_rating_remarks' => 'nullable|string',
                'justification_radio' => 'nullable|string',
                'justification_remarks' => 'nullable|string',
                'date_process_ao' => 'nullable|date',
                'vice' => 'nullable|string',
                'daily_compensation' => 'nullable|string',
                'position_pub_from' => 'nullable|date',
                'position_pub_to' => 'nullable|date',
                'placement_committe_chair' => 'nullable|string',
                // 'sector' =>'nullable|string',
                'name_agency' => 'nullable|string',
                'name_previous_incumbent' => 'nullable|string',
                'pub_mode' => 'nullable|string',
                'period_employment_from' => 'nullable|date',
                'period_employment_to' => 'nullable|date',
                //'rai_month' => 'nullable|string',
                //required|date_format:Y-m-d H:i:s|after_or_equal:' . date(DATE_ATOM),
            ]);
          
            // Generate unique transaction number
            $transactionNumber = 'TN-' . strtoupper(date('Y-F')) . '-' . uniqid();
            // Set $deliberation to today's date with the month component
            $deliberation = Carbon::today();
            $deliberation_mode = $deliberation;
            // Create a new checklist instance
           $forms = new Appointment;
           $forms->transaction_number = $transactionNumber;
           $forms->fname = $validatedData['fname'];
           $forms->mname = $validatedData['mname'];
           $forms->lname = $validatedData['lname'];
           $middlename = ucfirst(substr( $validatedData['mname'], 0, 1)); // Get the first letter and capitalize it
         // Concatenate the parts and assign to $form->full_name
            $forms->full_name =  $validatedData['fname'] . ' ' . $middlename . '. ' .  $validatedData['lname'] . ' ' .  $validatedData['extname'];
           $forms->extname = $validatedData['extname'];
           $forms->postitle = $validatedData['postitle'];
           $forms->frompos = $validatedData['frompos'];
           $forms->topos = $validatedData['topos'];
           $forms->salary_grade = $validatedData['salary_rate'] . '-' . $validatedData['salary_increment'];
           $forms->salary_rate = $validatedData['salary_rate'];
           $forms->salary_increment = $validatedData['salary_increment'];
           $forms->appointment_status = $validatedData['appointment_status'];
           $forms->office_department_unit = $validatedData['office_department_unit'];
           $forms->compensation_rate_words = $validatedData['compensation_rate_words'];
           $forms->compensation_rate_num = $validatedData['compensation_rate_num'];
           $forms->appointment_nature = $validatedData['appointment_nature'];
           $forms->reason_title = $validatedData['reason_title'];
           $forms->plantilla_item_number = $validatedData['plantilla_item_number'];
           $forms->plantilla_page_number = $validatedData['plantilla_page_number'];
           $forms->odc_number = $validatedData['odc_number'];
           $forms->date_received_records_unit = $validatedData['date_received_records_unit'];
           $forms->date_received_hr_unit = $validatedData['date_received_hr_unit'];
           $forms->school_district = $validatedData['school_district'];
           $forms->item_number = $validatedData['plantilla_item_number'];
           $forms->name_incumbent = $validatedData['name_incumbent'];
           $forms->sex = $validatedData['sex'];
           $forms->date_of_birth = $validatedData['date_of_birth'];
           $forms->tin_number = $validatedData['tin_number'];
           $forms->date_original_appointment = $validatedData['date_original_appointment'];
           $forms->date_last_promotion = $validatedData['date_last_promotion'];
           $forms->eligibility = $validatedData['eligibility'];
           $forms->date_validity_eligibility = $validatedData['date_validity_eligibility'];
           $forms->first_time_use_eligibility = $validatedData['first_time_use_eligibility'];
           $forms->position_level = $validatedData['position_level'];
           $forms->status_of_appointment = $validatedData['status_of_appointment'];
           $forms->pwd = $validatedData['pwd'];
           $forms->type_of_disability = $validatedData['type_of_disability'];
           $forms->member_of_ip_group = $validatedData['member_of_ip_group'];
           $forms->ethnicity = $validatedData['ethnicity'];
           $forms->date_posted_fb_mess = $validatedData['date_posted_fb_mess'];
            $forms->date_updating_psiop_online = $validatedData['date_updating_psiop_online'];
            $forms->date_updating_psiop_offline = $validatedData['date_updating_psiop_offline'];
            $forms->date_transmitted_to_csc = $validatedData['date_transmitted_to_csc'];
            $forms->date_received_from_csc = $validatedData['date_received_from_csc'];
            $forms->approved = $request->input('approved');
            $forms->pub_mode = $request->input('pub_mode');
            $forms->processing_days = $validatedData['processing_days'];
            $forms->status = $validatedData['status'];
            $forms->action_remarks = $validatedData['action_remarks'];
            $forms->final_action = $validatedData['final_action'];
           $forms->education = $validatedData['education'];
           $forms->education_remarks = $validatedData['education_remarks'];
           $forms->training = $validatedData['training'];
           $forms->experience = $validatedData['experience'];
           $forms->eligibility_remarks = $validatedData['eligibility_remarks'];
           $forms->senior_high_remarks = $validatedData['senior_high_remarks'];
           $forms->prov_appt_remarks = $validatedData['prov_appt_remarks'];
           $forms->nature_appt_remarks = $validatedData['nature_appt_remarks'];
           $forms->date_signing_remarks = $validatedData['date_signing_remarks'];
           $forms->cert_vacabt_pos_remarks = $validatedData['cert_vacabt_pos_remarks'];
           $forms->performace_rating_radio = $validatedData['performace_rating_radio'];
           $forms->performace_rating_remarks = $validatedData['performace_rating_remarks'];
           $forms->justification_radio = $validatedData['justification_radio'];
           $forms->justification_remarks = $validatedData['justification_remarks'];
           $forms->date_process_ao = $validatedData['date_process_ao'];
            $forms->daily_compensation = $validatedData['daily_compensation'];
            $forms->position_pub_from = $validatedData['position_pub_from'];
            $forms->position_pub_to = $validatedData['position_pub_to'];
            $forms->placement_committe_chair = $validatedData['placement_committe_chair'];
            $forms->vice = $validatedData['vice'];
            $forms->deliberation_held_on = $deliberation;
            $forms->deliberation_mode = $deliberation_mode;
            $forms->sector = $request->input('sector');
            $forms->name_agency = $validatedData['name_agency'];
            $forms->name_previous_incumbent = $validatedData['name_previous_incumbent'];
            $forms->period_employment_from = $validatedData['period_employment_from'];
            $forms->period_employment_to = $validatedData['period_employment_to'];
            $forms->rai_month = $request->input('rai_month');
            $forms->user_id = $userID;
            // Save the appointment
           $forms->save();
            
            ActivityLog::create([
                'user_id' => $userID,
                'activity' => 'Submitted an Appointment Data Entry Form with a Transaction Number of '.$transactionNumber
            ]);
            return redirect()->back()->with('success','Form submitted Successfully.');
        } catch (QueryException $e) {
            Log::error('Error in fetching the page'.$e->getMessage());
            return redirect()->back()->with('error','Error in submitting the  appointment data entry form. Please try again or contact the  Administrator.');
        }
    }

    public function delete(Request $request) {
        try {
            $id = $request->input('userID');
            $form = Appointment::find($id);
            
            if(!$form) {
                return redirect()->back()->with('error', 'Row not found');
            }
            
            $transactionNumber = $form->transaction_number;
            
            // Log the activity
            ActivityLog::create([
                'user_id' => auth()->user()->id,
                'activity' => 'Soft Delete a row with a Transaction Number of '.$transactionNumber
            ]);
            
            // Delete associated data from check_datas table
            $form->checkData()->delete();
            
            // Soft delete the Appointment row
            $form->delete();
            
            return redirect()->back()->with('success', 'Row soft deleted successfully. Please check your Trash tab.');
            
        } catch (QueryException $e) {
            Log::error('Error occurred:'.$e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while deleting this row. Please contact the Administrator.');
        }
    }
    
    //restore
    public function restore(Request $request) {
            try {
                // Find the trashed form by ID
                $id = $request->input('trashID');
                $form = Appointment::withTrashed()->findOrFail($id);
                if(!$form) {
                    return redirect()->back()->with('error','Row not found.');
                }
                $transactionNumber = $form->transaction_number;
                ActivityLog::create([
                    'user_id' => auth()->user()->id,
                    'activity' => 'Restored a trashed row with a Transaction Number of '.$transactionNumber
                ]);
                // Restore the trashed form
                $form->restore();
        
                // Redirect back with success message
                return redirect()->back()->with('success', 'Row restored successfully.');
            } catch (Exception $e) {
                // Log error and redirect back with error message
                Log::error('Error restoring form: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Failed to restore form. Please try again.');
            }
        }
    //delete permanently
    public function deletePermanently(Request $request) {
            try {
                $id = $request->input('trashID');
                // Find the trashed form by ID
                $form = Appointment::withTrashed()->findOrFail($id);
                if(!$form) {
                    return redirect()->back()->with('error','Row not found.');
                }
                $transactionNumber = $form->transaction_number;
                ActivityLog::create([
                    'user_id' => auth()->user()->id,
                    'activity' => 'Permanently deleted a row with a Transaction Number of '.$transactionNumber
                ]);
                // Permanently delete the trashed form
                $form->forceDelete();
               
                // Redirect back with success message
                return redirect()->back()->with('success', 'Row permanently deleted.');
            } catch (Exception $e) {
                // Log error and redirect back with error message
                Log::error('Error deleting form permanently: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Failed to delete form permanently. Please try again.');
            }
    }
    
    public function downloadAllData()
    {

    $forms = Appointment::latest()->get(); 
    // Define the CSV file name and headers
    $fileName = 'Apoointment_Data_Entries.csv';
    $headers = array(
        'Content-Type' => 'text/csv',
        'Content-Disposition' => "attachment; filename=$fileName",
    );

    // Create a CSV file
    $handle = fopen('php://temp', 'r+');
    // Add space (empty row) at the topmost row
    fputcsv($handle, []);

    // Add header title
    fputcsv($handle, ['Recorded Appointment Data Entries']);

    // Add space (empty row) after the header title
    fputcsv($handle, []);

    // Add column headers
    fputcsv($handle, ['Transaction Number', 'Full Name', 'Last Name', 'First Name','Middle Name','Extension Name','Position Title', 'Position From','Position To',
    'Salary Grade', 'Salary Rate', 'Salary Increment', 'Status of Appointment','Office Department Unit', 'Compensation Rate in Words', 'Compensation Rate in Number',
    'Nature of Appointment','Vice','Reason/ Title','Plantilla Item Number' ,'Plantilla Page Number','ODC Number','Date Process AO',' Date Posted in FB (Messenger)',
    'Date Received by Records Unit','Date Received by HR Unit','School / District','Name of Incumbent','Sex','Date of Birth','TIN Number','Date of Original Appointment',
    'Date of Last Promotion','Type of Eligibility','Date of Validity of Eligibility','First time use of Eligibility','Position Level','Appointment Status', 'PWD','Type of Disability','Member of IP Group','Ethnicity','Date of Updating PSIPOP Online',' Date of Updating PSIPOP Offline', 'Date Transmitted to CSC','Date Received from CSC','Approved?','Publication Mode','Processing Days','Status','Action Remarks','Final Action (if Disapproved)','Education','Education Remarks','Experience','Training','Eligibility Remarks','Senior High Remarks', 'Prov Appointment Remarks','Nature of Appointment Remarks','Date of Signing Remarks','Certificate of Vacant Position Remarks','Performance Rating','Performance Rating Remarks','Justification','justification Remarks','Daily Compensation','Position Pub From','Position Pub To', 'Deliberated Held On (For no.33B AFA)','Placement Committee Chairman','Sector','Name of Agency','Name of Previous Incumbent', 'Rai Month', 'Period of Employment From','Period of Employment To'
]); // Update headers

    foreach ($forms as $form) {
        fputcsv($handle, [
           // $form->user_id');
           $form->transaction_number,$form->full_name, $form->lname,$form->fname,$form->mname,$form->extname,$form->postitle,$form->frompos,
           $form->topos, $form->salary_grade,$form->salary_rate,$form->salary_increment,$form->appointment_status,$form->office_department_unit,$form->compensation_rate_words,
           $form->compensation_rate_num,$form->appointment_nature,$form->vice,$form->reason_title,$form->plantilla_item_number,$form->plantilla_page_number,$form->odc_number,$form->date_process_ao,$form->date_posted_fb_mess,$form->date_received_records_unit,$form->date_received_hr_unit,
           $form->school_district,$form->name_incumbent,$form->sex,
            $form->date_of_birth, $form->tin_number,$form->date_original_appointment, $form->date_last_promotion, $form->eligibility,
            $form->date_validity_eligibility,$form->first_time_use_eligibility,$form->position_level,
           $form->status_of_appointment,$form->pwd,$form->type_of_disability,$form->member_of_ip_group,
           $form->ethnicity,$form->date_updating_psiop_online,$form->date_updating_psiop_offline,$form->date_transmitted_to_csc,
            $form->date_received_from_csc,$form->approved,$form->pub_mode,$form->processing_days,
           $form->status,$form->action_remarks,$form->final_action,$form->education,
           $form->education_remarks, $form->experience,
           $form->training,$form->eligibility_remarks,$form->senior_high_remarks,$form->prov_appt_remarks,$form->nature_appt_remarks,
           $form->date_signing_remarks,$form->cert_vacabt_pos_remarks,$form->performace_rating_radio,$form->performace_rating_remarks,$form->justification_radio,$form->justification_remarks,
           $form->daily_compensation,
           $form->position_pub_from, $form->position_pub_to,$form->deliberation_held_on, $form->placement_committe_chair,$form->sector,$form->name_agency,$form->name_previous_incumbent, $form->rai_month,
           $form->period_employment_from, $form->period_employment_to
        ]);
    }

    rewind($handle);

    // Create a response with the CSV file
    $csv = stream_get_contents($handle);
    fclose($handle);

    ActivityLog::create([
        'user_id' => auth()->user()->id,
        'activity' => 'Exported All Appointment Data Entries as CSV Format .',
    ]);

    return Response::make($csv, 200, $headers);
}

    public function exportTrans()
    {
        $data = Appointment::latest()->select('level', 'school', 'name_of_appointee', 'remark', 'signature_of_appointee', 'date_and_time')->get();
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
            'activity' => 'Exported the form of Appointee table data .',
        ]);
    
        // Export to 'file.xlsx' and automatically download
        return $fastexcel->download('file.xlsx');
    }
    public function getAppointmentData($id) {
        $data = Appointment::findorFail($id);
        if (!$data) {
            return redirect()->back()->with('error', 'Appointment Data not found.');
        }
        
        
        return response()->json($data );
    }
    // public function fetchData(Request $request)
    // {
    //     $selectedFormIds = $request->input('selectedFormIds');
    
    //     // Fetch data based on the selected IDs
    //     $data = Appointment::whereIn('id', $selectedFormIds)->get();
        
    //     $count = $data->count(); // Get the count of fetched items
        
    //     return response()->json([
    //         'message' => 'Data fetched successfully',
    //         'data' => $data,
    //         'count' => $count, 
    //     ]);
    // }
    

    public function update(Request $request) 
    {
        try {
            $id = $request->input('userID');
            $form = Appointment::findOrFail($id);
            if (!$form) {
                return redirect()->back()->with('error', 'Appointment data not found.');
            } 
            $transactionNumber = $form->transaction_number;           
            // Validate the incoming request data
            $validatedData = $request->validate([
                'lname' => 'nullable|string',
                'fname' => 'nullable|string',
                'mname' => 'nullable|string',
                'extname' => 'nullable|string',
                'postitle' => 'nullable|string',
                'frompos' => 'nullable|string',
                'topos' => 'nullable|string',
                'salary_rate' => 'nullable|string',
                'salary_increment' => 'nullable|string',
                'appointment_status' => 'nullable|string',
                'office_department_unit' => 'nullable|string',
                'compensation_rate_words' => 'nullable|string',
                'compensation_rate_num' => 'nullable|numeric',
                'appointment_nature' => 'nullable|string',
                'reason_title' => 'nullable|string',
                'plantilla_item_number' => 'nullable|string',
                'plantilla_page_number' => 'nullable|string',
                'odc_number' => 'nullable|string',
                'date_received_records_unit' => 'nullable|date',
                'date_received_hr_unit' => 'nullable|date',
                'school_district' => 'nullable|string',
                'date_posted_fb_mess' => 'nullable|date',
                'name_incumbent' => 'nullable|string',
                'sex' => 'nullable|string',
                'date_process_ao' => 'nullable|string',
                'vice' => 'nullable|string',
                'date_of_birth' => 'nullable|date',
                'tin_number' => 'nullable|string',
                'date_original_appointment' => 'nullable|date',
                'date_last_promotion' => 'nullable|date',
                'eligibility' => 'nullable|string',
                'date_validity_eligibility' => 'nullable|string',
                'first_time_use_eligibility' => 'nullable|string',
                'position_level' => 'nullable|string',
                'status_of_appointment' => 'nullable|string',
                'pwd' => 'nullable|string',
                'type_of_disability' => 'nullable|string',
                'member_of_ip_group' => 'nullable|string',
                'ethnicity' => 'nullable|string',
                 'date_updating_psiop_online' => 'nullable|date',
                 'date_updating_psiop_offline' => 'nullable|date',
                 'date_transmitted_to_csc' => 'nullable|date',
                 'date_received_from_csc' => 'nullable|date',
                 'approved' => 'nullable|string',
                 'processing_days' => 'nullable|string',
                 'status' => 'nullable|string',
                 'action_remarks' => 'nullable|string',
                 'final_action' => 'nullable|string',
                'education' => 'nullable|string',
                'education_remarks' => 'nullable|string',
                'experience' => 'nullable|string',
                'training' => 'nullable|string',
                'eligibility_remarks' => 'nullable|string',
                'senior_high_remarks' => 'nullable|string',
                'prov_appt_remarks' => 'nullable|string',
                'nature_appt_remarks' => 'nullable|string',
                'date_signing_remarks' => 'nullable|string',
                'cert_vacabt_pos_remarks' => 'nullable|string',
                'performace_rating_radio' => 'nullable|string',
                'performace_rating_remarks' => 'nullable|string',
                'justification_radio' => 'nullable|string',
                'justification_remarks' => 'nullable|string',
                'date_process_ao' => 'nullable|date',
                'vice' => 'nullable|string',
                'daily_compensation' => 'nullable|string',
                'position_pub_from' => 'nullable|date',
                'position_pub_to' => 'nullable|date',
                'placement_committe_chair' => 'nullable|string',
                'sector' =>'nullable|string',
                'name_agency' => 'nullable|string',
                'name_previous_incumbent' => 'nullable|string',
                'period_employment_from' => 'nullable|date',
                'period_employment_to' => 'nullable|date',
                'rai_month' => 'nullable|string',
                //required|date_format:Y-m-d H:i:s|after_or_equal:' . date(DATE_ATOM),
            ]);
           // Process middle name to capitalize its first letter
            // Mass update the model fields
        $form->fill($validatedData);
        $middlename = ucfirst(substr($validatedData['mname'], 0, 1));

        // Update full name
        $form->full_name = $validatedData['fname'] . ' ' . $middlename . '. ' . $validatedData['lname'] . ' ' . $validatedData['extname'];

        // Concatenate salary grade
        $form->salary_grade = $validatedData['salary_rate']. ' - ' . $validatedData['salary_increment'];

       // dd($validatedData);

        // Save the updated data if any changes were made
        if ($form->isDirty()) {
            $form->save();

            ActivityLog::create([
                'user_id' => auth()->user()->id,
                'activity' => 'Updated Appointment Data Information of '. $transactionNumber
            ]);
            return redirect()->back()->with('success', 'Appointment Data Information of ' . $transactionNumber. ' updated successfully.');
        } else {
            return redirect()->back()->with('info', 'No changes detected.');
        }
    } catch (\Exception $e) {
        // Log the exception for debugging purposes
        Log::error('Appointment Data update failed: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to update the appointment data. Please try again or contact the Administrator');
    }
}
    public function index() {
        try {
            $user = auth()->user();
            $userID = $user->id;
            
            // Retrieve active forms
            $forms = Appointment::latest()->paginate(10);
        
            // Retrieve trashed forms if requested
             $trasheds = Appointment::where('user_id',$userID)->onlyTrashed()->latest()->paginate(10);
             // Pass an empty string as the query since there's no search
             $query = '';
            
             // Assuming there are always results initially
             $hasResults = true;
        
                    ActivityLog::create([
                        'user_id' => $userID,
                        'activity' => 'Visited Appointment Form page.'
                    ]);
            
            return view('forms.appointment', compact('forms', 'trasheds','hasResults','query'));
        } catch (QueryException $e) {
            Log::error('Error in fetching the page: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error in Fetching the page. Please try again or  contact the Administrator.');
        }
        
    }
}
