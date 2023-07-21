<?php

namespace App\Http\Controllers;

use App\Models\Missions;
use App\Models\Submissions;
use App\Models\reservations;
use Illuminate\Http\Request;
use App\Models\studentProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    public function index(Request $request)
    {
        $submissionData = Submissions::join('student_profiles', 'student_profiles.id', '=', 'submissions.student_profile_id')
        ->join('reservations', function ($join) {
            $join->on('reservations.user_id', '=', 'student_profiles.user_id');
            $join->whereColumn('reservations.mission_id', '=', 'submissions.mission_id');
        })
        ->join('missions', 'missions.id', '=', 'reservations.mission_id')
        ->select('student_profiles.fullName', 'student_profiles.studentID', 'submissions.submissionFile', 'submissions.created_at', 'reservations.mission_id')
        ->get();
    
        $studentNames = DB::table('student_profiles')->select('fullName')->distinct()->get()->pluck('fullName');
    
        $students = studentProfile::query();
    
        if ($request->filled('studentName')) {
            $students->where('studentName', $request->studentName);
        }
    
        return view('lecturer.submissions', [
            'studentNames' => $studentNames,
            'student' => $students,
        ], compact('submissionData', 'studentNames', 'students'));
    }
    


    public function assignPoints(Request $request)
    {
        $studentName = $request->input('studentName');
        $points = $request->input('points');
        $feedback = $request->input('feedback');
        $missionId = $request->input('missionId');

        $studentProfile = studentProfile::where('fullName', $studentName)->firstOrFail();

        $reservations = Reservations::where('user_id', $studentProfile->user_id)
            ->where('mission_id', $missionId)
            ->firstOrFail();

        $currentPoints = $reservations->points ?? 0;
        $newPoints = $currentPoints + $points;

        $reservations->points = $newPoints;
        $reservations->feedback = $feedback;
        $reservations->save();

        return redirect()->route('leaderboard')->with('success', 'Points and feedback assigned successfully.');
    }
}
