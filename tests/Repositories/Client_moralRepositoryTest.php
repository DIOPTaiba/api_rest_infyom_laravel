<?php namespace Tests\Repositories;

use App\Models\Client_moral;
use App\Repositories\Client_moralRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class Client_moralRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var Client_moralRepository
     */
    protected $clientMoralRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->clientMoralRepo = \App::make(Client_moralRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_client_moral()
    {
        $clientMoral = factory(Client_moral::class)->make()->toArray();

        $createdClient_moral = $this->clientMoralRepo->create($clientMoral);

        $createdClient_moral = $createdClient_moral->toArray();
        $this->assertArrayHasKey('id', $createdClient_moral);
        $this->assertNotNull($createdClient_moral['id'], 'Created Client_moral must have id specified');
        $this->assertNotNull(Client_moral::find($createdClient_moral['id']), 'Client_moral with given id must be in DB');
        $this->assertModelData($clientMoral, $createdClient_moral);
    }

    /**
     * @test read
     */
    public function test_read_client_moral()
    {
        $clientMoral = factory(Client_moral::class)->create();

        $dbClient_moral = $this->clientMoralRepo->find($clientMoral->id);

        $dbClient_moral = $dbClient_moral->toArray();
        $this->assertModelData($clientMoral->toArray(), $dbClient_moral);
    }

    /**
     * @test update
     */
    public function test_update_client_moral()
    {
        $clientMoral = factory(Client_moral::class)->create();
        $fakeClient_moral = factory(Client_moral::class)->make()->toArray();

        $updatedClient_moral = $this->clientMoralRepo->update($fakeClient_moral, $clientMoral->id);

        $this->assertModelData($fakeClient_moral, $updatedClient_moral->toArray());
        $dbClient_moral = $this->clientMoralRepo->find($clientMoral->id);
        $this->assertModelData($fakeClient_moral, $dbClient_moral->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_client_moral()
    {
        $clientMoral = factory(Client_moral::class)->create();

        $resp = $this->clientMoralRepo->delete($clientMoral->id);

        $this->assertTrue($resp);
        $this->assertNull(Client_moral::find($clientMoral->id), 'Client_moral should not exist in DB');
    }
}
