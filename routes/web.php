<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::patch('/done/{id}', [TaskController::class, 'markDone'])->name('tasks.done');
});

