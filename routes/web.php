<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dataCenter\AuthController;
use App\Http\Controllers\dataCenter\HomeController;
use App\Http\Controllers\dataCenter\ReportController;
use App\Http\Controllers\dataCenter\StudentController;
use App\Http\Controllers\dataCenter\CategoryController;

Route::get('/home', [HomeController::class, 'index']);

Route::get('/student-add', [StudentController::class, 'add'])->name('student-add');
Route::post('/student-create', [StudentController::class, 'create']);

Route::get('/', [AuthController::class, 'login']);
route::post('login', [AuthController::class, "dologin"])->name('auth.do.login');

Route::get('/register', [AuthController::class, 'register']);
route::post('register', [AuthController::class, "store"])->name('auth.store');

route::post('logout', [AuthController::class, "logout"])->name('auth.logout');

Route::get('/report', [ReportController::class, "index"])->name('report');
Route::post('/report-show', [StudentController::class, 'showReport'])->name('report.show');

Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');

Route::post('/students/export', [StudentController::class, 'export'])->name('students.export');

Route::post('/excel/{id}', [StudentController::class, 'excel'])->name('excel');

Route::post('/chart', [StudentController::class, 'chart'])->name('chart');

include ('admin.php');