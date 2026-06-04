<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DocenteController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\RelatorioController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Dashboard');
});

Route::get('cadastrar',[DocenteController::class, 'cadastrarDocente'])->name('cadastrarDocente');
Route::post('salvar',[DocenteController::class, 'salvarDocente'])->name('salvarDocente');
Route::get('cadastrarDisciplina',[DisciplinaController::class, 'cadastrarDisciplina'])->name('cadastrarDisciplina');
Route::post('salvarDisciplina',[DisciplinaController::class, 'salvarDisciplina'])->name('salvarDisciplina');

Route::get('verRelatorio',[RelatorioController::class, 'verRelatorio'])->name('verRelatorio');

