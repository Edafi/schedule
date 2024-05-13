<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public static function index(){
    $schedule = DB::table('schedule') -> orderBy('day') -> get();
    $classes = DB::table('classes') -> orderBy('name') -> get();
    $teachers = DB::table('teachers') -> orderBy('fullname') -> get();
    $audiences = DB::table('audiences') -> orderBy('name') -> get();
    $group_schedule = DB::table('group_schedule')->get();
    $groups = DB::table('groups') ->orderBy('name') ->get();
    $specializations = DB::table('specializations')-> orderBy('name') -> get();
    $faculties = DB::table('faculties') -> orderBy('name')  ->get();
    $departments = DB::table('departments') -> orderBy('name') -> get();
    $faculty_department = DB::table('faculty_department') -> get();

    $days = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота']; 

    return view('index', ['schedule' => $schedule, 'classes' => $classes, 'teachers' => $teachers, 'audiences' => $audiences, 
    'group_schedule' => $group_schedule, 'groups' => $groups, 'specializations' => $specializations, 'faculties' => $faculties, 'departments' => $departments,
    'faculty_department' => $faculty_department, 'days' => $days]);
    }
}
