<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class LocacaoController extends Controller
{
    // Antes de criar a locacao, verificar o status de livro - se nao estiver disponivel, retornar erro e, ao criar a locação, mudar status para alugado. Ao finalizar a locação, mudar status para disponivel.
    public function cadastrarLocacao()
    {
        return view('locacao/cadastrarLocacao');
    }

    public function salvarLocacao(Request $request)
    {
        // Recuperar o livro selecionado para locação
        $livro = Livro::find($request->livro_id);

        // Verificar Status do Livro - Se não estiver disponível, retornar erro
        if ($request->livro_status !== 'disponivel') {
            return redirect('cadastrarLocacao')->with('error', 'O livro selecionado não está disponível para locação.');
        }

        // Mudar o status do livro para "alugado" e salvar a locação
        $livro->status = 'alugado';
        $livro->save();

        return redirect('cadastrarLocacao')->with('success', 'Locação cadastrada com sucesso!');
    }

    // ao devolver o livro, mudar status para disponivel
    public function finalizarLocacao(Request $request)
    {
        // Recuperar o livro selecionado para devolução
        $livro = Livro::find($request->livro_id);

        // Mudar o status do livro para "disponível" e salvar a devolução
        $livro->status = 'disponivel';
        $livro->save();

        return redirect('cadastrarLocacao')->with('success', 'Locação finalizada com sucesso!');
    }
}
