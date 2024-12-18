<?php

namespace App\Http\Controllers\dataCenter;

use App\Models\Financial;
use App\Models\Year;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinancialController extends Controller
{
    public function index(){
        $years = Year::where('status', 'active')->get();
        return view('financial.add', compact('years'));
    }

    public function store(Request $request){
        $request->validate([
            'college' =>'required|string|max:255|min:9',
            'year' =>'required|string|max:255|min:9',
            'type' =>'required|string|max:255|min:10',
            'Male_students_amount'=>'required|max:255|min:1',
            'female_students_amount'=>'required|max:255|min:1',
            'price' =>'required|numeric|min:1'
        ]);
        $financial = new Financial();
        $financial->college = $request->college;
        $financial->year= $request->year;
        $financial->type= $request->type;
        $financial->Male_students_amount= $request->Male_students_amount;
        $financial->female_students_amount= $request->female_students_amount;
        $financial->price = $request->price;
        $financial->save();
        return redirect()->route('financial')->with('success', 'تم الحفظ بنجاح');
    }

    public function report(){
        $years = Year::where('status', 'active')->get();
        return view('financial.report', compact('years'));
    }
    public function show(Request $request)
    {
        
        $request->validate([
            'college' => 'required|string|max:255',
            'year' => 'nullable|max:255',
            'type' => 'nullable|string|max:255',
        ]);
    
       
        $query = Financial::where('college', $request->input('college'));
    
        if ($request->filled('year')) {
            $query->where('year', $request->input('year'));
        }
    
        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }
    
        $financials = $query->get();
        session(['financial' => $financials]);
        return view('financial.show', compact('financials'));
    }

    public function destroy($id){
        $financial = Financial::find($id);
        $financial->delete();
        return redirect()->route('financial.report')->with('success', 'تم الحذف بنجاح');
    }
}
