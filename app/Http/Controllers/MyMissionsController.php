<?php

namespace App\Http\Controllers;

use App\Models\Missions;
use App\Models\Reservations;
use App\Models\StudentProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Submissions;

class MyMissionsController extends Controller
{
    public function index()
    {
        $reservations = Reservations::where('user_id', auth()->user()->id)
            ->where('status', '!=', 'completed')
            ->with(['mission', 'studentProfile'])
            ->get();
    
        $points = [];
        $feedback = [];
    
        foreach ($reservations as $reservation) {
            $submission = Submissions::where('mission_id', $reservation->mission_id)->first();
            $reservation->submission = $submission;
            $points[$reservation->id] = $reservation->points;
            $feedback[$reservation->id] = $reservation->feedback;
        }
    
        return view('student.mymissions', [
            'reservations' => $reservations,
            'points' => $points,
            'feedback' => $feedback,
        ]);
    }

    public function submitFindings(Request $request, Reservations $reservation)
    {
        $user = Auth::user();

        // check if user is authorized to submit findings for this reservation
        if ($user->id !== $reservation->user_id) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        // check if the submission exists for this reservation
        $submission = Submissions::where('reservation_id', $reservation->id)->first();
        if (!$submission) {
            return redirect()->back()->with('error', 'Submission not found');
        }

        // update the status of the submission to "submitted"
        $submission->status = 'submitted';
        $submission->save();


        return redirect()->back()->with('success', 'Findings submitted successfully');
    }
}
