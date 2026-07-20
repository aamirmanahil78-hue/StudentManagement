<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return redirect()->route('dashboard');
});


Route::get('/dashboard', function () {

    $students = \App\Models\Student::count();
    $courses = \App\Models\Course::count();

    return view('dashboard', compact('students', 'courses'));

})->name('dashboard');




// Student Routes

// Everyone can view students

Route::get('/students',
[StudentController::class,'index'])
->name('students.index');



// Admin permission required for changes

Route::middleware(['auth','admin'])->group(function(){


    Route::get('/students/create',
    [StudentController::class,'create'])
    ->name('students.create');


    Route::post('/students',
    [StudentController::class,'store'])
    ->name('students.store');


    Route::get('/students/{student}/edit',
    [StudentController::class,'edit'])
    ->name('students.edit');


    Route::put('/students/{student}',
    [StudentController::class,'update'])
    ->name('students.update');


    Route::delete('/students/{student}',
    [StudentController::class,'destroy'])
    ->name('students.destroy');


});



// Course Routes

Route::resource('courses', CourseController::class);




// Profile Routes

Route::middleware('auth')->group(function () {


    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');


    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');


    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


});




// Admin Dashboard

Route::middleware(['auth','admin'])->group(function () {


    Route::get('/admin/dashboard',
    [AdminController::class,'index'])
    ->name('admin.dashboard');


});



require __DIR__.'/auth.php';