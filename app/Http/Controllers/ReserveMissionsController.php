<?php

namespace App\Http\Controllers;

use App\Models\Missions;
use App\Models\Reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReserveMissionsController extends Controller
{

    public function reserve(Request $request, $id)
    {
        $user = auth()->user();

        // Check if the user has already reserved a mission
        if ($user->reservations()->count() >= 1) {
            $latestReservation = $user->reservations()->latest()->first();

            // Check if the due date of the latest reservation has been missed
            if ($latestReservation->mission->due_date >= Carbon::today()) {
                return back()->withErrors('ERROR! You cannot reserve more than one mission as the current mission has not passed its due date.');
            }
        }

        $mission = Missions::findOrFail($id);

        if ($mission->is_reserved) {
            return back()->withErrors('ERROR! This mission is already reserved.');
        }

        $reservation = new Reservations;
        $reservation->user_id = $user->id;
        $reservation->mission_id = $mission->id;
        $reservation->save();

        $mission->is_reserved = true;
        $mission->save();

        $reservationPeriod = '1 week';
        $reservedBy = $user;

        return view('reserve-confirmation')->with([
            'mission' => $mission,
            'reservedBy' => $reservedBy,
            'reservationPeriod' => $reservationPeriod
        ])->withErrors(session('errors'));
    }
}
