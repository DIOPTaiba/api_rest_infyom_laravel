<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Client_non_salarie;

class Client_non_salarieApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_client_non_salarie()
    {
        $clientNonSalarie = factory(Client_non_salarie::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/client_non_salaries', $clientNonSalarie
        );

        $this->assertApiResponse($clientNonSalarie);
    }

    /**
     * @test
     */
    public function test_read_client_non_salarie()
    {
        $clientNonSalarie = factory(Client_non_salarie::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/client_non_salaries/'.$clientNonSalarie->id
        );

        $this->assertApiResponse($clientNonSalarie->toArray());
    }

    /**
     * @test
     */
    public function test_update_client_non_salarie()
    {
        $clientNonSalarie = factory(Client_non_salarie::class)->create();
        $editedClient_non_salarie = factory(Client_non_salarie::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/client_non_salaries/'.$clientNonSalarie->id,
            $editedClient_non_salarie
        );

        $this->assertApiResponse($editedClient_non_salarie);
    }

    /**
     * @test
     */
    public function test_delete_client_non_salarie()
    {
        $clientNonSalarie = factory(Client_non_salarie::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/client_non_salaries/'.$clientNonSalarie->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/client_non_salaries/'.$clientNonSalarie->id
        );

        $this->response->assertStatus(404);
    }
}
