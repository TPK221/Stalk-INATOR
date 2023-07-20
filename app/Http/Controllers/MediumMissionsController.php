<?php

namespace App\Http\Controllers;
use App\Models\Missions;
use App\Models\StudentProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MediumMissionsController extends Controller
{
    public function index(Request $request)
    {
        $missions = null;
        if (Auth::user()->role === 'lecturer') {
            $missions = Missions::with('lecturerProfile')
                ->paginate(4);
        } else {
            $today = Carbon::today();
            $missions = Missions::with('studentProfile')
                ->where('difficulty', 'Medium')
                ->where('start_date', $today)
                ->paginate(4);
        }

        return view('mediummissions', [
            'missions' => $missions,
        ]);
    }

    public function store(Request $request)
    {
        return $request->all();
        return view('mediummissions');
    }
}
