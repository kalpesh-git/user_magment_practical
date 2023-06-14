<?php

use Illuminate\Support\Facades\Route;

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
    if (auth()->user() && auth()->user()->type == "admin") {
        return redirect()->route('admin.home');
    } elseif(auth()->user() && auth()->user()->type == "user"){
        return redirect()->route('home');
    }
    else {
        return view('auth.login');
    }
});

Auth::routes(); 
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/tasks/{userId?}', [App\Http\Controllers\HomeController::class, 'tasks'])->name('user.tasks');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [App\Http\Controllers\AdminController::class, 'adminHome'])->name('admin.home');
    Route::post('/admin/task/add/{userId}', [App\Http\Controllers\AdminController::class, 'createTask'])->name('admin.createtask');
    Route::get('/admin/task/{userId}', [App\Http\Controllers\AdminController::class, 'task'])->name('admin.task');
    Route::get('/admin/user_tasks/{userId}', [App\Http\Controllers\AdminController::class, 'userTasks'])->name('admin.usertasks'); 
    Route::get('/admin/task/delete/{taskId}', [App\Http\Controllers\AdminController::class, 'deleteTask'])->name('admin.taskdelete'); 
    Route::get('/admin/task/edit/{taskId}', [App\Http\Controllers\AdminController::class, 'editTask'])->name('admin.edittask');
    Route::post('/admin/task/update/{taskId}', [App\Http\Controllers\AdminController::class, 'updateTask'])->name('admin.updatetask');
});
