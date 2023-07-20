<?php

namespace App\Http\Controllers\lecturer;

use App\Models\User;
use App\Models\Missions;
use Illuminate\Http\Request;
use App\Models\lecturerProfile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class manageMissionController extends Controller
{
    public function index($id){
        $user = auth()->user();
        $lecturer= lecturerProfile::where('user_id', $user->id)->first();

        $mission= DB::select('select * from missions where id = ?', [$id]);
        return view('lecturer.editmission',  compact('user', 'lecturer'), ['mission'=>$mission]);
    }

    public function updateMission(Request $request, $id){
        $mission_instruction = $request->input('missionInstruction');
        $difficulty = $request->input('difficulty');
        $start_date = $request->input('start_date');
        $due_date = $request->input('due_date');

        DB::update('update missions set mission_instruction = ?, difficulty = ?, start_date = ?, due_date = ? where id = ?', [$mission_instruction, $difficulty, $start_date, $due_date,$id]);

        return redirect('missions');

    }

    public function deleteMission($id)
    {   
        //Alert::question('Question', 'Are you sure you want to delete this mission?');
        $findMission = Missions::find($id);
        $findMission->delete();
        //Alert::success('Success', 'Mission has been deleted');
        
        return redirect()->route('missions');
    }
}
