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

class IndexController extends Controller
{
    public static function index(){
    $scheduleModel = new Schedule;
    $classesModel = new Classes;
    $teachersModel = new Teachers;
    $audiencesModel = new Audiences;
    $group_scheduleModel = new Group_Schedule;
    $groupsModel = new Groups;
    $specializationsModel = new Specializations;
    $facultiesModel = new Faculties;

    $schedule = DB::table('schedule') -> get();
    $classes = DB::table('classes') -> get();
    $teachers = DB::table('teachers') -> get();
    $audiences = DB::table('audiences') -> get();
    $audiences = DB::table('audiences') -> get();
    $group_schedule = DB::table('group_schedule')->get();
    $groups = DB::table('groups')->get();
    $specializations = DB::table('specializations')->get();
    $faculties = DB::table('faculties')->get();

    return view('index', ['schedule' => $scheduleModel, 'classes' => $classes, 'teachers' => $teachers, 'audiences' => $audiences, 
    'group_schedule' => $group_schedule, 'groups' => $groups, 'specializations' => $specializations, 'faculties' => $faculties]);
    }
}
