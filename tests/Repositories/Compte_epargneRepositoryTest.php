<?php namespace Tests\Repositories;

use App\Models\Compte_epargne;
use App\Repositories\Compte_epargneRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class Compte_epargneRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var Compte_epargneRepository
     */
    protected $compteEpargneRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->compteEpargneRepo = \App::make(Compte_epargneRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_compte_epargne()
    {
        $compteEpargne = factory(Compte_epargne::class)->make()->toArray();

        $createdCompte_epargne = $this->compteEpargneRepo->create($compteEpargne);

        $createdCompte_epargne = $createdCompte_epargne->toArray();
        $this->assertArrayHasKey('id', $createdCompte_epargne);
        $this->assertNotNull($createdCompte_epargne['id'], 'Created Compte_epargne must have id specified');
        $this->assertNotNull(Compte_epargne::find($createdCompte_epargne['id']), 'Compte_epargne with given id must be in DB');
        $this->assertModelData($compteEpargne, $createdCompte_epargne);
    }

    /**
     * @test read
     */
    public function test_read_compte_epargne()
    {
        $compteEpargne = factory(Compte_epargne::class)->create();

        $dbCompte_epargne = $this->compteEpargneRepo->find($compteEpargne->id);

        $dbCompte_epargne = $dbCompte_epargne->toArray();
        $this->assertModelData($compteEpargne->toArray(), $dbCompte_epargne);
    }

    /**
     * @test update
     */
    public function test_update_compte_epargne()
    {
        $compteEpargne = factory(Compte_epargne::class)->create();
        $fakeCompte_epargne = factory(Compte_epargne::class)->make()->toArray();

        $updatedCompte_epargne = $this->compteEpargneRepo->update($fakeCompte_epargne, $compteEpargne->id);

        $this->assertModelData($fakeCompte_epargne, $updatedCompte_epargne->toArray());
        $dbCompte_epargne = $this->compteEpargneRepo->find($compteEpargne->id);
        $this->assertModelData($fakeCompte_epargne, $dbCompte_epargne->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_compte_epargne()
    {
        $compteEpargne = factory(Compte_epargne::class)->create();

        $resp = $this->compteEpargneRepo->delete($compteEpargne->id);

        $this->assertTrue($resp);
        $this->assertNull(Compte_epargne::find($compteEpargne->id), 'Compte_epargne should not exist in DB');
    }
}
