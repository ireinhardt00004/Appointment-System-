<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;
use App\Models\CSCControlForm;
use App\Models\User;
use Illuminate\Support\Facades\Log; 
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Models\Visit;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
   

    public function dashboard()
{
    $user = auth()->user();
    $userID = $user;
    $totalUsers = User::where('roles', 'user')->count();

    $currentMonth = Carbon::now()->format('F');

    // Get the current date
    $currentDate = Carbon::now()->toDateString();

    // Get the appointment entries for the current date
    $appointmentsToday = Appointment::whereDate('created_at', $currentDate)->count();

    // Get the appointment entries for the current month
    $appointmentsMonth = Appointment::whereYear('created_at', Carbon::now()->year)
        ->whereMonth('created_at', Carbon::now()->month)
        ->count();

    return view('dashboard', compact('currentMonth', 'totalUsers', 'appointmentsToday', 'appointmentsMonth','currentDate'));
}

    
    
    public function updateUserAccount(Request $request)
{
    try {
        // Find the coach by ID
        $userID = $request->input('user_id');
        $admin = auth()->user();
        $user = User::findorFail($userID);

        if (!$user) {
            return redirect()->back()->with('error', 'User Details not found.');
        }
        // Check if the provided password matches the authenticated user's password
        $passwordMatches = $admin && Hash::check($request->mypassword, $admin->password);

        if (!$passwordMatches) {
            return redirect()->back()->with('error', 'Your password is invalid. Please enter your current password to confirm the changes.');
        }
        // Get the admin ID from the authenticated user
        $adminID = auth()->user()->id;

        $validated = $request->validateWithBag('updatePassword', [
            'password' => ['required', Password::defaults()],
        ]);

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);
        // Create an activity log for the deletion
        ActivityLog::create([
            'user_id' => $adminID,
            'activity' => "Updated User Account , {$user->fname} {$user->lname}."
        ]);
        return redirect()->back()->with('success', 'User Account Deleted Successfully.');
    } catch (QueryException $e) {
        Log::error('Error occurred in deleting: ' . $e->getMessage());

        // Set error message in the session
        return redirect()->back()->with('error', 'An error occurred while deleting the coach details.');
    }
}
    public function removeUserAccount(Request $request)
{
    try {
        // Find the coach by ID
        $userID = $request->input('user_id');
        $admin = auth()->user();
        $user = User::findorFail($userID);

        if (!$user) {
            return redirect()->back()->with('error', 'User Details not found.');
        }
        // Check if the provided password matches the authenticated user's password
        $passwordMatches = $admin && Hash::check($request->password, $admin->password);

        if (!$passwordMatches) {
            return redirect()->back()->with('error', 'Your password is invalid. Please enter your current password to confirm the changes.');
        }
        // Get the admin ID from the authenticated user
        $adminID = auth()->user()->id;

        // Create an activity log for the deletion
        ActivityLog::create([
            'user_id' => $adminID,
            'activity' => "Deleted User Account , {$user->fname} {$user->lname}."
        ]);

        // Delete the  user
        $user->delete();

        return redirect()->back()->with('success', 'User Account Deleted Successfully.');
    } catch (QueryException $e) {
        Log::error('Error occurred in deleting: ' . $e->getMessage());

        // Set error message in the session
        return redirect()->back()->with('error', 'An error occurred while deleting the coach details.');
    }
}
    public function clearCache()
    {
        Artisan::call('cache:clear');
        return redirect()->back()->with('success', 'Cache cleared successfully.');
    }

}
