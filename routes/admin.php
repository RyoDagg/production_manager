<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'  => 'App\Http\Controllers\Admin',
    'prefix'     => 'admin',
    'middleware' => ['auth'],
], function () {
    Route::resource('permission', 'PermissionController');
    Route::resource('role', 'RoleController');
    Route::post('/roles/{role}/permissions',[RoleController::class,'givePermission'])->name('role.permissions');
    Route::delete('/roles/{role}/permissions/{permission}',[RoleController::class,'revokePermission'])->name('role.permission.revoke');
    Route::post('/permissions/{permission}/roles',[PermissionController::class,'giveRole'])->name('permission.roles');
    Route::delete('/permissions/{permission}/roles/{role}',[PermissionController::class,'deleteRole'])->name('permission.role.remove');

});
