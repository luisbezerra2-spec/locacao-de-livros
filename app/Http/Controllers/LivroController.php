<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Livro;

class LivroController extends Controller
{
    //
    public function cadastrarLivro()
    {
        return view('cadastrarLivro');
    }

    public function salvarLivro(Request $request)
    {
        $livro = new Livro();
        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->categoria = $request->caregoria;
        $livro->status = $request->status;
        $livro->save();

        return redirect('/cadastrarLivro')->with('success', 'Livro cadastrado com sucesso!');
    }
}
