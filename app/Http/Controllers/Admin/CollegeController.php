<?php

namespace App\Http\Controllers\Admin;

use App\Models\College;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollegeController extends Controller
{
    public function index(){
        return view('admin.college.add');
    }
    public function store(Request $request){
        $request->validate([
            'name' =>'required|string|max:255|min:3'
        ]);
        $college = new College();
        $college->name = $request->name;
        $college->save();
        return redirect()->route( 'add-college')->with('success', 'تم الحفظ بنجاح');
    }

    public function show(){
        $colleges = College::all();
        return view('admin.college.show', compact('colleges'));
    }

    public function destroy(College $college)
    {
        $college->delete();
        return redirect()->route('college.show')->with('success', 'تم الحذف بنجاح');
    }

    public function edit($id)
    {
        $college = College::findOrFail($id);
        return view('admin.college.edit', compact('college'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100', 'min:3']
        ]);

        $college = College::findOrFail($id);
        $college->update($request->all());

        return redirect()->route('college.show')->with('success', 'تم تحديث اسم الكلية بنجاح');
    }

}
