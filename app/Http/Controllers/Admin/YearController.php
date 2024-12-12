<?php

namespace App\Http\Controllers\Admin;

use App\Models\Year;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class YearController extends Controller
{
    public function index(){
        return view('admin.years.add');
    }
    public function store(Request $request){
        $request->validate([
            'value' =>'required|string|max:255|min:9',
            'status' =>'required|string|max:255|min:3'
        ]);
        $year = new Year();
        $year->value = $request->value;
        $year->status = $request->status;
        $year->save();
        return redirect()->route( 'years.add')->with('success', 'تم الحفظ بنجاح');
    }
    public function show(){
        $years = Year::all();
        return view('admin.years.show', compact('years'));
    }

    public function destroy(Year $year){
        $year->delete();
        return redirect()->route('year.show')->with('success', 'تم الحذف بنجاح');
    }

    public function edit($id){
        $year = Year::findOrFail($id);
        return view('admin.years.edit', compact('year'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'value' =>'required|string|max:255|min:9',
            'status' =>'required|string|max:255|min:3'
        ]);
        $year = Year::findOrFail($id);
        $year->value = $request->value;
        $year->status = $request->status;
        $year->save();
        return redirect()->route('year.show')->with('success', 'تم التعديل بنجاح');
    }
}
