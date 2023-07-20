<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\studentProfile;
use App\Models\Reservations;
use Illuminate\Support\Facades\DB;

class leaderboardController extends Controller
{
    public function index()
    {
        $leaderboardData = DB::table('student_profiles')
            ->join('reservations', 'student_profiles.user_id', '=', 'reservations.user_id')
            ->select('student_profiles.fullName', DB::raw('SUM(reservations.points) AS totalPoints'), 'student_profiles.studentID')
            ->groupBy('student_profiles.user_id', 'student_profiles.fullName', 'student_profiles.studentID')
            ->orderBy('totalPoints', 'desc')
            ->get();

        return view('leaderboard', compact('leaderboardData'));
    }
}
