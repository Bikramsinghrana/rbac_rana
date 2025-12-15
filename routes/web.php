<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('role.redirect')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->middleware(['role.admin'])->name('admin.')->group(function () {

        Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
        Route::resource('users', UserController::class);
        Route::resource('roles', RolePermissionController::class)->only(['index', 'edit', 'update']);

    });

   
    Route::get('project.dashboard', [ProjectController::class, 'dashboard'])->name('projects.dashboard');
    Route::get('project.index', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('user.index', [UserDashboardController::class, 'index'])->name('users.index');
    
});

require __DIR__ . '/auth.php';
