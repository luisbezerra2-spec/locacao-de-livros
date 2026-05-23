<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('locacoes', function (Blueprint $table) {
            $table->id();
            
            // Chaves Estrangeiras usando o padrão do Laravel (foreignId)
            $table->foreignId('leitor_id')->constrained('leitores')->onDelete('cascade');
            $table->foreignId('livro_id')->constrained('livros')->onDelete('cascade');
            
            $table->date('data_retirada');
            $table->date('data_devolucao')->nullable(); // Pode ser nulo até que o livro seja devolvido
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locacoes');
    }
};
