<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Mark;

class MarksController extends Controller
{
    // Display the form to add marks to a student
    public function index()
    {
        $students = Student::all();
        $marks = Mark::with('student')->get();  // Eager load the student relationship
        return view('marks', compact('students', 'marks'));
    }
    // Validate incoming request
    public function store(Request $request)
    {
    $request->validate([
        'student_id' => 'required|exists:students,id',
        'math' => 'required|integer',
        'computer' => 'required|integer',
    ]);

    // Calculate the average and grade
    $average = ($request->math + $request->physics + $request->computer) / 3;
    $grade = $this->calculateGrade($average);

    // Store the marks in the database
    Mark::create([
        'student_id' => $request->student_id,
        'math' => $request->math,
        'computer' => $request->computer,
        'average' => $average,
        'grade' => $grade,
    ]);

    return redirect()->route('marks.index')->with('success', 'Marks added successfully!');
}
    // Show the student with the highest and lowest marks
    public function showRankings()
    {
        // Get all marks, ordered by average score (highest first)
        $students = Mark::with('student')
                        ->orderByDesc('average')
                        ->get();

        // Get the top student (highest average)
        $topStudent = $students->first();

        // Get the bottom student (lowest average)
        $bottomStudent = $students->last();

        return view('rankings', compact('students', 'topStudent', 'bottomStudent'));
    }
    // Example method for calculating grade
    private function calculateGrade($average)
    {
        if ($average >= 90) return 'A';
        if ($average >= 80) return 'B';
        if ($average >= 70) return 'C';
        if ($average >= 60) return 'D';
        return 'F';
    }

    // Update Student Marks
    public function edit($id)
    {
        $mark = Mark::findOrFail($id);
        return view('editmarks', compact('mark'));
    }

    // Save updated marks
    public function update(Request $request, $id)
    {
        $request->validate([
            'math' => 'required|integer',
            'computer' => 'required|integer',
        ]);

        $mark = Mark::findOrFail($id);
        $mark->math = $request->math;
        $mark->computer = $request->computer;

        // Recalculate the average and grade
        $mark->average = ($mark->math + $mark->physics + $mark->computer) / 3;
        $mark->grade = $this->calculateGrade($mark->average);
        $mark->save();

        return redirect()->route('marks.index')->with('success', 'Marks updated successfully.');
    }


    // Delete Student Marks
    public function destroy($id)
    {
        $mark = Mark::findOrFail($id);
        $mark->delete();

        return redirect()->route('marks.index')->with('success', 'Marks deleted successfully.');
    }
}


