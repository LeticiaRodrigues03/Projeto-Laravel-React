<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskListController;
use App\Http\Controllers\TasksController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('register',[UserController::class, 'store'])->name('users.store');
Route::post('login', [UserController::class, 'login'])->name('users.login');

Route::group(['prefix' => 'v1', 'middleware' => 'jwt.verify'],function () {
    Route::apiResources([
    'tasklist'  =>  TaskListController::class,
    'tasks' => TasksController::class,
]);

Route::post('completedTaskList', [TaskListController::class], 'completedTaskList')->name('tasklist.completedTaskList');
Route::post('logout', [UserController::class], 'logout')->name('users.logout');

Route::put('/task/close/{id}', [TasksController::class],'closeTask')->name('tasks.closeTask');
Route::get('/list/tasks/{id}', [TasksController::class],'tasksByList')->name('tasks.tasksByList');

Route::post('logout', [UserController::class,'logout'])->name('users.logout');
});
