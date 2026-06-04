<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LeitorController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\PrincipalController;

Route::get('/', [PrincipalController::class, 'index'])->name('principal');

Route::get('cadastrarLivro', [LivroController::class, 'cadastrarLivro'])->name('cadastrarLivro');
Route::post('salvarLivro', [LivroController::class, 'salvarLivro'])->name('salvarLivro');
Route::get('listarLivro', [LivroController::class, 'mostrarLivro'])->name('listarLivro');

Route::get('cadastrarLeitor', [LeitorController::class, 'cadastrarLeitor'])->name('cadastrarLeitor');
Route::post('salvarLeitor', [LeitorController::class, 'salvarLeitor'])->name('salvarLeitor');
Route::get('listarLeitor', [LeitorController::class, 'mostrarLeitor'])->name('listarLeitor');

Route::get('verRelatorio',[RelatorioController::class, 'verRelatorio'])->name('verRelatorio');

