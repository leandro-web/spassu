<?php

namespace Tests\Feature;

use App\Models\Autor;
use App\Models\Assunto;
use App\Models\Livro;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LivroEndpointsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
    }

    /** @test */
    public function index_deve_responder_ok()
    {
        $response = $this->get(route('livros.index'));
        $response->assertOk();
    }

    /** @test */
    public function store_deve_criar_livro_com_autores_e_assuntos()
    {
        $autor1 = Autor::factory()->create();
        $autor2 = Autor::factory()->create();
        $assunto1 = Assunto::factory()->create();
        $assunto2 = Assunto::factory()->create();

        $payload = [
            'Titulo'        => 'Livro Teste',
            'Editora'       => 'Editora XPTO',
            'Edicao'        => 2,
            'AnoPublicacao' => 2024,
            'Valor'         => '123.45',
            'autores'       => [$autor1->CodAu, $autor2->CodAu],
            'assuntos'      => [$assunto1->CodAs, $assunto2->CodAs],
        ];

        $response = $this->post(route('livros.store'), $payload);

        $response->assertRedirect(route('livros.index'));
        $this->assertDatabaseHas('Livro', ['Titulo' => 'Livro Teste']);
        $this->assertDatabaseHas('Livro_Autor', ['Autor_CodAu' => $autor1->CodAu]);
        $this->assertDatabaseHas('Livro_Autor', ['Autor_CodAu' => $autor2->CodAu]);
        $this->assertDatabaseHas('Livro_Assunto', ['Assunto_CodAs' => $assunto1->CodAs]);
        $this->assertDatabaseHas('Livro_Assunto', ['Assunto_CodAs' => $assunto2->CodAs]);
    }

    /** @test */
    public function validacao_deve_falhar_sem_titulo_e_sem_autores_assuntos()
    {
        $response = $this->post(route('livros.store'), [
            'Titulo'        => '',
            'Editora'       => 'Editora',
            'Edicao'        => 1,
            'AnoPublicacao' => 2023,
            'Valor'         => '10.00',
            // sem autores/assuntos
        ]);

        $response->assertSessionHasErrors(['Titulo', 'autores', 'assuntos']);
    }

    /** @test */
    public function update_deve_atualizar_livro_e_sincronizar_relacionamentos()
    {
        $livro = Livro::factory()->create(['Titulo' => 'Antigo']);
        $autor = Autor::factory()->create();
        $assunto = Assunto::factory()->create();

        $payload = [
            'Titulo'        => 'Novo',
            'Editora'       => 'Editora Nova',
            'Edicao'        => 3,
            'AnoPublicacao' => 2025,
            'Valor'         => '250.00',
            'autores'       => [$autor->CodAu],
            'assuntos'      => [$assunto->CodAs],
        ];

        $response = $this->put(route('livros.update', $livro->Codl), $payload);

        $response->assertRedirect(route('livros.index'));
        $this->assertDatabaseHas('Livro', ['Codl' => $livro->Codl, 'Titulo' => 'Novo']);
        $this->assertDatabaseHas('Livro_Autor', [
            'Livro_Codl' => $livro->Codl, 'Autor_CodAu' => $autor->CodAu
        ]);
        $this->assertDatabaseHas('Livro_Assunto', [
            'Livro_Codl' => $livro->Codl, 'Assunto_CodAs' => $assunto->CodAs
        ]);
    }

    /** @test */
    public function destroy_deve_excluir_livro()
    {
        $livro = Livro::factory()->create();

        $response = $this->delete(route('livros.destroy', $livro->Codl));

        $response->assertRedirect(route('livros.index'));
        $this->assertDatabaseMissing('Livro', ['Codl' => $livro->Codl]);
    }
}
