<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorOfSubjController;
use App\Http\Controllers\DoctorRequestController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentRequestController;
use App\Http\Controllers\TermStudentsController;
use App\Models\DoctorOfSubject;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;



// auth
Route::get('login', [AuthController::class, 'login_get'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'login_post'])->middleware('guest');

Route::post('logout', [AuthController::class, 'logout'])->middleware('auth_');

Route::get('signup', [AuthController::class, 'signup_get'])->name('signup')->middleware('guest');
Route::post('signup', [AuthController::class, 'signup_post'])->middleware('guest');


// home
Route::get('/', function () {
    return view('welcome');
})->name('home')->middleware('auth_');

// doctor routes
Route::middleware(['auth_', 'doctor', 'adminOrCurrentDoctor'])->group(function () {

    Route::get('/doctor/{id:id}', [DoctorController::class, 'show'])
        ->name('doctor.account.show')
        ->where('id', '[0-9]+');

    Route::get('/doctor/{id:id}/edit', [DoctorController::class, 'edit'])
        ->name('doctor.account.edit')
        ->where('id', '[0-9]+');

    Route::patch('/doctor/{id:id}/edit', [DoctorController::class, 'patch'])
        ->name('doctor.edit')
        ->where('id', '[0-9]+');

    Route::get('/doctor/{id:id}/history', [DoctorOfSubjController::class, 'history'])
        ->name('doctor.history')
        ->where('id', '[0-9]+');

    Route::get('/doctor/{id:id}/requests', [DoctorRequestController::class, 'index'])
        ->name('doctor.request')
        ->where('id', '[0-9]+');

    Route::get('/doctor/{id:id}/request', [DoctorRequestController::class, 'create'])
        ->name('doctor.request')
        ->where('id', '[0-9]+');

    Route::post('/doctor/{id:id}/request', [DoctorRequestController::class, 'make'])
        ->name('doctor.request')
        ->where('id', '[0-9]+');
});

// student routes
Route::middleware(['auth_', 'student', 'adminOrCurrentStudent'])->group(function () {

    Route::get('/student/{id:id}', [StudentController::class, 'show'])
        ->name('student.acc.show')
        ->where('id', '[0-9]+');

    Route::get('/student/{id:id}/edit', [StudentController::class, 'edit'])
        ->name('student.acc.edit')
        ->where('id', '[0-9]+');

    Route::patch('/student/{id:id}/edit', [StudentController::class, 'patch'])
        ->name('student.edit')
        ->where('id', '[0-9]+');

    Route::get('/student/{id:id}/history', [TermStudentsController::class, 'history'])
        ->name('student.history')
        ->where('id', '[0-9]+');

    Route::get('/student/{id:id}/requests', [StudentRequestController::class, 'index'])
        ->name('student.request.index')
        ->where('id', '[0-9]+');

    Route::get('/student/{id:id}/request/create', [StudentRequestController::class, 'create'])
        ->name('student.request.create')
        ->where('id', '[0-9]+');

    Route::post('/student/{id:id}/request/create', [StudentRequestController::class, 'make'])
        ->name('student.request.make')
        ->where('id', '[0-9]+');
});

// admin routes
Route::middleware(['auth_', 'admin'])->name('admin.')->group(function () {

    Route::get('/admin', [AdminController::class, 'home'])
        ->name('home');

    Route::get('/doctors/all',  [AdminController::class, 'doctorsIndex'])
        ->name('doctors.all');

    Route::get('/doctors/{id}',  [AdminController::class, 'doctorsShow'])
        ->name('doctors.show')
        ->where('id', '[0-9]+');

    Route::get('/doctors/{id}/edit',  [AdminController::class, 'doctorsEdit'])
        ->name('doctors.edit')
        ->where('id', '[0-9]+');

    Route::patch('/doctors/{id}/edit',  [AdminController::class, 'doctorsPatch'])
        ->name('doctors.edit')
        ->where('id', '[0-9]+');
});
