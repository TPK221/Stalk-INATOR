<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Missions;
use App\Models\Submissions;
use App\Models\Reservations;
use Illuminate\Http\Request;
use App\Models\studentProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SubmitFindingsController extends Controller
{
    public function index($id)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $student = studentProfile::where('user_id', $user->id)->first();
        $mission = Missions::where('id', $id)->first();
        
        return view('student.submitfindings', compact('user', 'student', 'mission'));
    }

    public function storeSubmission(Request $request, $reservationId)
    {
        $this->validate($request, [
            'submissionFile' => ['required', 'mimes:png,jpg,pdf,docx', 'max:2048']
        ]);
    
        $user = $request->user();
        $studentProfile = studentProfile::where('user_id', $user->id)->firstOrFail();
    
        // Retrieve the reservation based on the reservation ID
        // $reservation = Reservations::findOrFail($reservationId);
        $reservation = Reservations::where('id', $reservationId)
        ->where('user_id', $user->id)
        ->firstOrFail();
    
        $missionId = $reservation->mission_id;
        
    
        $submissionFile = $request->file('submissionFile');
        $submissionFileName = $submissionFile->getClientOriginalName();
        $submissionFileToStore = time() . '_' . $submissionFileName;
    
        $submissionFile->move('storage', $submissionFileToStore);
    
        $submission = new Submissions();
        $submission->student_profile_id = $studentProfile->id;
        $submission->mission_id = $missionId;
        $submission->submissionFile = $submissionFileToStore;
        $submission->status = 'Submitted';
        $submission->save();
    
        return redirect()->route('student.mymissions')->with('success', 'Submission successful.');
    }

    public function download(Request $request, $submissionFile)
    {
        return response()->download(public_path('storage/' . $submissionFile));
    }
}
