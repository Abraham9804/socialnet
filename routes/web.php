<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/crear-cuenta',[RegisterController::class,'index'])->name("register");
Route::post('/crear-cuenta',[RegisterController::class,'store']);
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);
Route::get('/{user:username}',[PostController::class,'index'])->name('posts.index');
Route::post('/logout',[LogoutController::class,'store'])->name('logout');