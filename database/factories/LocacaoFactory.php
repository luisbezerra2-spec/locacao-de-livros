<?php

namespace Database\Factories;

use App\Models\Locacao;
use App\Models\Livro;
use App\Models\Leitor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Locacao>
 */
class LocacaoFactory extends Factory
{
    public function definition(): array
    {
        return [

            'livro_id' => Livro::factory(),

            'leitor_id' => Leitor::factory(),

            'data_retirada' => now(),

            'data_devolucao' => null

        ];
    }
}
