<?php

namespace App\Http\Controllers\dataCenter;

use App\Models\Expenses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpensesController extends Controller
{
    public function index(){
        return view('expenses.add');
    }

    public function create(Request $request){
        $request->validate([
            'college'=> ['string', 'required','max:255','min:3'],
            'nationality'=> ['nullable','string','max:255','min:3'],
            'program'=>['string', 'max:255','min:3'],
            'level_zero'=> ['numeric','max:255','min:3'],
            'level_one'=> ['numeric','required','max:255','min:3'],
            'level_two'=> ['numeric','required','max:255','min:3'],
            'level_three'=> ['numeric','required','max:255','min:3'],
            'level_four'=> ['numeric','required','max:255','min:3'],
            'level_five'=> ['numeric','max:255','min:3'],
            'level_six'=> ['numeric','max:255','min:3'],
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
        return view('expenses/report');
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

    return view('expenses.show', compact('expenses'));
}

    

    public function destroy($id){
        $expenses = Expenses::find($id);
        $expenses->delete();
        return redirect()->route('expenses.report')->with('success', 'تم الحذف بنجاح');
    }

    public function edit($id){
        $expense = Expenses::findOrFail($id);
        return view('expenses.edit', compact('expense'));
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
}
