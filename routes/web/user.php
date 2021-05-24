<?php

use Illuminate\Support\Facades\Route;

Route::get('login',[\App\Http\Controllers\Web\User\UserAuthController::class,'index'])->name('login.form');

Route::post('login',[\App\Http\Controllers\Web\User\UserAuthController::class,'login'])->name('login.post');

Route::get('forgot-password',[\App\Http\Controllers\Web\User\UserAuthController::class,'email_form'])->name('password.form');

Route::post('forgot-password',[\App\Http\Controllers\Web\User\UserAuthController::class,'forgot_password'])->name('password.post');

Route::get('reset-password/{token}',[\App\Http\Controllers\Web\User\UserAuthController::class,'reset_password_form'])->name('reset.form');

Route::post('reset-password/{token}',[\App\Http\Controllers\Web\User\UserAuthController::class,'reset_password'])->name('reset.post');

Route::middleware('auth:user')->group(static function(){
    Route::any('logout',[App\Http\Controllers\Web\User\UserAuthController::class,'logout'])->name('logout');
    Route::get('dashboard',[App\Http\Controllers\Web\User\UserController::class,'index'])->name('dashboard');
    Route::get('profile',[App\Http\Controllers\Web\User\UserController::class,'profile'])->name('profile');
    Route::get('roadmap',[App\Http\Controllers\Web\User\UserController::class,'roadmap'])->name('roadmap');
    Route::get('settings',[App\Http\Controllers\Web\User\UserController::class,'settings'])->name('settings');
    Route::post('settings',[App\Http\Controllers\Web\User\UserController::class,'update'])->name('settings.update');
});
