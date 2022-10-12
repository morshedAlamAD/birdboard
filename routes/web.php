<?php

use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ProjectsTasksController;
use App\Models\Activity;
use App\Models\Project;
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
    return view('welcome');
    // auth()->loginUsingId(5);
    // return redirect('/project');
});

Route::get('/yy', function () {
    // return view('welcome');
    auth()->loginUsingId(1);
    return redirect('/project');
});
Route::get('/dashboard', function () {
    return redirect('/');
    // return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/project', [ProjectsController::class,'index'])->middleware('auth');
Route::get('/project/create', [ProjectsController::class,'create'])->middleware('auth');
Route::get('/project/{project}/edit', [ProjectsController::class,'edit'])->middleware('auth');
Route::post('/project', [ProjectsController::class,'store'])->middleware('auth');
Route::patch('/project/{project}', [ProjectsController::class,'update'])->middleware('auth');
Route::post('/project/{project}/tasks', [ProjectsTasksController::class,'store'])->middleware('auth');
Route::patch('/project/{project}/tasks/{task}', [ProjectsTasksController::class,'update'])->middleware('auth');
Route::get('/project/{project}', [ProjectsController::class,'show'])->middleware('auth');
require __DIR__.'/auth.php';
