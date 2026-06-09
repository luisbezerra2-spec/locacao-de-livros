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
        // carregar relacionamentos
        $locacoes = Locacao::with(['livro', 'leitor'])->get();

        return Inertia::render('Locacao/ListarLocacao', ['locacoes' => $locacoes]);
    }

    // Antes de criar a locacao, verificar o status de livro - se nao estiver disponivel, retornar erro e, ao criar a locação, mudar status para alugado. Ao finalizar a locação, mudar status para disponivel.
    public function cadastrarLocacao()
    {
        $livros = Livro::where(
            'status',
            'disponivel'
        )->get();

        $leitores = Leitor::all();

        return Inertia::render(
            'Locacao/CadastrarLocacao',
            [
                'livros' => $livros,
                'leitores' => $leitores
            ]
        );
    }

    public function salvarLocacao(Request $request)
    {
        $dadosValidados = $request->validate([
            'livro_id' => 'required',
            'leitor_id' => 'required'
        ]);

        // Recuperar livro
        $livro = Livro::findOrFail($request->livro_id);

        // Verificar disponibilidade REAL
        if ($livro->status !== 'disponivel') {

            return redirect()
                ->route('cadastrarLocacao')
                ->with('error', 'Livro indisponível.');
        }

        // Criar locação
        Locacao::create([
            'livro_id' => $request->livro_id,
            'leitor_id' => $request->leitor_id,
            'data_retirada' => now(),
            'data_devolucao' => null
        ]);

        // Atualizar status do livro
        $livro->status = 'alugado';
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
        $livro->status = 'disponivel';
        $livro->save();

        return redirect()
            ->route('listarLocacao')
            ->with('success', 'Locação finalizada com sucesso!');
    }
}
