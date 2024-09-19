<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/admin', [\App\Http\Controllers\DashboardController::class, 'dashboardAdmin'])->name('dashboard.admin');

    Route::resource('mbkm/about-app', \App\Http\Controllers\AboutAppController::class);

    Route::get('admin/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('admin/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('admin/profile', [\App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('admin/role-permissions/permission', \App\Http\Controllers\RolePermission\PermissionController::class);
    Route::post('admin/role-permissions/permission/json', [\App\Http\Controllers\RolePermission\PermissionController::class, 'json'])->name('permission.json');

    Route::resource('admin/role-permissions/role', \App\Http\Controllers\RolePermission\RoleController::class);
    Route::post('admin/role-permissions/role/json', [\App\Http\Controllers\RolePermission\RoleController::class, 'json'])->name('role.json');

    Route::resource('admin/role-permissions/user', UserController::class);
    Route::post('admin/role-permissions/user/json', [UserController::class, 'json'])->name('user.json');
    Route::post('/temp/storage', [\App\Http\Controllers\StorageController::class, 'store'])->name('storage.store');
    Route::delete('/temp/storage', [\App\Http\Controllers\StorageController::class, 'destroy'])->name('storage.destroy');
    Route::get('/temp/storage/{path}', [\App\Http\Controllers\StorageController::class, 'show'])->name('storage.show');

});

require __DIR__ . '/auth.php';
