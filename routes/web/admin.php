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

Route::get('vehicules',[\App\Http\Controllers\Web\Admin\VehiculeController::class,'index'])->name('vehicules.index');
Route::get('vehicules/create',[\App\Http\Controllers\Web\Admin\VehiculeController::class,'create'])->name('vehicules.create');
Route::post('vehicules',[\App\Http\Controllers\Web\Admin\VehiculeController::class,'store'])->name('vehicules.store');
Route::get('vehicules/{id}',[\App\Http\Controllers\Web\Admin\VehiculeController::class,'show'])->name('vehicules.show');
Route::get('vehicules/{id}/edit',[\App\Http\Controllers\Web\Admin\VehiculeController::class,'edit'])->name('vehicules.edit');
Route::put('vehicules/{id}',[\App\Http\Controllers\Web\Admin\VehiculeController::class,'update'])->name('vehicules.update');
Route::delete('vehicules/{id}',[\App\Http\Controllers\Web\Admin\VehiculeController::class,'destroy'])->name('vehicules.destroy');

Route::get('drivers',[\App\Http\Controllers\Web\Admin\DriverController::class,'index'])->name('drivers.index');
Route::get('drivers/create',[\App\Http\Controllers\Web\Admin\DriverController::class,'create'])->name('drivers.create');
Route::post('drivers',[\App\Http\Controllers\Web\Admin\DriverController::class,'store'])->name('drivers.store');
Route::get('drivers/{id}',[\App\Http\Controllers\Web\Admin\DriverController::class,'show'])->name('drivers.show');
Route::get('drivers/{id}/edit',[\App\Http\Controllers\Web\Admin\DriverController::class,'edit'])->name('drivers.edit');
Route::put('drivers/{id}',[\App\Http\Controllers\Web\Admin\DriverController::class,'update'])->name('drivers.update');
Route::delete('drivers/{id}',[\App\Http\Controllers\Web\Admin\DriverController::class,'destroy'])->name('drivers.destroy');

Route::get('establishments',[\App\Http\Controllers\Web\Admin\EstablishmentController::class,'index'])->name('establishments.index');
Route::get('establishments/create',[\App\Http\Controllers\Web\Admin\EstablishmentController::class,'create'])->name('establishments.create');
Route::post('establishments',[\App\Http\Controllers\Web\Admin\EstablishmentController::class,'store'])->name('establishments.store');
Route::get('establishments/{id}',[\App\Http\Controllers\Web\Admin\EstablishmentController::class,'show'])->name('establishments.show');
Route::get('establishments/{id}/edit',[\App\Http\Controllers\Web\Admin\EstablishmentController::class,'edit'])->name('establishments.edit');
Route::put('establishments/{id}',[\App\Http\Controllers\Web\Admin\EstablishmentController::class,'update'])->name('establishments.update');
Route::delete('establishments/{id}',[\App\Http\Controllers\Web\Admin\EstablishmentController::class,'destroy'])->name('establishments.destroy');

Route::get('students',[\App\Http\Controllers\Web\Admin\StudentController::class,'index'])->name('students.index');
Route::get('students/create',[\App\Http\Controllers\Web\Admin\StudentController::class,'create'])->name('students.create');
Route::post('students',[\App\Http\Controllers\Web\Admin\StudentController::class,'store'])->name('students.store');
Route::get('students/{id}',[\App\Http\Controllers\Web\Admin\StudentController::class,'show'])->name('students.show');
Route::get('students/{id}/edit',[\App\Http\Controllers\Web\Admin\StudentController::class,'edit'])->name('students.edit');
Route::put('students/{id}',[\App\Http\Controllers\Web\Admin\StudentController::class,'update'])->name('students.update');
Route::delete('students/{id}',[\App\Http\Controllers\Web\Admin\StudentController::class,'destroy'])->name('students.destroy');

Route::get('actualities',[\App\Http\Controllers\Web\Admin\ActualityController::class,'index'])->name('actualities.index');
Route::get('actualities/create',[\App\Http\Controllers\Web\Admin\ActualityController::class,'create'])->name('actualities.create');
Route::post('actualities',[\App\Http\Controllers\Web\Admin\ActualityController::class,'store'])->name('actualities.store');
Route::get('actualities/{id}',[\App\Http\Controllers\Web\Admin\ActualityController::class,'show'])->name('actualities.show');
Route::get('actualities/{id}/edit',[\App\Http\Controllers\Web\Admin\ActualityController::class,'edit'])->name('actualities.edit');
Route::put('actualities/{id}',[\App\Http\Controllers\Web\Admin\ActualityController::class,'update'])->name('actualities.update');
Route::delete('actualities/{id}',[\App\Http\Controllers\Web\Admin\ActualityController::class,'destroy'])->name('actualities.destroy');

Route::get('collaborators',[\App\Http\Controllers\Web\Admin\CollaboratorController::class,'index'])->name('collaborators.index');
Route::get('collaborators/create',[\App\Http\Controllers\Web\Admin\CollaboratorController::class,'create'])->name('collaborators.create');
Route::post('collaborators',[\App\Http\Controllers\Web\Admin\CollaboratorController::class,'store'])->name('collaborators.store');
Route::get('collaborators/{id}',[\App\Http\Controllers\Web\Admin\CollaboratorController::class,'show'])->name('collaborators.show');
Route::get('collaborators/{id}/edit',[\App\Http\Controllers\Web\Admin\CollaboratorController::class,'edit'])->name('collaborators.edit');
Route::put('collaborators/{id}',[\App\Http\Controllers\Web\Admin\CollaboratorController::class,'update'])->name('collaborators.update');
Route::delete('collaborators/{id}',[\App\Http\Controllers\Web\Admin\CollaboratorController::class,'destroy'])->name('collaborators.destroy');
