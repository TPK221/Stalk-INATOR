<?php

namespace App\Http\Controllers;

use App\Models\Missions;
use App\Models\Reservations;
use Laratrust\Laratrust;
use App\Models\Submissions;
use Illuminate\Http\Request;
use App\Models\lecturerProfile;
use Illuminate\Support\Facades\DB;
use Laratrust\Traits\LaratrustUserTrait;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class MissionController extends Controller
{
    public function index(Request $request)
    {
        $difficulties = DB::table('missions')->select('difficulty')->distinct()->get()->pluck('difficulty');

        $missions = Missions::query();

        if ($request->filled('difficulty')) {
            $missions->where('difficulty', $request->difficulty);
        }

        // Check if the authenticated user is a student or lecturer
        if (Auth::user()->hasRole('student')) {
            // Filter the missions to exclude those that have been reserved
            $missions->where('is_reserved', false);
            $today = \Carbon\Carbon::today();
            $missions->where('start_date', $today);
        }

        // Check and remove missions based on the due date
        $missions->where(function ($query) {
            $query->whereNull('due_date')
                ->orWhere('due_date', '>=', Carbon::today());
        });
        $allMissions = $missions->with('lecturerProfile')->get();

        return view('missions', [
            'difficulties' => $difficulties,
            'missions' => $missions->paginate(4),
            'allMissions' => $allMissions,
        ]);
    }

    public function store(Request $request)
    {
        return $request->all();
        return view('missions');
    }

    public function showReserveMissionForm($id)
    {
        $mission = Missions::findOrFail($id);

        return view('missions.reserve', [
            'mission' => $mission,
            'reservedBy' => Auth::user(),
            'reservationPeriod' => '1 week',
            'isReserved' => $mission->is_reserved,
        ]);
    }

    public function reserveMission(Request $request, $id)
    {
        $mission = Missions::findOrFail($id);

        if ($mission->is_reserved) {
            return back()->with('error', 'This mission has already been reserved.');
        }

        $user = Auth::user();
        // Check if the user has already reserved a mission
        if ($user->reservations()->count() >= 1) {
            // Get the latest reservation of the user
            $latestReservation = $user->reservations()->latest()->first();

            // Check if the latest reservation is past its due date
            if ($latestReservation->mission->due_date >= Carbon::today()) {
                return back()->withErrors('You cannot reserve more than one mission unless the previous mission is past its due date.');
            }
        }

        $reservation = new Reservations;

        $mission->is_reserved = true;
        $mission->user_id = $user->id;
        $mission->save();

        return redirect()->route('missions.show', $mission->id)->with('success', 'Mission reserved successfully.');
    }
}
