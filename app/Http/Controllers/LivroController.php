<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Livro;

class LivroController extends Controller
{
    // Mostra o 'Form' em 'cadastrarLivro.blade.php'
    public function cadastrarLivro()
    {
        return Inertia::render('Livro/CadastrarLivro');
    }

    // Colocado no 'Action' do 'Form' de 'cadastrarLivro' - retorna para pagina de cadastro.
    public function salvarLivro(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'categoria' => 'required',
            'status' => 'required'
        ]);

        $livro = new Livro();

        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->categoria = $request->categoria;
        $livro->status = $request->status;

        $livro->save();

        return redirect()->route('listarLivro')->with('success', 'Livro cadastrado com sucesso!');
    }

    public function mostrarLivro()
    {
        $livros = Livro::all();

        return Inertia::render('Livro/ListarLivro', ['livros' => $livros]);
    }

    public function editarLivro($id)
    {
        $livro = Livro::findOrFail($id);

        return Inertia::render('Livro/EditarLivro', ['livro' => $livro]);
    }

    public function atualizarLivro(Request $request, $id)
    {
        $dadosValidados = $request
        ->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'categoria' => 'required',
            'status' => 'required'
        ]);

        $livro = Livro::findOrFail($id);

        $livro->update($dadosValidados);

        return redirect()
            ->route('listarLivro')
            ->with('success', 'Livro cadastrado com sucesso!');
    }

    public function deletarLivro($id)
    {
        $livro = Livro::findOrFail($id);

        if ($livro->locacoes()->exists()) {
            return redirect()
                ->route('listarLivro')
                ->with('error', 'Livro possui histórico de locações');
        }

        $livro->delete();

        return redirect()
            ->route('listarLivro')
            ->with('erro', 'Livro excluído com sucesso!');
    }
}
