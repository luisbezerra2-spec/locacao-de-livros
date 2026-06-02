<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Livro;

class LivroController extends Controller
{
    // Mostra o 'Form' em 'cadastrarLivro.blade.php'
    public function cadastrarLivro()
    {
        return view('cadastrarLivro');
    }

    // Colocado no 'Action' do 'Form' de 'cadastrarLivro' - retorna para pagina de cadastro.
    public function salvarLivro(Request $request)
    {
        $livro = new Livro();
        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->categoria = $request->categoria;
        $livro->status = $request->status;
        $livro->save();

        return redirect('cadastrarLivro')->with('success', 'Livro cadastrado com sucesso!');
    }

    public function mostrarLivro(){
        $livros = Livro::all();
        return view('listarLivro', compact('livros'));
    }
}
