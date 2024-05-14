<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Auth;

class DashboardTeacherController extends Controller
{
    public static function render(){
        if(Auth::check()){
            $schedule = DB::table('schedule') -> get();
            $classes = DB::table('classes') -> orderBy('name') -> get();
            $teachers = DB::table('teachers') -> orderBy('fullname') -> get();
            $audiences = DB::table('audiences') -> orderBy('name') -> get();
            $group_schedule = DB::table('group_schedule')->get();
            $groups = DB::table('groups') ->orderBy('name') ->get();
    
            $days = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота']; 
    
            return view('/dashboard-teacher', ['schedule' => $schedule, 'classes' => $classes, 'teachers' => $teachers, 'audiences' => $audiences, 
            'group_schedule' => $group_schedule, 'groups' => $groups, 'days' => $days]);
        }
        else
            return redirect('/login-error');
    }

    public static function download_excel(Request $request){
        $teacher_id = $request->input("download");

        $teacher = DB::table('teachers') -> where('id', $teacher_id) -> first();
        $schedule = DB::table('schedule') -> get();
        $classes = DB::table('classes') -> orderBy('name') -> get();
        $teachers = DB::table('teachers') -> orderBy('fullname') -> get();
        $audiences = DB::table('audiences') -> orderBy('name') -> get();
        $group_schedule = DB::table('group_schedule')->get();
        $groups = DB::table('groups') ->orderBy('name') ->get();

        $days = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота']; 
        
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('C1', 'Здравствуйте, ' . Auth::user() -> name);
        $activeWorksheet->setCellValue('B4', 'День');
        $activeWorksheet->setCellValue('C4', 'Время');
        $activeWorksheet->setCellValue('D4', 'Предмет');
        $activeWorksheet->setCellValue('E4', 'Аудитория');

        $count = 1;
        foreach($days as $day){
            foreach($schedule as $sched){
                if($sched -> id_teacher == $teacher_id){
                    foreach($classes as $class){
                        if($class -> id == $sched -> id_class and $sched -> day == $day){
                            $activeWorksheet -> setCellValue('B'.$count + 4, $sched -> day);
                            $activeWorksheet -> setCellValue('C'.$count + 4 , $sched -> time);
                            $activeWorksheet -> setCellValue('D'.$count + 4 , $class -> name);
                        }
                    }
                    foreach($audiences as $audience)
                        if($audience -> id == $sched -> id_audience and $sched -> day == $day){
                            $activeWorksheet -> setCellValue('E'.$count + 4 , $audience -> name);
                            $count++;
                        }    
                }
            }
        }

        $writer = new Xlsx($spreadsheet);
        $filename = $teacher -> fullname . '.xlsx';
        $filepath = "../excels/";
        $writer->save($filepath . $filename);
        header('Content-disposition: attachment; filename='.$filepath . $filename);
        header('Content-Length: ' . filesize($filepath . $filename));
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        readfile($filepath . $filename);
        return redirect('/dashboard-teacher');
    }
}
