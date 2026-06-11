<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Livro;
use App\Models\Leitor;
use App\Models\Locacao;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Livro::factory(40)->create();

        Leitor::factory(20)->create();

        $livros = Livro::all();

        foreach ($livros->take(15) as $livro) {

            Locacao::create([

                'livro_id' => $livro->id,

                'leitor_id' => Leitor::inRandomOrder()->first()->id,

                'data_retirada' => fake()->dateTimeBetween('-6 months', 'now'),

                'data_devolucao' => null

            ]);

            $livro->update([
                'status' => 'Alugado'
            ]);
        }
    }
}
