<?php

namespace Database\Factories;

use App\Models\Livro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Livro>
 */

class LivroFactory extends Factory
{
    public function definition(): array
    {
        return [

            'titulo' => fake()->sentence(3),

            'autor' => fake()->name(),

            'categoria' => fake()->randomElement([
                'Tecnologia',
                'Ficção',
                'Romance',
                'História'
            ]),

            'status' => 'Disponível'

        ];
    }

}
