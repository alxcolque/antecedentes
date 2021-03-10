<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AntecedenteController;

Route::get('',[AntecedenteController::class, 'index']);
Route::resource('antecedentes',AntecedenteController::class)->names('admin.antecedentes');