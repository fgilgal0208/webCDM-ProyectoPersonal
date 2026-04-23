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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('categoria')->default('Club'); // Ej: Crónica, Club, Fichajes
            $table->text('extracto'); // El texto cortito de la tarjeta
            $table->longText('cuerpo'); // La noticia entera
            $table->string('imagen_path')->nullable(); // La foto de la noticia
            $table->date('fecha_publicacion');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
