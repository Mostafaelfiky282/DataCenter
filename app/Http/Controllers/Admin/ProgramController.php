<?php

namespace App\Http\Controllers\Admin;

use App\Models\College;
use App\Models\Program;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramController extends Controller
{
    public function index(){
        $colleges = College::all();
        $departments = Department::all();
        return view('admin.program.add', compact('colleges', 'departments'));
    }
    public function store(Request $request){
        // dd($request);
        $request->validate([
            'college' =>'required|string|max:255|min:1',
            'department' =>'required|string|max:255|min:1',
            'program' =>'required|string|max:255|min:3'

        ]);
        $program = new Program();
        $program->college_id = $request->college;
        $program->department_id = $request->department;
        $program->name = $request->program;
        $program->save();
        return redirect()->route( 'program.add')->with('success', 'تم الحفظ بنجاح');
    }

    public function show(){
        $programs = Program::with('college', 'department')->get();
        return view('admin.program.show', compact('programs'));
    }
    public function destroy(Program $program){
        $program->delete();
        return redirect()->route('program.show')->with('success', 'تم الحذف بنجاح');
    }
}
