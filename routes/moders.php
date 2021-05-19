<?php

use App\Http\Controllers\ChangePasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModeradorController;
use App\Http\Controllers\UserController;


//Auth::routes(['register' => false]);
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/', ModeradorController::class)->names('moders');
Route::get('', [ModeradorController::class, 'index']);//->name('moderador');
//imagen queryimage
Route::post('editimage', [ModeradorController::class, 'editimage']);
Route::post('store', [ModeradorController::class, 'store'])->name('moders.store');
Route::put('moders/update/{id}', [ModeradorController::class, 'update'])->name('moders.updaterecord');
//get all recors = 2
Route::get('getrecords', [ModeradorController::class, 'getrecords'])->name('getrecords');
Route::get('{id}/ver', [ModeradorController::class, 'ver'])->name('ver');
Route::get('consulta', [ModeradorController::class, 'consulta'])->name('moders.consulta');
Route::get('perfil', [ModeradorController::class, 'perfil'])->name('perfil');
Route::get('consulta/search', [ModeradorController::class, 'search'])->name('moders.search');
Route::get('consulta/resultadobusqueda', [ModeradorController::class, 'resultadobusqueda'])->name('moders.resultado');
Route::post('deleter/{id}', [ModeradorController::class, 'deleter']);
// Enviar registro
Route::get('enviarantecedentes', [ModeradorController::class, 'enviarantecedentes'])->name('enviarantecedentes');
//Elimina todo
Route::post('deleterecord/{tiporegistro}', [ModeradorController::class, 'deleterecordall'])->name('deleterecord');
//image profile
Route::post('profileimage', [UserController::class, 'profileimage']);
Route::put('update/{id}', [UserController::class, 'update'])->name('user.update');

Route::get('change-password', [ChangePasswordController::class, 'index'])->name('moders.password');
Route::post('change-password', [ChangePasswordController::class, 'store'])->name('change.password');