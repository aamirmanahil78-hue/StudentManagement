<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Resources\StudentResource;

class StudentApiController extends Controller
{
    public function index()
    {
        return StudentResource::collection(Student::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'department' => 'required',
            'semester' => 'required|integer',
        ]);

        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'semester' => $request->semester,
        ]);

        return response()->json([
            'message' => 'Student created successfully',
            'student' => new StudentResource($student)
        ], 201);
    }

    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'department' => 'required',
            'semester' => 'required|integer',
        ]);

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'semester' => $request->semester,
        ]);

        return response()->json([
            'message' => 'Student updated successfully',
            'student' => new StudentResource($student)
        ]);
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json([
            'message' => 'Student deleted successfully'
        ]);
    }
}