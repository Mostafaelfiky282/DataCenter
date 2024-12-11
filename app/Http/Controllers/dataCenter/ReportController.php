<?php

namespace App\Http\Controllers\dataCenter;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        return view('student.report');
    }

    public function generateReport(Request $request)
    {
        $college = $request->input('college');

        $students = Student::when($college, function ($query, $college) {
            return $query->where('college', $college);
        })->get();
        return view('student.show', compact('students'));
    }

}
