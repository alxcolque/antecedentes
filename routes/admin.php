<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AntecedenteController;
use App\Http\Controllers\Admin\DetectiveController;

Route::get('',[AntecedenteController::class, 'index']);
//Route::get('',[AntecedenteController::class, 'admin.import']);
Route::get('import', [AntecedenteController::class, 'import']);
Route::post('import', [AntecedenteController::class, 'importExcel'])->name('file-import');
//Route::get('file-export', [UserController::class, 'fileExport'])->name('file-export');
Route::resource('antecedentes',AntecedenteController::class)->names('admin.antecedentes');
Route::resource('detectives',DetectiveController::class)->names('admin.detectives');
//ruta para registrar la tabla de importacion
Route::get('registrarimport', [AntecedenteController::class, 'registrarimport']);