<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\PsychiatricController;
use App\Http\Controllers\RegisterController;
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
    Route::post('/', [AdminController::class, 'update']);
    Route::resource('/directors', DirectorController::class)->only('index', 'store', 'show', 'update', 'destroy');
    Route::resource('/registers', RegisterController::class)->only('index', 'store', 'show', 'update', 'destroy');
    Route::resource('/psychiatrics', PsychiatricController::class)->only('index', 'store', 'show', 'update', 'destroy');
});
