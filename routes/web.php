<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index'])->name('todos.index');
Route::get('/work', [TodoController::class, 'work'])->name('todos.work');
Route::get('/home', [TodoController::class, 'home'])->name('todos.home');
Route::get('/other', [TodoController::class, 'other'])->name('todos.other');
Route::get('todos/create', [TodoController::class, 'create'])->name('todos.create');
Route::post('todos/store', [TodoController::class, 'store'])->name('todos.store');
Route::get('todos/{todo}', [TodoController::class, 'details'])->name('todos.details');
Route::get('todos/edit/{todo}', [TodoController::class, 'edit'])->name('todos.edit');
Route::patch('todos/{todo}', [TodoController::class, 'update'])->name('todos.update');
Route::delete('todos/{todo}', [TodoController::class, 'delete'])->name('todos.delete');
