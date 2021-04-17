<?php

use Illuminate\Support\Facades\Route;

Route::get('login',[\App\Http\Controllers\Web\Admin\AdminAuthController::class,'index'])->name('login.form');

Route::post('login',[\App\Http\Controllers\Web\Admin\AdminAuthController::class,'login'])->name('login.post');

Route::get('forgot-password',[\App\Http\Controllers\Web\Admin\AdminAuthController::class,'email_form'])->name('password.form');

Route::post('forgot-password',[\App\Http\Controllers\Web\Admin\AdminAuthController::class,'forgot_password'])->name('password.post');

Route::get('reset-password/{token}',[\App\Http\Controllers\Web\Admin\AdminAuthController::class,'reset_password_form'])->name('reset.form');

Route::post('reset-password/{token}',[\App\Http\Controllers\Web\Admin\AdminAuthController::class,'reset_password'])->name('reset.post');

Route::middleware('auth:admin')->group(static function(){
    Route::any('logout',[App\Http\Controllers\Web\Admin\AdminAuthController::class,'logout'])->name('logout');
    Route::get('dashboard',function (){
        return view('admin.dashboard');
    })->name('dashboard');
});

Route::get('users',[\App\Http\Controllers\Web\Admin\UserController::class,'index'])->name('users.index');
Route::get('users/create',[\App\Http\Controllers\Web\Admin\UserController::class,'create'])->name('users.create');
Route::post('users',[\App\Http\Controllers\Web\Admin\UserController::class,'store'])->name('users.store');
Route::get('users/{id}',[\App\Http\Controllers\Web\Admin\UserController::class,'show'])->name('users.show');
Route::get('users/{id}/edit',[\App\Http\Controllers\Web\Admin\UserController::class,'edit'])->name('users.edit');
Route::put('users/{id}',[\App\Http\Controllers\Web\Admin\UserController::class,'update'])->name('users.update');
Route::delete('users/{id}',[\App\Http\Controllers\Web\Admin\UserController::class,'destroy'])->name('users.destroy');

