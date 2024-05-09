<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $departments = DB::table('departments') -> get();
        dump($departments);
        return view('/auth.register', ['departments' => $departments]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'type' => 'required',
            'department_name' => 'required',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->type = $request->get('type');
        $user->email = $request->input('email');
        $user->department_name = $request->get('department_name');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect('/login');
    }
}
