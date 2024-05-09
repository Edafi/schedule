<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Auth;

class DashboardScheduleController extends Controller
{
    public static function render(){
        $schedule = DB::table('schedule') -> get();
        $classes = DB::table('classes') -> get();
        $teachers = DB::table('teachers') -> get();
        $audiences = DB::table('audiences') -> get();
        $group_schedule = DB::table('group_schedule')->get();
        $groups = DB::table('groups')->get();

        dump($classes);

        return view('/dashboard-schedule', ['schedule' => $schedule, 'classes' => $classes, 'teachers' => $teachers, 'group_schedule' => $group_schedule, 'groups' => $groups]);
    }
}
