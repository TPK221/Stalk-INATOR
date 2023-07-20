<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\studentProfile;
use App\Models\lecturerProfile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $baseRoute = RouteServiceProvider::HOME;

        if (Auth::user()->hasRole('student')) {
            // return redirect()->route('homepage');
            $studentProfile_id =  studentProfile::where('user_id', Auth::user()->id)->first();
            if ($studentProfile_id) {
                session(['studentProfile_id' => $studentProfile_id->id]);
            }


            return redirect()->route('homepage')->with('message', 'Success!');
        } elseif (Auth::user()->hasRole('lecturer')) {
            $lecturerProfile_id =  lecturerProfile::where('user_id', Auth::user()->id)->first();
            if ($lecturerProfile_id ) {
                session(['lecturerProfile_id' => $lecturerProfile_id->id]);
            }

            return redirect()->route('homepage')->with('message', 'Success!');
        }

    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $request->session()->flush();

        return redirect('/');
    }
}
