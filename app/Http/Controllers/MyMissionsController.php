<?php

namespace App\Http\Controllers;

use App\Models\Reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Submissions;

class MyMissionsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $reservations = $user->Reservations()
            ->where('status', '!=', 'completed')
            ->with(['mission', 'submission'])
            ->get();

        return view('student.mymissions', compact('reservations'));
    }

    public function submitFindings(Request $request, Reservations $reservation)
    {
        $user = Auth::user();

        // Check if the authenticated user is authorized to submit findings for this reservation
        if ($user->id !== $reservation->user_id) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        // Check if the submission exists for this reservation
        $submission = $reservation->submission;
        if (!$submission) {
            return redirect()->back()->with('error', 'Submission not found');
        }

        // Update the status of the submission to "submitted"
        $submission->status = 'submitted';
        $submission->save();

        return redirect()->back()->with('success', 'Findings submitted successfully');
    }
}
