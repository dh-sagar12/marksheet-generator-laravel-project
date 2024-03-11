<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id', 'asc')->get();
        return view('student.index', compact('students'));
    }

    public function create()
    {
        $student  =  new Student();
        return view('student.create', compact('student'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255', 'min:5'],
            'grade' => ['required', 'string'],
            'section' => ['required', 'string'],
            'roll_number' => ['required', 'string'],
            'date_of_birth' => ['required', 'date'],
            'date_of_joined' => ['required', 'date'],
        ]);

        $request->merge(['created_by' => auth()-> user()->id]);
        Student::create($request->all() );
    
        return redirect()->route('student.all')->with('success', 'Student created successfully.');
    }

    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255', 'min:5'],
            'grade' => ['required', 'string'],
            'section' => ['required', 'string'],
            'roll_number' => ['required', 'string'],
            'date_of_birth' => ['required', 'date'],
            'date_of_joined' => ['required', 'date'],
        ]);

        $student->update($request->all());

        return redirect()->route('student.all')->with('success', 'Student updated successfully.');
    }


}
