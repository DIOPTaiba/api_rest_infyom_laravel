<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Etat_compte;

class Etat_compteApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_etat_compte()
    {
        $etatCompte = factory(Etat_compte::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/etat_comptes', $etatCompte
        );

        $this->assertApiResponse($etatCompte);
    }

    /**
     * @test
     */
    public function test_read_etat_compte()
    {
        $etatCompte = factory(Etat_compte::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/etat_comptes/'.$etatCompte->id
        );

        $this->assertApiResponse($etatCompte->toArray());
    }

    /**
     * @test
     */
    public function test_update_etat_compte()
    {
        $etatCompte = factory(Etat_compte::class)->create();
        $editedEtat_compte = factory(Etat_compte::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/etat_comptes/'.$etatCompte->id,
            $editedEtat_compte
        );

        $this->assertApiResponse($editedEtat_compte);
    }

    /**
     * @test
     */
    public function test_delete_etat_compte()
    {
        $etatCompte = factory(Etat_compte::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/etat_comptes/'.$etatCompte->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/etat_comptes/'.$etatCompte->id
        );

        $this->response->assertStatus(404);
    }
}
