<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeitorController extends Controller
{
    public function cadastrarLeitor(){
        return view("cadastrarLeitor");
    }
}
