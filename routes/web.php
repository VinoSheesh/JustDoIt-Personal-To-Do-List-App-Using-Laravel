<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::redirect('/', destination: 'tasks')->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function(){
    Route::resource('tasks', controller: TaskController::class);
    Route::patch('/tasks/{task}/done', [TaskController::class, 'done'])->name('tasks.done');
});

Route::middleware('auth')->group(callback: function () {
    Route::get('/profile', action: [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
