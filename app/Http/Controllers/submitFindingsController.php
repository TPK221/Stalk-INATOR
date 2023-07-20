<?php

namespace App\Http\Controllers;

use App\Models\Missions;
use App\Models\Reservations;
use App\Models\Submissions;
use Illuminate\Http\Request;
use App\Models\StudentProfile;
use Illuminate\Support\Facades\Auth;

class SubmitFindingsController extends Controller
{
    public function index($id)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        $student = StudentProfile::where('user_id', $user->id)->firstOrFail();
        $mission = Missions::findOrFail($id);
        
        return view('student.submitfindings', compact('user', 'student', 'mission'));
    }

    public function storeSubmission(Request $request, $reservationId)
    {
        $this->validate($request, [
            'submissionFile' => ['required', 'mimes:png,jpg,pdf,docx', 'max:2048']
        ]);
    
        $user = $request->user();
        $studentProfile = studentProfile::where('user_id', $user->id)->firstOrFail();
    
        $reservation = Reservations::findOrFail($reservationId);
    
        $submissionFile = $request->file('submissionFile');
        $submissionFileName = time() . '_' . $submissionFile->getClientOriginalName();
    
        $submissionFile->storeAs('public', $submissionFileName);
    
        $submission = new Submissions();
        $submission->student_profile_id = $studentProfile->id;
        $submission->mission_id = $reservation->mission_id;
        $submission->submissionFile = $submissionFileName;
        $submission->status = 'Submitted';
        $submission->save();
    
        return redirect()->route('student.mymissions')->with('success', 'Submission successful.');
    }

    public function download(Request $request, $submissionFile)
    {
        return response()->download(storage_path('app/public/' . $submissionFile));
    }
}
