<?php

use App\Http\Controllers\Admin\ActionController;
use App\Http\Controllers\Admin\AdviceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AntecedenteController;
use App\Http\Controllers\Admin\DetectiveController;
use App\Http\Controllers\Admin\ImportController;
use App\Http\Controllers\Admin\PersonController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\HomeController;

Route::get('',[AntecedenteController::class, 'index'])->name('admin.home');
//Route::get('',[AntecedenteController::class, 'admin.import']);

Route::post('import', [AntecedenteController::class, 'importExcel'])->name('file-import');
//Route::get('file-export', [UserController::class, 'fileExport'])->name('file-export');
Route::resource('antecedentes',AntecedenteController::class)->names('admin.antecedentes');
Route::resource('personas',PersonController::class)->names('admin.personas');
Route::resource('detectives',DetectiveController::class)->names('admin.detectives');
Route::resource('importaciones',ImportController::class)->names('admin.importaciones');
Route::resource('acciones',ActionController::class)->names('admin.acciones');
Route::resource('usuarios',UsuarioController::class)->names('admin.usuarios');
Route::resource('avisos',AdviceController::class)->names('admin.avisos');
//ruta para registrar la tabla de importacion
Route::get('registrarimport', [AntecedenteController::class, 'registrarimport']);
//Ajax datatables antecedentes
//Route::get('tableantecedentes', [HomeController::class, 'tbtljsonantecedentes']);
Route::get('tableantecedentes', [App\Http\Controllers\HomeController::class, 'tbtljsonantecedentes'])->name('tableantecedentes');
Route::get('import', [App\Http\Controllers\Admin\AntecedenteController::class, 'import']);
//user ajax
Route::get('usu', [UsuarioController::class, 'index'])->name('usu');
Route::get('usuarios/delete/{id}', [UsuarioController::class, 'destroy']);