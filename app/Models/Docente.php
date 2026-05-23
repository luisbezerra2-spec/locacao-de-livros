<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
     protected $fillable = ['nome','email','departamento'];

    public function disciplina() {

	    return $this->hasMany(Disciplina::class);
        
    }
}
