<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectCriteriaController;
use App\Http\Controllers\ProjectManagementOfficeController;
use App\Http\Controllers\ProjectManagerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectSdmController;
use App\Http\Controllers\DailyReportController;
use App\Http\Controllers\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::group(['middleware'=>'auth:project_management_office'],function(){
    Route::get('/', [HomeController::class, 'index']);

    // Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
    Route::get('/home', [HomeController::class, 'index']);
    Route::resource('project_criteria', ProjectCriteriaController::class)->except([
        'destroy'
    ]);

    Route::resource('project_management_office', ProjectManagementOfficeController::class)->except([
        'destroy'
    ]);

    Route::resource('project_manager', ProjectManagerController::class)->except([
        'destroy'
    ]);

    Route::resource('user', UserController::class)->except([
        'destroy'
    ]);

    Route::resource('program', ProgramController::class)->except([

    ]);

    Route::resource('project', ProjectController::class)->except([
        'show'
    ]);

    Route::resource('project_sdm', ProjectSdmController::class)->except([
        'index', 'edit', 'create'
    ]);

    Route::resource('daily_report', DailyReportController::class)->except([
        'index', 'edit', 'create', 'show'
    ]);

    // Route::get('program/{id}/project/create', [ProjectController::class, 'create']);
    // Route::get('program/{id}/project/{project_id}/edit', [ProjectController::class, 'edit']);
    Route::get('project/{id}', [ProjectSdmController::class, 'index']);
    Route::get('project/{id}/project_sdm/create', [ProjectSdmController::class, 'create']);
    Route::get('project/{id}/project_sdm/{project_sdm_id}/edit', [ProjectSdmController::class, 'edit']);
    Route::get('project/{id}/daily_report/create', [DailyReportController::class, 'create']);
    Route::get('project/{id}/daily_report/{daily_report_id}/edit', [DailyReportController::class, 'edit']);
    Route::get('project/{id}/daily_report', [DailyReportController::class, 'index']);
});



// Route::get('program/{id}/project/{project_id}', [ProjectSdmController::class, 'index']);
