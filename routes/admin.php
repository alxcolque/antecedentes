<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AntecedenteController;

Route::get('',[AntecedenteController::class, 'index']);
//Route::get('',[AntecedenteController::class, 'admin.import']);
Route::get('/import', [AntecedenteController::class, 'import']);
Route::resource('antecedentes',AntecedenteController::class)->names('admin.antecedentes');