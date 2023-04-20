<?php

use App\Http\Controllers\AssignController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\TaskController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/employees', [EmployeesController::class, 'index'])->name('employees');
Route::get('/employees/create', [EmployeesController::class, 'create'])->name('employees.create');
Route::post('/employees/save', [EmployeesController::class, 'store'])->name('employees.save');
Route::get('/employees/edit/{Employee}', [EmployeesController::class, 'edit']);
Route::post('/employees/update/{employee}', [EmployeesController::class, 'update']);
Route::get('/employees/delete/{Employee}', [EmployeesController::class, 'destroy']);

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks/save', [TaskController::class, 'store'])->name('tasks.save');
Route::get('/tasks/edit/{task}', [TaskController::class, 'edit']);
Route::post('/tasks/update/{task}', [TaskController::class, 'update']);
Route::get('/tasks/delete/{task}', [TaskController::class, 'destroy']);

Route::get('/assign', [AssignController::class, 'index'])->name('assign');
Route::get('/assign/create', [AssignController::class, 'create'])->name('assign.create');
Route::post('/assign/save', [AssignController::class, 'store'])->name('assign.save');
Route::get('/assign/start/{task}', [AssignController::class, 'startstask']);
Route::get('/assign/finish/{task}', [AssignController::class, 'finish_task']);
Route::post('/assign/update/{task}', [AssignController::class, 'update']);
Route::get('/assign/change/{task}', [AssignController::class, 'changeTask']);

