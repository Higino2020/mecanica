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
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->string('matricula');
            $table->string('tipo');
            $table->string('cilindrada');
            $table->float('peso',9,2);
            $table->integer('lotacao')->nullable();
            $table->integer('numero_chaci')->nullable();
            $table->foreignId('motorista_id')->constrained('motoristas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veiculos');
    }
};
