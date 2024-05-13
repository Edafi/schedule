<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Classes;
use App\Models\Teachers;
use App\Models\Audiences;
use App\Models\Group_Schedule;
use App\Models\Groups;
use App\Models\Specializations;
use App\Models\Faculties;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DashboardScheduleController extends Controller
{
    public static function render(){
        if(Auth::check()){
            $schedule = DB::table('schedule') -> get();
            $audiences = DB::table('audiences') -> orderBy('name')->get();
            $classes = DB::table('classes') -> orderBy('name') -> get();
            $teachers = DB::table('teachers') -> orderBy('fullname') -> get();
            $groups = DB::table('groups')-> orderBy('name') -> get();
            $group_schedule = DB::table('group_schedule') -> get();
    
            return view('/dashboard-schedule', ['schedule' => $schedule, 'classes' => $classes, 'teachers' => $teachers, 'group_schedule' => $group_schedule, 'groups' => $groups,
            'audiences' => $audiences]);
        }
        else
            return redirect('/login-error');
    }
    public static function insert_data(Request $request){
        $request->validate([
            'audience' => 'required'
        ]);
        if($request -> input('success')){
            $scheduleModel = Schedule::find($request -> input('success'));
            $scheduleModel -> id_audience = $request -> get('audience');
            $scheduleModel -> added = true;
            $scheduleModel -> update();
            return redirect('/dashboard-schedule');
        }
        elseif($request -> input('fail')){
            $scheduleModel = Schedule::find($request -> input('fail'));
            while(Group_Schedule::where('id_schedule', $scheduleModel -> id)->first()){
                $group_scheduleModel = Group_Schedule::where('id_schedule', $scheduleModel -> id)->first();
                $group_scheduleModel -> where('id_schedule', $scheduleModel -> id) -> delete();
            }
            $scheduleModel -> delete();
            return redirect('/dashboard-schedule');
        }
    }
}
