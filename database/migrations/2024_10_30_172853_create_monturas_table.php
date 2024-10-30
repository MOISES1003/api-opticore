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
        Schema::create('monturas', function (Blueprint $table) {
            $table->id('id_montura'); // PRIMARY KEY
            $table->integer('id_empresa'); // Relación con la empresa
            $table->text('serie'); // Campo para la serie
            $table->text('codigo'); // Campo para el código
            $table->integer('stock'); // Campo para el stock
            $table->timestamps(); // Campos created_at y updated_at

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monturas');
    }
};
