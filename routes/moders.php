<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModeradorController;
use Illuminate\Support\Facades\Auth;


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('', ModeradorController::class);
//Route::get('', [App\Http\Controllers\ModeradorController::class, 'index']);//->name('moderador');
//imagen queryimage
Route::post('editimage', [ModeradorController::class, 'editimage']);
//Route::post('queryimage', [ModeradorController::class, 'queryimage']);