<?php
namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Livro;
use App\Models\Leitor;
use App\Models\Locacao;
use Illuminate\Support\Facades\DB;
class PrincipalController extends Controller
{

    // relatorio: total de livros, leitores cadastrados, locações ativas
public function index()
{
    $totalLivros = Livro::count();
    $totalLeitores = Leitor::count();
    $locacoesAtivas = Locacao::whereNull('data_devolucao')->count();

    $locacoesPorMes = Locacao::select(
        DB::raw('MONTH(data_retirada) as mes'),
        DB::raw('COUNT(*) as total')
    )
    ->whereYear('data_retirada', now()->year)
    ->groupBy('mes')
    ->orderBy('mes')
    ->get();

    return Inertia::render('Dashboard', [
        'totalLivros' => $totalLivros,
        'totalLeitores' => $totalLeitores,
        'locacoesAtivas' => $locacoesAtivas,
        'locacoesPorMes' => $locacoesPorMes
    ]);
}
}