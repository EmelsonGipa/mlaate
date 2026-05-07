<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Breeze profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Student view routes — all logged-in users
    Route::get('/home', function () {
        $students = \App\Models\Student::all();
        $title = 'Students List';
        return view('home', compact('students', 'title'));
    });
    Route::get('/students', [StudentController::class, 'index']);
    Route::get('/students/active', [StudentController::class, 'active']);
    Route::get('/students/gmail', [StudentController::class, 'gmail']);

    // Admin only routes
    Route::middleware(['admin'])->group(function () {
        Route::post('/students/add', [StudentController::class, 'store']);
        Route::post('/students/update/{id}', [StudentController::class, 'update']);
        Route::get('/students/delete/{id}', [StudentController::class, 'destroy']);
    });
});

require __DIR__.'/auth.php';