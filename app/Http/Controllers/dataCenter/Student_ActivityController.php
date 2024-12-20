<?php

namespace App\Http\Controllers\dataCenter;

use App\Http\Controllers\Controller;
use App\Models\Student_Activity;
use Illuminate\Http\Request;

class Student_ActivityController extends Controller
{
    public function index()
    {
        return view('student_activity.add');
    }

    public function create(Request $request)
    {
        $request->validate(
            [
                'college' => ['string', 'required', 'max:255', 'min:3'],
                'type' => ['string', 'required', 'max:255', 'min:3'],
                'male_student_amount' => ['required', 'max:50'],
                'female_student_amount' => ['required', 'max:50'],
                'price' => ['required', 'max:50']
            ]
        );
        $student_activity = new Student_Activity();
        $student_activity->college = $request->college;
        $student_activity->type = $request->type;
        $student_activity->male_student_amount = $request->male_student_amount;
        $student_activity->female_student_amount = $request->female_student_amount;
        $student_activity->price = $request->price;
        $student_activity->save();
        return redirect()->route('student_activity')->with('success', 'تم الحغظ بنجاح ');
    }

    public function report()
    {
        return view('student_activity.report');
    }


    public function show(Request $request)
    {
        $request->validate([
            'college' => 'required|string|max:255',
            'type' => 'nullable|max:255',
        ]);

        session()->put('college', $request->input('college'));

        $query = Student_Activity::where('college', $request->input('college'));

        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }

        $student_activity = $query->get();
        session(['student_activity' => $student_activity]);

        return view('student_activity.show', compact('student_activity'));
    }

    public function destroy($id)
    {
        $student_activity = Student_Activity::findOrFail($id);
        $student_activity->delete();
        return redirect()->route('student_activity.report')->with('success', 'تم الحذف بنجاح');
    }

    public function edit($id)
    {
        $student_ac = Student_Activity::findOrFail($id);
        return view('student_activity.edit', compact('student_ac'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => ['string', 'required', 'max:255', 'min:3'],
            'male_student_amount' => ['required', 'integer', 'min:1'],
            'female_student_amount' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'numeric', 'min:0']
        ]);
        
        $student_ac  = Student_Activity::findOrFail($id);
        $student_ac->update($request->only(['type', 'male_student_amount', 'female_student_amount', 'price']));
        return redirect()->route('student_activity.edit',$id)->with('success', 'تم التعديل بنجاح');
    }


    public function excel(Request $request)
    {
        $student_activity = session('student_activity', []);
    
        header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
        $filename = "الانشطه الطلابيه.xls";
    
        header("Content-Disposition: attachment; filename={$filename}");
        header("Pragma: no-cache");
        header("Expires: 0");
    
        echo "\xEF\xBB\xBF";
        $output = fopen("php://output", "w");
    
        $headers = ['الكلية', 'نوع الانشطه', 'عدد الطلاب', 'عدد الطالبات', '  التكلفه بالجنيه', 'العدد الكلي للطلاب', 'المبلغ الإجمالي'];
        fputcsv($output, $headers);
    
        foreach ($student_activity  as $student_ac) {
            $totalStudents = $student_ac->male_student_amount + $student_ac->female_student_amount;
            $totalAmount = $totalStudents * $student_ac->price;
    
            fputcsv($output, [
                $student_ac->college,
                $student_ac->type,
                $student_ac->male_student_amount,
                $student_ac->female_student_amount,
                $student_ac->price,
                $totalStudents,
                $totalAmount,
            ]);
        }
    
        fclose($output);
        exit;
    }
    
    public function chart(Request $request)
    {
        $student_activity = session('student_activity', []);
    
        $male_students = $student_activity->sum('male_student_amount');
        $female_students = $student_activity->sum('female_student_amount');
        $total_students = $male_students + $female_students;
    
        return view('student_activity.chart', compact('total_students', 'male_students', 'female_students'));
    }
    

}
