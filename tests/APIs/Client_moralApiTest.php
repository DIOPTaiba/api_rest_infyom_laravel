<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Client_moral;

class Client_moralApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_client_moral()
    {
        $clientMoral = factory(Client_moral::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/client_morals', $clientMoral
        );

        $this->assertApiResponse($clientMoral);
    }

    /**
     * @test
     */
    public function test_read_client_moral()
    {
        $clientMoral = factory(Client_moral::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/client_morals/'.$clientMoral->id
        );

        $this->assertApiResponse($clientMoral->toArray());
    }

    /**
     * @test
     */
    public function test_update_client_moral()
    {
        $clientMoral = factory(Client_moral::class)->create();
        $editedClient_moral = factory(Client_moral::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/client_morals/'.$clientMoral->id,
            $editedClient_moral
        );

        $this->assertApiResponse($editedClient_moral);
    }

    /**
     * @test
     */
    public function test_delete_client_moral()
    {
        $clientMoral = factory(Client_moral::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/client_morals/'.$clientMoral->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/client_morals/'.$clientMoral->id
        );

        $this->response->assertStatus(404);
    }
}
