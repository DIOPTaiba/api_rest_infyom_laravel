<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Responsable_compte;

class Responsable_compteApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_responsable_compte()
    {
        $responsableCompte = factory(Responsable_compte::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/responsable_comptes', $responsableCompte
        );

        $this->assertApiResponse($responsableCompte);
    }

    /**
     * @test
     */
    public function test_read_responsable_compte()
    {
        $responsableCompte = factory(Responsable_compte::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/responsable_comptes/'.$responsableCompte->id
        );

        $this->assertApiResponse($responsableCompte->toArray());
    }

    /**
     * @test
     */
    public function test_update_responsable_compte()
    {
        $responsableCompte = factory(Responsable_compte::class)->create();
        $editedResponsable_compte = factory(Responsable_compte::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/responsable_comptes/'.$responsableCompte->id,
            $editedResponsable_compte
        );

        $this->assertApiResponse($editedResponsable_compte);
    }

    /**
     * @test
     */
    public function test_delete_responsable_compte()
    {
        $responsableCompte = factory(Responsable_compte::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/responsable_comptes/'.$responsableCompte->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/responsable_comptes/'.$responsableCompte->id
        );

        $this->response->assertStatus(404);
    }
}
