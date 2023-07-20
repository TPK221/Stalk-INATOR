<?php

use App\Http\Controllers\AllMissionsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\leaderboardController;
use App\Http\Controllers\submitFindingsController;
use App\Http\Controllers\chooseDifficultyController;
use App\Http\Controllers\EasyMissionsController;
use App\Http\Controllers\HardMissionsController;
use App\Http\Controllers\lecturer\AddMissionsController;
use App\Http\Controllers\lecturer\manageMissionController;
use App\Http\Controllers\student\editStudentProfileController;
use App\Http\Controllers\lecturer\editLecturerProfileController;
use App\Http\Controllers\MediumMissionsController;
use App\Http\Controllers\MyMissionsController;
use App\Http\Controllers\RegistryController;
use App\Http\Controllers\ReserveMissionsController;
use App\Http\Controllers\RewardsController;
use App\Http\Controllers\SocialEngineeringInsightsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomePageController::class, 'index'])->name('homepage');

//auth route for both 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    //Route::get('/', [HomePageController::class, 'index'])->name('homepage');
    Route::get('/missions', [MissionController::class, 'index'])->name('missions');
    Route::get('/leaderboard', [leaderboardController::class, 'index'])->name('leaderboard');
    Route::get('/reservemissions/{id}',[ReserveMissionsController::class, 'reserve'])->name('reservemissions');
    Route::get('/easymissions',[EasyMissionsController::class, 'index'])->name('easymissions');
    Route::get('/mediummissions',[MediumMissionsController::class, 'index'])->name('mediummissions');
    Route::get('/hardmissions',[HardMissionsController::class, 'index'])->name('hardmissions');
    Route::get('/rewards',[RewardsController::class, 'index'])->name('rewards');
    

});

// for students
Route::group(['middleware' => ['auth', 'role:student']], function() { 
    Route::get('/dashboard/student', [DashboardController::class, 'studentDashboard'])->name('dashboard.studentDashboard');
    Route::get('/student/editProfile', [editStudentProfileController::class, 'index'])->name('student.editProfile');
    Route::post('/student/saveAndUpdateProfile', [editStudentProfileController::class, 'saveAndUpdateProfile'])->name('student.saveAndUpdateProfile');
    //Route::post('/student/submitFindings/{$findMissionID}', [SubmissionController::class, 'storeSubmission'])->name('student.submitFindings');
    //Route::post('/missions/submitFindings/{mission_id}', [MissionController::class, 'submitFindings'])->name('student.submitFindings');
    Route::get('/student/submitFindings/{id}', [submitFindingsController::class, 'index'])->name('student.submitFindings');
    Route::post('/student/storeFindings/{reservationId}', [SubmitFindingsController::class, 'storeSubmission'])->name('student.storeFindings');
    Route::get('/student/myMissions',[MyMissionsController::class, 'index'])->name('student.mymissions');
    Route::get('/student/submitFindings/{reservation}', [MyMissionsController::class, 'submitFindings'])->name('student.submitFindings');
    Route::get('/student/socialengineeringinsights',[SocialEngineeringInsightsController::class, 'index'])->name('student.socialengineeringinsights');
    
});

// for lecturers
Route::group(['middleware' => ['auth', 'role:lecturer']], function() { 
    Route::get('/dashboard/lecturer', [DashboardController::class, 'lecturerDashboard'])->name('dashboard.lecturerDashboard');
    Route::get('/missions/addmissions', [AddMissionsController::class, 'index'])->name('missions.addmissions');
    Route::post('/missions/savemission', [AddMissionsController::class, 'saveMissions'])->name('missions.savemissions');
    Route::get('/lecturer/editProfile', [editLecturerProfileController::class, 'index'])->name('lecturer.editProfile');
    Route::post('/lecturer/saveAndUpdateProfile', [editLecturerProfileController::class, 'saveAndUpdateProfile'])->name('lecturer.saveAndUpdateProfile');
    Route::get('/lecturer/editMission/{id}', [manageMissionController::class, 'index'])->name('lecturer.editMission');
    Route::post('/lecturer/updateMission/{id}', [manageMissionController::class, 'updateMission'])->name('lecturer.updateMission');
    Route::get('/lecturer/deleteMission/{id}', [manageMissionController::class, 'deleteMission'])->name('lecturer.deleteMission');
    Route::get('/lecturer/submissions/', [SubmissionController::class, 'index'])->name('lecturer.submissions');
    Route::get('/lecturer/downloadSubmissions/{submissionFile}', [submitFindingsController::class, 'download'])->name('lecturer.downloadSubmissions');
    Route::post('/lecturer/assignPoints/{student_name}', [SubmissionController::class, 'assignPoints'])->name('lecturer.assignPoints');
    Route::get('/lecturer/registry/', [RegistryController::class, 'index'])->name('lecturer.registry');
    Route::get('/allmissions', [AllMissionsController::class, 'index'])->name('allmissions');

}); 

require __DIR__.'/auth.php';
