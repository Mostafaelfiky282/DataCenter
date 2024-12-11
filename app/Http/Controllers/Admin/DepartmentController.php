<?php

namespace App\Http\Controllers\Admin;

use App\Models\College;
use App\Models\department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    public function index()
    {
        $colleges = College::all();
        return view('admin.department.add', compact('colleges'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'college' => 'required|string|max:255|min:1',
            'department' => 'required|string|max:255|min:3'

        ]);
        $department = new department();
        $department->college_id = $request->college;
        $department->name = $request->department;
        $department->save();
        return redirect()->route('departments.add')->with('success', 'تم الحفظ بنجاح');
    }

    public function show()
    {
        $departments = Department::with('college')->get();
        return view('admin.department.show', compact('departments'));
    }

    public function destroy(department $department)
    {
        $department->delete();
        return redirect()->route('departments.show')->with('success', 'تم الحذف بنجاح');
    }

    public function edit($id)
    {
        $colleges = College::all();
        $department = department::findOrFail($id);
        return view('admin.department.edit', compact('department', 'colleges'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'college' => ['required', 'integer', 'exists:colleges,id'],
            'department' => ['required', 'string', 'max:100', 'min:3']
        ]);

        $department = Department::findOrFail($id);

        $department->update([
            'college_id' => $request->college,
            'name' => $request->department,
        ]);


        return redirect()->route('departments.show')->with('success', 'تم تحديث اسم القسم بنجاح.');
    }

}
