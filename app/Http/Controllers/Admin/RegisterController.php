<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\College;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register()
    {
        $colleges = College::all();
        return view("admin.users.add", compact('colleges'));
    }
    public function store(Request $request)
    {    
        $date = $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
            'role' => 'required|string|max:255|min:4',
            'college_id' => 'required|string|max:255|min:1'
        ]);

        $user = User::create($date);

        Auth::login($user);
        return back()->with('success', "تم انشاء الحساب بنجاح");
    }

    public function show(){
        $users = User::with('college')->get();
        return view('admin.users.show', compact('users'));
    }
    

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.show')->with('success', 'تم الحذف بنجاح');
    }
    public function edit($id){
        $user = User::findOrFail($id);
        $colleges = College::all();
        return view('admin.users.edit', compact('user', 'colleges'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => ['required','string','max:255','min:3'],
            'email' => ['required','string','email','max:255','unique:users,email,'.$id],
            'role' => ['required','string','max:255','min:4'],
            'college_id' => ['required','string','max:255','min:1'],
            'password' => 'nullable|min:8|confirmed',
            'password_confirmation' => 'nullable',
        ]);

        $user = User::findOrFail($id);
        if($request->password){
            $user->update($request->all());
        }else{
            $user->update($request->only(['name', 'email', 'role', 'college_id']));
        }
        return redirect()->route('users.show')->with('success', 'تم التحديث بنجاح');
    }
}
