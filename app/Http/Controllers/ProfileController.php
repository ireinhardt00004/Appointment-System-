<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'lname' => 'string',
                'middlename' => 'string',
                'fname' => 'string',
                'email' => 'email|string',
            ]);
    
            // Initialize $user outside the if block
            $user = $request->user();
    
            // Update the user's profile information
            if ($request->hasFile('profile_pic')) {
                $file = $request->file('profile_pic');
    
                // Validate file type
                $allowedFileTypes = ['jpg', 'jpeg', 'png', 'gif'];
                $extension = $file->getClientOriginalExtension();
                
                if (!in_array(strtolower($extension), $allowedFileTypes)) {
                    throw new \Exception('Invalid file format. Please upload an image file with extensions: jpg, jpeg, png, gif.');
                }
    
                // Define $fileType based on logic (e.g., image or video)
                $fileType = 'image';
    
                $prefix = ($fileType === 'image') ? '2024PROFILE' : 'OTHER';
                $uniqueMediaNumber = $prefix . '-' . uniqid();
    
                // Use the move method to store the file in the public directory
                $file->move(public_path('profile_pic'), $uniqueMediaNumber);
    
                // Set the file path for future use if needed
                $filePath = 'profile_pic/' . $uniqueMediaNumber;
                $user->profile_pic = $filePath;
    
                // Log the file path for debugging
                Log::info('Profile Picture Path:', ['path' => $filePath]);
            }
    
            $user->fill($validatedData);
            $user->save();
    
            return Redirect::route('profile.edit')->with('success', 'Profile Information updated successfully.');
        } catch (\Exception $e) {
            // Log the exception for debugging purposes
            Log::error('Profile update failed: ' . $e->getMessage());
    
            // Check for validation errors and redirect back with errors if present
            if ($e instanceof \Illuminate\Validation\ValidationException) {
                return redirect()->back()->withErrors($e->validator->errors())->withInput();
            }
            return Redirect::route('profile.edit')->with('error', 'Failed to update profile. Please try again.');
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
