<?php

use Illuminate\Support\Facades\Route;

Route::get('login',[\App\Http\Controllers\Web\Driver\DriverAuthController::class,'index'])->name('login.form');

Route::post('login',[\App\Http\Controllers\Web\Driver\DriverAuthController::class,'login'])->name('login.post');

Route::get('forgot-password',[\App\Http\Controllers\Web\Driver\DriverAuthController::class,'email_form'])->name('password.form');

Route::post('forgot-password',[\App\Http\Controllers\Web\Driver\DriverAuthController::class,'forgot_password'])->name('password.post');

Route::get('reset-password/{token}',[\App\Http\Controllers\Web\Driver\DriverAuthController::class,'reset_password_form'])->name('reset.form');

Route::post('reset-password/{token}',[\App\Http\Controllers\Web\Driver\DriverAuthController::class,'reset_password'])->name('reset.post');

Route::middleware('auth:driver')->group(static function(){
    Route::any('logout',[App\Http\Controllers\Web\Driver\DriverAuthController::class,'logout'])->name('logout');
    Route::get('dashboard',function (){
        return view('driver.dashboard');
    })->name('dashboard');
});