<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Docente;

class DocenteController extends Controller
{
   public function cadastrarDocente()
   {
        return view('cadastrarDocente');
   }

   public function salvarDocente(Request $request)
   {
      $docente = new Docente();
      $docente->nome = $request->nome;
      $docente->email = $request->email;
      $docente->departamento = $request->departamento;
      $docente->save();

      return redirect('/cadastrar');

      
   }
}
