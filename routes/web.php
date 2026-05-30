<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DocenteController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\RelatorioController;

Route::get('/', function () {
    return view('cadastrarDocente');
});

Route::get('cadastrar', [LivroController::class, 'cadastrarLivro'])->name('cadastrarLivro');
Route::post('salvarLivro', [LivroController::class, 'salvarLivro'])->name('salvarLivro');

// Route::get('cadastrar',[DocenteController::class, 'cadastrarDocente'])->name('cadastrarDocente');
Route::get('cadastrarDisciplina',[DisciplinaController::class, 'cadastrarDisciplina'])->name('cadastrarDisciplina');
Route::post('salvarDisciplina',[DisciplinaController::class, 'salvarDisciplina'])->name('salvarDisciplina');

Route::get('verRelatorio',[RelatorioController::class, 'verRelatorio'])->name('verRelatorio');

