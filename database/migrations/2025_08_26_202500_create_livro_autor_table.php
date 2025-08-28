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
        Schema::create('Livro_Autor', function (Blueprint $table) {
            $table->unsignedBigInteger('Livro_Codl');
            $table->unsignedBigInteger('Autor_CodAu');
            $table->timestamps();

            $table->foreign('Livro_Codl')->references('Codl')->on('Livro')
                ->cascadeOnDelete();

            $table->foreign('Autor_CodAu')->references('CodAu')->on('Autor')
                ->cascadeOnDelete();

            $table->primary(['Livro_Codl','Autor_CodAu']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Livro_Autor');
    }
};
