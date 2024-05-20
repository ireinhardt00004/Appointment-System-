<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Log; 
use Illuminate\Database\QueryException;

class NoteController extends Controller
{
    //
    public function submit(Request $request) {
        try {
            $user = auth()->user();
            $userID = $user->id;
            $validatedData = $request->validate([
                'notes' => 'required|string'
            ]);
           
        
           $forms = new Note;
           $forms->notes = $validatedData['notes'];
           $forms->user_id = $userID;
            // Save the checklist
           $forms->save();
            
            ActivityLog::create([
                'user_id' => $userID,
                'activity' => 'Saved a Note.'
            ]);
            return redirect()->back()->with('success','Saved Note Successfully.');
        } catch (QueryException $e) {
            Log::error('Error in fetching the page'.$e->getMessage());
            return redirect()->back()->with('error','Error in submitting the form. Please contact the Administrator.');
        }
    }
    public function updateNote(Request $request, $id) {
        $note = Note::find($id);
    
        // Check if the note exists
        if (!$note) {
            return redirect()->back()->with('error', 'Note not found.');
        }
    
        // Validate the request data
        $validatedData = $request->validate([
            'notes' => 'required|string', // Assuming 'notes' field is required
        ]);
    
        // Update the note with the validated data
        $note->notes = $validatedData['notes'];
        $note->save();
    
        return redirect()->back()->with('success', 'Note updated successfully.');
    }
    public function deleteNote(Request $request) {
        $id = $request->input('delete-id-note');
        $note = Note::find($id);
        // Check if the note exists
        if (!$note) {
            return redirect()->back()->with('error', 'Note not found.');
        }
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity' => 'Deleted a note.'
        ]);
        $note->delete();
    
        return redirect()->back()->with('success', 'Note Deleted successfully.');
    }
    
    public function getNotesAjax() {
        $user = auth()->user();
        $notes = Note::where('user_id', $user->id)->latest()->get();
    
        return response()->json($notes, );
    }
    
    

}
