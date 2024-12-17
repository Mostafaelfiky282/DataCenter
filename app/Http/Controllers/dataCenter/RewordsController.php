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
                'male_students_amount' => [ 'max:50'],
                'female_students_amount' => ['max:50'],
                'price' => ['max:50,min:3']
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

    public function show(Request $request)
    {

        // dd($request);
        $request->validate([
            'college' => 'required|string|max:255',
            'level' => 'max:255',
            'type' => 'nullable|max:255',
        ]);



        $query = Rewords::where('college', $request->input('college'));

        if ($request->filled('level')) {
            $query->where('level', $request->input('level'));
        }

        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }

        $rewards = $query->get();

        return view('rewards.show', compact('rewards'));
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
}
