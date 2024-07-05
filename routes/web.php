<?php

use App\Http\Controllers\ForgotPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\MainController::class, 'index'])->name('welcome');
Route::get('/register',[\App\Http\Controllers\MainController::class, 'getRegister'])->name('getRegister');
Route::get('/login',[\App\Http\Controllers\MainController::class, 'getLogin'])->name('getLogin');
Route::post('/login',[\App\Http\Controllers\MainController::class, 'login'])->name('login');
Route::post('/register',[\App\Http\Controllers\MainController::class, 'register'])->name('register');
Route::get('/dashboard',[\App\Http\Controllers\MainController::class, 'getDashboard'])->name('dashboard');

Route::get('/forgot-password',[ForgotPassword::class,'forgotPassword'])->name('forgot.password.get');
Route::post('/forgot-password',[ForgotPassword::class,'forgotPasswordPost'])->name('forgot.password.post');
Route::get('/reset-password', [ForgotPassword::class, 'resetPasswordGet'])->name('reset.password.get');
Route::post('/reset-password',[ForgotPassword::class,'resetPasswordPost'])->name('reset.password.post');

//login-routes
Route::middleware('auth')->group(function (){
Route::get('/account',[\App\Http\Controllers\AccountController::class,'index'])->name('account');
Route::get('/edit-name',[\App\Http\Controllers\AccountController::class,'editName'])->name('editName');
Route::post('/update-name',[\App\Http\Controllers\AccountController::class,'updateName'])->name('updateName');
Route::get('/edit-email',[\App\Http\Controllers\AccountController::class,'editEmail'])->name('editEmail');
Route::post('/update-email',[\App\Http\Controllers\AccountController::class,'updateEmail'])->name('updateEmail');

Route::get('/edit-password',[\App\Http\Controllers\AccountController::class,'editPassword'])->name('editPassword');
Route::post('/update-password',[\App\Http\Controllers\AccountController::class,'updatePassword'])->name('updatePassword');

Route::get('/logout',[\App\Http\Controllers\AccountController::class,'logout'])->name('logout');
Route::delete('account/delete-account',[\App\Http\Controllers\MainController::class,'deleteAccount'])->name('deleteAccount');

Route::get('/users',[\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
});
Route::middleware('auth')->group(function (){
    Route::prefix('categories')->group(function (){
       Route::get('/',[\App\Http\Controllers\CategoriesController::class,'index'])->name('categories.index');
       Route::post('/',[\App\Http\Controllers\CategoriesController::class,'store'])->name('categories.store');
       Route::get('/edit/{id}',[\App\Http\Controllers\CategoriesController::class,'edit'])->name('categories.edit');
       Route::put('/update/{id}',[\App\Http\Controllers\CategoriesController::class,'update'])->name('categories.update');
       Route::delete('/{id}',[\App\Http\Controllers\CategoriesController::class,'delete'])->name('categories.delete');
    });
});
