<?php namespace Tests\Repositories;

use App\Models\Responsable_compte;
use App\Repositories\Responsable_compteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class Responsable_compteRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var Responsable_compteRepository
     */
    protected $responsableCompteRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->responsableCompteRepo = \App::make(Responsable_compteRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_responsable_compte()
    {
        $responsableCompte = factory(Responsable_compte::class)->make()->toArray();

        $createdResponsable_compte = $this->responsableCompteRepo->create($responsableCompte);

        $createdResponsable_compte = $createdResponsable_compte->toArray();
        $this->assertArrayHasKey('id', $createdResponsable_compte);
        $this->assertNotNull($createdResponsable_compte['id'], 'Created Responsable_compte must have id specified');
        $this->assertNotNull(Responsable_compte::find($createdResponsable_compte['id']), 'Responsable_compte with given id must be in DB');
        $this->assertModelData($responsableCompte, $createdResponsable_compte);
    }

    /**
     * @test read
     */
    public function test_read_responsable_compte()
    {
        $responsableCompte = factory(Responsable_compte::class)->create();

        $dbResponsable_compte = $this->responsableCompteRepo->find($responsableCompte->id);

        $dbResponsable_compte = $dbResponsable_compte->toArray();
        $this->assertModelData($responsableCompte->toArray(), $dbResponsable_compte);
    }

    /**
     * @test update
     */
    public function test_update_responsable_compte()
    {
        $responsableCompte = factory(Responsable_compte::class)->create();
        $fakeResponsable_compte = factory(Responsable_compte::class)->make()->toArray();

        $updatedResponsable_compte = $this->responsableCompteRepo->update($fakeResponsable_compte, $responsableCompte->id);

        $this->assertModelData($fakeResponsable_compte, $updatedResponsable_compte->toArray());
        $dbResponsable_compte = $this->responsableCompteRepo->find($responsableCompte->id);
        $this->assertModelData($fakeResponsable_compte, $dbResponsable_compte->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_responsable_compte()
    {
        $responsableCompte = factory(Responsable_compte::class)->create();

        $resp = $this->responsableCompteRepo->delete($responsableCompte->id);

        $this->assertTrue($resp);
        $this->assertNull(Responsable_compte::find($responsableCompte->id), 'Responsable_compte should not exist in DB');
    }
}
