<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\PsychiatricController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TrainingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//public Routes
Route::view('/', 'index')->name('login');
Route::post('/', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/create', [ApplicantController::class, 'store']);

//Admin routes
Route::group(["prefix" => "admin", "middleware" => ["auth", "isAdmin"], "as" => "admin."], function () {
    Route::get('/', [AdminController::class, 'create']);
    Route::put('/', [AdminController::class, 'update']);
    Route::resource('/directors', DirectorController::class)->only('index', 'store', 'show', 'update', 'destroy');
    Route::resource('/registers', RegisterController::class)->only('index', 'store', 'show', 'update', 'destroy');
    Route::resource('/psychiatrics', PsychiatricController::class)->only('index', 'store', 'show', 'update', 'destroy');
});

//Applicant routes
Route::group(["prefix" => "applicant", "middleware" => ["auth:applicant", "isApplicant"], "as" => "applicant."], function () {
    Route::get('/', [ApplicantController::class, 'create']);
    Route::put('/', [ApplicantController::class, 'update']);
    Route::get('/status', [ApplicantController::class, 'status']);
    Route::resource('/application', ApplicationController::class)->only('index', 'store');
    Route::get("/training", [TrainingController::class, 'applicantList']);
    Route::get("/playlist/{id}", [TrainingController::class, 'playList']);
});

//Director routes
Route::group(["prefix" => "director", "middleware" => ["auth:director", "isDirector"], "as" => "director."], function () {
    Route::get('/', [DirectorController::class, 'create']);
    Route::put('/', [DirectorController::class, 'update']);
    Route::get('/applicants', [ApplicantController::class, 'directorList']);
    Route::get('/register', [ApplicantController::class, 'directorRegisterList']);
    Route::get('/trained', [ApplicantController::class, 'directorPsychiatricList']);
    Route::get('/approved', [ApplicantController::class, 'directorApprovedList']);
    Route::get('/rejected', [ApplicantController::class, 'directorRejectedList']);
});

//Psychiatric routes
Route::group(["prefix" => "psychiatric", "middleware" => ["auth:psychiatric", "isPsychiatric"], "as" => "psychiatric."], function () {
    Route::get('/', [PsychiatricController::class, 'create']);
    Route::post('/', [PsychiatricController::class, 'update']);
    Route::get('/applicants', [ApplicantController::class, 'psychiatricList']);
    Route::get('/applicants/approve/{id}', [ApplicantController::class, 'approve']);
    Route::get('/applicants/reject/{id}', [ApplicantController::class, 'reject']);
});

//Register routes
Route::group(["prefix" => "register", "middleware" => ["auth:register", "isRegister"], "as" => "register."], function () {
    Route::get('/', [RegisterController::class, 'create']);
    Route::put('/', [RegisterController::class, 'update']);
    Route::get('/applicants', [ApplicantController::class, 'registerList']);
    Route::get('/applicants/approve/{id}', [ApplicantController::class, 'registerApprove']);
    Route::get('/applicants/reject/{id}', [ApplicantController::class, 'registerReject']);
    Route::get('/trained', [ApplicantController::class, 'psychiatricApproved']);
    Route::get('/approved', [ApplicantController::class, 'approved']);
    Route::get('/rejected', [ApplicantController::class, 'rejected']);
});
