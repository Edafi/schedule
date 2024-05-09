<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDepartmentController;
use App\Http\Controllers\DashboardScheduleController;


Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LogoutController::class, 'logout']); 

Route::get('/dashboard-department', [DashboardDepartmentController::class, 'render']);
Route::post('/dashboard-department', [DashboardDepartmentController::class, 'insert_data']);

Route::get('/dashboard-schedule', [DashboardScheduleController::class, 'render']);

/*
Route::get('/', [IndexController::class, 'index'] function(){
    return veiw('index');
});
*/

Route::get('/', [IndexController::class, 'index']);