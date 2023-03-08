<?php

use App\Http\Controllers\Api\AttendanceController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/confirmation/{id}', [AttendanceController::class, 'confirmeAttendance'])
    ->name('attendance.confirme');

Route::get('/resend-attendance-id/{id}', [AttendanceController::class, 'resendAttendanceId'])
    ->name('attendance.resend-id');

