<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginError extends Controller
{
    public static function render(){
        if(Auth::check()){
            return redirect('/logout');
        }
        else
            return redirect('/logout');
    }
}
