<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
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

/* Route::get('/', function () {
    return ['Laravel' => app()->version()];
}); */

Route::get('/', function () {
    return view('welcome');
});

Route::resource('projects', ProjectController::class);
/* Route::get('projects/create', [ProjectController::class, 'create'])->name('projects.create'); */

Route::get('/projects', [ProjectController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('projects');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
}); 

require __DIR__.'/auth.php';
