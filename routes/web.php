<?php

use App\Http\Controllers\ProjectsController;
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
    // return view('welcome');
    auth()->loginUsingId(5);
    return redirect('/project');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/project', [ProjectsController::class,'index'])->middleware('auth');
Route::get('/project/create', [ProjectsController::class,'create'])->middleware('auth');
Route::post('/project', [ProjectsController::class,'store'])->middleware('auth');
Route::get('/project/{project:name}', [ProjectsController::class,'show'])->middleware('auth');
require __DIR__.'/auth.php';
