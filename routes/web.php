<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dataCenter\AuthController;
use App\Http\Controllers\dataCenter\ExpensesController;
use App\Http\Controllers\dataCenter\HomeController;
use App\Http\Controllers\dataCenter\ReportController;
use App\Http\Controllers\dataCenter\RewordsController;
use App\Http\Controllers\dataCenter\StudentController;

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
include ('admin.php');