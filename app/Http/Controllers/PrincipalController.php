<?php
namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Livro;
use App\Models\Leitor;
use App\Models\Locacao;

class PrincipalController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard');
    }

    // relatorio: total de livros, leitores cadastrados, locações ativas
    public function relatorio()
    {
        $totalLivros = Livro::count();
        $totalLeitores = Leitor::count();
        $locacoesAtivas = Locacao::whereNull('data_devolucao')->count();

        return Inertia::render('Dashboard', [
            'totalLivros' => $totalLivros,
            'totalLeitores' => $totalLeitores,
            'locacoesAtivas' => $locacoesAtivas
        ]);
    }
}