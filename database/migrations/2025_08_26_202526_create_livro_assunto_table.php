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
        Schema::create('Livro_Assunto', function (Blueprint $table) {
            $table->unsignedBigInteger('Livro_Codl');
            $table->unsignedBigInteger('Assunto_CodAs');
            $table->timestamps();

            $table->foreign('Livro_Codl')->references('Codl')->on('Livro')
                ->cascadeOnDelete();

            $table->foreign('Assunto_CodAs')->references('CodAs')->on('Assunto')
                ->cascadeOnDelete();

            $table->primary(['Livro_Codl','Assunto_CodAs']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Livro_Assunto');
    }
};
