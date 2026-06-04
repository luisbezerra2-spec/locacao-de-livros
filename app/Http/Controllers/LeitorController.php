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

        $leitor = new Leitor();
        $leitor->nome = $request->nome;
        $leitor->documento = $request->documento;
        $leitor->endereco = $request->endereco;
        $leitor->save();

        return redirect('cadastrarLeitor')->with('success', 'Leitor cadastrado com sucesso!');
    }

    public function mostrarLeitor()
    {
        $leitores = Leitor::all();
        return Inertia::render('Leitor/ListarLeitor', [
            'leitores' => $leitores
        ]);
    }
}
