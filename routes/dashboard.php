<?php

use App\Http\Controllers\Dashboard\Admin\DashboardController;
use App\Http\Controllers\Dashboard\User\DashboardController as UserDashboardController;
use Illuminate\Support\Facades\Route;


Route::get('user', [UserDashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.user');

Route::get('admin', [DashboardController::class, 'index'])->middleware(['auth:admin', 'verified'])->name('dashboard.admin');

require __DIR__.'/auth.php';

