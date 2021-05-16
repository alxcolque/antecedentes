<?php

use App\Charts\AntecedeteChart;
use App\Http\Controllers\Admin\ActionController;
use App\Http\Controllers\Admin\AdviceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AntecedenteController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Admin\DetectiveController;
use App\Http\Controllers\Admin\ImportController;
use App\Http\Controllers\Admin\PersonController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::get('',[AntecedenteController::class, 'index'])->name('admin.home');
//Route::get('',[AntecedenteController::class, 'admin.import']);

Route::post('import', [AntecedenteController::class, 'importExcel'])->name('file-import');
Route::get('file-export', [AntecedenteController::class, 'fileExport'])->name('file-export');
Route::resource('antecedentes',AntecedenteController::class)->names('admin.antecedentes');
Route::resource('personas',PersonController::class)->names('admin.personas');
Route::resource('detectives',DetectiveController::class)->names('admin.detectives');
Route::resource('importaciones',ImportController::class)->names('admin.importaciones');
Route::resource('acciones',ActionController::class)->names('admin.acciones');
Route::resource('usuarios',UsuarioController::class)->names('admin.usuarios');
Route::resource('avisos',AdviceController::class)->names('admin.avisos');

//Bitacora limpiar y descargar bitácora
Route::get('limpiarbitacora', [ActionController::class, 'limpiarBitacora'])->name('limpiarbitacora');

//Guardar foto adviceimage

Route::post('adviceimage', [AdviceController::class, 'adviceimage']);
//Route::put('update/{id}', [UserController::class, 'update'])->name('admin.advice.update');

//Ruta para  actualizar el usuario
Route::post('updateuser', [UsuarioController::class, 'updateuser'])->name('admin.updateuser');

//ruta para registrar la tabla de importacion registrarantecedentesusuario1
Route::get('registrarimport', [AntecedenteController::class, 'registrarimport'])->name('registrarimport');
Route::get('registrarantecedentesusuario1', [AntecedenteController::class, 'registrarantecedentesusuario1'])->name('admin.registrarantecedentesusuario1');
Route::post('deleterecord/{tiporegistro}', [AntecedenteController::class, 'deleterecordall'])->name('deleterecord');
//Ajax datatables antecedentes
//Route::get('tableantecedentes', [HomeController::class, 'tbtljsonantecedentes']);
Route::get('tableantecedentes', [App\Http\Controllers\HomeController::class, 'tbtljsonantecedentes'])->name('tableantecedentes');
Route::get('import', [App\Http\Controllers\Admin\AntecedenteController::class, 'import']);
//user ajax
Route::get('usu', [UsuarioController::class, 'index'])->name('usu');
Route::get('usuarios/delete/{id}', [UsuarioController::class, 'destroy']);
//filtro por año
Route::post('filterbyyear', [App\Http\Controllers\Admin\AntecedenteController::class, 'filterbyYear'])->name('filterbyyear');
Route::post('filterbydate', [App\Http\Controllers\Admin\AntecedenteController::class, 'filterbydate'])->name('filterbydate');
Route::get('filterall', [App\Http\Controllers\Admin\AntecedenteController::class, 'filterall'])->name('filterall');
Route::get('filterultimateimport', [App\Http\Controllers\Admin\AntecedenteController::class, 'filterultimateimport'])->name('filterultimateimport');
Route::get('deleteallantecedents', [App\Http\Controllers\Admin\AntecedenteController::class, 'deleteallantecedents'])->name('deleteallantecedents');

Route::get('antecedentestable', [App\Http\Controllers\Admin\AntecedenteController::class, 'index'])->name('antecedentestable');
Route::get('eliminarecord', [App\Http\Controllers\Admin\AntecedenteController::class, 'eliminarecord'])->name('eliminarecord');
Route::post('deleter/{id}', [AntecedenteController::class, 'deleter']);
//Ver record
Route::get('{id}/ver', [AntecedenteController::class, 'ver'])->name('ver');
//profile admin.password
Route::get('profile', [UserController::class, 'profile'])->name('admin.profile');
Route::get('password', [UserController::class, 'resetpass'])->name('admin.password');

//Route::get('/profile', [UserController::class, 'resetpass'])->name('admin.profile');
Route::get('change-password', [ChangePasswordController::class, 'index'])->name('admin.password');
Route::post('change-password', [ChangePasswordController::class, 'store'])->name('change.password');
// buscar
Route::get('search', [HomeController::class, 'search'])->name('admin.search');
Route::get('resultadobusqueda', [HomeController::class, 'resultadobusqueda'])->name('admin.resultado');
//Charts
Route::get('chart-line',  [AntecedeteChart::class, 'chartLine'])->name('admin.chart');
Route::get('chart-line-ajax', [AntecedeteChart::class, 'chartLineAjax'])->name('admin.chart_ajax');
//Route::get('charts','ChartController@index');
Route::post('chart', [HomeController::class, 'fetch_data'])->name('admin.chart');