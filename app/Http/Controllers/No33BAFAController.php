<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\No33BAFA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Response;
use App\Models\Appointment;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;
use Carbon\Carbon;

class No33BAFAController extends Controller
{
  
    public function pdf($id)
    {
        try {
            // Fetch the appointment data
            $data = Appointment::findOrFail($id);
            if (!$data) {
                return redirect()->back()->with('error', 'Appointment not found.');
            }
    
            // Load the existing Word template document based on appointment status
            if ($data->appointment_status == 'Substitute' || $data->appointment_status == 'Reclassification') {
                $templateFilePath = public_path('downloadable-forms/SUB_TEMPLATES.docx');
            } else {
                $templateFilePath = public_path('downloadable-forms/TEMPLATES.docx');
            }
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($templateFilePath);
    
            // Format the dates as needed
            $deliberationHeldOn = new \DateTime($data['deliberation_held_on']);
            $positionPubFrom = new \DateTime($data['position_pub_from']);
            $positionPubTo = new \DateTime($data['position_pub_to']);
    
            $formattedDeliberationHeldOn = $deliberationHeldOn->format('F d, Y');
            $formattedPositionPubFrom = $positionPubFrom->format('F d');
            $formattedPositionPubTo = $positionPubTo->format('F d, Y');
            $currentDate = \Carbon\Carbon::now()->format('F d, Y');
    
            // Replace placeholders with the corresponding data
            $templateProcessor->setValue('{{FULL_NAME}}', $data['full_name']);
            $templateProcessor->setValue('{{NAME}}', $data['full_name']);
            $templateProcessor->setValue('{{SCOL_DISTRICT}}', $data['school_district']);
            $templateProcessor->setValue('{{POSPOSTITLE}}', $data['postitle']);
            $templateProcessor->setValue('{{SG}}', $data['salary_grade']);
            $templateProcessor->setValue('{{SUTATS}}', $data['appointment_status']);
            $templateProcessor->setValue('{{OFFICEDEPT}}', $data['office_department_unit']);
            $templateProcessor->setValue('{{COMPENMONTH}}', $data['compensation_rate_words']);
            $templateProcessor->setValue('{{COMPENNUM}}', $data['compensation_rate_num']);
            $templateProcessor->setValue('{{APPNATU}}', $data['appointment_nature']);
            $templateProcessor->setValue('{{VICE}}', $data['vice']);
            $templateProcessor->setValue('{{REASONTITLE}}', $data['reason_title']);
            $templateProcessor->setValue('{{PLANTILLAITEMNUMBER}}', $data['plantilla_item_number']);
            $templateProcessor->setValue('{{PPN}}', $data['plantilla_page_number']);
            $templateProcessor->setValue('{{PLACEMENTPPC}}', $data['placement_committe_chair']);
            $templateProcessor->setValue('{{PUBMODE}}', $data['pub_mode']);
            $templateProcessor->setValue('{{DELIBHEADON}}', $formattedDeliberationHeldOn);
            $templateProcessor->setValue('{{POSPUBF}}', $formattedPositionPubFrom);
            $templateProcessor->setValue('{{POSPUBT}}', $formattedPositionPubTo);
            $templateProcessor->setValue('{{DATEOFSIGN}}', $currentDate);
    
            // Save the modified document
            $outputFilePath = public_path('export-doc/Output.docx');
            $templateProcessor->saveAs($outputFilePath);
    
            // Log activity
            $user = auth()->user();
            $userID = $user->id;
            ActivityLog::create([
                'user_id' => $userID,
                'activity' => 'Submitted a No. 33B AFA Form.'
            ]);
    
            // Return the generated document for download
            return response()->download($outputFilePath)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            Log::error('Error in generating the document: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error in generating the document. Please try again later.');
        }
    }
    



    // public function delete(Request $request, $id) {
    //     try {
    //         $form = No33BAFA::find($id);
    //         if (!$form) {
    //             return redirect()->back()->with('error', 'Row not found');
    //         }
    //         $form->delete();
    //         return redirect()->back()->with('success', 'Row soft deleted successfully');
    //     } catch (QueryException $e) {
    //         Log::error('Error occurred: ' . $e->getMessage());
    //         return redirect()->back()->with('error', 'An error occurred while deleting this row. Please contact the Administrator.');
    //     }
    // }

    // public function restoreDeleted($id) {
    //     try {
    //         $transmittal = No33BAFA::withTrashed()->findOrFail($id);
    //         $transmittal->restore();
    //         return redirect()->back()->with('success', 'Row restored successfully.');
    //     } catch (\Exception $e) {
    //         Log::error('Error restoring transmittal: ' . $e->getMessage());
    //         return redirect()->back()->with('error', 'Failed to restore transmittal. Please try again.');
    //     }
    // }

