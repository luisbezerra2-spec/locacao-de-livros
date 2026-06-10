<?php

namespace App\Http\Controllers;

use App\Models\Leitor;
use Inertia\Inertia;


class RelatorioController extends Controller
{

    public function livrosPorLeitor()
    {
        $leitores = Leitor::withCount('locacoes')
            ->with(['locacoes.livro'])
            ->get();

        return Inertia::render(
            'Relatorio/LivrosPorLeitor',
            [
                'leitores' => $leitores
            ]
        );
    }
}
