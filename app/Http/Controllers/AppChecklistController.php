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

class AppChecklistController extends Controller
{
    //
    public function downloadChecklistExcelFile($id)
{
    try {
        // Retrieve data from the database based on the ID passed
        $data = Appointment::findOrFail($id);
        
        // Check if data exists
        if (!$data) {
            return redirect()->back()->with('error', 'Checklist not found.');
        }

        // Load the existing Excel file
        $existingExcelFilePath = public_path('downloadable-forms/app_checklistz.xlsx');

        if (!file_exists($existingExcelFilePath)) {
            Log::error("Existing Excel file not found: $existingExcelFilePath");
            return response()->json(['error' => 'Existing Excel file not found']);
        }

        // Load the existing Excel file as a PhpSpreadsheet object
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($existingExcelFilePath);
        // Get the active sheet
        $sheet = $spreadsheet->getActiveSheet();

        // Define the data fields with their respective column and row coordinates
        $fieldCoordinates = [
            'full_name' => ['column' => 'B', 'row' => 4],
            'postitle' => ['column' => 'B', 'row' => 5],
            'education' => ['column' => 'C', 'row' => 11],
            'salary_grade' => ['column' => 'F', 'row' => 5], 
            'compensation_rate_num' => ['column' => 'B', 'row' => 6],
            'education_remarks' => ['column' => 'F', 'row' => 11],
            'experience' => ['column' => 'C', 'row' => 12],
            'training' => ['column' => 'C', 'row' => 13],
            'eligibility' => ['column' => 'C', 'row' => 14],
            'eligibility_remarks' => ['column' => 'F', 'row' => 14],
            'senior_high_remarks' => ['column' => 'F', 'row' => 16],
            'prov_appt_remarks' => ['column' => 'F', 'row' => 27],
            'nature_appt_remarks' => ['column' => 'F', 'row' => 29],
            'date_signing_remarks' => ['column' => 'F', 'row' => 31],
            'cert_vacabt_pos_remarks' => ['column' => 'F', 'row' => 32],
            'performace_rating_radio' => ['column' => 'D', 'row' => 70], // Use single cell for radio button
            'performace_rating_remarks' => ['column' => 'F', 'row' => 70],
            'justification_radio' => ['column' => 'E', 'row' => 71], // Use single cell for radio button
            'justification_remarks' => ['column' => 'F', 'row' => 71]
        ];

        // Modify the text fields
        $data->compensation_rate_num ='₱' . $data->compensation_rate_num;
        $data->education = 'Education: ' . $data->education;
        $data->experience = 'Experience: ' . $data->experience;
        $data->training = 'Training: ' . $data->training;
        $data->eligibility = 'Eligibility: ' . $data->eligibility;

        // Iterate over each data field
        foreach ($fieldCoordinates as $fieldName => $coordinates) {
            // Get the column and row coordinates
            $column = $coordinates['column'];
            $row = $coordinates['row'];

            // For radio buttons, set the value directly
            if (strpos($fieldName, '_radio') !== false) {
                $value = ($data->$fieldName == 'Yes' || $data->$fieldName == 'No') ? '/' : '';
                $sheet->setCellValue($column . $row, $value);
            } else {
                // For other fields, set the value directly
                $sheet->setCellValue($column . $row, $data->$fieldName);
            }
        }
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity' => 'Exported an Appointment Processing Checklist of transaction number ' . $data->transaction_number
        ]);

        // Save the modified spreadsheet to a variable
        ob_start();
        $excelWriter = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $excelWriter->save('php://output');
        $excelData = ob_get_clean();

        // Set headers for download
        $headers = [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename="APPOINTMENT PROCESSING CHECKLIST_file.xlsx"',
        ];

        // Return the Excel data with headers for download
        return response()->make($excelData, 200, $headers);
    } catch (QueryException $e){
        Log::error('Error:' . $e->getMessage());
        return redirect()->back()->with('error','An error occurred. Please try again later or contact the Administrator.');
    }
}

    
}
