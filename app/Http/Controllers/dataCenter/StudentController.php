<?php

namespace App\Http\Controllers\dataCenter;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function add()
    {
        return view('student.add');
    }

public function create(request $request)
    {
        $request->validate([
            'college' => ['required', 'string', 'max:50', 'min:3'],
            'department' => ['required', 'string', 'max:100'],
            'program' => ['required', 'string'],
            'year' => ['required', 'min:9', 'max:20'],
            'level' => ['required', 'string'],
            'nationality' => ['required', 'string'],
            'language'=>['required', 'string'],
            'status' => ['required', 'string'],
            'new_male_students' => ['required', 'integer', 'min:0'],
            'new_female_students' => ['required', 'integer', 'min:0'],
            'remain_male_students' => ['required', 'integer', 'min:0'],
            'remain_female_students' => ['required', 'integer', 'min:0'],
        ]);

        $student = new Student();
        $student->college = $request->college;
        $student->department = $request->department;
        $student->program = $request->program;
        $student->year = $request->year;
        $student->level = $request->level;
        $student->nationality = $request->nationality;
        $student->language = $request->language;
        $student->status = $request->status;
        $student->male_freshmen = $request->new_male_students;
        $student->female_freshmen = $request->new_female_students;
        $student->male_remain = $request->remain_male_students;
        $student->female_remain = $request->remain_female_students;
        $student->save();

        return redirect()->route('student-add')->with('success', 'تم الحفظ بنجاح');
    }




    public function showReport(Request $request)
    {
        $students = Student::query()
            ->where('college', auth()->user()->college)
            ->when($request->input('department'), function ($query, $department) {
                return $query->where('department', $department);
            })
            ->when($request->input('level'), function ($query, $level) {
                return $query->where('level', $level);})
            ->when($request->input('language'), function ($query, $language) {
                return $query->where('language', $language);
            })->get();

        return view('student.show', compact('students'));
    }
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('report')->with('success', 'تم الحذف بنجاح');
    }
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'department' => ['required', 'string', 'max:100'],
            'level' => ['required', 'string'],
            'nationality' => ['required', 'string'],
            'male_freshmen' => ['required', 'integer', 'min:0'],
            'female_freshmen' => ['required', 'integer', 'min:0'],
            'male_remain' => ['required', 'integer', 'min:0'],
            'female_remain' => ['required', 'integer', 'min:0'],
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('report')->with('success', 'تم تحديث بيانات الطلاب بنجاح');
    }
 

public function excel($id)
{
 $students = Student::where('id', $id)->get();


    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=students.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

   
    echo "\xEF\xBB\xBF";

    $output = fopen("php://output", "w");

 
    $headers = [
        'الكلية', 
        'السنة', 
        'المستوى', 
        'القسم', 
        'الجنسية', 
        'الطلاب الذكور الجدد', 
        'الطلاب الأنثى الجدد',
        'الطلاب الذكور المتبقين',
        'الطلاب الأنثى المتبقين'
    ];

    fputcsv($output, $headers);

    foreach ($students as $student) {
        $row = [
            $student->college,
            $student->year,
            $student->level,
            $student->department,
            $student->nationality,
            $student->male_freshmen,
            $student->female_freshmen,
            $student->male_remain,
            $student->female_remain
        ];


        fputcsv($output, $row);
    }

    fclose($output);
    exit;
}

public function chart(Request $request){
    $students = Student::where('college', auth()->user()->college)
    ->where('level',$request->level)
    ->where('department',$request->department)
    ->get();
   
    $total_students = $students->sum('male_freshmen') 
    + $students->sum('female_freshmen') 
    + $students->sum('male_remain') 
    + $students->sum('female_remain');
    
    
    $male_freshmen = $students->sum('male_freshmen');
    $female_freshmen = $students->sum('female_freshmen');
    $male_remain = $students->sum('male_remain');
    $female_remain = $students->sum('female_remain');
  

    return view('student.chart', compact('total_students', 'male_freshmen', 'female_freshmen', 'male_remain', 'female_remain'));
}

}
