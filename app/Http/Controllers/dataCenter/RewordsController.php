<?php

namespace App\Http\Controllers\dataCenter;

use App\Models\Rewords;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RewordsController extends Controller
{
    public function index()
    {
        return view('rewards.add');
    }

    public function create(Request $request)
    {
        $request->validate([
                'college' => ['string', 'required', 'max:255', 'min:3'],
                'level' => ['string', 'required', 'max:255', 'min:3'],
                'type' => ['string', 'max:255', 'min:3'],
                'male_students_amount' => [ 'required' ,'max:50'],
                'female_students_amount' => ['required' ,'max:50'],
                'price' => ['required' ,'max:50']
            ]
        );
        $rewords = new Rewords();
        $rewords->college = $request->college;
        $rewords->level = $request->level;
        $rewords->type = $request->type;
        $rewords->male_students_amount = $request->male_students_amount;
        $rewords->female_students_amount = $request->female_students_amount;
        $rewords->price = $request->price;
        $rewords->save();
        return redirect()->route('rewords')->with('success', 'تم الحغظ بنجاح ');
    }

    public function report()
    {
       return view('rewards.report');
    }


    public function destroy($id)
    {
        $reword = Rewords::findOrFail($id);
        $reword->delete();
        return redirect()->route('rewords.report')->with('success', 'تم الحذف بنجاح');
    }



    public function edit($id)
    {
        $reward = Rewords::findOrFail($id);
        return view('rewards.edit', compact('reward'));
    }

    public function update(request $request, $id)
    {
        $request->validate([
            'college' => ['string', 'required', 'max:255', 'min:3'],
            'level' => ['string', 'required', 'max:255', 'min:3'],
            'type' => ['string', 'required', 'max:255', 'min:3'],
            'male_students_amount' => ['required', 'max:50'],
            'female_students_amount' => ['required', 'max:50'],
            'price' => [ 'required', 'max:50']
        ]);

        $reword  = Rewords::findOrFail($id);
        $reword->update($request->all());
        return redirect()->route('rewords.report')->with('success', 'تم التعديل بنجاح');
    }

    
    public function show(Request $request)
    {
        $request->validate([
            'college' => 'required|string|max:255',
            'level' => 'max:255',
            'type' => 'nullable|max:255',
        ]);
    
        session()->put('college', $request->input('college'));
    
        $query = Rewords::where('college', $request->input('college'));
    
        if ($request->filled('level')) {
            $query->where('level', $request->input('level'));
        }
    
        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }
    
        $rewards = $query->get();
        session(['rewards' => $rewards]);
    
        return view('rewards.show', compact('rewards'));
    }
    
    public function excel(Request $request)
    {
        $rewards = session('rewards', []);
    
        header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
        $filename = "_مكافاة_طلاب_كلية.xls";
    
        header("Content-Disposition: attachment; filename={$filename}");
        header("Pragma: no-cache");
        header("Expires: 0");
    
        echo "\xEF\xBB\xBF";
        $output = fopen("php://output", "w");
    
        $headers = ['الكلية', 'المستوى', 'نوع المكافاة', 'عدد الطلاب', 'عدد الطالبات', 'المبلغ لكل طالب', 'العدد الكلي للطلاب', 'المبلغ الإجمالي'];
        fputcsv($output, $headers);
    
        foreach ($rewards as $reward) {
            $totalStudents = $reward->male_students_amount + $reward->female_students_amount;
            $totalAmount = $totalStudents * $reward->price;
    
            fputcsv($output, [
                $reward->college,
                $reward->level,
                $reward->type,
                $reward->male_students_amount,
                $reward->female_students_amount,
                $reward->price,
                $totalStudents,
                $totalAmount,
            ]);
        }
    
        fclose($output);
        exit;
    }
    
    public function chart(Request $request)
    {
        $rewards = session('rewards', []);
    

        $male_students = $rewards->sum('male_students_amount');
        $female_students = $rewards->sum('female_students_amount');
        $total_students = $male_students + $female_students;
    
        return view('rewards.chart', compact('total_students', 'male_students', 'female_students'));
    }
    
}
