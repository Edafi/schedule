<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if(Auth::user()->type == 'Department')
                return redirect('/dashboard-department');
            else
                return redirect('/dashboard-schedule');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }
}
