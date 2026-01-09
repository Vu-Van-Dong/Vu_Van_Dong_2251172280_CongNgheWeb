<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        // Sắp xếp ID giảm dần (mới nhất lên trước)
        $query = Student::with('school')->orderBy('id', 'desc');


        // Tìm kiếm
        if ($search = $request->input('search')) {
            $query->where('full_name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        }

        $students = $query->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $schools = School::all();
        return view('students.create', compact('schools'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|unique:students,student_id',
            'full_name' => 'required|string',
            'email' => 'required|email|unique:students,email',
            'school_id' => 'required|exists:schools,id',
            'phone' => 'nullable|string'
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully!');
    }

    public function edit(Student $student)
    {
        $schools = School::all();
        return view('students.edit', compact('student', 'schools'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'student_id' => ['required', Rule::unique('students')->ignore($student->id)],
            'full_name' => 'required|string',
            'email' => ['required', 'email', Rule::unique('students')->ignore($student->id)],
            'school_id' => 'required|exists:schools,id',
            'phone' => 'nullable|string'
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully!');
    }
}
