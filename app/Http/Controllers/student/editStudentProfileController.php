<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\studentProfile;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class editStudentProfileController extends Controller
{
    //
    public function index(){

        $user = auth()->user();
        $student = studentProfile::where('user_id', $user->id)->first();
        return view('student.editstudentprofile', compact('student', 'user'));
    }

    public function saveAndUpdateProfile(Request $request)
    {
        if (request()->hasFile('image')) {
            $this->validate($request, [
                'fullName' => 'required',
                'studentID' => 'required',
                'image' => 'required | image'

            ]);
            if ($student = studentProfile::where('id', session()->get('studentProfile_id'))->first()) {
                $imageUploaded = request()->file('image');
                $imageName = pathinfo($imageUploaded, PATHINFO_FILENAME). '_' .time(). '.' . $imageUploaded->getClientOriginalExtension();
                $imagePath = public_path('/storage/images/');
                $imageUploaded->move($imagePath, $imageName);
                //$imagePath = $request->image->store('uploads', 'public');
                $student->fullName = $request->fullName;
                $student->studentID = $request->studentID;
                $student->image = $imageName;
                $student->save();
                return redirect()->back();
            } else {
                $storeStudentProfile = new studentProfile();
                $storeStudentProfile->user_id = Auth::user()->id;
                //$storeStudentProfile->user_id = $user_id;
                $imageUploaded = request()->file('image');
                $imageName = pathinfo($imageUploaded, PATHINFO_FILENAME). '_' .time(). '.' . $imageUploaded->getClientOriginalExtension();
                $imagePath = public_path('/storage/images/');
                $imageUploaded->move($imagePath, $imageName);
                $storeStudentProfile->fullName = $request->fullName;
                $storeStudentProfile->studentID = $request->studentID;
                $storeStudentProfile->image = $imageName;

                $storeStudentProfile->save();
                //dd($imagePath);

                session(['studentProfile_id' => $storeStudentProfile->id]);
                return redirect()->back();
            }
        } else {
            $this->validate($request, [
                'fullName' => 'required',
                'studentID' => 'required'

            ]);
            if ($student = studentProfile::where('id', session()->get('studentProfile_id'))->first()) {
                $student->fullName = $request->fullName;
                $student->studentID = $request->studentID;
                $student->save();
                return redirect()->back();
            } else {
                $storeStudentProfile = new studentProfile();
                $storeStudentProfile->user_id = Auth::user()->id;
                //$storeStudentProfile->user_id = $user_id;
                $storeStudentProfile->fullName = $request->fullName;
                $storeStudentProfile->studentID = $request->studentID;
                $storeStudentProfile->save();

                session(['studentProfile_id' => $storeStudentProfile->id]);
                return redirect()->back();
            }
        }

    }
}
