<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public static function index(){
    $schedule = DB::table('schedule') -> get();
    $classes = DB::table('classes') -> get();
    $teachers = DB::table('teachers') -> get();
    $audiences = DB::table('audiences') -> get();
    $group_schedule = DB::table('group_schedule')->get();
    $groups = DB::table('groups')->get();
    $specializations = DB::table('specializations')->get();
    $faculties = DB::table('faculties')->get();

    return view('index', ['schedule' => $schedule, 'classes' => $classes, 'teachers' => $teachers, 'audiences' => $audiences, 
    'group_schedule' => $group_schedule, 'groups' => $groups, 'specializations' => $specializations, 'faculties' => $faculties]);
    }
}
