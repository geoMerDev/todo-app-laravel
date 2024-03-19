<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoCategoryController;
use App\Http\Controllers\TodoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/my-todos', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/todo-categories', function () {
        return view('dashboard');
    })->name('dashboard');

  


    Route::get('/my-todos', [TodoController::class, 'index'])->name('my-todos.index');
    Route::get('/all-todos', [TodoController::class, 'allTodos'])->name('all-todos.allTodos');
    Route::get('/todos-categories', [TodoCategoryController::class, 'index'])->name('todos-categories.index');

});
