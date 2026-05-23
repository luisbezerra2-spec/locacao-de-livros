<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    /** @use HasFactory<\Database\Factories\LivroFactory> */
    use HasFactory;
    
    // Define que este model aponta para a tabela 'livros' (plural em português)
    protected $table = 'livros';

    protected $fillable = [
        'titulo',
        'autor',
        'categoria',
        'status',
    ];

    // Um livro pode ter várias locações ao longo do tempo
    public function locacoes()
    {
        return $this->hasMany(Locacao::class);
    }
}
