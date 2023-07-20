<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function index()
   {
       if(Auth::user()->hasRole('student')){
            return view('home');
       }elseif(Auth::user()->hasRole('lecturer')){
            return view('home');
       }
   }

   public function studentDashboard()
   {
    return view('student.studentdash');
   }

   public function lecturerDashboard()
   {
    return view('lecturer.lecturerdash');
   }
}
