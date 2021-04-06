<?php

use Illuminate\Support\Facades\Route;

Route::get('login',[\App\Http\Controllers\Web\Admin\AdminAuthController::class,'index'])->name('login.form');

Route::post('login',[\App\Http\Controllers\Web\Admin\AdminAuthController::class,'login'])->name('login.post');

Route::get('forgot-password',[\App\Http\Controllers\Web\Admin\AdminAuthController::class,'email_form'])->name('password.form');

Route::post('forgot-password',[\App\Http\Controllers\Web\Admin\AdminAuthController::class,'forgot_password'])->name('password.post');

Route::get('reset-password/{token}',[\App\Http\Controllers\Web\Admin\AdminAuthController::class,'reset_password_form'])->name('reset.form');

Route::post('reset-password/{token}',[\App\Http\Controllers\Web\Admin\AdminAuthController::class,'reset_password'])->name('reset.post');


