<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Client_salarie;

class Client_salarieApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_client_salarie()
    {
        $clientSalarie = factory(Client_salarie::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/client_salaries', $clientSalarie
        );

        $this->assertApiResponse($clientSalarie);
    }

    /**
     * @test
     */
    public function test_read_client_salarie()
    {
        $clientSalarie = factory(Client_salarie::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/client_salaries/'.$clientSalarie->id
        );

        $this->assertApiResponse($clientSalarie->toArray());
    }

    /**
     * @test
     */
    public function test_update_client_salarie()
    {
        $clientSalarie = factory(Client_salarie::class)->create();
        $editedClient_salarie = factory(Client_salarie::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/client_salaries/'.$clientSalarie->id,
            $editedClient_salarie
        );

        $this->assertApiResponse($editedClient_salarie);
    }

    /**
     * @test
     */
    public function test_delete_client_salarie()
    {
        $clientSalarie = factory(Client_salarie::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/client_salaries/'.$clientSalarie->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/client_salaries/'.$clientSalarie->id
        );

        $this->response->assertStatus(404);
    }
}
