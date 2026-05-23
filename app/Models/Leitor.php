<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leitor extends Model
{
    /** @use HasFactory<\Database\Factories\LeitorFactory> */
    use HasFactory;

    protected $table = 'leitores';

    protected $fillable = [
        'nome',
        'documento',
        'endereco',
    ];

    // Um leitor pode fazer várias locações
    public function locacoes()
    {
        return $this->hasMany(Locacao::class);
    }
}
