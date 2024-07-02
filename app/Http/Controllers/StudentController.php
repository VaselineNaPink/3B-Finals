<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        // Implement filtering logic
        $students = Student::query();

        // Add filtering and sorting logic

        return response()->json([
            'metadata' => [
                'count' => $students->count(),
                'search' => $request->query('search'),
                'limit' => $request->query('limit'),
                'offset' => $request->query('offset'),
                'fields' => $request->query('fields'),
            ],
            'students' => $students->get()
        ]);
    }

    public function store(Request $request)
    {
        $student = Student::create($request->all());
        return response()->json($student, 201);
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return response()->json($student);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return response()->json($student);
    }
}