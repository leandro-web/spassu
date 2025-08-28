<?php

namespace Tests\Feature;

use App\Models\Autor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AutorEndpointsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // desabilita somente CSRF para os testes
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
    }

    /** @test */
    public function index_deve_responder_ok()
    {
        $response = $this->get(route('autores.index'));
        $response->assertOk();
    }

    /** @test */
    public function store_deve_criar_autor_e_redirecionar()
    {
        $response = $this->post(route('autores.store'), [
            'Nome' => 'Machado de Assis',
        ]);

        $response->assertRedirect(route('autores.index'));
        $this->assertDatabaseHas('Autor', ['Nome' => 'Machado de Assis']);
    }

    /** @test */
    public function validacao_deve_falhar_sem_nome()
    {
        $response = $this->post(route('autores.store'), [
            'Nome' => '',
        ]);

        $response->assertSessionHasErrors(['Nome']);
    }

    /** @test */
    public function update_deve_atualizar_autor()
    {
        $autor = Autor::factory()->create(['Nome' => 'Antigo']);

        $response = $this->put(route('autores.update', $autor->CodAu), [
            'Nome' => 'Novo Nome',
        ]);

        $response->assertRedirect(route('autores.index'));
        $this->assertDatabaseHas('Autor', ['CodAu' => $autor->CodAu, 'Nome' => 'Novo Nome']);
    }

    /** @test */
    public function destroy_deve_excluir_autor()
    {
        $autor = Autor::factory()->create();

        $response = $this->delete(route('autores.destroy', $autor->CodAu));

        $response->assertRedirect(route('autores.index'));
        $this->assertDatabaseMissing('Autor', ['CodAu' => $autor->CodAu]);
    }
}
