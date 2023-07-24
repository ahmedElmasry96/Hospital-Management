<?php

use App\Http\Controllers\Dashboard\Admin\DashboardController;
use App\Http\Controllers\Dashboard\User\DashboardController as UserDashboardController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function(){

        Route::get('dashboard/user', [UserDashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.user');

        Route::get('dashboard/admin', [DashboardController::class, 'index'])->middleware(['auth:admin', 'verified'])->name('dashboard.admin');

        require __DIR__.'/auth.php';

});

