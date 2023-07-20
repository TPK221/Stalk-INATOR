<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Reservations;
use App\Models\Missions;
use App\Models\StudentProfile;
use App\Models\LecturerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegistryController extends Controller
{
    public function index()
    {
        $lecturers = User::with('lecturerProfile', 'reservations', 'roles')
            ->whereHas('roles', function ($query) {
                $query->where('name', 'lecturer');
            })
            ->get();

        $students = User::with('studentProfile', 'reservations', 'roles', 'reservations.mission')
            ->whereHas('roles', function ($query) {
                $query->where('name', 'student');
            })
            ->get();

        return view('lecturer.registry', compact('lecturers', 'students'));
    }
}
