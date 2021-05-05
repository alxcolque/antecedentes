<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModeradorController;
use Illuminate\Support\Facades\Auth;


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::resource('/', ModeradorController::class)->names('moders');
Route::get('', [ModeradorController::class, 'index']);//->name('moderador');
//imagen queryimage
Route::post('editimage', [ModeradorController::class, 'editimage']);
Route::post('store', [ModeradorController::class, 'store'])->name('moders.store');
//get all recors = 2
Route::get('getrecords', [ModeradorController::class, 'getrecords'])->name('getrecords');
Route::get('{id}/ver', [ModeradorController::class, 'ver'])->name('ver');
Route::get('consulta', [ModeradorController::class, 'consulta'])->name('moders.consulta');
Route::get('perfil', [ModeradorController::class, 'perfil'])->name('perfil');
Route::get('consulta/search', [ModeradorController::class, 'search'])->name('moders.search');
Route::get('consulta/resultadobusqueda', [ModeradorController::class, 'resultadobusqueda'])->name('moders.resultado');
