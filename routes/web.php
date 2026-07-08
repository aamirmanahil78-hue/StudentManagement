<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use App\Models\Student;

Route::get('/', [PageController::class, 'home']);

Route::get('/about', [PageController::class, 'about']);

Route::get('/contact', [PageController::class, 'contact']);

Route::get('/add-student', function () {

    Student::create([
        'name' => 'Manahil Aamir',
        'email' => 'manahil1@gmail.com',
        'department' => 'Software Engineering',
        'semester' => 6
    ]);

    return "Student Added Successfully";
});

// Student CRUD Routes

Route::get('/students', [StudentController::class, 'index']);

Route::get('/register', [StudentController::class, 'create']);

Route::post('/students', [StudentController::class, 'store']);

Route::get('/students/{id}/edit', [StudentController::class, 'edit']);

Route::put('/students/{id}', [StudentController::class, 'update']);

Route::delete('/students/{id}', [StudentController::class, 'destroy']);