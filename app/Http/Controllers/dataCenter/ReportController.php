<?php

namespace App\Http\Controllers\dataCenter;

use App\Models\Year;
use App\Models\College;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        $departments = Department::All();
        $years = Year::where('status', 'active')->get();
        return view('student.report', compact('departments','years'));
    }

    public function generateReport(Request $request)
    {
        $request->validate([
            'department' => 'max:255',
            'level' => 'nullable|string|max:255',
            'language' => 'nullable|string|max:255',
        ]);

        $query = Student::query();

        if ($request->filled('college')) {
            $query->where('college', $request->input('college'));
        }
        if ($request->filled('department')) {
            $query->where('department', $request->input('department'));
        }
        if ($request->filled('level')) {
            $query->where('level', $request->input('level'));
        }
        if ($request->filled('year')) {
            $query->where('year', $request->input('year'));
        }

        if ($request->filled('language')) {
            $query->where('language', $request->input('language'));
        }

        $students = $query->get();
        session(['students' => $students]);

        return view('student.show', compact('students'));
    }

    public function chart(Request $request)
    {
        $request->validate([
            'level' => 'required|string',
            'department' => 'required|string',
        ]);
        $students = session('students', []);

        $male_freshmen = $students->sum('male_freshmen');
        $female_freshmen = $students->sum('female_freshmen');
        $male_remain = $students->sum('male_remain');
        $female_remain = $students->sum('female_remain');

        $total_students = $male_freshmen + $female_freshmen + $male_remain + $female_remain;


        return view('student.chart', compact('total_students', 'male_freshmen', 'female_freshmen', 'male_remain', 'female_remain'));
    }


    public function excel(Request $request)
    {
        $students = session('students', []);
        if (empty($students)) {
            return redirect()->back()->withErrors(['error' => 'لا توجد بيانات لتصديرها.']);
        }


        header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
        $college = auth()->user()->college->name ?? 'unknown_college';
        $filename = "طلاب_كلية_{$college}.xls";

        header("Content-Disposition: attachment; filename={$filename}");

        header("Pragma: no-cache");
        header("Expires: 0");

        echo "\xEF\xBB\xBF";
        $output = fopen("php://output", "w");

        $headers = [
            'الكلية',
            'السنة',
            'المستوى',
            'القسم',
            'اللغة',
            'الجنسية',
            'الطلاب الذكور الجدد',
            'الطلاب الأنثى الجدد',
            'الطلاب الذكور المتبقين',
            'الطلاب الأنثى المتبقين',
            'العدد الكلي'
        ];
        fputcsv($output, $headers);

        foreach ($students as $student) {
            $row = [
                $student['college'] ?? '',
                $student['year'] ?? '',
                $student['level'] ?? '',
                $student['department'] ?? '',
                $student['language'] ?? '',
                $student['nationality'] ?? '',
                $student['male_freshmen'] ?? 0,
                $student['female_freshmen'] ?? 0,
                $student['male_remain'] ?? 0,
                $student['female_remain'] ?? 0,
                $total_students = $student['male_freshmen'] + $student['female_freshmen'] + $student['male_remain'] + $student['female_remain']
            ];

            fputcsv($output, $row);
        }
        fclose($output);

        exit;
    }

}
