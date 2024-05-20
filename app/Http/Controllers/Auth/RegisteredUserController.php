<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
// use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Facades\Validator;
// use App\Mail\VerifyEmail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
    return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
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

        event(new Registered($user));
	    // Send the verification email (handled by Breeze)
	    // $user->sendEmailVerificationNotification();
     // return redirect()->back()->with('success','Registered User Successfully. Please confirm your account on the email.');
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    // return redirect('/check-email-for-verification');
    }
}
