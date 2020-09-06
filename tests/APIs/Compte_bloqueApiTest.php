<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Compte_bloque;

class Compte_bloqueApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_compte_bloque()
    {
        $compteBloque = factory(Compte_bloque::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/compte_bloques', $compteBloque
        );

        $this->assertApiResponse($compteBloque);
    }

    /**
     * @test
     */
    public function test_read_compte_bloque()
    {
        $compteBloque = factory(Compte_bloque::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/compte_bloques/'.$compteBloque->id
        );

        $this->assertApiResponse($compteBloque->toArray());
    }

    /**
     * @test
     */
    public function test_update_compte_bloque()
    {
        $compteBloque = factory(Compte_bloque::class)->create();
        $editedCompte_bloque = factory(Compte_bloque::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/compte_bloques/'.$compteBloque->id,
            $editedCompte_bloque
        );

        $this->assertApiResponse($editedCompte_bloque);
    }

    /**
     * @test
     */
    public function test_delete_compte_bloque()
    {
        $compteBloque = factory(Compte_bloque::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/compte_bloques/'.$compteBloque->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/compte_bloques/'.$compteBloque->id
        );

        $this->response->assertStatus(404);
    }
}
