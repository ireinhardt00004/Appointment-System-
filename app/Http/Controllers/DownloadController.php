<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log; 
use Illuminate\Database\QueryException;
use App\Models\TransmittalofAppointee;
use App\Models\ActivityLog;
use App\Models\Appointment;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DownloadController extends Controller
{
    
    public function downloadExcelFileWithAppendedData()
{
    try {
        // Retrieve data from the database
        $data = Appointment::latest()
            ->select('position_level', 'school_district', 'fname', 'mname', 'lname')
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

            // Concatenate first, middle, and last names
            $nameOfAppointee = $rowData['fname'] . ' ' . $rowData['mname'] . ' ' . $rowData['lname'];

            // Set the value for the NAME OF THE APPOINTEE column
            $sheet->setCellValueByColumnAndRow($startColumnIndex, $rowIndex, $nameOfAppointee);

            // Leave the REMARKS, SIGNATURE OF THE APPOINTEE, and DATE AND TIME columns blank by default
        }

        // Save the modified spreadsheet to a file
        $excelWriter = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $excelFileName = 'Transmittal_of_Appointee.xlsx';
        $excelFilePath = public_path('downloadable-forms/' . $excelFileName);
        $excelWriter->save($excelFilePath);

        // Download the generated Excel file
        return response()->download($excelFilePath);
    } catch (\Throwable $e) {
        Log::error('Error importing Excel file:', [
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTraceAsString(),
        ]);
        return response()->json(['error' => 'An error occurred while importing the Excel file'], 500);
    }
}

    // Helper function to get the column map
private function getColumnMap()
{
    return [
        'position_level' => 'LEVEL',
        'school_district' => 'SCHOOL',
        'name_of_appointee' => 'NAME OF THE APPOINTEE', // Adjusted column name
    ];
}

    // Helper function to get the template column name for a given database column name
    private function getColumnMapValue($columnName)
    {
        $columnMap = $this->getColumnMap();
        return $columnMap[$columnName] ?? null;
    }



    
    public function download($filename)
    {
        $user = auth()->user();
        $userID = $user->id;
    
        // Get the full path to the file
        $filePath = public_path('downloadable-forms/' . $filename);
       
        try {
            // Check if the file exists
            if (file_exists($filePath)) {
                // Return the file as a response
                ActivityLog::create([
                    'user_id' => $userID,
                    'activity' => 'Downloaded a file named, ' . $filename
                ]);
                return response()->download($filePath);
            } else {
                // File not found, return a 404 response
                abort(404);
            }
        } catch (Exception $e) {
            // Log error and redirect back with error message
            Log::error('Error in downloading ' . $filename . ': ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error in downloading the file. Please contact the Administrator.');
        }
    }
    
}
