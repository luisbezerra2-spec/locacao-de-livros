<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\Disciplina;

class DisciplinaController extends Controller
{
    public function cadastrarDisciplina()
    {
        $consulta = Docente::all();

        return view('cadastrarDisciplina',['consulta'  => $consulta]);
    }

    public function salvarDisciplina(Request $request)
    {
        $disciplina = new Disciplina();

        $disciplina->nome = $request->nome;
        $disciplina->carga_horaria = $request->carga_horaria;
        $disciplina->periodo = $request->periodo;
        $disciplina->docente_id = $request->docente_id;
        $disciplina->save();

        return redirect('/cadastrarDisciplina');
    }
}
