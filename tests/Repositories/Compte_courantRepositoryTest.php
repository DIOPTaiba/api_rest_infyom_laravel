<?php namespace Tests\Repositories;

use App\Models\Compte_courant;
use App\Repositories\Compte_courantRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class Compte_courantRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var Compte_courantRepository
     */
    protected $compteCourantRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->compteCourantRepo = \App::make(Compte_courantRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_compte_courant()
    {
        $compteCourant = factory(Compte_courant::class)->make()->toArray();

        $createdCompte_courant = $this->compteCourantRepo->create($compteCourant);

        $createdCompte_courant = $createdCompte_courant->toArray();
        $this->assertArrayHasKey('id', $createdCompte_courant);
        $this->assertNotNull($createdCompte_courant['id'], 'Created Compte_courant must have id specified');
        $this->assertNotNull(Compte_courant::find($createdCompte_courant['id']), 'Compte_courant with given id must be in DB');
        $this->assertModelData($compteCourant, $createdCompte_courant);
    }

    /**
     * @test read
     */
    public function test_read_compte_courant()
    {
        $compteCourant = factory(Compte_courant::class)->create();

        $dbCompte_courant = $this->compteCourantRepo->find($compteCourant->id);

        $dbCompte_courant = $dbCompte_courant->toArray();
        $this->assertModelData($compteCourant->toArray(), $dbCompte_courant);
    }

    /**
     * @test update
     */
    public function test_update_compte_courant()
    {
        $compteCourant = factory(Compte_courant::class)->create();
        $fakeCompte_courant = factory(Compte_courant::class)->make()->toArray();

        $updatedCompte_courant = $this->compteCourantRepo->update($fakeCompte_courant, $compteCourant->id);

        $this->assertModelData($fakeCompte_courant, $updatedCompte_courant->toArray());
        $dbCompte_courant = $this->compteCourantRepo->find($compteCourant->id);
        $this->assertModelData($fakeCompte_courant, $dbCompte_courant->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_compte_courant()
    {
        $compteCourant = factory(Compte_courant::class)->create();

        $resp = $this->compteCourantRepo->delete($compteCourant->id);

        $this->assertTrue($resp);
        $this->assertNull(Compte_courant::find($compteCourant->id), 'Compte_courant should not exist in DB');
    }
}
