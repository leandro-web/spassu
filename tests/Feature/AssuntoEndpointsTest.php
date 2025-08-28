<?php

namespace Tests\Feature;

use App\Models\Assunto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AssuntoEndpointsTest extends TestCase
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
        $response = $this->get(route('assuntos.index'));
        $response->assertOk();
    }

    /** @test */
    public function store_deve_criar_assunto_e_redirecionar()
    {
        $response = $this->post(route('assuntos.store'), [
            'Descricao' => 'Tecnologia',
        ]);

        $response->assertRedirect(route('assuntos.index'));
        $this->assertDatabaseHas('Assunto', ['Descricao' => 'Tecnologia']);
    }

    /** @test */
    public function validacao_deve_falhar_sem_descricao()
    {
        $response = $this->post(route('assuntos.store'), [
            'Descricao' => '',
        ]);

        $response->assertSessionHasErrors(['Descricao']);
    }

    /** @test */
    public function update_deve_atualizar_assunto()
    {
        $assunto = Assunto::factory()->create(['Descricao' => 'Antiga']);

        $response = $this->put(route('assuntos.update', $assunto->CodAs), [
            'Descricao' => 'Nova',
        ]);

        $response->assertRedirect(route('assuntos.index'));
        $this->assertDatabaseHas('Assunto', ['CodAs' => $assunto->CodAs, 'Descricao' => 'Nova']);
    }

    /** @test */
    public function destroy_deve_excluir_assunto()
    {
        $assunto = Assunto::factory()->create();

        $response = $this->delete(route('assuntos.destroy', $assunto->CodAs));

        $response->assertRedirect(route('assuntos.index'));
        $this->assertDatabaseMissing('Assunto', ['CodAs' => $assunto->CodAs]);
    }
}
