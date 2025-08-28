<?php

namespace Tests\Feature;

use App\Models\Autor;
use App\Models\Assunto;
use App\Models\Livro;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RelatorioPdfTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
    }

    /** @test */
    public function relatorio_pdf_deve_responder_ok_e_ser_pdf()
    {
        // prepara dados para a VIEW do relatório
        $livro = Livro::factory()->create();
        $autor = Autor::factory()->create();
        $assunto = Assunto::factory()->create();

        $livro->autores()->attach($autor->CodAu);
        $livro->assuntos()->attach($assunto->CodAs);

        $response = $this->get(route('relatorios.livros'));

        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/pdf');
        // dica extra (opcional): checar assinatura PDF no corpo
        // $this->assertTrue(str_starts_with($response->getContent(), '%PDF'));
    }
}
