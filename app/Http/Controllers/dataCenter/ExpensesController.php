<?php

namespace App\Http\Controllers\dataCenter;

use App\Models\Program;
use App\Models\Expenses;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpensesController extends Controller
{
    public function index(){
        $college_id = auth()->user()->college_id; 
        $departments = Department::where('college_id', $college_id)->get();
        $programs = Program::where('college_id', $college_id)->get();
        return view('expenses.add', compact('programs'));
    }

    public function create(Request $request){
        $request->validate([
            'college'=> ['string', 'required','max:255','min:3'],
            'nationality'=> ['nullable','string','max:255','min:3'],
            'program'=>['string', 'max:255','min:3'],
            'level_zero'=> ['numeric','max:255'],
            'level_one'=> ['numeric','required','max:255'],
            'level_two'=> ['numeric','required','max:255'],
            'level_three'=> ['numeric','required','max:255'],
            'level_four'=> ['numeric','required','max:255'],
            'level_five'=> ['numeric','max:255'],
            'level_six'=> ['numeric','max:255'],
        ]);
        $expenses = new Expenses();
        $expenses->college = $request->college;
        $expenses->nationality = $request->nationality;
        $expenses->program = $request->program;
        $expenses->level_zero = $request->level_zero;
        $expenses->level_one = $request->level_one;
        $expenses->level_two = $request->level_two;
        $expenses->level_three = $request->level_three;
        $expenses->level_four = $request->level_four;
        $expenses->level_five = $request->level_five;
        $expenses->level_six = $request->level_six;
        $expenses->save();
        return redirect()->route('expenses')->with('success', 'تم الحغظ بنجاح ');

    }

    public function report(){
        $college_id = auth()->user()->college_id; 
        $programs = Program::where('college_id', $college_id)->get();
        return view('expenses/report',compact('programs'));
    }



    public function show(Request $request)
{
    
    $request->validate([
        'college' => 'required|string|max:255',
        'nationality' => 'nullable|string|max:255',
        'program' => 'nullable|string|max:255',
    ]);

   
    $query = Expenses::where('college', $request->input('college'));

    if ($request->filled('nationality')) {
        $query->where('nationality', $request->input('nationality'));
    }

    if ($request->filled('program')) {
        $query->where('program', $request->input('program'));
    }

    $expenses = $query->get();
    session(['expenses' => $expenses]);
    return view('expenses.show', compact('expenses'));
}

    

    public function destroy($id){
        $expense = Expenses::find($id);
        $expense->delete();
        return redirect()->route('expenses.report')->with('success', 'تم الحذف بنجاح');
    }

    public function edit($id){
        $expense = Expenses::findOrFail($id);
        $college_id = auth()->user()->college_id; 
        $programs = Program::where('college_id', $college_id)->get();
        return view('expenses.edit', compact('expense','programs'));
    }

    public function update(request $request, $id){
        $request->validate([
            'college'=> ['string', 'required','max:255','min:3'],
            'nationality'=> ['string','max:255','min:3'],
            'program'=>['string', 'max:255','min:3'],
            'level_zero'=> ['numeric','max:255','min:3'],
            'level_one'=> ['numeric','required','max:255','min:3'],
            'level_two'=> ['numeric','required','max:255','min:3'],
            'level_three'=> ['numeric','required','max:255','min:3'],
            'level_four'=> ['numeric','required','max:255','min:3'],
            'level_five'=> ['numeric','max:255','min:3'],
            'level_six'=> ['numeric','max:255']
        ]);

        $expenses = Expenses::findOrFail($id);
        $expenses->update($request->all());
        return redirect()->route('expenses')->with('success', 'تم التعديل بنجاح');

}

public function excel(Request $request)
{
    $expenses = session('expenses', []);

    header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
    $filename = "مصاريف.xls";

    header("Content-Disposition: attachment; filename={$filename}");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo "\xEF\xBB\xBF";
    $output = fopen("php://output", "w");

    $headers = ['الكلية', 'الجنسيه', 'برنامج', 'الفرقة الاعدادي','الفرقة الاولي','الفرقة الثانية ','الفرقة الثالثة','الفرقة الرابعة','الفرقة الخامسة','الفرقة السادسة'];
    fputcsv($output, $headers);

    foreach ($expenses as $expense) {
        fputcsv($output, [
            $expense->college,
            $expense->nationality,
            $expense->program,
            $expense->level_zero,
            $expense->level_one,
            $expense->level_two,
            $expense->level_three,
            $expense->level_four,
            $expense->level_five,
            $expense->level_six,

        ]);
    }

    fclose($output);
    exit;
}

}