    // public function deletePermanently($id) {
    //     try {
    //         $forms = No33BAFA::withTrashed()->findOrFail($id);
    //         $forms->forceDelete();
    //         return redirect()->back()->with('success', 'Transmittal permanently deleted.');
    //     } catch (\Exception $e) {
    //         Log::error('Error deleting transmittal permanently: ' . $e->getMessage());
    //         return redirect()->back()->with('error', 'Failed to delete transmittal permanently. Please try again.');
    //     }
    // }

    // public function search(Request $request)
    // {
    //     $query = $request->input('query');
    //     $forms = No33BAFA::where('fullname', 'like', '%' . $query . '%')
    //                      ->orWhere('salary_grade', 'like', '%' . $query . '%')
    //                      ->orWhere('position_title', 'like', '%' . $query . '%')
    //                      ->orWhere('status', 'like', '%' . $query . '%')
    //                      ->orWhere('selection', 'like', '%' . $query . '%')
    //                      ->orWhere('transaction_number', 'like', '%' . $query . '%')
    //                      ->orWhere('appointment_nature', 'like', '%' . $query . '%')
    //                      ->paginate(10);

    //     $hasResults = $forms->count() > 0;

    //     ActivityLog::create([
    //         'user_id' => auth()->user()->id,
    //         'activity' => 'Searched no.33B table with a query: ' . $query,
    //     ]);

    //     return view('forms.no33', compact('forms', 'hasResults', 'query'));
    // }

    // public function downloadNo33()
    // {
    //     $forms = TransmittalofAppointee::all();
    //     $fileName = 'Transmittal_of_Appointee.csv';
    //     $headers = [
    //         'Content-Type' => 'text/csv',
    //         'Content-Disposition' => "attachment; filename=$fileName",
    //     ];

    //     $handle = fopen('php://temp', 'r+');
    //     fputcsv($handle, []);
    //     fputcsv($handle, ['Transmittal of Appointee']);
    //     fputcsv($handle, []);
    //     fputcsv($handle, ['Level', 'School', 'Name of Appointee', 'Remarks', 'Signature of Appointee', 'Date & Time']);

    //     foreach ($forms as $form) {
    //         fputcsv($handle, [$form->level, $form->school, $form->name_of_appointee, $form->remark, $form->signature_of_appointee, $form->date_and_time]);
    //     }

    //     rewind($handle);
    //     $csv = stream_get_contents($handle);
    //     fclose($handle);

    //     ActivityLog::create([
    //         'user_id' => auth()->user()->id,
    //         'activity' => 'Downloaded the Transmittal of Appointee.',
    //     ]);

    //     return Response::make($csv, 200, $headers);
    // }

    // public function store(Request $request) {
    //     try {
    //         $user = auth()->user();
    //         $userID = $user->id;
    //         $validatedData = $request->validate([
    //             'fullname' => 'required|string',
    //             'position_title' => 'required|string',
    //             'salary_grade' => 'required|string',
    //             'status' => 'required|string',
    //             'office_unit_dept' => 'required|string',
    //             'compensation_rate_words' => 'required|string',
    //             'compensation_rate_num' => 'required|numeric',
    //             'appointment_nature' => 'required|string',
    //             'vice' => 'required|string',
    //             'plantilla_page_number' => 'required|numeric',
    //             'plantilla_item_number' => 'required|numeric',
    //             'selection' => 'required|string',
    //         ]);

    //         $transactionNumber = 'N33-' . strtoupper(date('Y-F')) . '-' . uniqid();

    //         No33BAFA::create([
    //             'user_id' => $userID,
    //             'fullname' => $validatedData['fullname'],
    //             'position_title' => $validatedData['position_title'],
    //             'salary_grade' => $validatedData['salary_grade'],
    //             'status' => $validatedData['status'],
    //             'office_unit_dept' => $validatedData['office_unit_dept'],
    //             'compensation_rate_words' => $validatedData['compensation_rate_words'],
    //             'compensation_rate_num' => $validatedData['compensation_rate_num'],
    //             'appointment_nature' => $validatedData['appointment_nature'],
    //             'vice' => $validatedData['vice'],
    //             'plantilla_page_number' => $validatedData['plantilla_page_number'],
    //             'plantilla_item_number' => $validatedData['plantilla_item_number'],
    //             'selection' => $validatedData['selection'],
    //             'transaction_number' => $transactionNumber,
    //         ]);

    //         ActivityLog::create([
    //             'user_id' => $userID,
    //             'activity' => 'Submitted a No. 33B AFA Form.',
    //         ]);

    //         return redirect()->back()->with('success', 'Form submitted successfully.');
    //     } catch (QueryException $e) {
    //         Log::error('Error occurred: ' . $e->getMessage());
    //         return redirect()->back()->with('error', 'An error occurred while submitting the form. Please contact the Administrator.');
    //     }
    // }
}
