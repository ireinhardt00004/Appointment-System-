<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;
use App\Models\CSCControlForm;
use Illuminate\Support\Facades\Log; 
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Appointment;
class CSCControlFormController extends Controller
{
    //
    public function downloadControlCSCFExcelFile(Request $request)
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

        // Initialize an empty array to store all data
        $allData = [];

        // Loop through each selected ID
        foreach ($selectedFormIds as $id) {
            // Retrieve data from the database for the current ID
            $data = Appointment::findOrFail($id);

            // If data is found, add it to the $allData array
            if ($data) {
                $allData[] = $data->toArray();
            }
        }
    
        // Check if any data was fetched
        if (empty($allData)) {
            return response()->json(['error' => 'No data found for the selected IDs'], 404);
        }

        // Load the existing Excel file
        $existingExcelFilePath = public_path('downloadable-forms/Control_FO_Blank.xlsx');
        if (!file_exists($existingExcelFilePath)) {
            throw new \Exception("Existing Excel file not found: $existingExcelFilePath");
        }

        // Load the existing Excel file as a PhpSpreadsheet object
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($existingExcelFilePath);

        // Get the active sheet
        $sheet = $spreadsheet->getActiveSheet();

        // Define the header row index (assuming the header row is at index 1)
        $headerRow = 10;

        // Define the starting column index (assuming the data starts from column A)
        $startColumnIndex = 2;

        // Define the columns to select from the database
        $columns = [
            'full_name',
            'sector',
            'name_agency',
            'eligibility',
            'date_validity_eligibility',
            'postitle',
            'salary_grade',
            
            'position_level',
            'appointment_status',
            'appointment_nature',
            'date_of_birth',
            'sex',
            'pwd',
            'type_of_disability',
            'member_of_ip_group',
            'ethnicity',
            'first_time_use_eligibility',
        ];

        // Get the column map
        $columnMap = $this->getColumnMap();

        // Iterate over each row of data
        foreach ($allData as $index => $rowData) {
            // Construct the full name
            $full_name = $rowData['lname'] . ' ' . $rowData['extname'] . ' ' . ($rowData['fname'] ?? '') . ' ' . ($rowData['mname'] ?? '');

            // Remove extra spaces caused by empty name parts
            $full_name = trim(preg_replace('/\s+/', ' ', $full_name));

            // Assign the full_name to rowData
            $rowData['full_name'] = $full_name;
            
            // Calculate the row index based on the header row and the current index
            $rowIndex = $headerRow + $index + 1;

            foreach ($columns as $columnName) {
                // Map the database column name to the corresponding template column name
                $templateColumnName = $columnMap[$columnName] ?? null;
                // Check if the mapping exists
                if (!$templateColumnName) {
                    throw new \Exception("No mapping found for column '$columnName'");
                }
            
                // Calculate the column index based on the start column and the template column name
                $columnIndex = array_search($templateColumnName, array_values($columnMap)) + 1;
            
                // Calculate the cell coordinate
                $cellCoordinate = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + $columnIndex - 1) . $rowIndex;
            
                // Get the value from $rowData for the current column
                $value = ($columnName === 'full_name') ? $rowData[$columnName] : $rowData[$columnName];
            
                // Prepend an apostrophe before setting the value if necessary
                // (e.g., for preventing Excel from interpreting numeric values as dates)
                if ($columnName === 'salary_grade') {
                    $value = " " . $value;
                }
            
                // Format date values as "mm/dd/yyyy" before setting them in the spreadsheet
                if ($columnName === 'date_validity_eligibility' || $columnName === 'date_of_birth') {
                    $value = date('m/d/Y', strtotime($value));
                }
            
                // Set the value in the spreadsheet
                $sheet->setCellValue($cellCoordinate, $value);
            }
            
        }

        // Save the modified spreadsheet to a file
        $excelWriter = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $excelFileName = 'Control_CSC FO Cavite_file.xlsx';
        $excelFilePath = public_path('export_forms/' . $excelFileName);
        $excelWriter->save($excelFilePath);

        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity' => 'Exported the Control CSC FO Cavite data.'
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
            'date_received_fo' => 'DATE RECEIVED
            (mm/dd/yyyy)', 'sector' => 'SECTOR', 'name_agency' => 'NAME OF AGENCY', 'full_name' => 'NAME OF APPOINTEE
            (LAST NAME, FIRSTNAME, EXT NAME, MIDDLE NAME)', 'postitle' => 'POSITION TITLE', 'salary_grade' => 'SALARY/JOB/',
            'position_level' => 'POSITION LEVEL', 'appointment_status' => 'EMPLOYMENT STATUS', 'appointment_nature' => 'NATURE OF APPOINTMENT', 'inclusive_from' => 'From', 'inclusive_to' => 'To','name_appointing_authority' => 'NAME OF APPOINTING AUTHORITY', 'date_issuance_appointment' => 'DATE OF ISSUANCE OF APPOINTMENT
            (mm/dd/yyyy)','date_of_birth' => 'DATE OF BIRTH
            (mm/dd/yyyy)', 'sex' => 'SEX' ,'pwd' => 'PWD?', 'type_of_disability' => 'TYPE OF DISABILITY', 'member_of_ip_group' => 'MEMBER OF IP GROUP','ethnicity' => 'ETHNICITY', 'eligibility' => 'TYPE OF ELIGIBILITY USED','date_validity_eligibility' => 'DATE OF EFFECTIVITY OF ELIGIBILITY', 'first_time_use_eligibility' => 'FIRST TIME USED OF ELIGIBILITY?'
        ];
    }
    
    // Helper function to get the template column name for a given database column name
    private function getColumnMapValue($columnName)
    {
        $columnMap = $this->getColumnMap();
        return $columnMap[$columnName] ?? null;
    }
    
    public function export() {
        
        try {
            $user = auth()->user();
            $userID = $user->id;
            $forms = CSCControlForm::where('user_id', $userID)->get();
       
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
