<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dataCenter\AuthController;
use App\Http\Controllers\dataCenter\ExpensesController;
use App\Http\Controllers\dataCenter\FinancialController;
use App\Http\Controllers\dataCenter\HomeController;
use App\Http\Controllers\dataCenter\ReportController;
use App\Http\Controllers\dataCenter\RewordsController;
use App\Http\Controllers\dataCenter\StudentController;
use App\Http\Controllers\dataCenter\Student_ActivityController;

Route::get('/home', [HomeController::class, 'index']);

Route::get('/student-add', [StudentController::class, 'add'])->name('student-add');
Route::post('/student-create', [StudentController::class, 'create']);

Route::get('/', [AuthController::class, 'login']);
route::post('login', [AuthController::class, "dologin"])->name('auth.do.login');

route::post('logout', [AuthController::class, "logout"])->name('auth.logout');

Route::get('/report', [ReportController::class, "index"])->name('report');
Route::post('/report-show', [ReportController::class, 'generateReport'])->name('report.show');

Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');

Route::post('/students/export', [StudentController::class, 'export'])->name('students.export');


Route::post('/chart', [ReportController::class, 'chart'])->name('chart');
Route::post('/export', [ReportController::class, 'excel'])->name('export');

Route::get('/expenses', [ExpensesController::class, "index"])->name('expenses');
Route::post('/expenses-create', [ExpensesController::class, "create"])->name('expenses.create');
Route::get('/expenses-report', [ExpensesController::class, "report"])->name('expenses.report');
Route::post('/expenses-show', [ExpensesController::class, "show"])->name('expenses.show');
Route::delete('/expenses/{expense}', [ExpensesController::class, 'destroy'])->name('expenses.destroy');
Route::get('/expenses/{id}/edit', [ExpensesController::class, 'edit'])->name('expenses.edit');
Route::put('/expenses/{id}', [ExpensesController::class, 'update'])->name('expenses.update');
Route::post('/exexcel', [ExpensesController::class, 'excel'])->name('exexcel');

Route::get('/rewords', [RewordsController::class, "index"])->name('rewords');
Route::post('/rewords-create', [RewordsController::class, "create"])->name('rewords.create');
Route::get('/rewords-report', [RewordsController::class, "report"])->name('rewords.report');
Route::post('/rewords-show', [RewordsController::class, "show"])->name('rewords.show');
Route::delete('/rewords/{reword}', [RewordsController::class, 'destroy'])->name('rewords.destroy');
Route::get('/rewords/{id}/edit', [RewordsController::class, 'edit'])->name('rewords.edit');
Route::put('/rewords/{id}', [RewordsController::class, 'update'])->name('rewords.update');
Route::post('/excel', [RewordsController::class, 'excel'])->name('rewards.excel');
Route::post('/piani', [RewordsController::class, 'chart'])->name('piani');


Route::get('/financial', [FinancialController::class, "index"])->name('financial');
Route::post('/financial-store', [FinancialController::class, "store"])->name('financial.store');
Route::get('/financial-report', [FinancialController::class, "report"])->name('financial.report');
Route::post('/financial-show', [FinancialController::class, "show"])->name('financial.show');
Route::delete('/financial/{financial}', [FinancialController::class, 'destroy'])->name('financial.destroy');
Route::get('/financial/{id}/edit', [FinancialController::class, 'edit'])->name('financial.edit');
Route::put('/financial/{id}', [FinancialController::class, 'update'])->name('financial.update');
Route::post('/financial-excel', [FinancialController::class, 'excel'])->name('financial.excel');
Route::post('/financial-chart', [FinancialController::class, 'chart'])->name('financial.chart');

Route::get('/student_activity',[Student_ActivityController::class,"index"])->name('student_activity');
Route::post('/student_activity-create', [Student_ActivityController::class, "create"])->name('student_activity.create');
Route::get('/student_activity-report', [Student_ActivityController::class, "report"])->name('student_activity.report');
Route::post('/student_activity-show', [Student_ActivityController::class, "show"])->name('student_activity.show');
Route::delete('/student_activity/{student_ac}', [Student_ActivityController::class, 'destroy'])->name('student_activity.destroy');
Route::get('/student_activity/{id}/edit', [Student_ActivityController::class, 'edit'])->name('student_activity.edit');
Route::put('/student_activity/{id}', [Student_ActivityController::class, 'update'])->name('student_activity.update');
Route::post('/excel', [Student_ActivityController::class, 'excel'])->name('student_activity.excel');
Route::post('/pianiStu', [Student_ActivityController::class, 'chart'])->name('pianiStu');
include('admin.php');