<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Compte_courant;

class Compte_courantApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_compte_courant()
    {
        $compteCourant = factory(Compte_courant::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/compte_courants', $compteCourant
        );

        $this->assertApiResponse($compteCourant);
    }

    /**
     * @test
     */
    public function test_read_compte_courant()
    {
        $compteCourant = factory(Compte_courant::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/compte_courants/'.$compteCourant->id
        );

        $this->assertApiResponse($compteCourant->toArray());
    }

    /**
     * @test
     */
    public function test_update_compte_courant()
    {
        $compteCourant = factory(Compte_courant::class)->create();
        $editedCompte_courant = factory(Compte_courant::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/compte_courants/'.$compteCourant->id,
            $editedCompte_courant
        );

        $this->assertApiResponse($editedCompte_courant);
    }

    /**
     * @test
     */
    public function test_delete_compte_courant()
    {
        $compteCourant = factory(Compte_courant::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/compte_courants/'.$compteCourant->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/compte_courants/'.$compteCourant->id
        );

        $this->response->assertStatus(404);
    }
}
