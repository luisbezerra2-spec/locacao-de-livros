<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LeitorController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\LocacaoController;
use App\Http\Controllers\PrincipalController;

Route::get('/', [PrincipalController::class, 'index'])->name('dashboard');
Route::get('/relatorio', [PrincipalController::class, 'relatorio'])->name('relatorio');

Route::get('cadastrarLivro', [LivroController::class, 'cadastrarLivro'])->name('cadastrarLivro');
Route::post('salvarLivro', [LivroController::class, 'salvarLivro'])->name('salvarLivro');
Route::get('listarLivro', [LivroController::class, 'mostrarLivro'])->name('listarLivro');
Route::get('editarLivro/{id}', [LivroController::class, 'editarLivro'])->name('editarLivro');
Route::put('atualizarLivro/{id}', [LivroController::class, 'atualizarLivro'])->name('atualizarLivro');
Route::delete('deletarLivro/{id}', [LivroController::class, 'deletarLivro'])->name('deletarLivro');

Route::get('cadastrarLeitor', [LeitorController::class, 'cadastrarLeitor'])->name('cadastrarLeitor');
Route::post('salvarLeitor', [LeitorController::class, 'salvarLeitor'])->name('salvarLeitor');
Route::get('listarLeitor', [LeitorController::class, 'mostrarLeitor'])->name('listarLeitor');
Route::get('editarLeitor/{id}', [LeitorController::class, 'editarLeitor'])->name('editarLeitor');
Route::put('atualizarLeitor/{id}', [LeitorController::class, 'atualizarLeitor'])->name('atualizarLeitor');
Route::delete('deletarLeitor/{id}', [LeitorController::class, 'deletarLeitor'])->name('deletarLeitor');
Route::get('historicoLeitor/{id}', [LeitorController::class, 'historicoLeitor'])->name('historicoLeitor');

Route::get('cadastrarLocacao', [LocacaoController::class, 'cadastrarLocacao'])->name('cadastrarLocacao');
Route::post('salvarLocacao', [LocacaoController::class, 'salvarLocacao'])->name('salvarLocacao');
Route::get('listarLocacao', [LocacaoController::class, 'mostrarLocacao'])->name('listarLocacao');
Route::delete('finalizarLocacao/{id}', [LocacaoController::class, 'finalizarLocacao'])->name('finalizarLocacao');

Route::get('livrosPorLeitor', [RelatorioController::class, 'livrosPorLeitor'])->name('livrosPorLeitor');

