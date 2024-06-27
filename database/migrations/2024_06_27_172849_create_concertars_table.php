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
        Schema::create('concertars', function (Blueprint $table) {
            $table->id();
            $table->float('preco',9.2);
            $table->string('estado');
            $table->foreignId('veiculo_id')->constrained('veiculos')->onDelete('cascade');
            $table->foreignId('funcionario_id')->constrained('funcionarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concertars');
    }
};
