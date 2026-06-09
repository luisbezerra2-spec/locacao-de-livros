<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Livro;
use App\Models\Locacao;
use App\Models\Leitor;

class LocacaoController extends Controller
{

    public function mostrarLocacao()
    {
        $locacoes = Locacao::with(['livro', 'leitor'])->whereNull('data_devolucao')->get();

        return Inertia::render('Locacao/ListarLocacao', ['locacoes' => $locacoes]);
    }

    public function cadastrarLocacao()
    {
        $livros = Livro::where('status', 'Disponível')->get();

        $leitores = Leitor::all();

        return Inertia::render(
            'Locacao/CadastrarLocacao',
            ['livros' => $livros, 'leitores' => $leitores]
        );
    }

    public function salvarLocacao(Request $request)
    {
        $dadosValidados = $request->validate([
            'leitor_id' => 'required',
            'livro_id' => 'required',
        ]);

        // Recuperar livro
        $livro = Livro::findOrFail($dadosValidados['livro_id']);

        // Verificar disponibilidade REAL
        if ($livro->status !== 'Disponível') {

            return redirect()
                ->route('cadastrarLocacao')
                ->with('error', 'Livro indisponível.');
        }

        // Criar locação
        $locacao = Locacao::create([
            'leitor_id' => $request->leitor_id,
            'livro_id' => $request->livro_id,
            'data_retirada' => now(),
            'data_devolucao' => null
        ]);
        // Atualizar status do livro
        $livro->status = 'Alugado';
        $livro->save();
        
        return redirect()
            ->route('listarLocacao')
            ->with('success', 'Locação cadastrada com sucesso!');
    }

    public function finalizarLocacao($id)
    {
        // Recuperar locação
        $locacao = Locacao::findOrFail($id);

        // Recuperar livro relacionado
        $livro = $locacao->livro;

        // Registrar devolução
        $locacao->data_devolucao = now();
        $locacao->save();

        // Atualizar status livro
        $livro->status = 'Disponível';
        $livro->save();

        return redirect()
            ->route('listarLocacao')
            ->with('success', 'Locação finalizada com sucesso!');
    }
}
