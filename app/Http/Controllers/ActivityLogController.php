<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;


class ActivityLogController extends Controller
{
    //
    public function dashboard() {
        
        return view('dashboard');
    }
    public function index() {
        $user = auth()->user();
        $userID = $user->id;

        $logs = ActivityLog::where('user_id', $userID)->latest()->paginate(10);
       
        return view('logs.index', compact('logs'));
    }
    public function adminUserLogs() {
        $user = auth()->user();
        $userID = $user->id;
        $logs = ActivityLog::latest()->paginate(10);
        
        return view('logs.user-logs', compact('logs'));
        Activity::create([
            'user_id'=>$userID,
            'activity'=> 'Visited User Logs page.'
        ]);

    }
    public function clearLogs() {

        $user = auth()->user();
        $userID = $user->id;

        $logs = ActivityLog::where('user_id', $userID);
        $logs->delete();

        return redirect()->back()->with('success','Cleared all your activity Logs Successfully. ');
   } 
   public function destroy($id)
   {
       // Get the authenticated user's ID
       $authUserId = auth()->id();
   
       // Find the activity log by ID
       $activityLog = ActivityLog::findOrFail($id);
       // Check if the authenticated user has permission to delete this log
       if ($activityLog->user_id !== $authUserId) {
           // If not, return a message or redirect with an error
           return redirect()->back()->with('error', 'You do not have permission to delete this activity log.');
       }
       // If the user has permission, delete the activity log
       $activityLog->delete();
   
       return redirect()->back()->with('success', 'Activity log deleted successfully.');
   }
   public function downloadActivityLogs()
   {
       $user = auth()->user();
       $userID = $user->id;
   
       // Get the authenticated user's activity logs, ordered by the latest first
       $activityLogs = ActivityLog::where('user_id', $userID)
           ->orderBy('created_at', 'desc')
           ->get();
   
       // Define the CSV file name and headers
       $fileName = 'activity_logs.csv';
       $headers = [
           'Content-Type' => 'text/csv',
           'Content-Disposition' => "attachment; filename=$fileName",
       ];
   
       // Create a CSV file
       $handle = fopen('php://temp', 'r+');
   
       // Add header title
       fputcsv($handle, ['Activity Logs']);
   
       // Add space (empty row) after the header title
       fputcsv($handle, []);
   
       // Add column headers
       fputcsv($handle, ['ID', 'Activity', 'Timestamp']);
   
       // Iterate over the activity logs and add data to the CSV
       foreach ($activityLogs as $index => $log) {
          
         // Format the timestamp to "Month Day, Year, Hour:Minute AM/PM" format
        $timestamp = Carbon::parse($log->created_at)->format('F j, Y, h:i A');


           // Add log data to the CSV
           fputcsv($handle, [$index + 1, $log->activity, $timestamp]);
       }
   
       // Move the pointer to the beginning of the stream
       rewind($handle);
   
       // Create a response with the CSV file
       $csv = stream_get_contents($handle);
       fclose($handle);
   
       // Log the activity
       ActivityLog::create([
           'user_id' => auth()->user()->id,
           'activity' => 'Downloaded the activity logs record.',
       ]);
   
       // Return the response with the CSV file
       return response()->make($csv, 200, $headers);
   }
   
   public function downloadAllActivityLogs()
   {
       // Get all activity logs, ordered by the latest first
       $activityLogs = ActivityLog::latest()->get();
   
       // Define the CSV file name and headers
       $fileName = 'user_activity_logs.csv';
       $headers = [
           'Content-Type' => 'text/csv',
           'Content-Disposition' => "attachment; filename=$fileName",
       ];
   
       // Create a CSV file
       $handle = fopen('php://temp', 'r+');
   
       // Add column headers
       fputcsv($handle, ['Incremental ID', 'User First Name', 'User Middle Name', 'User Last Name', 'Activity', 'Timestamp']);
   
       // Initialize an incremental ID counter
       $incrementalId = 1;
   
       // Iterate over the activity logs and add data to the CSV
       foreach ($activityLogs as $log) {
           // Format the timestamp to "Month Day, Year" format
         // Format the timestamp to "Month Day, Year, Hour:Minute AM/PM" format
        $timestamp = Carbon::parse($log->created_at)->format('F j, Y, h:i A');

           // Add log data to the CSV
           fputcsv($handle, [
               $incrementalId++,
               $log->users->fname,
               $log->users->middlename,
               $log->users->lname,
               $log->activity, 
               $timestamp
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
           'activity' => 'Downloaded all activity logs records.',
       ]);
   
       // Return the response with the CSV file
       return response()->make($csv, 200, $headers);
   }
   
}
