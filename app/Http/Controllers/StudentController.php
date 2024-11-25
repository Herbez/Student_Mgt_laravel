<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

class StudentController extends Controller
{
    //
    public function index()
    {
        // Get all students from the database
        $students = Student::all();
        return view('register', compact('students'));
    }

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
        ]);

        // Create a new student
        Student::create([
            'name' => $request->name,
            'class' => $request->class,
        ]);

        // Redirect to the student list with success message
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }
        // Delete Student
        public function destroy($id)
        {
            $student = Student::findOrFail($id);
            $student->delete();

            return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
        }

        // Update Student Information
        public function edit($id)
        {
            $student = Student::findOrFail($id);
            return view('editstudent', compact('student'));
        }

        // Save updated student information
        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'class' => 'required|string|max:255',
                // Add other validation rules for other fields if necessary
            ]);

            $student = Student::findOrFail($id);
            $student->name = $request->name;
            $student->class = $request->class;
            // Update other fields as needed
            $student->save();

            return redirect()->route('students.index')->with('success', 'Student updated successfully.');
        }
}
