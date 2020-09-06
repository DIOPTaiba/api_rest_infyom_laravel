<?php namespace Tests\Repositories;

use App\Models\Client_salarie;
use App\Repositories\Client_salarieRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class Client_salarieRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var Client_salarieRepository
     */
    protected $clientSalarieRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->clientSalarieRepo = \App::make(Client_salarieRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_client_salarie()
    {
        $clientSalarie = factory(Client_salarie::class)->make()->toArray();

        $createdClient_salarie = $this->clientSalarieRepo->create($clientSalarie);

        $createdClient_salarie = $createdClient_salarie->toArray();
        $this->assertArrayHasKey('id', $createdClient_salarie);
        $this->assertNotNull($createdClient_salarie['id'], 'Created Client_salarie must have id specified');
        $this->assertNotNull(Client_salarie::find($createdClient_salarie['id']), 'Client_salarie with given id must be in DB');
        $this->assertModelData($clientSalarie, $createdClient_salarie);
    }

    /**
     * @test read
     */
    public function test_read_client_salarie()
    {
        $clientSalarie = factory(Client_salarie::class)->create();

        $dbClient_salarie = $this->clientSalarieRepo->find($clientSalarie->id);

        $dbClient_salarie = $dbClient_salarie->toArray();
        $this->assertModelData($clientSalarie->toArray(), $dbClient_salarie);
    }

    /**
     * @test update
     */
    public function test_update_client_salarie()
    {
        $clientSalarie = factory(Client_salarie::class)->create();
        $fakeClient_salarie = factory(Client_salarie::class)->make()->toArray();

        $updatedClient_salarie = $this->clientSalarieRepo->update($fakeClient_salarie, $clientSalarie->id);

        $this->assertModelData($fakeClient_salarie, $updatedClient_salarie->toArray());
        $dbClient_salarie = $this->clientSalarieRepo->find($clientSalarie->id);
        $this->assertModelData($fakeClient_salarie, $dbClient_salarie->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_client_salarie()
    {
        $clientSalarie = factory(Client_salarie::class)->create();

        $resp = $this->clientSalarieRepo->delete($clientSalarie->id);

        $this->assertTrue($resp);
        $this->assertNull(Client_salarie::find($clientSalarie->id), 'Client_salarie should not exist in DB');
    }
}
