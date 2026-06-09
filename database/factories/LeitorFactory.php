<?php

namespace Database\Factories;

use App\Models\Leitor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Leitor>
 */
class LeitorFactory extends Factory
{
    public function definition(): array
    {
        return [

            'nome' => fake()->name(),

            'documento' => fake()->numerify('###########'),

            'endereco' => fake()->address()

        ];
    }
}

