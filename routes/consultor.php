<?php

use App\Http\Controllers\ChangePasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultorController;
use App\Http\Controllers\UserController;


//Auth::routes(['register' => false]);
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::resource('/', ConsultorController::class)->names('consultor');
Route::get('', [ConsultorController::class, 'index'])->name('consultor');
//imagen queryimage


//Route::get('consulta', [ConsultorController::class, 'consulta'])->name('consultor.consulta');
Route::get('perfil', [UserController::class, 'perfil'])->name('perfil');
Route::get('search', [ConsultorController::class, 'search'])->name('consultor.search');
Route::get('resultadobusqueda', [ConsultorController::class, 'resultadobusqueda'])->name('consultor.resultado');

//image profile
Route::post('profileimage', [UserController::class, 'profileimage']);
Route::put('update/{id}', [UserController::class, 'update'])->name('user.update');

Route::get('change-password', [ChangePasswordController::class, 'index'])->name('consultor.password');
Route::post('change-password', [ChangePasswordController::class, 'store'])->name('change.password');