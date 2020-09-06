<?php namespace Tests\Repositories;

use App\Models\Client_non_salarie;
use App\Repositories\Client_non_salarieRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class Client_non_salarieRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var Client_non_salarieRepository
     */
    protected $clientNonSalarieRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->clientNonSalarieRepo = \App::make(Client_non_salarieRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_client_non_salarie()
    {
        $clientNonSalarie = factory(Client_non_salarie::class)->make()->toArray();

        $createdClient_non_salarie = $this->clientNonSalarieRepo->create($clientNonSalarie);

        $createdClient_non_salarie = $createdClient_non_salarie->toArray();
        $this->assertArrayHasKey('id', $createdClient_non_salarie);
        $this->assertNotNull($createdClient_non_salarie['id'], 'Created Client_non_salarie must have id specified');
        $this->assertNotNull(Client_non_salarie::find($createdClient_non_salarie['id']), 'Client_non_salarie with given id must be in DB');
        $this->assertModelData($clientNonSalarie, $createdClient_non_salarie);
    }

    /**
     * @test read
     */
    public function test_read_client_non_salarie()
    {
        $clientNonSalarie = factory(Client_non_salarie::class)->create();

        $dbClient_non_salarie = $this->clientNonSalarieRepo->find($clientNonSalarie->id);

        $dbClient_non_salarie = $dbClient_non_salarie->toArray();
        $this->assertModelData($clientNonSalarie->toArray(), $dbClient_non_salarie);
    }

    /**
     * @test update
     */
    public function test_update_client_non_salarie()
    {
        $clientNonSalarie = factory(Client_non_salarie::class)->create();
        $fakeClient_non_salarie = factory(Client_non_salarie::class)->make()->toArray();

        $updatedClient_non_salarie = $this->clientNonSalarieRepo->update($fakeClient_non_salarie, $clientNonSalarie->id);

        $this->assertModelData($fakeClient_non_salarie, $updatedClient_non_salarie->toArray());
        $dbClient_non_salarie = $this->clientNonSalarieRepo->find($clientNonSalarie->id);
        $this->assertModelData($fakeClient_non_salarie, $dbClient_non_salarie->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_client_non_salarie()
    {
        $clientNonSalarie = factory(Client_non_salarie::class)->create();

        $resp = $this->clientNonSalarieRepo->delete($clientNonSalarie->id);

        $this->assertTrue($resp);
        $this->assertNull(Client_non_salarie::find($clientNonSalarie->id), 'Client_non_salarie should not exist in DB');
    }
}
