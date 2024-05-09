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


class DashboardDepartmentController extends Controller
{
    public static function render(){
        $departments = DB::table('departments') -> orderBy('name') -> get();
        $audiences = DB::table('audiences') -> orderBy('name')->get();
        $department = DB::table('departments') -> where('name', Auth::user() -> department_name) -> first();
        $classes = DB::table('classes') -> orderBy('name') -> get();
        $teachers = DB::table('teachers') -> orderBy('fullname') -> get();
        $faculty_department = DB::table('faculty_department')->get();
        $faculties = DB::table('faculties') -> orderBy('name') -> get();
        $specializations = DB::table('specializations')  -> orderBy('name') -> get();
        $groups = DB::table('groups')-> orderBy('name') -> get();

        dump($departments);

        return view('/dashboard-department', ['audiences' => $audiences, 'department' => $department, 'classes' => $classes, 'teachers' => $teachers, 'faculty_department' => $faculty_department,
        'faculties' => $faculties, 'specializations' => $specializations, 'groups' => $groups]);
    }

    public static function insert_data(Request $request){
        $request->validate([
            'class' => 'required',
            'teacher' => 'required',
            'audience' => 'required',
            'group' => 'required',
            'day' => 'required',
            'time' => 'required',
            'severalGroups' => 'required'
        ]);

        $scheduleModel = new Schedule();
        $group_scheduleModel = new Group_Schedule();

        if($request -> get('severalGroups') == "true"){
            $schedule = DB::table('schedule') -> orderBy('id', 'desc')->first();
            $group_scheduleModel -> id_schedule = $schedule -> id;
            $group_scheduleModel -> id_group = $request -> get('group');
            $group_scheduleModel -> save();
        }
        else{
            $scheduleModel -> id_class = $request -> get('class');
            $scheduleModel -> id_audience = $request -> get('audience');
            $scheduleModel -> id_teacher = $request -> get('teacher');
            $scheduleModel -> day = $request -> get('day');
            $scheduleModel -> time = $request -> get('time');
            $scheduleModel -> added = false;
            $scheduleModel -> save();
            $group_scheduleModel -> id_schedule = $scheduleModel -> id;
            $group_scheduleModel -> id_group = $request -> get('group');
            $group_scheduleModel -> save();
        }
        
        return redirect('/dashboard-department');
    }
}
