<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement("
            CREATE OR REPLACE VIEW vw_livros_por_autor AS
            SELECT
                a.CodAu   AS autor_id,
                a.Nome    AS autor_nome,
                l.Codl    AS livro_id,
                l.Titulo,
                l.Editora,
                l.Edicao,
                l.AnoPublicacao,
                l.Valor,
                GROUP_CONCAT(DISTINCT s.Descricao ORDER BY s.Descricao SEPARATOR ', ') AS assuntos
            FROM `Autor` a
            JOIN `Livro_Autor` la ON la.Autor_CodAu = a.CodAu
            JOIN `Livro` l ON l.Codl = la.Livro_Codl
            LEFT JOIN `Livro_Assunto` ls ON ls.Livro_Codl = l.Codl
            LEFT JOIN `Assunto` s ON s.CodAs = ls.Assunto_CodAs
            GROUP BY a.CodAu, a.Nome, l.Codl, l.Titulo, l.Editora, l.Edicao, l.AnoPublicacao, l.Valor
            ORDER BY a.Nome, l.Titulo;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS vw_livros_por_autor;");
    }
};
