<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Compte_epargne;

class Compte_epargneApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_compte_epargne()
    {
        $compteEpargne = factory(Compte_epargne::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/compte_epargnes', $compteEpargne
        );

        $this->assertApiResponse($compteEpargne);
    }

    /**
     * @test
     */
    public function test_read_compte_epargne()
    {
        $compteEpargne = factory(Compte_epargne::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/compte_epargnes/'.$compteEpargne->id
        );

        $this->assertApiResponse($compteEpargne->toArray());
    }

    /**
     * @test
     */
    public function test_update_compte_epargne()
    {
        $compteEpargne = factory(Compte_epargne::class)->create();
        $editedCompte_epargne = factory(Compte_epargne::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/compte_epargnes/'.$compteEpargne->id,
            $editedCompte_epargne
        );

        $this->assertApiResponse($editedCompte_epargne);
    }

    /**
     * @test
     */
    public function test_delete_compte_epargne()
    {
        $compteEpargne = factory(Compte_epargne::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/compte_epargnes/'.$compteEpargne->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/compte_epargnes/'.$compteEpargne->id
        );

        $this->response->assertStatus(404);
    }
}
