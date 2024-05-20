<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;
use App\Models\Rai;
use App\Models\Appointment;
use Illuminate\Support\Facades\Log; 
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Response;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RaiController extends Controller
{   
    public function downloadRaiExcelFile(Request $request)
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
                $data = Appointment::find($id);
        
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
            $existingExcelFilePath = public_path('downloadable-forms/Report on Appointment_Issued_Blank.xls');

            if (!file_exists($existingExcelFilePath)) {
                Log::error("Existing Excel file not found: $existingExcelFilePath");
                return response()->json(['error' => 'Existing Excel file not found'], 404);
            }

            // Load the existing Excel file as a PhpSpreadsheet object
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($existingExcelFilePath);

            // Get the active sheet
            $sheet = $spreadsheet->getActiveSheet();
            // Assuming $rai_month is fetched from the database
            $rai_month = $data['rai_month']; // Replace 'rai_month' with the actual column name from your database
            $currentYear = Carbon::now()->format('Y'); // Corrected Carbon method
            // Add the sentence "For the month of" before $rai_month
            $rai_month_with_sentence = "For the month of " . $rai_month . ' ' . $currentYear;
            

            // Set the value of $rai_month_with_sentence to cell A5
            $sheet->setCellValue('A5', $rai_month_with_sentence);

            // Define the header row index (assuming the header row is at index 1)
            $headerRow = 23;

            // Define the starting column index (assuming the data starts from column A)
            $startColumnIndex = 2;

            // Define the columns to select from the database
            $columns = [
                'lname',
                'fname',
                'extname',
                'mname',
                'postitle',
                'plantilla_item_number',
                'salary_grade',
                'salary_increment',
                'compensation_rate_num',
                'appointment_status',
                'period_employment_from',
                'period_employment_to',
                'appointment_nature',
                'deliberation_held_on',
                'deliberation_mode',
                'position_pub_from',
                'position_pub_to',
                'pub_mode'
            ];
            
            // Iterate over each row of data
            foreach ($allData as $index => $rowData) {
                // Calculate the row index based on the header row and the current index
                $rowIndex = $headerRow + $index + 1;

                // Define $positionPubCombined based on 'position_pub_from' and 'position_pub_to'
                $positionPubCombined = date('m/d/Y', strtotime($rowData['position_pub_from'])) . ' to ' . date('m/d/Y', strtotime($rowData['position_pub_to']));
              //  dd($rowData['appointment_status']);
                // Check if the appointment status is 'Casual', 'Temporary', or 'Contractual'
                if (in_array($rowData['appointment_status'], ['Casual', 'Temporary', 'Contractual','Substitute'])) {
                    // Format 'period_employment_from' and 'period_employment_to' dates
                    $periodEmploymentFrom = date('m/d/Y', strtotime($rowData['period_employment_from']));
                    $periodEmploymentTo = date('m/d/Y', strtotime($rowData['period_employment_to']));

                    // Construct the "Period of Employment" value
                    $periodEmployment = $periodEmploymentFrom . ' to ' . $periodEmploymentTo;
                } else {
                    $periodEmployment = 'N/A'; // Set empty value if appointment status doesn't match conditions
                }
               // dd($periodEmployment);
                // Your existing logic for populating spreadsheet with data
                foreach ($columns as $columnName) {
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

                    // Get the value from $rowData for the current column
                    $value = $rowData[$columnName];

                    // Prepend an apostrophe before setting the value if it's plantilla_item_number
                    if ($columnName === 'plantilla_item_number') {
                        $value = " " . $value;
                    }

                    // Format date values as "mm/dd/yyyy" before setting them in the spreadsheet
                    if ($columnName === 'deliberation_held_on' || $columnName === 'deliberation_mode') {
                        $value = date('m/d/Y', strtotime($value));
                    }

                    // Set the value in the spreadsheet
                    $sheet->setCellValue($cellCoordinate, $value);

                    // If it's a special column like salary_grade or position_pub_combined, set their values accordingly
                    switch ($columnName) {
                        case 'salary_grade':
                            // Set the 'salary_grade' value directly to the cell as a string
                            $sheet->setCellValueExplicit($cellCoordinate, $value, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                            break;                    
                        case 'position_pub_from':
                        case 'position_pub_to':
                            $sheet->setCellValue($cellCoordinate, $positionPubCombined);
                            break;
                            case 'period_employment_from':
                            case 'period_employment_to':
                                $sheet->setCellValue($cellCoordinate, $periodEmployment);    
                                break;                            
                        case 'deliberation_mode':
                            // Insert deliberation_mode into the correct column
                            $modeColumnIndex = array_search('MODE', array_values($this->getColumnMap())) + 1;
                            $modeCellCoordinate = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + $modeColumnIndex - 1) . $rowIndex;
                            $sheet->setCellValue($modeCellCoordinate, $value);
                            break;
                    }
                }
            }

            // Save the modified spreadsheet to a file
            $excelWriter = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
            $excelFileName = 'RAI_file.xlsx';
            $excelFilePath = public_path('export_forms/' . $excelFileName);
            $excelWriter->save($excelFilePath);

            ActivityLog::create([
                'user_id' => auth()->user()->id,
                'activity' => 'Exported the RAI data.'
            ]);

            // Download the generated Excel file
            return response()->download($excelFilePath);
        } catch (\Throwable $e) {
            Log::error('Error importing Excel file:', ['exception' => $e]);
            return response()->json(['error' => 'An error occurred while importing the Excel file'], 500);
        }
    }

    private function getColumnMap()
    {
        return [
            'deliberation_held_on' => 'Date Issued/ ',
            'lname' => 'Last Name',
            'fname' => 'First Name',
            'extname' => 'Name Extension  (Jr./III)',
            'mname' => 'Middle Name',
            'postitle' => 'POSITION TITLE',
            'plantilla_item_number' => 'ITEM NO.', 
            'salary_grade' => 'SALARY/ JOB/ ',
            'compensation_rate_num' => 'SALARY  RATE (Monthly)',
            'appointment_status' => 'EMPLOYMENT STATUS',
            'period_employment_from' => 'PERIOD OF EMPLOYMENT (for Temporary, Casual/ Contractual Appointments) (mm/dd/yyyy to mm/dd/yyyy)',
            'appointment_nature' => 'NATURE OF APPOINTMENT',           
            'position_pub_from' => 'DATE indicate period of publication (mm/dd/yyyy to mm/dd/yyyy)', 
            'pub_mode' => 'MODE (CSC Bulletin of Vacant Positions, Agency Website, Newspaper, etc)', // Added line break for readability
            'validationzdssd' => 'V-Validated',
            'date_of_action' => 'Date',
            'date_of_release' => 'Date of Release (mm/dd/yyyy)',
            'agency_receiving_officer' => 'Agency Receiving Officer'
        ];
    }

    private function getColumnMapValue($columnName)
    {
        $columnMap = $this->getColumnMap();
        return $columnMap[$columnName] ?? null;
    }    
}
