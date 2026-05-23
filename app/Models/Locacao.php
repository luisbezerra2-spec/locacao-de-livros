<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locacao extends Model
{
    /** @use HasFactory<\Database\Factories\LocacaoFactory> */
    use HasFactory;
    protected $table = 'locacoes';

    protected $fillable = [
        'leitor_id',
        'livro_id',
        'data_retirada',
        'data_devolucao',
    ];

    // Uma locação pertence a um leitor específico
    public function leitor()
    {
        return $this->belongsTo(Leitor::class);
    }

    // Uma locação pertence a um livro específico
    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }
}
