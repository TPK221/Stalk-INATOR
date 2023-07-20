<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missions;

class AllMissionsController extends Controller
{
    public function index(Request $request)
    {
        $missions = Missions::query();

        $allMissions = $missions->paginate(4);

        return view('lecturer.allmissions', [
            'missions' => $allMissions,
        ]);
    }
}
