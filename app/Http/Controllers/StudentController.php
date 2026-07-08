<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // Display all students
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // Show registration form
    public function create()
    {
        return view('students.create');
    }

    // Store student
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'department' => 'required',
            'semester' => 'required|integer'
        ]);

        Student::create($request->all());

        return redirect('/students')->with('success', 'Student Registered Successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('students.edit', compact('student'));
    }

    // Update student
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'department' => 'required',
            'semester' => 'required|integer'
        ]);

        $student->update($request->all());

        return redirect('/students')->with('success', 'Student Updated Successfully!');
    }

    // Delete student
    public function destroy($id)
    {
        Student::destroy($id);

        return redirect('/students')->with('success', 'Student Deleted Successfully!');
    }
}