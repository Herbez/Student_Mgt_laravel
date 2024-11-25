<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\MarksController;


Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');


Route::get('marks', [MarksController::class, 'index'])->name('marks.index');
Route::post('/marks/store', [MarksController::class, 'store'])->name('marks.store');
Route::get('/rankings', [MarksController::class, 'showRankings'])->name('marks.rankings');


Route::get('/marks/{id}/edit', [MarksController::class, 'edit'])->name('marks.edit');
Route::put('/marks/{id}', [MarksController::class, 'update'])->name('marks.update');
Route::delete('/marks/{id}', [MarksController::class, 'destroy'])->name('marks.destroy');
