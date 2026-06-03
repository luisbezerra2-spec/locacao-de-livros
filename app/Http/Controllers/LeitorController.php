<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leitor;

class LeitorController extends Controller
{
    public function cadastrarLeitor(){
        return view("leitor/cadastrarLeitor");
    }

    public function salvarLeitor(Request $request){
        
        $leitor = new Leitor();
        $leitor->nome = $request->nome;
        $leitor->documento = $request->documento;
        $leitor->endereco = $request->endereco;
        $leitor->save();

        return redirect('cadastrarLeitor')->with('success', 'Leitor cadastrado com sucesso!');
    }

    public function mostrarLeitor(){
        $leitores = Leitor::all();
        return view('leitor/listarLeitor', compact('leitores'));
    }
}
