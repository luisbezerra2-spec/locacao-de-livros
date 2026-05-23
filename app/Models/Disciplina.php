<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $fillable = ['nome','carga_horaria','periodo','docente_id'];

    public function docente() {

	    return $this->belongsTo(Docente::class);
        
    }
}
