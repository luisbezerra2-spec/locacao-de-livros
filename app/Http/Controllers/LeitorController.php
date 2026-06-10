<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leitor;
use Inertia\Inertia;

class LeitorController extends Controller
{
    public function cadastrarLeitor()
    {
        return Inertia::render('Leitor/CadastrarLeitor');
    }

    public function salvarLeitor(Request $request)
    {
        $request->validate([
            'nome'      => 'required',
            'documento' => 'required',
            'endereco'  => 'required'
        ]);

        $leitor = new Leitor();
        $leitor->nome = $request->nome;
        $leitor->documento = $request->documento;
        $leitor->endereco = $request->endereco;

        $leitor->save();

        return redirect()->route('listarLeitor')->with('success', 'Leitor cadastrado com sucesso!');
    }

    public function mostrarLeitor()
    {
        $leitores = Leitor::all();

        return Inertia::render('Leitor/ListarLeitor', ['leitores' => $leitores]);
    }

    public function editarLeitor($id)
    {
        $leitor = Leitor::findOrFail($id);

        return Inertia::render('Leitor/EditarLeitor', ['leitor' => $leitor]);
    }

    public function atualizarLeitor(Request $request, $id)
    {
        $dadosValidados = $request
        ->validate([
            'nome'      => 'required',
            'documento' => 'required',
            'endereco'  => 'required'
        ]);

        $leitor = Leitor::findOrFail($id);

        $leitor->update($dadosValidados);

        return redirect()
            ->route('listarLeitor')
            ->with('success', 'Leitor atualizado com sucesso!');
    }

    public function deletarLeitor($id)
    {
        $leitor = Leitor::findOrFail($id);

        if ($leitor->locacoes()->exists()) {
            return redirect()
                ->route('listarLeitor')
                ->with('error', 'Leitor possui histórico de locações.');
        }

        $leitor->delete();

        return redirect()
            ->route('listarLeitor')
            ->with('success', 'Leitor excluído com sucesso!');
    }

    public function historicoLeitor($id)
    {
        $leitor = Leitor::with('locacoes.livro')->findOrFail($id);

        return Inertia::render('Leitor/HistoricoLeitor', ['leitor' => $leitor]);
    }
}
