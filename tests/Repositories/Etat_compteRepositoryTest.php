<?php namespace Tests\Repositories;

use App\Models\Etat_compte;
use App\Repositories\Etat_compteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class Etat_compteRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var Etat_compteRepository
     */
    protected $etatCompteRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->etatCompteRepo = \App::make(Etat_compteRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_etat_compte()
    {
        $etatCompte = factory(Etat_compte::class)->make()->toArray();

        $createdEtat_compte = $this->etatCompteRepo->create($etatCompte);

        $createdEtat_compte = $createdEtat_compte->toArray();
        $this->assertArrayHasKey('id', $createdEtat_compte);
        $this->assertNotNull($createdEtat_compte['id'], 'Created Etat_compte must have id specified');
        $this->assertNotNull(Etat_compte::find($createdEtat_compte['id']), 'Etat_compte with given id must be in DB');
        $this->assertModelData($etatCompte, $createdEtat_compte);
    }

    /**
     * @test read
     */
    public function test_read_etat_compte()
    {
        $etatCompte = factory(Etat_compte::class)->create();

        $dbEtat_compte = $this->etatCompteRepo->find($etatCompte->id);

        $dbEtat_compte = $dbEtat_compte->toArray();
        $this->assertModelData($etatCompte->toArray(), $dbEtat_compte);
    }

    /**
     * @test update
     */
    public function test_update_etat_compte()
    {
        $etatCompte = factory(Etat_compte::class)->create();
        $fakeEtat_compte = factory(Etat_compte::class)->make()->toArray();

        $updatedEtat_compte = $this->etatCompteRepo->update($fakeEtat_compte, $etatCompte->id);

        $this->assertModelData($fakeEtat_compte, $updatedEtat_compte->toArray());
        $dbEtat_compte = $this->etatCompteRepo->find($etatCompte->id);
        $this->assertModelData($fakeEtat_compte, $dbEtat_compte->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_etat_compte()
    {
        $etatCompte = factory(Etat_compte::class)->create();

        $resp = $this->etatCompteRepo->delete($etatCompte->id);

        $this->assertTrue($resp);
        $this->assertNull(Etat_compte::find($etatCompte->id), 'Etat_compte should not exist in DB');
    }
}
