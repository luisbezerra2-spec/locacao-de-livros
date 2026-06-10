<?php

namespace App\Http\Controllers;
use App\Models\Leitor;
use Inertia\Inertia;


class RelatorioController extends Controller
{
    public function livrosPorLeitor($id)
    {
        //leitores -> locacoes -> livro
        $leitor = Leitor::with(['locacoes.livro'])->findOrfail($id);

        //livros cadastrados por leitor;
        return Inertia::render('Relatorio/LivroPorLeitor', ['leitor' => $leitor]);
    }
}
