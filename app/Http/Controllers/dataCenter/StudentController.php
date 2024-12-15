<?php

namespace App\Http\Controllers\dataCenter;

use App\Models\Year;
use App\Models\Program;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function add()
    {
        $college_id = auth()->user()->college_id; 
        $departments = Department::where('college_id', $college_id)->get();
        $programs = Program::where('college_id', $college_id)->get();
        $years = Year::where('status', 'active')->get();
        return view('student.add', compact('departments','programs','years'));
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
        
        $request->validate([
            'department' => 'string|max:255',
            'level' => 'nullable|string|max:255',
            'language' => 'nullable|string|max:255',
        ]);
    
        $query = Student::where('college', $request->input('college'));
    
        if ($request->filled('nationality')) {
            $query->where('nationality', $request->input('nationality'));
        }
    
        if ($request->filled('program')) {
            $query->where('program', $request->input('program'));
        }
    
        $students = $query->get();
    
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
 





}
