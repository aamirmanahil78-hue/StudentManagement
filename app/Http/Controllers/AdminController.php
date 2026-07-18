<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $students = Student::count();

        $courses = Course::count();


        return view('admin.dashboard',
        compact('students','courses'));

    }
}
