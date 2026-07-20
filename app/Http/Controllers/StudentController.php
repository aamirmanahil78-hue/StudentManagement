<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;


class StudentController extends Controller
{

    // Display all students with search and pagination
    public function index(Request $request)
    {
        $search = $request->search;


        $students = Student::with('course')
            ->when($search, function ($query) use ($search) {

                $query->where('name', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%")
                      ->orWhere('department', 'like', "%$search%");

            })
            ->paginate(5);


        return view('students.index', compact('students'));
    }



    // Show registration form
    public function create()
    {
        $courses = Course::all();

        return view('students.create', compact('courses'));
    }



    // Store student
   public function store(Request $request)
{
    $request->validate([

        'name' => 'required',
        'email' => 'required|email|unique:students,email',
        'department' => 'required',
        'semester' => 'required|integer',
        'course_id' => 'required|exists:courses,id',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'file' => 'nullable|mimes:pdf,doc,docx,ppt,pptx,zip|max:5120',

    ]);

    $image = null;

    if ($request->hasFile('image')) {
        $image = $request->file('image')->store('students', 'public');
    }

   $file = null;

if ($request->hasFile('file')) {

    $originalName = $request->file('file')->getClientOriginalName();

    $file = $request->file('file')->storeAs(
        'files',
        $originalName,
        'public'
    );

}

    Student::create([

        'name' => $request->name,
        'email' => $request->email,
        'department' => $request->department,
        'semester' => $request->semester,
        'course_id' => $request->course_id,
        'image' => $image,
        'file' => $file,

    ]);

    return redirect()
        ->route('students.index')
        ->with('success', 'Student Registered Successfully!');
}




    // Show edit form
    public function edit(Student $student)
    {
        $courses = Course::all();

        return view('students.edit', compact('student','courses'));
    }




    // Update student
   public function update(Request $request, Student $student)
{
    $request->validate([

        'name' => 'required',
        'email' => 'required|email|unique:students,email,' . $student->id,
        'department' => 'required',
        'semester' => 'required|integer',
        'course_id' => 'required|exists:courses,id',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'file' => 'nullable|mimes:pdf,doc,docx,ppt,pptx,zip|max:5120',

    ]);

    // Keep old image if no new image is uploaded
    $image = $student->image;

    if ($request->hasFile('image')) {

        $image = $request->file('image')->store('students', 'public');

    }

    // Keep old file if no new file is uploaded
    $file = $student->file;

    if ($request->hasFile('file')) {

        $originalName = $request->file('file')->getClientOriginalName();

        $file = $request->file('file')->storeAs(
            'files',
            $originalName,
            'public'
        );

    }

    $student->update([

        'name' => $request->name,
        'email' => $request->email,
        'department' => $request->department,
        'semester' => $request->semester,
        'course_id' => $request->course_id,
        'image' => $image,
        'file' => $file,

    ]);

    return redirect()
        ->route('students.index')
        ->with('success', 'Student Updated Successfully!');
}

    // Delete student
    public function destroy(Student $student)
    {

        $student->delete();


        return redirect()
            ->route('students.index')
            ->with('success','Student Deleted Successfully!');

    }

}