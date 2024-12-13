<?php

use App\Http\Controllers\Admin\CollegeController;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\YearController;

Route::get('/dash', [dashboardController::class, 'index']);

Route::get('/college-add', [CollegeController::class, 'index'])->name('add-college');
Route::post('/create-college', [CollegeController::class, 'store'])->name('create-college');
Route::get('/college.show', [CollegeController::class, 'show'])->name('college.show');
Route::delete('/colleges/{college}', [CollegeController::class, 'destroy'])->name('college.destroy');
Route::get('/colleges/{id}/edit', [CollegeController::class, 'edit'])->name('colleges.edit');
Route::put('/colleges/{id}', [CollegeController::class, 'update'])->name('colleges.update');


Route::get('/departments-add',[ DepartmentController::class, 'index'])->name('departments.add');
Route::post('/departments-store', [DepartmentController::class, 'store'])->name('departments.store');
Route::get('/departments.show', [DepartmentController::class, 'show'])->name('departments.show');
Route::delete('/departments/{department}', [DepartmentController::class, 'destroy'])->name('department.destroy');
Route::get('/departments/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
Route::put('/departments/{id}', [DepartmentController::class, 'update'])->name('departments.update');

Route::get('/years-add', [YearController::class, 'index'])->name('years.add');
Route::post('/create-year', [YearController::class, 'store'])->name('year.create');
Route::get('/year.show', [YearController::class, 'show'])->name('year.show');
Route::delete('/years/{year}', [YearController::class, 'destroy'])->name('year.destroy');
Route::get('/years/{id}/edit', [YearController::class, 'edit'])->name('years.edit');
Route::put('/years/{id}', [YearController::class, 'update'])->name('year.update');

Route::get('/programs.add', [ProgramController::class, 'index'])->name('program.add');
Route::post('/program-yea', [ProgramController::class, 'store'])->name('program.create');
Route::get('/program.show', [ProgramController::class, 'show'])->name('program.show');
Route::delete('/programs/{program}', [ProgramController::class, 'destroy'])->name('program.destroy');
Route::get('/programs/{id}/edit', [ProgramController::class, 'edit'])->name('programs.edit');
Route::put('/programs/{id}', [ProgramController::class, 'update'])->name('program.update');

Route::get('/users.add', [RegisterController::class, 'register'])->name('users.add');
Route::post('/users.create', [RegisterController::class, 'store'])->name('users.create');
Route::get('/users.show', [RegisterController::class, 'show'])->name('users.show');
Route::delete('/users/{user}', [RegisterController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{id}/edit', [RegisterController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [RegisterController::class, 'update'])->name('users.update');