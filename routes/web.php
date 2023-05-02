<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\GradeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/student/register', 'register')->name('student.register');
    Route::post('/student/store', 'store')->name('student.store');
    Route::get('/student/login', 'login')->name('student.login');
    Route::post('/student/authenticate', 'authenticate')->name('student.authenticate');
    Route::get('/student/dashboard', 'dashboard')->name('student.dashboard');
    Route::post('/student/logout', 'logout')->name('student.logout');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/dashboard', 'dashboard')->name('admin.dashboard');
    Route::get('/admin/dashboard', 'dashboard')->name('admin.dashboard');
});

Route::resource('grades', GradeController::class);