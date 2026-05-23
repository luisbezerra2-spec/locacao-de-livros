<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\Disciplina;

class RelatorioController extends Controller
{
    public function verRelatorio()
    {

        $novaconsulta = Disciplina::with('Docente')->get();

        return view('verRelatorio',['consulta' => $novaconsulta]);
    }
}
