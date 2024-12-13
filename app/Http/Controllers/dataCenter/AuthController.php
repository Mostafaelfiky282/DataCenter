<?php

namespace App\Http\Controllers\dataCenter;

use App\Models\User;
use App\Models\College;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }
    public function dologin(Request $request)
    {
        $date = $validatedData = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required'
        ]);
        if (Auth::attempt($date)) {
            $user = User::where('email', $date['email'])->first();
            Auth::login($user);
            if($user->role == 'Super-Admin') {
                return redirect('/dash')->with('success', "تم تسجيل الدخول بنجاح");
            }
            return redirect('/home')->with('success', "تم تسجيل الدخول بنجاح");
        } else {
            return redirect()->back()->withErrors(["Login Failed" => "خطأ في اسم المستخدم او كلمة السر "]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', "تم تسجيل الخروج بنجاح");
    }
}
