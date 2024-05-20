<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 
use Illuminate\Database\QueryException;
use App\Models\User;
use App\Models\ActivityLog;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\VerifyEmail;
class UserController extends Controller
{
    //
    public function index() {
        try {
        $users = User::where('roles', 'user')->latest()->paginate(10);
       
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity' => 'Visited Users table page.'
        ]);
        $query = '';
        $hasResults = true;

        return view('admin.users-table',compact('users','query','hasResults'));
    } catch (QueryException $e) {
        Log::error('Error in fetching the page'.$e->getMessage());
        return redirect()->back()->with('error','Error in Fetching the page. Please contact the Administrator.');
    }
}   
public function search(Request $request)
{
    $query = $request->input('query');
    
    // Fetch users only with the role 'user'
    $users = User::where('roles', 'user')
        ->where(function ($q) use ($query) {
            $q->where('lname', 'like', '%' . $query . '%')
              ->orWhere('middlename', 'like', '%' . $query . '%')
              ->orWhere('fname', 'like', '%' . $query . '%')
              ->orWhere('email', 'like', '%' . $query . '%')
              ->orWhere('contact_num', 'like', '%' . $query . '%');
        })
        ->paginate(10);

    $hasResults = $users->count() > 0; // Check if there are any results

    ActivityLog::create([
        'user_id' => auth()->user()->id,
        'activity' => 'Searched user account table with a query: ' . $query,
    ]);

    return view('admin.users-table', compact('users', 'hasResults', 'query'));
}

    public function register(Request $request) {
        try {
            $request->validate([
                'lname' => ['required', 'string', 'max:255'],
                'middlename' => ['required', 'string', 'max:255'],
                'fname' => ['required', 'string', 'max:255'],
                'contact_num' => ['required','string','max:11'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            $userRole = 'user';
            
            $user = User::create([
                'lname' => $request->lname,
                'middlename' =>$request->middlename,
                'fname' => $request->fname,
                'roles' => $userRole,
                'contact_num' => $request->contact_num,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            //dd($user);
           // $user->sendEmailVerificationNotification();
            ActivityLog::create([
                'user_id' => auth()->user()->id,
                'activity' => 'Registered new user, '.$user->fname
            ]);
    
        return redirect()->back()->with('success','Registered User Successfully. Please confirm the account by clicking the verification link on their email.');

        } catch (QueryException $e) {
            Log::error('Error occured:' .$e->getMessage());
            return redirect()->back()->with('error','An error occured while registering the user. Please contact the Administrator.');
        }
    }
    
}
