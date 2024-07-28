<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\NotificationsController;

Route::get('/', function () {
    return redirect()->route('projects.index');
});

Route::resource('projects', ProjectController::class);

Route::prefix('projects/{project}')->group(function () {
    Route::resource('tasks', TaskController::class)->except(['index', 'show']);
});

Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications.index');
Route::get('/notifications/{id}/mark-as-read', [NotificationsController::class, 'markAsRead'])->name('notifications.markAsRead');
