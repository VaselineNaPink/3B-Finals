<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Student;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Request $request, $student_id)
    {
        // Implement filtering logic
        $subjects = Subject::where('student_id', $student_id);

        // Add filtering and sorting logic

        return response()->json([
            'metadata' => [
                'count' => $subjects->count(),
                'search' => $request->query('search'),
                'limit' => $request->query('limit'),
                'offset' => $request->query('offset'),
                'fields' => $request->query('fields'),
            ],
            'subjects' => $subjects->get()
        ]);
    }

    public function store(Request $request, $student_id)
    {
        $student = Student::findOrFail($student_id);
        $subject = $student->subjects()->create($request->all());
        return response()->json($subject, 201);
    }

    public function show($student_id, $subject_id)
    {
        $subject = Subject::where('student_id', $student_id)->findOrFail($subject_id);
        return response()->json($subject);
    }

    public function update(Request $request, $student_id, $subject_id)
    {
        $subject = Subject::where('student_id', $student_id)->findOrFail($subject_id);
        $subject->update($request->all());
        return response()->json($subject);
    }
}
